<?php
/* @var $this LServiceController */

$this->breadcrumbs=array(
	'Labels for views',
);
?>

<h1>Labels for VIEWS</h1>
<h4>List of views:</h4>

<div class="lservice_content">
    <?php
    if ( count($tables) > 0 ){
        
        foreach($tables as $tbl)
        {
            $tname = str_replace("`", "", $tbl->rawName);
            //echo $tbl->rawName, ':<br/>', implode(', ', $tbl->columnNames), '<br/>';
            echo '<div class="block_item">';

            echo '<div class="block_title"><span class="title">'. $tname .'</span></div>';
            echo '<div class="block_labels hidden_div">';

            echo '<form method="post" action="http://yii.local/app1/index.php?r=lservice/save">';
            echo '<input type="hidden" name="table_name" value="'. $tname .'">';
            $i = 0;

            foreach($tbl->columnNames as $field){
                echo '<input type="hidden" name="f'.$i.'[table]" value="'. $tname .'">';
                echo '<input type="hidden" name="f'.$i.'[field]" value="'. $field .'">';
                echo '<label for="elm'.$i.'">'.$field.':</label><br>';
                echo '<input type="text" id="elm'.$i.'" name="f'.$i.'[label]" value="'.$field.'"><br>';
                $i++;
            }
            echo '<button type="submit">Save</button>';
            echo '</form>';

            echo '</div></div>';
        }

    }
    
    ?>
</div>
