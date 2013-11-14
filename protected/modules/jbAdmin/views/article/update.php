<?php
  $this->menu = $menu;
?>
<?php
//$this->breadcrumbs=array(
//	'Articles'=>array('index'),
//	$model->title=>array('view','id'=>$model->id),
//	'Update',
//);
//
//$this->menu=array(
//	array('label'=>'List Article', 'url'=>array('index')),
//	array('label'=>'Create Article', 'url'=>array('create')),
//	array('label'=>'View Article', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage Article', 'url'=>array('admin')),
//);
?>
<div class="account-header">
  UBAH ARTIKEL <?php echo strtoupper($model->title); ?>
</div>
<div class="admin-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model,'category'=>$category, 'categoryPembaca'=>$categoryPembaca)); ?>
</div>