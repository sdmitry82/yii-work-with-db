<h4>Ошибка сохранения в базу.</h4>

<div class="block_labels">
    <?php
    if (isset($errm_list)){
        echo '<ul class="errm_ul">';
        foreach ($errm_list as $errm){
            foreach($errm as $er){
                echo '<li>'.$er.'</li>';
            }
        }
        echo '</ul>';
    }

    if (isset($errm_mess)){
        echo '<div class="errm_div">'.$errm_mess.'</div>';
    }
     ?>
</div>
<p>
    <a href="http://yii.local/app1/index.php?r=lservice/index">Вернуться к списку</a>
</p>