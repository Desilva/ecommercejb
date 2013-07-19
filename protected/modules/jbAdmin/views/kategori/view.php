<?php
/* @var $this KategoriController */
/* @var $model Industri */

$this->breadcrumbs=array(
	'Industris'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Industri', 'url'=>array('index')),
	array('label'=>'Create Industri', 'url'=>array('create')),
	array('label'=>'Update Industri', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Industri', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Industri', 'url'=>array('admin')),
);
?>

<h1>View Industri #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'industri',
		'keterangan',
	),
)); ?>
