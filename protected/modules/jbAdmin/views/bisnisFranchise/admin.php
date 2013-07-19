<?php
/* @var $this BisnisFranchiseController */
/* @var $model Business */

$this->breadcrumbs=array(
	'Businesses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Business', 'url'=>array('index')),
	array('label'=>'Create Business', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#business-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Businesses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'business-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_category',
		'id_user',
		'id_industri',
		'id_sub_industri',
		'id_provinsi',
		/*
		'id_kota',
		'nama',
		'deskripsi',
		'kepemilikan',
		'tahun_didirikan',
		'alamat',
		'jumlah_karyawan',
		'penjualan',
		'hpp',
		'laba_bersih_tahun',
		'total_aset',
		'marjin_laba_bersih',
		'laba_bersih_aset',
		'harga_penawaran_penjualan',
		'harga_penawaran_laba_bersih',
		'harga_penawaran_aset',
		'harga_min',
		'harga_max',
		'alasan_jual_bisnis',
		'franchise_alasan_kerjasama',
		'franchise_persyaratan',
		'franchise_menu',
		'franchise_dukungan_franchisor',
		'dokumen',
		'image',
		'status_approval',
		'tanggal_approval',
		'alasan_penolakan',
		'jumlah_click',
		'tampilkanKontak',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
