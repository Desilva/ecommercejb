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
	  'htmlOptions'=>array(
        'class'=>'form-horizontal',
    ),
    ));
?>

<div class="row-fluid">
	<div class="span12 Top-Margin2">
		<div class="row-fluid">
			<div class="span11">
				<div class="span12 Font-Color-DarkBlue">
					<div><header style="font-size:30px; font-family:Calibri;">Informasi Member</header><br style="clear:both"/></div><div style="margin-top:-35px;"></div>
					<div class="row-fluid">
					<div class="span12 Top-Margin3">
						Isi form dibawah ini untuk menjadi member JualanBisnis.com
                                        <p><?php echo $form->errorSummary($model); ?></p>
					</div>
				</div>
				<hr>
				</div>              
			</div>
		</div>
		<div class="row-fluid ">
			<div class="span11">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="icon-align-justify"></i>									
						</span>
						<h5>Text inputs</h5>
					</div>
					<div class="widget-content nopadding">
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label class="control-label"><?php echo $form->labelEx($model,'email'); ?></label>
									<div class="controls">
										<?php echo $form->textField($model,'email'); ?>
									</div>
								</div>
							</div>						
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label class="control-label"><?php echo $form->labelEx($model,'password'); ?></label>
									<div class="controls">
										<?php echo $form->passwordField($model,'password'); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label class="control-label"><?php echo $form->labelEx($model,'password_repeat'); ?></label>
									<div class="controls">
										<?php echo $form->passwordField($model,'password_repeat'); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span12"></div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'first_name'); ?></label>
									<div class="controls">
										<?php echo $form->textField($model,'first_name'); ?>
									</div>
								</div>
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'instansi'); ?></label>
									<div class="controls">
										<?php echo $form->textField($model,'instansi'); ?>
									</div>
								</div>
							</div>						
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'last_name'); ?></label>
									<div class="controls">
										<?php echo $form->textField($model,'last_name'); ?>
									</div>
								</div>
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'income'); ?></label>
									<div class="controls">
										<?php echo $form->textField($model,'income'); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'gender'); ?></label>
									<div class="controls">
										<?php echo $form->radioButtonList($model,'gender',$jenis_kelamin,array('separator'=>'','labelOptions'=>array('style'=>'display:inline; margin-right: 10px;'))) ?> 
									</div>
								</div>
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'office_address'); ?></label>
									<div class="controls">
										<?php echo $form->textArea($model,'office_address'); ?>
									</div>
								</div>
							</div>	
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'address'); ?></label>
									<div class="controls">
										<?php echo $form->textArea($model,'address'); ?>
									</div>
								</div>
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'religion'); ?></label>
									<div class="controls">
										<?php echo $form->dropDownList($model,'religion',$agama,array('prompt'=>'Pilih Agama')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'office_phone'); ?></label>
									<div class="controls">
										<?php echo $form->textField($model,'office_phone'); ?>
									</div>
								</div>
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'marital_status'); ?></label>
									<div class="controls">
										<?php echo $form->dropDownList($model,'marital_status',$status_perkawinan,array('prompt'=>'Pilih Status')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'handphone'); ?></label>
									<div class="controls">
										<?php echo $form->textField($model,'handphone'); ?>
									</div>
								</div>
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'id_nationality'); ?></label>
									<div class="controls">
										<?php echo $form->dropDownList($model,'id_nationality',CHtml::listData($negara,'id','country'),array('prompt'=>'Pilih Negara','class'=>'styleSelect2')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'birth_place'); ?></label>
									<div class="controls">
										<?php echo $form->dropDownList($model,'birth_place',$tempat_lahir,array('prompt'=>'Pilih Kota')); ?>
									</div>
								</div>
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'id_job'); ?></label>
									<div class="controls">
										<?php echo $form->dropDownList($model,'id_job',CHtml::listData($pekerjaan,'id','job'),array('prompt'=>'Pilih Status')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span6">
									<label class="control-label"><?php echo $form->labelEx($model,'date_of_birth'); ?></label>
									<div class="controls">
										<?php 
											$this->widget('zii.widgets.jui.CJuiDatePicker',array(
												'model'=>$model,
												'attribute'=>'date_of_birth',
												'options'=>array(
													'showAnim'=>'fold',
													'dateFormat'=>'yy-mm-dd',
												),
												'htmlOptions'=>array(
													'class'=>'styleText1'
												),
											)); 
										?>
									</div>
								</div>
								<div class="span6">
									<label class="control-label"></label>
									<div class="controls">								
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span12"></div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label class="control-label">Isian Khusus Pembeli</label>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label style="margin-left:10px">Isikan data dibawah ini untuk mendapatkan bisnis yang sesuai dengan anda secara cepat</label>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label class="control-label"><?php echo $form->labelEx($model,'id_buyer_category'); ?></label>
									<div class="controls">
									<?php echo $form->dropDownList($model,'id_buyer_category',CHtml::listData($kategori,'id','industri'),array('prompt'=>'Pilih Kategori')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label class="control-label"><?php echo $form->labelEx($model,'id_buyer_location'); ?></label>
									<div class="controls">
									<?php echo $form->dropDownList($model,'id_buyer_location',CHtml::listData($lokasi,'id','provinsi'),array('prompt'=>'Pilih Lokasi')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label class="control-label"><?php echo $form->labelEx($model,'id_buyer_price'); ?></label>
									<div class="controls">
										<?php echo $form->dropDownList($model,'id_buyer_price',CHtml::listData($range_harga,'id','range_price'),array('prompt'=>'Pilih Range Harga')); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label style="margin-left:10px">Dimana Anda mengetahui mengetahui JualanBisnis.com</label>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<?php 
										foreach($references1 as $value1){ 
									?>
											<label class="checkbox inline Font-Color-LightBlue" style="margin-left:10px"><input type="checkbox" name="references[]" value="<?php echo $value1 ?>"/> <?php echo $value1 ?> </label>
									<?php 
										} 
									?>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<?php 
										foreach($references2 as $value2){ 
									?>
											<label class="checkbox inline Font-Color-LightBlue" style="margin-left:10px"><input type="checkbox" name="references[]" value="<?php echo $value2 ?>"/> <?php echo $value2 ?> </label>
									<?php 
										} 
									?>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label style="margin-left:10px">Masukkan Karakter yang terlihat di bawah ini</label>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span6" style="padding-left:10px">
									<?php $this->widget('CCaptcha'); ?><br/>
									<?php echo $form->textField($model,'captcha_code'); ?>
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label class="checkbox inline Font-Color-LightBlue" style="margin-left:10px">
									<?php echo $form->checkBox($model,'agree_terms') ?><a target="_blank" href="<?php echo Yii::app()->createUrl('//registrasiDone') ?>">Ya, saya sudah membahas dan setuju dengan JualanBisnis Terms and Service</a>
									</label>
								</div>
							</div>
						</div>					
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Menjadi Member</button><br/>
							Sudah menjadi member? <a href="#LoginForm_email">Klik disini untuk login</a>
						</div>
						<div class="control-group">
							<div class="span12">
								<div class="span11">
									<label class="checkbox inline Font-Color-LightBlue" style="margin-left:10px">
									<?php echo $form->checkBox($model,'newsletter_status',array('checked'=>'checked')) ?>Ya, saya ingin menerima newsletter dari JualanBisnis.com yang berisi berita promosi dan penawaran
									</label>
								</div>
							</div>
						</div>				
					</div>
				</div>	
			</div>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>