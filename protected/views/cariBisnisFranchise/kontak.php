<div class="row-fluid">
	<div class="span12">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'business-contact-form',
                'enableAjaxValidation'=>true,
                'clientOptions' => array(
                        'validateOnSubmit'=>true,
                        'validateOnChange'=>true,
                        'validateOnType'=>false,
                ),
                'action'=> Yii::app()->createUrl("//cariBisnisFranchise/kontakBisnis/id/$business->id")
            ));
        ?>
            
             <?php echo $form->hiddenField($model,'id_business',array('value'=> $business->id));
                  echo $form->hiddenField($model,'tanggal',array('value'=> date('y-m-d')));
                  echo $form->hiddenField($model,'id_user',array('value'=> Yii::app()->user->id));
                  $harga = (int)$business->harga;
                  /* 
                   * CHANGE ALLOWED HARGA MAX WHEN THE SETTING IS AVAILABLE
                   * 
                   */
                  $harga_allowed = (int)$settings->nilai_min_telpon_tampil;
                  if($harga <= $harga_allowed)
                  {
                      echo $form->hiddenField($model,'status',array('value'=> '1'));
                  }
                  else
                  {
                      echo $form->hiddenField($model,'status',array('value'=> '0'));
                  }
            ?>
        <div class="span10">
        	<div class="span6 separator-Vertical">
        	<h4 class="Font-Color-DarkBlue">Kontak <?php echo $business->nama ?></h4>
        	<table>
                    <tr><p><?php echo $form->errorSummary($model); ?></p></tr>
            	<tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'nama_pengirim'); ?></th>
                    <td><?php echo $form->textField($model,'nama_pengirim', array('value'=>Yii::app()->user->first_name.' '.Yii::app()->user->last_name)); ?></td>
                </tr>
                <tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'no_telp'); ?></th>
                    <td><?php echo $form->textField($model,'no_telp',array('value'=>Yii::app()->user->handphone)); ?></td>
                </tr>
                <tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'alamat_email'); ?></th>
                    <td><?php echo $form->textField($model,'alamat_email',array('value'=>Yii::app()->user->email,'readonly'=>'readonly')); ?></td>
                </tr>
                <tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'deskripsi'); ?></th>
                    <td><?php echo $form->textArea($model,'deskripsi'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php echo CHtml::ajaxSubmitButton('Kirim',CHtml::normalizeUrl(array("cariBisnisFranchise/kontakBisnis/id/$business->id")),
                                array(
                                    'dataType'=>'json',
                                    'type'=>'post',
                                    'success'=>'function(data) {  
                                       if(data.status=="success"){
                                        $("#business-contact-form").submit();
                                       }
                                        else{
                                           formErrors(data,form="#business-contact-form");
                                           document.location.href="#business-contact-form_es_";
                                       }       
                                   }',                    
                                    'beforeSend'=>'function(){                        
                                          $("#AjaxLoader").show();
                                     }'
                                    ),array('class'=>'btn Gradient-Style1')); ?>
                                     <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="AjaxLoader" style="display:none"/>
                    
                    </td>
                </tr>
            </table>
        </div>
        <?php $this->endWidget() ?>
        <?php if($business->tampilkanKontak == 1 && $harga <= $harga_allowed){ ?>
            <div class="span6 Text-Align-Right">
                    <h4 class="Font-Color-DarkBlue">Kontak</h4>
                Untuk informasi lebih lanjut, harap hubungi kami di:<br/>
                <?php 
                    echo $business_owner->first_name.' '.$business_owner->last_name; 
                ?>
                <br/>
                <?php 
                    if($business_owner->office_phone =='' || $business_owner->office_phone == null)
                    {
                        echo "Tidak ada data telepon";
                    }
                    else
                    {
                        echo $business_owner->office_phone;
                    }
                     
                ?>
                <br/>
                <?php 
                    echo $business_owner->email 
                ?>
                <br/>
                <?php
                    if($business_owner->office_address =='' || $business->office_address == null)
                    {
                        echo "Tidak ada data alamat";
                    }
                    else
                    {
                        echo $business_owner->office_address;
                    }
                     
                ?>
                <br/>
            </div>
        <?php }?>
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
        $(form+"_es_").show();

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

