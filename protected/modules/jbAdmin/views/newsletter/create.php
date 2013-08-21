<?php
/* @var $this NewsletterController */
/* @var $model Newsletter */

$this->breadcrumbs=array(
	'Newsletters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Newsletter', 'url'=>array('index')),
	array('label'=>'Manage Newsletter', 'url'=>array('admin')),
);
?>

<h3>Tambah Newsletter</h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>