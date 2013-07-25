<?php
if($model->post != '' || $model->post != null)
{
    if(strlen($model->post) <= 200)
    {
        echo strip_tags(html_entity_decode($model->post));
    }
    else
    {
        echo substr(strip_tags(html_entity_decode($model->post)), 0, 200) . "...";
    }
}
?>
