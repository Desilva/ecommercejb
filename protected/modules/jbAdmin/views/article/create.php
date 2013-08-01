<?php
//$this->breadcrumbs=array(
//	'Articles'=>array('index'),
//	'Create',
//);
//
//$this->menu=array(
//	array('label'=>'List Article', 'url'=>array('index')),
//	array('label'=>'Manage Article', 'url'=>array('admin')),
//);
?>

<div class="span10">
<h1>Tambah Artikel</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model,'category'=>$category)); ?>