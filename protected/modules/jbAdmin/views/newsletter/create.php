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
<div class="account-header">
  TAMBAH NEWSLETTER
</div>
<div class="admin-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>