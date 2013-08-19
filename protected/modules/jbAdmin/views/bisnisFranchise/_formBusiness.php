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
<div class="row-fluid">
        	<div class="span12">
                <div class="row-fluid">
                	<div class="span12">
                            <?php echo $form->hiddenField($model,'id_user',array('value'=>$model->id_user)) ?>
                    	<table>
                        	<tr>
                            	<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'id_category'); ?></th>
                                <td width="35%">
									<?php echo $form->hiddenField($model,'id_category'); ?>
                                    <?php echo $model->idCategory->category; ?>
								</td>
                            </tr>
							<tr>
								<Th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'kepemilikan'); ?></th>
								<td width="35%"><?php echo $form->dropDownList($model,'kepemilikan',$kepemilikan,array('prompt'=>'Pilih Jumlah Kepemilikan')); ?></td>
							</tr>
							<tr>
								<Th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'id_industri'); ?></th>
								<td width="35%">
									<?php echo $form->dropDownList($model,'id_industri',CHtml::listData($industri,'id','industri'),array(
                                                                                                'prompt'=>'Pilih Industri',
                                                                                                'ajax' => array(
                                                                                                    'type' => 'POST',
                                                                                                    'url' => Yii::app()->createUrl('//jbAdmin/bisnisFranchise/generatesubindustri'),
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
<<<<<<< HEAD
								</td>
							</tr>
							<tr>
							<?php echo Chtml::hiddenField('sub_industri_temp', $model->id_sub_industri) ?>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'id_sub_industri'); ?></th>
								<Td width="35%"><?php echo $form->dropDownList($model,'id_sub_industri',array(),array('prompt'=>'Pilih Sub Industri')); ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'nama'); ?></th>
								<Td width="35%"><?php echo $form->textField($model,'nama'); ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'alamat'); ?></th>
								<Td width="35%"><?php echo $form->textArea($model,'alamat'); ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'id_provinsi'); ?></th>
								<td width="35%">
									<?php echo $form->dropDownList($model,'id_provinsi',CHtml::listData($provinsi,'id','provinsi'),array(
=======
                				</td>	
            				</tr>
            				<tr>
                                                 <?php echo Chtml::hiddenField('sub_industri_temp', $model->id_sub_industri) ?>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'id_sub_industri'); ?></th>
                				<td>
                                                        <?php echo $form->dropDownList($model,'id_sub_industri',array(),array('prompt'=>'Pilih Sub Industri')); ?>
                                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-industri" style="display:none"/>
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
                					<?php echo $form->textArea($model,'alamat'); ?>
                				</td>	
            				</tr>
             				<tr>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'id_provinsi'); ?></th>
                				<td>
                					<?php echo $form->dropDownList($model,'id_provinsi',CHtml::listData($provinsi,'id','provinsi'),array(
>>>>>>> 1e068be16e1ae39194a986defb71cd3af1917e53
                                                            'prompt'=>'Pilih Provinsi',
                                                            'ajax' => array(
                                                                'type' => 'POST',
                                                                'url' => Yii::app()->createUrl('//jbAdmin/bisnisFranchise/generatekota'),
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
<<<<<<< HEAD
								</td>
							</tR>
							<tr>
							<?php echo Chtml::hiddenField('kota_temp', $model->id_kota) ?>
								<Th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'id_kota'); ?></th>
								<td width="35%"><?php echo $form->dropDownList($model,'id_kota',array(),array('prompt'=>'Pilih Kota')); ?></td>
							</tr>
							<tr>
								<Th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'jumlah_karyawan'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'jumlah_karyawan'); ?></td>
							</tR>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'tahun_didirikan'); ?></th>
								<td width="35%"><?php echo $form->dropDownList($model,'tahun_didirikan',$tahun,array('prompt'=>'Pilih Tahun')); ?></td>
							</tr>
							<Tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'harga_min'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'harga_min',array('onkeyup'=>'calcValue()')); ?> &nbsp; <?php echo $form->checkBox($model,'tampilkanKontak',array('disabled'=>'disabled', 'class'=>'tampilkanKontak')) ?><?php echo $form->labelEx($model,'tampilkanKontak', array('style'=>'display:inline; margin-left:3px;')) ?></td>
							</tr>
							<TR>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'harga_max'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'harga_max',array('class'=>'styleText1','onkeyup'=>'calcValue()')); ?></td>
							</TR>
							<tr>
								<Th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'penjualan'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'penjualan',array('onkeyup'=>'calcValue()')); ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'hpp'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'hpp'); ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'laba_bersih_tahun'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'laba_bersih_tahun',array('onkeyup'=>'calcValue()')); ?></td>
							</tR>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'total_aset'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'total_aset',array('onkeyup'=>'calcValue()')); ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'marjin_laba_bersih'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'marjin_laba_bersih',array('readonly'=>'readonly')); ?></td>
							</tR>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'laba_bersih_aset'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'laba_bersih_aset',array('readonly'=>'readonly')); ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'harga_penawaran_penjualan'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'harga_penawaran_penjualan',array('readonly'=>'readonly')); ?></td>
							</tr>
							<tr>
								<Th class="Text-ALign-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'harga_penawaran_laba_bersih'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'harga_penawaran_laba_bersih',array('readonly'=>'readonly')); ?></td>
							</tr>
							<tr>
								<Th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'harga_penawaran_aset'); ?></th>
								<td width="35%"><?php echo $form->textField($model,'harga_penawaran_aset',array('readonly'=>'readonly')); ?></td>
							</tr>
							<tr>
								<Th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'alasan_jual_bisnis'); ?></th>
								<td width="35%">
									<?php echo $form->dropDownList($model,'dropDownAlasanJual',$alasan_jual_bisnis,array('prompt'=>'Pilih Alasan','class'=>'alasanJualDropDown')); ?>
                                    <?php echo $form->checkBox($model,'alasan_jual_lainnya',array('onchange'=>'checkboxAlasanJual()','class'=>'alasanJualCheckBox')) ?><?php echo $form->labelEx($model,'alasan_jual_lainnya',array('style'=>'display:inline; margin-left:3px;')) ?>
								</td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"></th>
								<td width="35%"><?php echo $form->textArea($model,'textAreaAlasanJual',array('class'=>'alasanJualTextArea','disabled'=>'disabled')); ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'deskripsi'); ?></th>
								<Td width="35%"><?php echo $form->textArea($model,'deskripsi'); ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'image'); ?></th>
								<td width="35%"><?php 

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
                                    ?></td>
							</tr>
							<tr>
								<th class="Text-Align-Left Font-Color-LightBlue" width="4%"></th>
								<td width="35%"></td>
							</tr>
							<tr>
								<Th class="Text-Align-Left Font-Color-LightBlue" width="4%">Dokumen</th>
								<td width="35%">
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
								<Th class="Text-Align-Left Font-Color-LightBlue" width="4%" colspan="2">
									<?php
=======
                				</td>	
            				</tr>
                                        <tr>
                                                <?php echo Chtml::hiddenField('kota_temp', $model->id_kota) ?>
            					<th class="Text-Align-Left"><?php echo $form->labelEx($model,'id_kota'); ?></th>
                				<td>
                					<?php echo $form->dropDownList($model,'id_kota',array(),array('prompt'=>'Pilih Kota')); ?>
                                                        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-provinsi" style="display:none"/>
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
                                   <div id="example" class="k-content">
            <input type="file" name="files" id="upload" />
            <input type='hidden' value='0' id='image_incrementor' />
            <script id="fileTemplate" type="text/x-kendo-template">
                
                <span class='k-progress'></span>
                <div class='file-wrapper'>
                <img id='#=files[0].name##=files[0].size#' src='<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/#=files[0].name#' class='file-icon' onerror="this.src='<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner-large.gif'" />
                    <h4 class='file-heading file-name-heading'>Name: #=name#</h4>
                    <h4 class='file-heading file-size-heading'>Size: #=size# bytes</h4>
                    <button type='button' class='k-upload-action'></button>
                </div>
            </script>

            <script>
                var totalFiles = 0;
                var initialImageFiles = <?php echo $initial_image_upload ?>;
                $(document).ready(function () {
                    $("#upload").kendoUpload({
                        multiple: true,
                        async: {
                            saveUrl: '<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/uploadImage',array('id'=>$model->id_user)) ?>',
                            removeUrl: "<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/removeUploadedImage',array('id'=>$model->id_user)) ?>",
                            autoUpload: true
                        },
                        template: kendo.template($('#fileTemplate').html()),
                        files:initialImageFiles,
                        select: onSelectImage,
                        success: onSuccessImage,
                        remove: onRemoveImage,
                    });
                });
                
                function getImageName(name)
                {
                    
                }
                
                function onSelectImage(e)
                {
                        var flagExtension = 0;
                        var flagSize = 0;
                        var allowedExtension = [".jpg",".jpeg",".png",".gif",".bmp"];
                        var selectedFiles = e.files.length;
                       
                        
                        $.each(e.files, function(index, value) {
                            if(value.size > 2097152)
                            {
                                flagSize = 1;
                            }
                            if($.inArray((value.extension).toLowerCase(), allowedExtension) === -1)
                            {
                                flagExtension = 1;
                            }
                        });
                        
                        if(flagExtension == 1)
                        {
                            alert("File yang diperbolehkan hanya berupa jpg/jpeg, png, gif, dan bmp");
                            e.preventDefault();
                        }
                        
                        if(flagSize == 1)
                        {
                            alert("Ukuran setiap file tidak boleh ada yang melebihi 2 MB");
                            e.preventDefault();
                        }
                        
                        if(flagExtension != 1 && flagSize != 1)
                        {
                            if (totalFiles + selectedFiles > 5) 
                            {
                                alert("Jumlah maksimum 5 file");
                                e.preventDefault();
                            }
                            else {
                                totalFiles += selectedFiles;
                            }
                        }
                        

                    
                }
                
                function onSuccessImage(e)
                {
                    // Array with information about the uploaded files
                    var files = e.files;
                    
                    if (e.operation == "upload") {
                    $.each(files, function(){
                        var id = this.name+this.size;
                        var location = '<?php echo Yii::app()->request->baseUrl ?>/uploads/tmp/<?php echo $model->id_user ?>/'+this.name;
                        $("[id='"+id+"']").attr('src',location);
//                        $('#'+id).append('<img src="'+location+'" />');
//                        alert('#'+id);
                    });

                    }   
                }
                
                function onRemoveImage(e)
                {
                    totalFiles--;
                }
                
            </script>

            <style scoped>
                .file-icon
                {
                    display: inline-block;
                    float: left;
                    width: 60px;
                    height: 60px;
                    margin-left: 10px;
                    margin-top: 13.5px;
                }

                .img-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/jpg.png) }
                .doc-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/doc.png) }
                .pdf-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/pdf.png) }
                .xls-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/xls.png) }
                .zip-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/zip.png) }
                .default-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/default.png) }

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
                                           <div id="example2" class="k-content">
            <input type="file" name="files" id="upload2" />

            <script id="fileTemplate2" type="text/x-kendo-template">
                <span class='k-progress'></span>
                <div class='file-wrapper'>
                    <span class='file-icon #=addExtensionClass(files[0].extension)#'></span>
                    <h4 class='file-heading file-name-heading'>Name: #=name#</h4>
                    <h4 class='file-heading file-size-heading'>Size: #=size# bytes</h4>
                    <button type='button' class='k-upload-action'></button>
                </div>
            </script>

            <script>
            var initialDocsFiles = <?php echo $initial_doc_upload ?>;
                $(document).ready(function () {
                    $("#upload2").kendoUpload({
                         multiple: true,
                        async: {
                            saveUrl: '<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/uploadDocument',array('id'=>$model->id_user)) ?>',
                            removeUrl: "<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/removeUploadedDocument',array('id'=>$model->id_user)) ?>",
                            autoUpload: true
                        },
                        template: kendo.template($('#fileTemplate2').html()),
                        select: onSelectDocument,
                        files: initialDocsFiles


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
                
                function onSelectDocument(e)
                {
                        var flagExtension = 0;
                        var flagSize = 0;
                        var allowedExtension = [".jpg",".jpeg",".png",".gif",".bmp",".pdf",".zip",".rar",".doc",".docx",".xls",".xlsx",".txt",".ppt",".pptx"];
                        
                        $.each(e.files, function(index, value) {
                            if(value.size > 5242880)
                            {
                                flagSize = 1;
                            }
                            if($.inArray((value.extension).toLowerCase(), allowedExtension) === -1)
                            {
                                flagExtension = 1;
                            }
                        });
                        
                        if(flagExtension == 1)
                        {
                            alert("File yang diperbolehkan hanya berupa jpg/jpeg, png, gif,bmp, pdf, zip, rar, doc(x), xls(x), txt, ppt(x)");
                            e.preventDefault();
                        }
                        
                        if(flagSize == 1)
                        {
                            alert("Ukuran setiap file tidak boleh ada yang melebihi 5 MB");
                            e.preventDefault();
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

                .img-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/jpg.png) }
                .doc-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/doc.png) }
                .pdf-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/pdf.png) }
                .xls-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/xls.png) }
                .zip-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/zip.png) }
                .default-file { background-image: url(<?php echo Yii::app()->request->baseUrl ?>/images/default.png) }

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
                                        </td>
            			</tr>
            			<tr>
            				<th colspan="2">
                <?php
>>>>>>> 1e068be16e1ae39194a986defb71cd3af1917e53
                        echo CHtml::button('Batal', array('submit' => array("bisnisFranchise/index/"), 'class'=>'btn Gradient-Style1'));
//                        echo CHtml::button('Simpan', array('submit' => array("bisnisFranchise/update/id/$model->id"), 'class'=>'btn Gradient-Style1')); 
//                        echo CHtml::button('Terima', array('submit' => array("bisnisFranchise/update/id/$model->id/stat/Diterima"), 'class'=>'btn Gradient-Style1')); 
                 ?>      
                <?php echo CHtml::ajaxSubmitButton('Simpan',CHtml::normalizeUrl(array("bisnisFranchise/update/id/$model->id")),
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
                        
               
                <?php echo CHtml::button('Tolak', array('submit' => array("bisnisFranchise/tolak/id/$model->id"), 'class'=>'btn Gradient-Style1')); ?>
                <?php echo CHtml::ajaxSubmitButton('Terima',CHtml::normalizeUrl(array("bisnisFranchise/update/id/$model->id")),
                                array(
                                    'dataType'=>'json',
                                    'type'=>'post',
                                    'success'=>'function(data) {  
                                       if(data.status=="success"){
                                           terima();
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
								<th>
							</tr>
						</table>
                    </div>
                </div>
            </div>
        </div>
<?php $this->endWidget(); ?>
<script>

    
    function terima()
    {
        $("#business-form").attr("action",'<?php echo Yii::app()->createUrl("//jbAdmin/bisnisFranchise/update/id/$model->id?stat=Diterima"); ?>');
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