<?php
/* @var $this BisnisFranchiseController */
/* @var $model Business */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_category'); ?>
		<?php echo $form->textField($model,'id_category'); ?>
		<?php echo $form->error($model,'id_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_industri'); ?>
		<?php echo $form->textField($model,'id_industri'); ?>
		<?php echo $form->error($model,'id_industri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_sub_industri'); ?>
		<?php echo $form->textField($model,'id_sub_industri'); ?>
		<?php echo $form->error($model,'id_sub_industri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_provinsi'); ?>
		<?php echo $form->textField($model,'id_provinsi'); ?>
		<?php echo $form->error($model,'id_provinsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_kota'); ?>
		<?php echo $form->textField($model,'id_kota'); ?>
		<?php echo $form->error($model,'id_kota'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama'); ?>
		<?php echo $form->textField($model,'nama',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deskripsi'); ?>
		<?php echo $form->textField($model,'deskripsi',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'deskripsi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kepemilikan'); ?>
		<?php echo $form->textField($model,'kepemilikan'); ?>
		<?php echo $form->error($model,'kepemilikan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun_didirikan'); ?>
		<?php echo $form->textField($model,'tahun_didirikan'); ?>
		<?php echo $form->error($model,'tahun_didirikan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textField($model,'alamat',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'alamat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah_karyawan'); ?>
		<?php echo $form->textField($model,'jumlah_karyawan'); ?>
		<?php echo $form->error($model,'jumlah_karyawan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'penjualan'); ?>
		<?php echo $form->textField($model,'penjualan'); ?>
		<?php echo $form->error($model,'penjualan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hpp'); ?>
		<?php echo $form->textField($model,'hpp'); ?>
		<?php echo $form->error($model,'hpp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'laba_bersih_tahun'); ?>
		<?php echo $form->textField($model,'laba_bersih_tahun'); ?>
		<?php echo $form->error($model,'laba_bersih_tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_aset'); ?>
		<?php echo $form->textField($model,'total_aset'); ?>
		<?php echo $form->error($model,'total_aset'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marjin_laba_bersih'); ?>
		<?php echo $form->textField($model,'marjin_laba_bersih'); ?>
		<?php echo $form->error($model,'marjin_laba_bersih'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'laba_bersih_aset'); ?>
		<?php echo $form->textField($model,'laba_bersih_aset'); ?>
		<?php echo $form->error($model,'laba_bersih_aset'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga_penawaran_penjualan'); ?>
		<?php echo $form->textField($model,'harga_penawaran_penjualan'); ?>
		<?php echo $form->error($model,'harga_penawaran_penjualan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga_penawaran_laba_bersih'); ?>
		<?php echo $form->textField($model,'harga_penawaran_laba_bersih'); ?>
		<?php echo $form->error($model,'harga_penawaran_laba_bersih'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga_penawaran_aset'); ?>
		<?php echo $form->textField($model,'harga_penawaran_aset'); ?>
		<?php echo $form->error($model,'harga_penawaran_aset'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga_min'); ?>
		<?php echo $form->textField($model,'harga_min'); ?>
		<?php echo $form->error($model,'harga_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'harga_max'); ?>
		<?php echo $form->textField($model,'harga_max'); ?>
		<?php echo $form->error($model,'harga_max'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alasan_jual_bisnis'); ?>
		<?php echo $form->textField($model,'alasan_jual_bisnis',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'alasan_jual_bisnis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'franchise_alasan_kerjasama'); ?>
		<?php echo $form->textField($model,'franchise_alasan_kerjasama',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'franchise_alasan_kerjasama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'franchise_persyaratan'); ?>
		<?php echo $form->textField($model,'franchise_persyaratan',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'franchise_persyaratan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'franchise_menu'); ?>
		<?php echo $form->textField($model,'franchise_menu',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'franchise_menu'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'franchise_dukungan_franchisor'); ?>
		<?php echo $form->textField($model,'franchise_dukungan_franchisor',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'franchise_dukungan_franchisor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dokumen'); ?>
		<?php echo $form->textField($model,'dokumen',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'dokumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_approval'); ?>
		<?php echo $form->textField($model,'status_approval',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'status_approval'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_approval'); ?>
		<?php echo $form->textField($model,'tanggal_approval'); ?>
		<?php echo $form->error($model,'tanggal_approval'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alasan_penolakan'); ?>
		<?php echo $form->textField($model,'alasan_penolakan',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'alasan_penolakan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jumlah_click'); ?>
		<?php echo $form->textField($model,'jumlah_click'); ?>
		<?php echo $form->error($model,'jumlah_click'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tampilkanKontak'); ?>
		<?php echo $form->textField($model,'tampilkanKontak'); ?>
		<?php echo $form->error($model,'tampilkanKontak'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->