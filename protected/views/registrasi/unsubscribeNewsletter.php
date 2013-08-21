<?php
    $form = $this->beginWidget('CActiveForm', array(
      'id' => 'unsubscribe-newsletter-form',
      'enableAjaxValidation' => true,
	  'htmlOptions'=>array(
        'class'=>'form-horizontal',
    ),
          'clientOptions' => array(
              'validateOnSubmit'=>true,
              'validateOnChange'=>true,
              'validateOnType'=>false,
      ),
    ));
?>
<div class="row-fluid" id="mainform">
	<div class="span12">
    	<div class="row-fluid">
        	<div class="span6">
            	<h4 class="Font-Color-DarkBlue">Berhenti Berlangganan Newsletter</h4>
                <div class="widget-content nopadding">
				<p><?php echo $form->errorSummary($model); ?></p>
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
					<div class="form-actions">
						<?php echo CHtml::ajaxSubmitButton('Kirim',CHtml::normalizeUrl(array('registrasi/unsubscribeNewsletter')),
                                                    array(
                                                        'dataType'=>'json',
                                                        'type'=>'post',
                                                        'success'=>'function(data) {  
                                                           if(data.status=="success"){
                                                            $("#mainform").slideUp();
                                                            $("#successNotif").show();
                                                           }
                                                            else{
                                                               formErrors(data,form="#unsubscribe-newsletter-form");
                                                               document.location.href="#unsubscribe-newsletter-form_es_";
                                                           } 
                                                           $("#loading-animation").hide();
                                                       }',                    
                                                        'beforeSend'=>'function(){                        
                                                              $("#loading-animation").show();
                                                         }'
                                                        ),array('class'=>'btn Gradient-Style1')); ?>
                                            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation" style="display:none"/>
					</div>
					
				
			</div>
            </div>
        </div>

        <div class="row-fluid">
        	
        </div>  	
    </div>
</div>
<div id="successNotif" style="display:none">
    Anda telah berhenti berlangganan newsletter JualanBisnis.com
</div>

<?php $this->endWidget(); ?>
<script>
    function formErrors(data,form){
        var summary = '';
        summary="<p>Please fix the following errors:</p><ul>";
       
//        console.log(data);
        summary = summary + "<li>" + data.UnsubscribeNewsletter_password[0].toString() + "</li>";
        
        summary += "</ul>";
        $(form+"_es_").html(summary.toString());
        $(form+"_es_").show();

        $("[id^='update-button']").show();
        $('#ajax-status').hide();//css({display:'none'});
        $('#ajax-status').text('');
}

function hideFormErrors(form){
        //alert (form+"_es_");
        $(form+"_es_").html('');
        $(form+"_es_").hide();
        $("[id$='_em_']").html('');
}
</script>