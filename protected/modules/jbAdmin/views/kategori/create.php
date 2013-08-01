<?php
/* @var $this KategoriController */
/* @var $model Industri */

$this->breadcrumbs=array(
	'Industris'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Industri', 'url'=>array('index')),
	array('label'=>'Manage Industri', 'url'=>array('admin')),
);
?>
<div class="span10">
<h1>Tambah Kategori</h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>