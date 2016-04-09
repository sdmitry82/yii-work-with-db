<?php

class LServiceController extends Controller
{
    private $view_prefix = 'v_';
    
	public function actionIndex()
	{  
        try {
            $connection = Yii::app()->db; //get connection
            $dbSchema = $connection->schema;
            $tables = $dbSchema->getTables(); //returns array of tbl schema's
        } catch (Exception $e){
            $tables = [];
        }

        /*
        // Filter
        $tables = array_filter($tables, function($k) {
            if ( stripos( $k, $this->view_prefix ) === 0 ) {
                return true;
            } else {
                return false;
            }
        }, ARRAY_FILTER_USE_KEY);

        $this->render('index', ['tables'=> $tables]);
        */

        $tables = $this->filter_views($tables);
        //$tables = $this->clean_views_names($tables);
        $this->render('index', ['tables'=> $tables]);
	}


    // Clean names of views from `
    private function clean_views_names($tables_list){
        $rez = [];
        foreach( array_keys($tables_list) as $key ){
            $k = str_replace("`", "", $key);
            echo $key . ' - ' . $k;
            $rez[$k] = $tables_list[$key];
        }
        return $rez;
    }

    // Filter views from tables list by view_prefix
    // input array
    // output array
    private function filter_views($tables_list){
        $tables_list = array_filter($tables_list, function($k) {
            if ( stripos( $k, $this->view_prefix ) === 0 ) {
                return true;
            } else {
                return false;
            }
        }, ARRAY_FILTER_USE_KEY);

        return $tables_list;
    }


    // Save to DB
    public function actionSave(){
        $model = new Labels();

        if(isset($_POST) && isset($_POST['table_name'])){

            // Clear old data
            Labels::model()->deleteAll(
                '`table` = :t',
                array(':t' => $_POST['table_name'])
            );
            unset($_POST['table_name']);

            foreach ($_POST as $label){

                $model->id = false;
                $model->isNewRecord = true;
                $model->attributes = $label;

                if($model->validate()){
                    $model->save(false);
                } else {
                    $this->render('message_error', ['errm_list'=> $model->getErrors()]);
                    exit;
                }
            }

        } else {
            $this->render('message_error', ['errm_mess'=> 'Ошибка сохранения в базу. Ошибка в параметрах.']);
            exit;
        }

        $all_labels_model = new Labels('search');
        $all_labels_model -> unsetAttributes();
        $this->render('message_done', ['al'=> $all_labels_model ]);
    }



}