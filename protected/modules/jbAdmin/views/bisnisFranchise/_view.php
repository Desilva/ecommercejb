<?php
/* @var $this BisnisFranchiseController */
/* @var $data Business */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_category')); ?>:</b>
	<?php echo CHtml::encode($data->id_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_industri')); ?>:</b>
	<?php echo CHtml::encode($data->id_industri); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sub_industri')); ?>:</b>
	<?php echo CHtml::encode($data->id_sub_industri); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_provinsi')); ?>:</b>
	<?php echo CHtml::encode($data->id_provinsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_kota')); ?>:</b>
	<?php echo CHtml::encode($data->id_kota); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kepemilikan')); ?>:</b>
	<?php echo CHtml::encode($data->kepemilikan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_didirikan')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_didirikan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_karyawan')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_karyawan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penjualan')); ?>:</b>
	<?php echo CHtml::encode($data->penjualan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hpp')); ?>:</b>
	<?php echo CHtml::encode($data->hpp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('laba_bersih_tahun')); ?>:</b>
	<?php echo CHtml::encode($data->laba_bersih_tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_aset')); ?>:</b>
	<?php echo CHtml::encode($data->total_aset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marjin_laba_bersih')); ?>:</b>
	<?php echo CHtml::encode($data->marjin_laba_bersih); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('laba_bersih_aset')); ?>:</b>
	<?php echo CHtml::encode($data->laba_bersih_aset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga_penawaran_penjualan')); ?>:</b>
	<?php echo CHtml::encode($data->harga_penawaran_penjualan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga_penawaran_laba_bersih')); ?>:</b>
	<?php echo CHtml::encode($data->harga_penawaran_laba_bersih); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga_penawaran_aset')); ?>:</b>
	<?php echo CHtml::encode($data->harga_penawaran_aset); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga_min')); ?>:</b>
	<?php echo CHtml::encode($data->harga_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga_max')); ?>:</b>
	<?php echo CHtml::encode($data->harga_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alasan_jual_bisnis')); ?>:</b>
	<?php echo CHtml::encode($data->alasan_jual_bisnis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('franchise_alasan_kerjasama')); ?>:</b>
	<?php echo CHtml::encode($data->franchise_alasan_kerjasama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('franchise_persyaratan')); ?>:</b>
	<?php echo CHtml::encode($data->franchise_persyaratan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('franchise_menu')); ?>:</b>
	<?php echo CHtml::encode($data->franchise_menu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('franchise_dukungan_franchisor')); ?>:</b>
	<?php echo CHtml::encode($data->franchise_dukungan_franchisor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->dokumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_approval')); ?>:</b>
	<?php echo CHtml::encode($data->status_approval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_approval')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_approval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alasan_penolakan')); ?>:</b>
	<?php echo CHtml::encode($data->alasan_penolakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jumlah_click')); ?>:</b>
	<?php echo CHtml::encode($data->jumlah_click); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tampilkanKontak')); ?>:</b>
	<?php echo CHtml::encode($data->tampilkanKontak); ?>
	<br />

	*/ ?>

</div>