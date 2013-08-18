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
            'htmlOptions' => array('enctype' => 'multipart/form-data','class' =>'form-horizontal'),
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
											<label class="control-label"><?php echo $form->labelEx($model,'id_category'); ?></label>
											<div class="controls">												
												<?php echo $form->hiddenField($model,'id_category'); ?>
                                                <?php 
														echo $model->idCategory->category;
                                                ?>												
											</div>
										</div>
									</div>						
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'kepemilikan'); ?></label>
											<div class="controls">
												<?php echo $form->dropDownList($model,'kepemilikan',$kepemilikan,array('prompt'=>'Pilih Jumlah Kepemilikan')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'id_industri'); ?></label>
											<div class="controls">
												<?php echo $form->dropDownList($model,'id_industri',CHtml::listData($industri,'id','industri'),array(
                                                                                                'prompt'=>'Pilih Industri',
                                                                                                'ajax' => array(
                                                                                                    'type' => 'POST',
                                                                                                    'url' => Yii::app()->createUrl('//account/generatesubindustri'),
                                                                                                    'update' => '#'.CHtml::activeId($model,'id_sub_industri'),
                                                                                            'beforeSend' => "function( request )
                                                                                                        {
                                                                                                         $('#loading-animation-industri').attr('style','display:visible; margin-top:-10px');
                                                                                                          // Set up any pre-sending stuff like initializing progress indicators
                                                                                                        }",
                                                                                                    'complete' => "function( data )
                                                                                                        {
                                                                                                             $('#loading-animation-industri').attr('style','display:none');                                  
                                                                                                        }",
                                                                                            ))); ?>
                                                        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-industri" style="display:none"/>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<?php echo Chtml::hiddenField('sub_industri_temp', $model->id_sub_industri) ?>
											<label class="control-label"><?php echo $form->labelEx($model,'id_sub_industri'); ?></label>
											<div class="controls">
												<?php echo $form->dropDownList($model,'id_sub_industri',array(),array('prompt'=>'Pilih Sub Industri')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'nama'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'nama'); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'alamat'); ?></label>
											<div class="controls">
												<?php echo $form->textArea($model,'alamat'); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'id_provinsi'); ?></label>
											<div class="controls">
												<?php echo $form->dropDownList($model,'id_provinsi',CHtml::listData($provinsi,'id','provinsi'),array(
                                                            'prompt'=>'Pilih Provinsi',
                                                            'ajax' => array(
                                                                'type' => 'POST',
                                                                'url' => Yii::app()->createUrl('//account/generatekota'),
                                                                'update' => '#'.CHtml::activeId($model,'id_kota'),
                                                                'beforeSend' => "function( request )
                                                                    {
                                                                     $('#loading-animation-provinsi').attr('style','display:visible; margin-top:-10px');
                                                                      // Set up any pre-sending stuff like initializing progress indicators
                                                                    }",
                                                                'complete' => "function( data )
                                                                    {
                                                                         $('#loading-animation-provinsi').attr('style','display:none');                                  
                                                                    }",
                                                        ))); ?>
                                                        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-provinsi" style="display:none"/>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<?php echo Chtml::hiddenField('kota_temp', $model->id_kota) ?>
											<label class="control-label"><?php echo $form->labelEx($model,'id_kota'); ?></label>
											<div class="controls">
												<?php echo $form->dropDownList($model,'id_kota',array(),array('prompt'=>'Pilih Kota')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'jumlah_karyawan'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'jumlah_karyawan'); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'tahun_didirikan'); ?></label>
											<div class="controls">
												<?php echo $form->dropDownList($model,'tahun_didirikan',$tahun,array('prompt'=>'Pilih Tahun')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'harga_min'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'harga_min',array('onkeyup'=>'calcValue()')); ?> &nbsp; 
												<?php echo $form->checkBox($model,'tampilkanKontak',array('disabled'=>'disabled', 'class'=>'tampilkanKontak')) ?>
												<?php echo $form->labelEx($model,'tampilkanKontak', array('style'=>'display:inline; margin-left:3px;')) ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'harga_max'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'harga_max',array('class'=>'styleText1','onkeyup'=>'calcValue()')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'penjualan'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'penjualan',array('onkeyup'=>'calcValue()')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'hpp'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'hpp'); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'laba_bersih_tahun'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'laba_bersih_tahun',array('onkeyup'=>'calcValue()')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'total_aset'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'total_aset',array('onkeyup'=>'calcValue()')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'marjin_laba_bersih'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'marjin_laba_bersih',array('readonly'=>'readonly')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'laba_bersih_aset'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'laba_bersih_aset',array('readonly'=>'readonly')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'harga_penawaran_penjualan'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'harga_penawaran_penjualan',array('readonly'=>'readonly')); ?>
											</div>
										</div>	
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'harga_penawaran_laba_bersih'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'harga_penawaran_laba_bersih',array('readonly'=>'readonly')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
									<div class="span12">
										<div class="span11">
											<label class="control-label"><?php echo $form->labelEx($model,'harga_penawaran_aset'); ?></label>
											<div class="controls">
												<?php echo $form->textField($model,'harga_penawaran_aset',array('readonly'=>'readonly')); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="control-group">
								
								</div>
							</div>
						</div>                  
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