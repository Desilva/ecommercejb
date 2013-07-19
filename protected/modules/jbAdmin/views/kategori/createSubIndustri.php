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

<h2><?php echo $industri->industri ?></h2>
<h2>Tambah Sub Kategori</h2>

<?php echo $this->renderPartial('_formSubIndustri', array('model'=>$model,'industri'=>$industri)); ?>