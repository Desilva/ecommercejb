<?php
$this->breadcrumbs=array(
	'Businesses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Business', 'url'=>array('index')),
	array('label'=>'Create Business', 'url'=>array('create')),
	array('label'=>'Update Business', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Business', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Business', 'url'=>array('admin')),
);
?>

<h1>View Business #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_category',
		'id_kepemilikan',
		'id_industri',
		'id_sub_industri',
		'id_provinsi',
		'id_kota',
		'nama',
		'deskripsi',
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
		'jumlah_click',
	),
)); ?>
