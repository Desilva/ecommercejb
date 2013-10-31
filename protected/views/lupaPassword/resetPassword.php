<div class="row-fluid">
	<div class="span12">
    	<div class="row-fluid">
        	<div class="span6">
            	<h4 class="Font-Color-DarkBlue">Reset Password</h4>
                
                <?php if(isset($error)){ ?>
                <p>Link yang anda klik sudah kadaluarsa atau tidak valid</p>
                <p>Harap melakukan klik link Lupa Password lagi. Atau hubungi kami jika masalah berlanjut.</p>
                <?php }
                
                else 
                {
                    $form = $this->beginWidget('CActiveForm', array(
                  'id' => 'reset-password-form',
                    'enableAjaxValidation'=>true,
                    'clientOptions' => array(
                        'validateOnSubmit'=>true,
                        'validateOnChange'=>true,
                    'validateOnType'=>false,)))
                
                ?>
                <p>Harap Masukan Password Baru Anda </p>
                <p><?php echo $form->errorSummary($user); ?></p>
                <table>
                    <?php echo $form->hiddenField($user,'id'); 
                          echo $form->hiddenField($user,'lupa_password_hash');
                    ?>
        	<tr>
                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($user,'password'); ?></th>
                    <td><?php echo $form->passwordField($user,'password'); ?></td>
           	</tr>
                <tr>
                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($user,'password_repeat'); ?></th>
                    <td><?php echo $form->passwordField($user,'password_repeat'); ?></td>
           	</tr>
                </table>
                <?php echo CHtml::ajaxSubmitButton('Kirim',CHtml::normalizeUrl(array('lupaPassword/resetPassword')),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'success'=>'function(data) {  
                        if(data.status=="success"){
                         $("#reset_sucess").show();
                         $("#reset-password-form").slideUp();
                         setTimeout( function(){$("#reset-password-form").submit();}, 3000 );
                         
                        }
                         else{
                            formErrors(data,form="#reset-password-form");
                            document.location.href="#reset-password-form_es_";
                        }       
                    }',                    
                     'beforeSend'=>'function(){                        
                           $("#AjaxLoader").show();
                      }'
                     ),array('class'=>'btn Gradient-Style1')); ?>
                     <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="AjaxLoader" style="display:none"/>
                <?php $this->endWidget(); } ?>
                     <p id='reset_sucess' style="display:none">Reset password sukses. Anda akan otomatis login.</p>
            </div>
        </div> 	
    </div>
</div>
<script>
    function formErrors(data,form){
        var summary = '';
        summary="<br/><p>Silahkan perbaiki kesalahan input berikut:</p><ul>";

        $.each(data, function(key, val) {
        summary = summary + "<li>" + val.toString() + "</li>";
        });
        summary += "</ul>";
        $(form+"_es_").html(summary.toString());
        $(form+"_es_").slideDown();

        $("[id^='update-button']").show();
        $('#AjaxLoader').hide();//css({display:'none'});
        $('#AjaxLoader').text('');
}

function hideFormErrors(form){
        //alert (form+"_es_");
        $(form+"_es_").html('');
        $(form+"_es_").hide();
        $("[id$='_em_']").html('');
}
</script>
