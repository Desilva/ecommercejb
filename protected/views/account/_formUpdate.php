<style>
        th label{
        font-weight: bold;
    }
        input[type="radio"]{
        margin-top: -3px;
    }
        input[type="checkbox"]{
        margin-top: -3px;
    }
</style>
       <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'business-form',
            'enableAjaxValidation'=>true,
            'clientOptions' => array(
                    'validateOnSubmit'=>true,
                    'validateOnChange'=>true,
                    'validateOnType'=>false,
            ),
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>
 <p><?php echo $form->errorSummary($model); ?></p>
<span class="span3" style="float:right; display:inline">
        <?php
          if(strtolower($model->status_approval) == 'terjual' || strtolower($model->status_approval)== 'tidak aktif')
          {
                echo '<strong>Status</strong>:'.$model->status_approval;
          }
          else
          {
                 echo $form->radioButtonList($model,'status_approval',array('Terjual' =>'Terjual', 'Tidak Aktif'=>'Non Aktifkan'),array('separator'=>'&nbsp; &nbsp;','labelOptions'=>array('style'=>'display:inline;')));
          }
        ?>
</span>
<div class="row-fluid">
        	<div class="span12">
                <div class="row-fluid">
                	<div class="span12">
                            <?php echo $form->hiddenField($model,'id_user',array('value'=>Yii::app()->user->id)) ?>
                    	<table>
        					<tr>
            					<th width="20%" class="Text-Align-Left"><?php echo $form->labelEx($model,'id_category'); ?></th>
                				<td>
                                                            <?php echo $form->hiddenField($model,'id_category'); ?>
                                                            <?php 
                                                                echo $model->idCategory->category;
                                                            ?>
                				</td>
            				</tr>
            				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'kepemilikan'); ?></th>
                				<td>
                                                        <?php echo $form->dropDownList($model,'kepemilikan',$kepemilikan,array('prompt'=>'Pilih Jumlah Kepemilikan')); ?>
                				</td>	
            				</tr>
            				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'id_industri'); ?></th>
                				<td>
                                                        <?php echo $form->dropDownList($model,'id_industri',CHtml::listData($industri,'id','industri'),array(
                                                                                                'prompt'=>'Pilih Industri',
                                                                                                'ajax' => array(
                                                                                                    'type' => 'POST',
                                                                                                    'url' => Yii::app()->createUrl('//account/generatesubindustri'),
                                                                                                    'update' => '#'.CHtml::activeId($model,'id_sub_industri'),
                                                                                            ))); ?>
                				</td>	
            				</tr>
            				<tr>
                                                 <?php echo Chtml::hiddenField('sub_industri_temp', $model->id_sub_industri) ?>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'id_sub_industri'); ?></th>
                				<td>
                                                        <?php echo $form->dropDownList($model,'id_sub_industri',array(),array('prompt'=>'Pilih Sub Industri')); ?>
                				</td>	
            				</tr>
            				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'nama'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'nama'); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'alamat'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'alamat'); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'id_provinsi'); ?></th>
                				<td>
                					<?php echo $form->dropDownList($model,'id_provinsi',CHtml::listData($provinsi,'id','provinsi'),array(
                                                            'prompt'=>'Pilih Provinsi',
                                                            'ajax' => array(
                                                                'type' => 'POST',
                                                                'url' => Yii::app()->createUrl('//account/generatekota'),
                                                                'update' => '#'.CHtml::activeId($model,'id_kota'),
                                                        ))); ?>
                				</td>	
            				</tr>
                                        <tr>
                                                <?php echo Chtml::hiddenField('kota_temp', $model->id_kota) ?>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'id_kota'); ?></th>
                				<td>
                					<?php echo $form->dropDownList($model,'id_kota',array(),array('prompt'=>'Pilih Kota')); ?>
                				</td>	
            				</tr>
            				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'jumlah_karyawan'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'jumlah_karyawan'); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'tahun_didirikan'); ?></th>
                				<td>
                					 <?php echo $form->dropDownList($model,'tahun_didirikan',$tahun,array('prompt'=>'Pilih Tahun')); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'harga_min'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'harga_min',array('onkeyup'=>'calcValue()')); ?> &nbsp; <?php echo $form->checkBox($model,'tampilkanKontak',array('disabled'=>'disabled', 'class'=>'tampilkanKontak')) ?><?php echo $form->labelEx($model,'tampilkanKontak', array('style'=>'display:inline; margin-left:3px;')) ?>
                                                </td>	
            				</tr>
                                        <tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'harga_max'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'harga_max',array('class'=>'styleText1','onkeyup'=>'calcValue()')); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'penjualan'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'penjualan',array('onkeyup'=>'calcValue()')); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'hpp'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'hpp'); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'laba_bersih_tahun'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'laba_bersih_tahun',array('onkeyup'=>'calcValue()')); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'total_aset'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'total_aset',array('onkeyup'=>'calcValue()')); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'marjin_laba_bersih'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'marjin_laba_bersih',array('readonly'=>'readonly')); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'laba_bersih_aset'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'laba_bersih_aset',array('readonly'=>'readonly')); ?>
                				</td>	
            				</tr>
            	 			<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'harga_penawaran_penjualan'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'harga_penawaran_penjualan',array('readonly'=>'readonly')); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'harga_penawaran_laba_bersih'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'harga_penawaran_laba_bersih',array('readonly'=>'readonly')); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'harga_penawaran_aset'); ?></th>
                				<td>
                					<?php echo $form->textField($model,'harga_penawaran_aset',array('readonly'=>'readonly')); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'alasan_jual_bisnis'); ?></th>
                				<td>
                					<?php echo $form->dropDownList($model,'dropDownAlasanJual',$alasan_jual_bisnis,array('prompt'=>'Pilih Alasan','class'=>'alasanJualDropDown')); ?>
                                                        <?php echo $form->checkBox($model,'alasan_jual_lainnya',array('onchange'=>'checkboxAlasanJual()','class'=>'alasanJualCheckBox')) ?><?php echo $form->labelEx($model,'alasan_jual_lainnya',array('style'=>'display:inline; margin-left:3px;')) ?>
                				</td>	
            				</tr>
            				<tr>
            					<td></td>
                				<td>
                					<?php echo $form->textArea($model,'textAreaAlasanJual',array('class'=>'alasanJualTextArea','disabled'=>'disabled')); ?>
                				</td>
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'deskripsi'); ?></th>
                				<td>
                					<?php echo $form->textArea($model,'deskripsi'); ?>
               	 				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'image'); ?></th>
                			<td>
                                    <?php 

//                                        $this->widget('ext.xupload.XUpload', array(
//                                        'url' => Yii::app()->createUrl("account/upload"),
//                                        'model' => $img_upload,
//                                        'htmlOptions' => array('id'=>'business-form'),
//                                        'id'=>'upload1',
//                                        'attribute' => 'file',
//                                        'multiple' => true,
//                                        'showForm'=> true,
//                                        'options'=>array(
//                                            'maxNumberOfFiles'=> 5,
//                                            'acceptFileTypes'=> "js:/(\.|\/)(gif|jpe?g|png)$/i",
//                                            'maxFileSize'=> 2000000,
//                                        ),
//                                        'formView' => 'application.views.account._xupload',
//                                    ));
                                    
//                                        $this->widget('ext.dropzone.EDropzone', array(
//                                            'model' => $model,
//                                            'attribute' => 'image',
//                                            'url' => $this->createUrl('account/upload'),
//                                            'mimeTypes' => array('image/jpeg', 'image/png'),
//                                            'onSuccess' => 'someJsFunction();',
//                                            'options' => array('autoProcessQueue'=>false),
//                                        ));
                                    ?>
                			</td>	
           		 		</tr>
            			<tr>
            				<td></td>
                			<td>
                			</td>
            			</tr>
            			<tr>
            				<th class="Text-Align-Left">Dokumen</th>
                			<td>
                                            <?php 
                                                        //                                 $this->widget('ext.xupload.XUpload', array(
            //                                        'url' => Yii::app()->createUrl("account/uploadDoc"),
            //                                        'model' => $doc_upload,
            //                                        'htmlOptions' => array('id'=>'business-form'),
            //                                        'attribute' => 'docs',
            //                                        'multiple' => true,
            //                                        'showForm'=> true,
            //                                        'options'=>array(
            //                                            'acceptFileTypes'=> "js:/(\.|\/)(gif|jpe?g|png|pdf|doc|docx|xls|xlsx)$/i",
            //                                            'maxFileSize'=> 5000000,
            //                                        ),
            //                                        'formView' => 'application.views.account._xupload',
            //                                    ));

            //                                                    $this->widget('CMultiFileUpload', array(
            //                                'model'=>$model,
            //                                'attribute'=>'dokumen',
            //                                'accept'=>'jpg|gif|png|pdf|doc|docx|xls|xlsx|txt',
            //                                )
            //                            );
            //                            ?>
                                        </td>
            			</tr>
            			<tr>
            				<th colspan="2">
                			<?php echo CHtml::button('Batal', array('submit' => array("account/index/"), 'class'=>'btn Gradient-Style1')); ?>
                <?php //echo CHtml::button('Simpan Draft', array('submit' => array("account/create?stat=Draft"), 'class'=>'btn Gradient-Style1')); ?>
                <?php /* echo CHtml::ajaxSubmitButton('Simpan Draft',CHtml::normalizeUrl(array('account/update','render'=>true)),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'success'=>'function(data) {  
                        if(data.status=="success"){
                            draft();
                        }
                         else{
                            formErrors(data,form="#business-form");
                            document.location.href="#business-form_es_";
                        }       
                    }',                    
                     'beforeSend'=>'function(){                        
                           $("#AjaxLoader").show();
                      }'
                     ),array('class'=>'btn Gradient-Style1')); */ ?>
		<?php echo CHtml::button('Lihat', array('class'=>'btn Gradient-Style1','onclick'=>"preview(this.form,'_blank')")); ?>
		<?php // echo CHtml::button('Kirim', array('submit' => array("account/create"), 'class'=>'btn Gradient-Style1')); ?>
                <?php echo CHtml::ajaxSubmitButton('Kirim',CHtml::normalizeUrl(array("account/update/$model->id")),
                 array(
                     'dataType'=>'json',
                     'type'=>'post',
                     'success'=>'function(data) {  
                        if(data.status=="success"){
                         $("#business-form").submit();
                        }
                         else{
                            formErrors(data,form="#business-form");
                            document.location.href="#business-form_es_";
                        }       
                    }',                    
                     'beforeSend'=>'function(){                        
                           $("#AjaxLoader").show();
                      }'
                     ),array('class'=>'btn Gradient-Style1')); ?>
               				</th>
            			</tr>
        			</table>                        
                    </div>
                </div>
            </div>
        </div>
<?php $this->endWidget(); ?>
<script>
    function preview(f,newtarget)
    {
        document.getElementById('business-form').target= newtarget;
        document.getElementById('business-form').action= '<?php echo Yii::app()->createUrl('//account/preview') ?>' 
        f.submit();
        document.getElementById('business-form').target= '_self';
    }
    
    function draft()
    {
        $("#business-form").attr("action",'<?php echo Yii::app()->createUrl("//account/update",array("stat"=>"Draft")); ?>');
        $("#business-form").submit();
    }
    
    function formErrors(data,form){
        var summary = '';
        summary="<p>Please fix the following errors:</p><ul>";

        $.each(data, function(key, val) {
        summary = summary + "<li>" + val.toString() + "</li>";
        });
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