<?php
  $this->menu = $menu;
?>
<?php
/* @var $this KategoriController */
/* @var $model Industri */

//$this->breadcrumbs=array(
//	'Industris'=>array('index'),
//	'Create',
//);
//
//$this->menu=array(
//	array('label'=>'List Industri', 'url'=>array('index')),
//	array('label'=>'Manage Industri', 'url'=>array('admin')),
//);
?>
<div class="account-header">
  <?php echo strtoupper($industri->industri) ?><br/>
  TAMBAH SUB KATEGORI
</div>
<div class="admin-form">
	<?php echo $this->renderPartial('_formSubIndustri', array('model'=>$model,'industri'=>$industri)); ?>
</div>