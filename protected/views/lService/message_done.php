<h4>Обновление прошла успешно.</h4>
<p>
    <a href="http://yii.local/app1/index.php?r=lservice/index">Вернуться к списку</a>
</p>

<?php
    if (isset($al)){
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$al->search(),
            'columns'=>array('id', 'table', 'field', 'label'),
        ));
    }
?>
