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

<h1>Tambah Kategori</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>