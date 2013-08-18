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
            'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'form-horizontal'),
    )); ?>
 <p><?php echo $form->errorSummary($model); ?></p>
<div class="row-fluid">
        	<div class="span12 Top-Margin2">
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
									<?php echo $form->radioButtonList($model,'id_category',$kategori,array('onchange'=>'changeCategory(2)', 'labelOptions'=>array('style'=>'display:inline'))) ?>
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
									<?php echo $form->textField($model,'harga_min',array('onkeyup'=>'calcValue()')); ?> &nbsp; <?php echo $form->checkBox($model,'tampilkanKontak',array('disabled'=>'disabled', 'class'=>'tampilkanKontak')) ?><?php echo $form->labelEx($model,'tampilkanKontak', array('style'=>'display:inline; margin-left:3px;')) ?>
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
						<div class="span12">
							<div class="span11">
								<label class="control-label"><?php echo $form->labelEx($model,'alasan_jual_bisnis'); ?></label>
								<div class="controls">
									<?php echo $form->dropDownList($model,'dropDownAlasanJual',$alasan_jual_bisnis,array('prompt'=>'Pilih Alasan','class'=>'alasanJualDropDown')); ?>
                                    <?php echo $form->checkBox($model,'alasan_jual_lainnya',array('onchange'=>'checkboxAlasanJual()','class'=>'alasanJualCheckBox')) ?>
									<?php echo $form->labelEx($model,'alasan_jual_lainnya',array('style'=>'display:inline; margin-left:3px;')) ?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label"></label>
								<div class="controls">
									<?php echo $form->textArea($model,'textAreaAlasanJual',array('class'=>'alasanJualTextArea','disabled'=>'disabled')); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label"><?php echo $form->labelEx($model,'deskripsi'); ?></label>
								<div class="controls">
									<?php echo $form->textArea($model,'deskripsi'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label"><?php echo $form->labelEx($model,'image'); ?></label>
								<div class="controls">
									<div id="example" class="k-content">
            <input type="file" name="files" id="upload" />

            <script id="fileTemplate" type="text/x-kendo-template">
                <span class='k-progress'></span>
                <div class='file-wrapper'>
                    <span class='file-icon #=addExtensionClass(files[0].extension)#'></span>
                    <h4 class='file-heading file-name-heading'>Name: #=name#</h4>
                    <h4 class='file-heading file-size-heading'>Size: #=size# bytes</h4>
                    <button type='button' class='k-upload-action'></button>
                </div>
            </script>

            <script>
                $(document).ready(function () {
                    $("#upload").kendoUpload({
                        multiple: true,
                        async: {
                            saveUrl: "save",
                            removeUrl: "remove",
                            autoUpload: false
                        },
                        template: kendo.template($('#fileTemplate').html())
                    });
                });

                function addExtensionClass(extension) {
                    switch (extension) {
                        case '.jpg':
                        case '.img':
                        case '.png':
                        case '.gif':
                            return "img-file";
                        case '.doc':
                        case '.docx':
                            return "doc-file";
                        case '.xls':
                        case '.xlsx':
                            return "xls-file";
                        case '.pdf':
                            return "pdf-file";
                        case '.zip':
                        case '.rar':
                            return "zip-file";
                        default:
                            return "default-file";
                    }
                }
            </script>

            <style scoped>
                .file-icon
                {
                    display: inline-block;
                    float: left;
                    width: 48px;
                    height: 48px;
                    margin-left: 10px;
                    margin-top: 13.5px;
                }

                .img-file { background-image: url(../../content/web/upload/jpg.png) }
                .doc-file { background-image: url(../../content/web/upload/doc.png) }
                .pdf-file { background-image: url(../../content/web/upload/pdf.png) }
                .xls-file { background-image: url(../../content/web/upload/xls.png) }
                .zip-file { background-image: url(../../content/web/upload/zip.png) }
                .default-file { background-image: url(../../content/web/upload/default.png) }

                #example .file-heading
                {
                    font-family: Arial;
                    font-size: 1.1em;
                    display: inline-block;
                    float: left;
                    width: 450px;
                    margin: 0 0 0 20px;
                    height: 25px;
                    -ms-text-overflow: ellipsis;
                    -o-text-overflow: ellipsis;
                    text-overflow: ellipsis;
                    overflow:hidden;
                    white-space:nowrap;
                }

                    #example .file-name-heading
                    {
                        font-weight: bold;
                    }

                     #example .file-size-heading
                    {
                        font-weight: normal;
                        font-style: italic;
                    }

                li.k-file .file-wrapper .k-upload-action
                {
                    position: absolute;
                    top: 0;
                    right: 0;
                }

                li.k-file div.file-wrapper
                {
                    position: relative;
                    height: 75px;
                }
            </style>
        </div>
                                    <?php 

//                                        $this->widget('ext.xupload.XUpload', array(
//                                        'url' => Yii::app()->createUrl("account/upload"),
//                                        'model' => $img_upload,
//                                        'htmlOptions' => array('id'=>'business-form'),
//                                        'attribute' => 'file1',
//                                        'multiple' => true,
//                                        'formView' => 'application.views.account._xuploadForm',
//                                        'uploadView' => 'application.views.account._xuploadUpload',
//                                        'downloadView' => 'application.views.account._xuploadDownload',
//                                        'uploadTemplate' => '#template-upload1',
//                                        'downloadTemplate' => '#template-download1',
//                                        'options'=>array(
//                                            'maxNumberOfFiles'=> 5,
//                                            'acceptFileTypes'=> "js:/(\.|\/)(gif|jpe?g|png)$/i",
//                                            'maxFileSize'=> 2000000,
//                                            'uploadTemplateId' => 'template-upload1', 
//                                            'downloadTemplateId' => 'template-download1', 
//                                            'filesContainer' => '.files1', 
//                                            'prependFiles' => true, 
//                                            'submit' => "js:function (e, data) {
//                                                                    var inputs = data.context.find(':input');
//                                                                    data.formData = inputs.serializeArray();
//                                                                    return true;
//                                                                }"
//                                        ),
//                                       
//                                    ));
                                        
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
								</div>
							</div>
						</div>
					</div>
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label">Dokumen</label>
								<div class="controls">
									
                      
                                                  <?php 
                                                            $this->widget('application.extensions.Plupload.PluploadWidget', array(
                                                               'config' => array(
                                                                   'runtimes' => 'html5,gears,silverlight,browserplus',
                                                                   'url' => Yii::app()->createUrl('//account/uploadDocs'),
                                                                   'filters' => array(
                                                                                array(
                                                                                    'title' => 'Allowed Docs',
                                                                                    'extensions' => 'jpg,gif,jpeg,jpg,png,pdf,doc,docx,xls,xlsx'
                                                                                ),
                                                                   'max_file_size' => '5mb',
                                                               ),
                                                               'model'=>$model,
                                                               'attribute'=>'dokumen',
                                                               'id' => 'uploader',
                                                                
                                                               
                                                            ))); 
                                                  
                                                  
                                                 ?>
                                                   <br />
                                                   <div id="docList" style="display:none">Uploaded Documents</div>

                                                   <script>
                                                      function swfupload_callback(name,path,oldname)  
                                                      {
                                                              $("#docList").show().append("<p>"+ oldname +"</p>");
                                                              $("#image_name").val(name);
//                                                              $("#thumbnails_1").html("<img src='"+path+"/"+name+"?"+(new Date()).getTime()+"' />"); 
                                                      } 
                                                   </script>
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						
								<?php echo CHtml::button('Batal', array('submit' => array("account/index/"), 'class'=>'btn Gradient-Style1')); ?>
                <?php //echo CHtml::button('Simpan Draft', array('submit' => array("account/create?stat=Draft"), 'class'=>'btn Gradient-Style1')); ?>
                <?php echo CHtml::ajaxSubmitButton('Simpan Draft',CHtml::normalizeUrl(array('account/create','render'=>true)),
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
                     ),array('class'=>'btn Gradient-Style1')); ?>
		<?php echo CHtml::button('Lihat', array('class'=>'btn Gradient-Style1','onclick'=>"preview(this.form,'_blank')")); ?>
		<?php // echo CHtml::button('Kirim', array('submit' => array("account/create"), 'class'=>'btn Gradient-Style1')); ?>
                <?php echo CHtml::ajaxSubmitButton('Kirim',CHtml::normalizeUrl(array('account/create','render'=>true)),
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
        $("#business-form").attr("action",'<?php echo Yii::app()->createUrl("//account/create",array("stat"=>"Draft")); ?>');
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