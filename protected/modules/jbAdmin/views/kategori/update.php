<?php
/* @var $this KategoriController */
/* @var $model Industri */

$this->breadcrumbs=array(
	'Industris'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Industri', 'url'=>array('index')),
	array('label'=>'Create Industri', 'url'=>array('create')),
	array('label'=>'View Industri', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Industri', 'url'=>array('admin')),
);
?>

<div class="span10">
<h1>Update Industri <?php echo $model->id; ?></h1>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>