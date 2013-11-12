<style>
    th label{
        font-weight: bold;
    }
    
    input[type="radio"]{
        margin-top: -3px;
    }
</style>
<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-index-form',
        'enableAjaxValidation' => false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
<?php echo $form->errorSummary($model); 
      if(isset($dataSaved))
      {
          echo "Data Berhasil Disimpan";
      }
      ?>
<div class="row-fluid account-body">
	<div class="account-sidebar">
		<div class="account-sidebar-header">
			Akun Saya
		</div>
		<?php echo $this->renderPartial('_sidebar', array('menu'=>$menu)); ?>
	</div>
	<div class="account-content">
		<div class="account-header">
			FORM DATA DIRI
		</div>
		<div class="account-data-diri">
			<div class="account-data-diri-row-input-head">
				<label class="control-label"><?php echo $form->labelEx($model,'email'); ?></label>
				<?php echo $form->textField($model,'email',array('readonly'=>'readonly','class'=>'account-data-diri-input-head')); ?>
			</div>
			<div class="account-data-diri-row-input-head">
				<label class="control-label"><?php echo $form->labelEx($model,'password'); ?></label>
				<?php echo $form->passwordField($model,'password',array('class'=>'account-data-diri-input-head')); ?>
				<div class="additional">
					*kosongkan jika tidak ingin diubah
				</div>
			</div>
			<div class="account-data-diri-row-input-head">
				<label class="control-label"><?php echo $form->labelEx($model,'password_repeat'); ?></label>
				<?php echo $form->passwordField($model,'password_repeat',array('class'=>'account-data-diri-input-head')); ?>
				<div class="additional">
					*kosongkan jika tidak ingin diubah
				</div>
			</div>
			<div class="account-data-diri-divide-line">
				&nbsp;
			</div>
			<div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<label><?php echo $form->labelEx($model,'first_name'); ?></label>
						<?php echo $form->textField($model,'first_name',array('class'=>'account-data-diri-input')); ?>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					<div class="account-data-diri-row-input">
						<label><?php echo $form->labelEx($model,'instansi'); ?></label>
						<?php echo $form->textField($model,'instansi',array('class'=>'account-data-diri-input')); ?>
					</div>
				</div>
			</div>
			<div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'last_name'); ?></label>
						<?php echo $form->textField($model,'last_name',array('class'=>'account-data-diri-input')); ?>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					<div class="account-data-diri-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'income'); ?></label>
						<?php echo $form->textField($model,'income',array('class'=>'account-data-diri-input')); ?>
					</div>
				</div>
			</div>
			<div class="account-data-diri-column-textarea">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'gender'); ?></label>
						<?php echo $form->radioButtonList($model,'gender',$jenis_kelamin,array('class' => 'radio-button-account-data-diri','separator'=>'','labelOptions'=>array('style'=>'display:inline; margin-right: 10px;'))) ?>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					<div class="account-data-diri-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'office_address'); ?></label>
						<?php echo $form->textArea($model,'office_address',array('class'=>'account-data-diri-textarea')); ?>
					</div>
				</div>
			</div>
			<div class="account-data-diri-divide-line">
				&nbsp;
			</div>
			<div class="account-data-diri-column-textarea">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'address'); ?></label>
						<?php echo $form->textArea($model,'address',array('class'=>'account-data-diri-textarea')); ?>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					<div class="account-data-diri-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'religion'); ?>
						</label>
						<div class="account-data-diri-row-select">
							<?php echo $form->dropDownList($model,'religion',$agama,array('prompt'=>'Pilih Agama','class'=>'account-data-diri-select')); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<label><?php echo $form->labelEx($model,'office_phone'); ?></label>
						<?php echo $form->textField($model,'office_phone',array('class'=>'account-data-diri-input')); ?>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					<div class="account-data-diri-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'marital_status'); ?></label>
						<div class="account-data-diri-row-select">
							<?php echo $form->dropDownList($model,'marital_status',$status_perkawinan,array('prompt'=>'Pilih Status', 'class'=>'account-data-diri-select')); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<label><?php echo $form->labelEx($model,'phone'); ?></label>
						<?php echo $form->textField($model,'phone',array('class'=>'account-data-diri-input')); ?>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					<div class="account-data-diri-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'id_nationality'); ?></label>
						<div class="account-data-diri-row-select">
							<?php echo $form->dropDownList($model,'id_nationality',CHtml::listData($negara,'id','country'),array('prompt'=>'Pilih Negara','class'=>'account-data-diri-select')); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<label><?php echo $form->labelEx($model,'handphone'); ?></label>
						<?php echo $form->textField($model,'handphone',array('class'=>'account-data-diri-input')); ?>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					<div class="account-data-diri-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'id_job'); ?></label>
						<div class="account-data-diri-row-select">
							<?php echo $form->dropDownList($model,'id_job',CHtml::listData($pekerjaan,'id','job'),array('prompt'=>'Pilih Status','class'=>'account-data-diri-select')); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<label><?php echo $form->labelEx($model,'birth_place'); ?></label>
						<?php echo $form->textField($model,'birth_place',array('class'=>'account-data-diri-input')); ?>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					&nbsp;
				</div>
			</div>
                    <div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<label><?php echo $form->labelEx($model,'date_of_birth'); ?></label>
						<?php 
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$model,
								'attribute'=>'date_of_birth',
								'options'=>array(
									'showAnim'=>'fold',
									'dateFormat'=>'yy-mm-dd',
                                                                        'changeMonth'=>true,
                                                                        'changeYear'=>true,
                                                                        'yearRange'=>'1900:2050',
                                                                        'maxDate' => date('Y-m-d'), 
								),
								'htmlOptions'=>array(
									'class'=>'account-data-diri-input'
								),
							)); 
						?>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					&nbsp;
				</div>
			</div>
			<div class="account-data-diri-divide-line">
				&nbsp;
			</div>
			<div class="account-data-diri-row-input-head">
				<div class="account-data-diri-subtitle">
					Isian Khusus Pembeli
				</div>
				<div class="account-data-diri-subtitle-desc">
					Isikan data dibawah ini untuk mendapatkan bisnis yang sesuai dengan anda secara cepat
				</div>
			</div>
			<div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<div class="account-data-diri-row-select-2">
							<?php echo $form->dropDownList($model,'id_buyer_category',CHtml::listData($kategori,'id','industri'),array('prompt'=>'Pilih Kategori','class'=>'account-data-diri-select-2')); ?>
						</div>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					&nbsp;
				</div>
			</div>
			<div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<div class="account-data-diri-row-select-2">
							<?php echo $form->dropDownList($model,'id_buyer_location',CHtml::listData($lokasi,'id','provinsi'),array('prompt'=>'Pilih Lokasi','class'=>'account-data-diri-select-2')); ?>
						</div>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					&nbsp;
				</div>
			</div>
			<div class="account-data-diri-column">
				<div class="account-data-diri-column-left">
					<div class="account-data-diri-row-input">
						<div class="account-data-diri-row-select-2">
							<?php echo $form->dropDownList($model,'id_buyer_price',CHtml::listData($range_harga,'id','range_price'),array('prompt'=>'Pilih Range Harga','class'=>'account-data-diri-select-2')); ?>
						</div>
					</div>
				</div>
				<div class="account-data-diri-column-right">
					&nbsp;
				</div>
			</div>
			<div class="account-data-diri-divide-line">
				&nbsp;
			</div>
			<div class="account-data-diri-row-input-head">
				<div class="account-data-diri-subtitle">
					Status Newsletter
				</div>
			</div>
			<div class="account-data-diri-row-input-head">
				<div class="account-data-diri-row-input account-data-diri-ending-checkbox">
					<label class="checkbox">
					<?php echo $form->checkBox($model,'newsletter_status') ?>Ya, saya ingin menerima newsletter dari JualanBisnis.com yang berisi berita promosi dan penawaran
					</label>
				</div>
			</div>
			<div class="account-data-diri-row-input-head account-data-diri-submit">
				<div class="account-data-diri-row-input">
					<button type="submit" class="account-data-diri-button">Simpan</button>
				</div>
			</div>
		</div>
	</div>
</div>	  	  
<?php $this->endWidget(); ?>	
	
