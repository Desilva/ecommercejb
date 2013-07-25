<?php
if($model->deskripsi != '' || $model->deskripsi != null)
{
    if(strlen($model->deskripsi) <= 200)
    {
        echo strip_tags(html_entity_decode($model->deskripsi));
    }
    else
    {
        echo substr(strip_tags(html_entity_decode($model->deskripsi)), 0, 200) . "...";
    }
}
?>
