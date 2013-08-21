<?php
if($model->isi != '' || $model->isi != null)
{
    if(strlen($model->isi) <= 200)
    {
        echo strip_tags(html_entity_decode($model->isi));
    }
    else
    {
        echo substr(strip_tags(html_entity_decode($model->isi)), 0, 200) . "...";
    }
}
?>
