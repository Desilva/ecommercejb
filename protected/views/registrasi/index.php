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
      'id' => 'registrasi-form',
      'enableAjaxValidation'=>true,
            'clientOptions' => array(
                    'validateOnSubmit'=>true,
                    'validateOnChange'=>true,
                    'validateOnType'=>false,
            ),
	  'htmlOptions'=>array(
        'class'=>'',
    ),
    ));
?>
<div class="signup-form">
	<div class="row-fluid">
		<div class="signup-header">
			INFORMASI MEMBER
		</div>
		<div class="signup-header-description">
			Isi form dibawah ini untuk menjadi member JualanBisnis.com
      <p><?php echo $form->errorSummary($model); ?></p>
		</div>             
	</div>
	<div class="row-fluid">
		<div class="signup-content">
			<div class="signup-row-input-head">
				<label><?php echo $form->labelEx($model,'email'); ?></label>
				<?php echo $form->textField($model,'email',array('class'=>'signup-input-head')); ?>
			</div>
			<div class="signup-row-input-head">
				<label><?php echo $form->labelEx($model,'password'); ?></label>
				<?php echo $form->passwordField($model,'password',array('class'=>'signup-input-head')); ?>
			</div>
			<div class="signup-row-input-head">
				<label><?php echo $form->labelEx($model,'password_repeat'); ?></label>
				<?php echo $form->passwordField($model,'password_repeat',array('class'=>'signup-input-head')); ?>
			</div>
			<div class="divide-line">
				&nbsp;
			</div>
			<div class="signup-column">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'first_name'); ?></label>
						<?php echo $form->textField($model,'first_name',array('class'=>'signup-input')); ?>
					</div>
				</div>
				<div class="signup-column-right">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'instansi'); ?></label>
						<?php echo $form->textField($model,'instansi',array('class'=>'signup-input')); ?>
					</div>
				</div>
			</div>
			<div class="signup-column">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'last_name'); ?></label>
						<?php echo $form->textField($model,'last_name',array('class'=>'signup-input')); ?>
					</div>
				</div>
				<div class="signup-column-right">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'income'); ?></label>
						<?php echo $form->textField($model,'income',array('class'=>'signup-input')); ?>
					</div>
				</div>
			</div>
			<div class="signup-column-textarea">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'gender'); ?></label>
						<?php echo $form->radioButtonList($model,'gender',$jenis_kelamin,array('separator'=>'','class' => 'radio-button-signup','labelOptions'=>array('style'=>'display:inline; margin-right: 10px;'))) ?> 
					</div>
				</div>
				<div class="signup-column-right">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'office_address'); ?></label>
						<?php echo $form->textArea($model,'office_address',array('class'=>'signup-textarea')); ?>
					</div>
				</div>
			</div>
			<div class="divide-line">
				&nbsp;
			</div>
			<div class="signup-column-textarea">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'address'); ?></label>
						<?php echo $form->textArea($model,'address',array('class'=>'signup-textarea')); ?>
					</div>
				</div>
				<div class="signup-column-right">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'religion'); ?></label>
						<div class="signup-row-select">
							<?php echo $form->dropDownList($model,'religion',$agama,array('prompt'=>'Pilih Agama','class'=>'signup-select')); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="signup-column">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'office_phone'); ?></label>
						<?php echo $form->textField($model,'office_phone',array('class'=>'signup-input')); ?>
					</div>
				</div>
				<div class="signup-column-right">
					<div class="signup-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'marital_status'); ?></label>
						<div class="signup-row-select">
							<?php echo $form->dropDownList($model,'marital_status',$status_perkawinan,array('prompt'=>'Pilih Status', 'class'=>'signup-select')); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="signup-column">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'handphone'); ?></label>
						<?php echo $form->textField($model,'handphone',array('class'=>'signup-input')); ?>
					</div>
				</div>
				<div class="signup-column-right">
					<div class="signup-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'id_nationality'); ?></label>
						<div class="signup-row-select">
							<?php echo $form->dropDownList($model,'id_nationality',CHtml::listData($negara,'id','country'),array('prompt'=>'Pilih Negara','class'=>'signup-select')); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="signup-column">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'birth_place'); ?></label>
						<?php echo $form->textField($model,'birth_place',array('class'=>'signup-input')); ?>
					</div>
				</div>
				<div class="signup-column-right">
					<div class="signup-row-input">
						<label class="control-label"><?php echo $form->labelEx($model,'id_job'); ?></label>
						<div class="signup-row-select">
							<?php echo $form->dropDownList($model,'id_job',CHtml::listData($pekerjaan,'id','job'),array('prompt'=>'Pilih Status','class'=>'signup-select')); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="signup-column">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<label><?php echo $form->labelEx($model,'date_of_birth'); ?></label>
						<?php 
							$this->widget('zii.widgets.jui.CJuiDatePicker',array(
								'model'=>$model,
								'attribute'=>'date_of_birth',
								'options'=>array(
									'showAnim'=>'fold',
									'dateFormat'=>'yy-mm-dd',
								),
								'htmlOptions'=>array(
									'class'=>'signup-input'
								),
							)); 
						?>
					</div>
				</div>
				<div class="signup-column-right">
					&nbsp;
				</div>
			</div>
			<div class="divide-line">
				&nbsp;
			</div>
			<div class="signup-row-input-head">
				<div class="signup-subtitle">
					Isian Khusus Pembeli
				</div>
				<div class="signup-subtitle-desc">
					Isikan data dibawah ini untuk mendapatkan bisnis yang sesuai dengan anda secara cepat
				</div>
			</div>
			<div class="signup-column">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<div class="signup-row-select-2">
							<?php echo $form->dropDownList($model,'id_buyer_category',CHtml::listData($kategori,'id','industri'),array('prompt'=>'Pilih Kategori','class'=>'signup-select-2')); ?>
						</div>
					</div>
				</div>
				<div class="signup-column-right">
					&nbsp;
				</div>
			</div>
			<div class="signup-column">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<div class="signup-row-select-2">
							<?php echo $form->dropDownList($model,'id_buyer_location',CHtml::listData($lokasi,'id','provinsi'),array('prompt'=>'Pilih Lokasi','class'=>'signup-select-2')); ?>
						</div>
					</div>
				</div>
				<div class="signup-column-right">
					&nbsp;
				</div>
			</div>
			<div class="signup-column">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<div class="signup-row-select-2">
							<?php echo $form->dropDownList($model,'id_buyer_price',CHtml::listData($range_harga,'id','range_price'),array('prompt'=>'Pilih Range Harga','class'=>'signup-select-2')); ?>
						</div>
					</div>
				</div>
				<div class="signup-column-right">
					&nbsp;
				</div>
			</div>
			<div class="divide-line">
				&nbsp;
			</div>
			<div class="signup-row-input-head">
				<div class="signup-subtitle">
					Dimana Anda mengetahui JualanBisnis.com?
				</div>
			</div>
			<div class="signup-column signup-from">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<div class="signup-half">
							<?php 
								foreach($references1 as $value1){ 
							?>
									<label class="checkbox inline Font-Color-LightBlue" style="margin-left:10px"><input type="checkbox" name="references[]" value="<?php echo $value1 ?>"/> <?php echo $value1 ?> </label>
							<?php 
								} 
							?>
						</div>
						<div class="signup-half">
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
				<div class="signup-column-right">
					&nbsp;
				</div>
			</div>
			<div class="divide-line">
				&nbsp;
			</div>
			<div class="signup-row-input-head">
				<div class="signup-subtitle">
					Masukkan Karakter yang terlihat di bawah ini
				</div>
			</div>
			<div class="signup-column signup-captcha">
				<div class="signup-column-left">
					<div class="signup-row-input signup-row-captcha">
						<?php $this->widget('CCaptcha',array('buttonOptions'=>array('id'=>'refresh_captcha'))); ?><br/>
					</div>
				</div>
				<div class="signup-column-right">
					&nbsp;
				</div>
			</div>
			<div class="signup-column signup-captcha">
				<div class="signup-column-left">
					<div class="signup-row-input">
						<?php echo $form->textField($model,'captcha_code',array('class'=>'signup-input signup-input-captcha')); ?>
					</div>
				</div>
				<div class="signup-column-right">
					&nbsp;
				</div>
			</div>
			<div class="signup-row-input-head">
				<div class="signup-row-input signup-ending-checkbox">
					<label class="checkbox">
					<?php echo $form->checkBox($model,'agree_terms') ?><a target="_blank" href="<?php echo Yii::app()->createUrl('//SyaratDanKetentuan') ?>">Ya, saya sudah membahas dan setuju dengan JualanBisnis.com <span class="font-blue">Terms and Service</span></a>
					</label>
				</div>
			</div>
			<div class="signup-row-input-head">
				<div class="signup-row-input signup-ending-checkbox">
					<label class="checkbox">
					<?php echo $form->checkBox($model,'newsletter_status',array('checked'=>'checked')) ?>Ya, saya ingin menerima newsletter dari JualanBisnis.com yang berisi berita promosi dan penawaran
					</label>
				</div>
			</div>
			<div class="signup-row-input-head signup-submit">
				<div class="signup-row-input">
					<?php echo CHtml::ajaxSubmitButton('Menjadi Member',CHtml::normalizeUrl(array('registrasi/index')),
            array(
                'dataType'=>'json',
                'type'=>'post',
                'success'=>'function(data) {  
                   if(data.status=="success"){
                    $("#registrasi-form").submit();
                   }
                    else{
                       formErrors(data,form="#registrasi-form");
                       document.location.href="#registrasi-form_es_";
                   }       
               }',                    
                'beforeSend'=>'function(){                        
                      $("#AjaxLoader").show();
                 }'
                ),array('class'=>'signup-button')); ?>
           <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="AjaxLoader" style="display:none"/>
					<div class="signup-login">
						Sudah menjadi member? <a class="klikUntukLogin" href="">Klik disini untuk login</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>

<script>
    function formErrors(data,form){
        var summary = '';
        summary="<br/><p>Silahkan perbaiki kesalahan input berikut:</p><ul>";

        $.each(data, function(key, val) {
        summary = summary + "<li>" + val.toString() + "</li>";
        });
        summary += "</ul>";
        $(form+"_es_").html(summary.toString());
        $(form+"_es_").show();

        $("[id^='update-button']").show();
        $('#AjaxLoader').hide();//css({display:'none'});
        $('#AjaxLoader').text('');
        $('#refresh_captcha').click();
        $('#User_captcha_code').val('');
}

function hideFormErrors(form){
        //alert (form+"_es_");
        $(form+"_es_").html('');
        $(form+"_es_").hide();
        $("[id$='_em_']").html('');
}
</script>