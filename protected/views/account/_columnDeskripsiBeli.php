<?php
if($model->idBusiness->deskripsi != '' || $model->idBusiness->deskripsi != null)
{
    if(strlen($model->idBusiness->deskripsi) <= 200)
    {
        echo strip_tags(html_entity_decode($model->idBusiness->deskripsi));
    }
    else
    {
        echo substr(strip_tags(html_entity_decode($model->idBusiness->deskripsi)), 0, 200) . "...";
    }
}
?>
