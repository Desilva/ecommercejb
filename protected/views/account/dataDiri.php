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
		'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'form-horizontal'),
    ));
    ?>
<?php echo $form->errorSummary($model); 
      if(isset($dataSaved))
      {
          echo "Data Berhasil Disimpan";
      }
      ?>

<div class="row-fluid">
	<!--<div class="span2 padding-top-small">
    	<?php //if(!empty($this->clips['sidebar'])) echo
                //            $this->clips['sidebar']?>
    </div>-->
		<div class="span2 padding-top-small Top-Margin2" style="margin-left:-30px;">
		<div class="widget-box">
		<div class="widget-title">
						<span class="icon">
							<i class="icon-th"></i>
						</span>
						<h5>Jualan Bisnis</h5>
					</div>
					<div class="widget-content nopadding">
		<?php if(!empty($this->clips['sidebar'])) echo
                            $this->clips['sidebar']?>
					</div>
					</div>
	</div>
    <div class="span9">
		<div><header style="font-size:30px; font-family:Calibri;">Form Data Diri</header><br style="clear:both"/></div><div style="margin-top:-35px;"></div>
        <div class="row-fluid Top-Margin3">
		<div class="span12">
				<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-align-justify"></i>									
				</span>
				<h5>Data Diri</h5>
			</div>
			<div class="widget-content nopadding">
				
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label"><?php echo $form->labelEx($model,'email'); ?></label>
								<div class="controls">
									<?php echo $form->textField($model,'email',array('readonly'=>'readonly')); ?>
								</div>
							</div>
						</div>						
					</div>
					
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label"><?php echo $form->labelEx($model,'password'); ?></label>
								<div class="controls">
									<?php echo $form->passwordField($model,'password'); ?>&nbsp; *kosongkan jika tidak ingin diubah
								</div>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label"><?php echo $form->labelEx($model,'password_repeat'); ?></label>
								<div class="controls">
									<?php echo $form->passwordField($model,'password_repeat'); ?>&nbsp; *kosongkan jika tidak ingin diubah
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
					
					<div class="control-group">
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'address'); ?></label>
							<div class="controls">
								<?php echo $form->textArea($model,'address'); ?>
							</div>
						</div>
						<div class="span6">
							<label class="control-label"></label>
							<div class="controls">
								
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'office_phone'); ?></label>
							<div class="controls">
								<?php echo $form->textField($model,'office_phone'); ?>
							</div>
						</div>
						<div class="span6">
							<label class="control-label"></label>
							<div class="controls">
							
							</div>
						</div>	
					</div>
					
					<div class="control-group">
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'phone'); ?></label>
							<div class="controls">
								<?php echo $form->textField($model,'phone',array('class'=>'styleText1')); ?>
							</div>
						</div>
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'religion'); ?></label>
							<div class="controls">
								<?php echo $form->dropDownList($model,'religion',$agama,array('prompt'=>'Pilih Agama')); ?>
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'handphone'); ?></label>
							<div class="controls">
								<?php echo $form->textField($model,'handphone',array('class'=>'styleText1')); ?>
							</div>
						</div>
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'id_nationality'); ?></label>
							<div class="controls">
								<?php echo $form->dropDownList($model,'id_nationality',CHtml::listData($negara,'id','country'),array('prompt'=>'Pilih Negara')); ?>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'birth_place'); ?></label>
							<div class="controls">
								<?php echo $form->dropDownList($model,'birth_place',$tempat_lahir,array('prompt'=>'Pilih Kota')); ?>
							</div>
						</div>
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'marital_status'); ?></label>
							<div class="controls">
								<?php echo $form->dropDownList($model,'marital_status',$status_perkawinan,array('prompt'=>'Pilih Status')); ?>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'date_of_birth'); ?></label>
							<div class="controls">
								<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                    'model'=>$model,
                                                    'attribute'=>'date_of_birth',
                                                    'options'=>array(
                                                    'showAnim'=>'fold',
                                                    'dateFormat'=>'yy-mm-dd',
                                                     ),
                                                     'htmlOptions'=>array(
                                                         'class'=>'styleText1'
                                                     ),
                                              )); ?>
							</div>
						</div>
						<div class="span6">
							<label class="control-label"><?php echo $form->labelEx($model,'id_job'); ?></label>
							<div class="controls">
								<?php echo $form->dropDownList($model,'id_job',CHtml::listData($pekerjaan,'id','job'),array('prompt'=>'Pilih Status')); ?>
							</div>	
						</div>
					</div>
					
					<div class="row-fluid">
						<div class="span12"></div>
					</div>
					
					<div class="control-group">
						<div class="span11">
							<label style="margin-left:10px">Isian Khusus Pembeli</label>
						</div>
					</div>
					
					<div class="control-group">
						<div  class="span12">
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
								<label style="margin-left:10px">Status Newsletter</label>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span12">
							<div class="span11" style="padding-left:10px">
								<?php echo $form->checkBox($model,'newsletter_status') ?>Ya, saya ingin menerima newsletter dari JualanBisnis.com yang berisi berita promosi dan penawaran
							</div>
						</div>
					</div>
					
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
					
					
				
			</div>
		</div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>