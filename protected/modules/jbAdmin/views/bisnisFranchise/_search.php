<?php
/* @var $this BisnisFranchiseController */
/* @var $model Business */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_category'); ?>
		<?php echo $form->textField($model,'id_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_industri'); ?>
		<?php echo $form->textField($model,'id_industri'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_sub_industri'); ?>
		<?php echo $form->textField($model,'id_sub_industri'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_provinsi'); ?>
		<?php echo $form->textField($model,'id_provinsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_kota'); ?>
		<?php echo $form->textField($model,'id_kota'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deskripsi'); ?>
		<?php echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kepemilikan'); ?>
		<?php echo $form->textField($model,'kepemilikan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahun_didirikan'); ?>
		<?php echo $form->textField($model,'tahun_didirikan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alamat'); ?>
		<?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_karyawan'); ?>
		<?php echo $form->textField($model,'jumlah_karyawan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'penjualan'); ?>
		<?php echo $form->textField($model,'penjualan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hpp'); ?>
		<?php echo $form->textField($model,'hpp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'laba_bersih_tahun'); ?>
		<?php echo $form->textField($model,'laba_bersih_tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_aset'); ?>
		<?php echo $form->textField($model,'total_aset'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marjin_laba_bersih'); ?>
		<?php echo $form->textField($model,'marjin_laba_bersih'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'laba_bersih_aset'); ?>
		<?php echo $form->textField($model,'laba_bersih_aset'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harga_penawaran_penjualan'); ?>
		<?php echo $form->textField($model,'harga_penawaran_penjualan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harga_penawaran_laba_bersih'); ?>
		<?php echo $form->textField($model,'harga_penawaran_laba_bersih'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harga_penawaran_aset'); ?>
		<?php echo $form->textField($model,'harga_penawaran_aset'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harga_min'); ?>
		<?php echo $form->textField($model,'harga_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'harga_max'); ?>
		<?php echo $form->textField($model,'harga_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alasan_jual_bisnis'); ?>
		<?php echo $form->textField($model,'alasan_jual_bisnis',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'franchise_alasan_kerjasama'); ?>
		<?php echo $form->textField($model,'franchise_alasan_kerjasama',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'franchise_persyaratan'); ?>
		<?php echo $form->textField($model,'franchise_persyaratan',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'franchise_menu'); ?>
		<?php echo $form->textField($model,'franchise_menu',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'franchise_dukungan_franchisor'); ?>
		<?php echo $form->textField($model,'franchise_dukungan_franchisor',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dokumen'); ?>
		<?php echo $form->textField($model,'dokumen',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_approval'); ?>
		<?php echo $form->textField($model,'status_approval',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_approval'); ?>
		<?php echo $form->textField($model,'tanggal_approval'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alasan_penolakan'); ?>
		<?php echo $form->textField($model,'alasan_penolakan',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jumlah_click'); ?>
		<?php echo $form->textField($model,'jumlah_click'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tampilkanKontak'); ?>
		<?php echo $form->textField($model,'tampilkanKontak'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->