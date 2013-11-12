<?php
  $this->menu = $menu;
?>
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

<div class="account-header">
  TAMBAH ARTIKEL
</div>
<div class="admin-form">
	<?php echo $this->renderPartial('_form', array('model'=>$model,'category'=>$category,'categoryPembaca'=>$categoryPembaca)); ?>
</div>
