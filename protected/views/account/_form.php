<div>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'business-form',
            'enableAjaxValidation'=>false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>
        <p style="clear:both"><?php echo $form->errorSummary($model); ?></p>
	
		<br style="clear:both"/>
                <?php echo $form->hiddenField($model,'id_user',array('value'=>Yii::app()->user->id)) ?>
		<table>
			<tr>
				<td><span><?php echo $form->labelEx($model,'id_category'); ?></span></td>
				<td>
					<?php echo $form->radioButtonList($model,'id_category',$kategori,array('onchange'=>'changeCategory(2)')) ?>
				</td>
			</tr>
                        <tr>
				<td><span><?php echo $form->labelEx($model,'kepemilikan'); ?></span></td>
				<td>
                                    <?php echo $form->dropDownList($model,'kepemilikan',$kepemilikan,array('prompt'=>'Pilih Jumlah Kepemilikan','class'=>'styleSelect2')); ?>
				</td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'id_industri'); ?></span></td>
				<td>
                                    <?php echo $form->dropDownList($model,'id_industri',CHtml::listData($industri,'id','industri'),array(
                                        'prompt'=>'Pilih Industri',
                                        'class'=>'styleSelect2',
                                        'ajax' => array(
                                            'type' => 'POST',
                                            'url' => Yii::app()->createUrl('//account/generatesubindustri'),
                                            'update' => '#'.CHtml::activeId($model,'id_sub_industri'),
                                    ))); ?>
				</td>
			</tr>
			<tr>
                                <?php echo Chtml::hiddenField('sub_industri_temp', $model->id_sub_industri) ?>
				<td><span><?php echo $form->labelEx($model,'id_sub_industri'); ?></span></td>
				<td>
                                    <?php echo $form->dropDownList($model,'id_sub_industri',array(),array('prompt'=>'Pilih Sub Industri','class'=>'styleSelect2')); ?>
				</td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'nama'); ?></span></td>
				<td><?php echo $form->textField($model,'nama',array('class'=>'styleText1')); ?></td>
			</tr>
			<tr>
                            
		
				<td><span><?php echo $form->labelEx($model,'alamat'); ?></span></td>
				<td><?php echo $form->textField($model,'alamat',array('class'=>'styleText1')); ?></td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'id_provinsi'); ?></span></td>
				<td>
                                    <?php echo $form->dropDownList($model,'id_provinsi',CHtml::listData($provinsi,'id','provinsi'),array(
                                        'prompt'=>'Pilih Provinsi',
                                        'class'=>'styleSelect2',
                                        'ajax' => array(
                                            'type' => 'POST',
                                            'url' => Yii::app()->createUrl('//account/generatekota'),
                                            'update' => '#'.CHtml::activeId($model,'id_kota'),
                                    ))); ?>
				</td>
			</tr>
                        <tr>
                                <?php echo Chtml::hiddenField('kota_temp', $model->id_kota) ?>
				<td><span><?php echo $form->labelEx($model,'id_kota'); ?></span></td>
				<td>
					<?php echo $form->dropDownList($model,'id_kota',array(),array('prompt'=>'Pilih Kota','class'=>'styleSelect2')); ?>
				</td>
			</tr>
			<tr>
                            
		
				<td><span><?php echo $form->labelEx($model,'jumlah_karyawan'); ?></span></td>
				<td><?php echo $form->textField($model,'jumlah_karyawan',array('class'=>'styleText1')); ?></td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'tahun_didirikan'); ?></span></td>
				<td>
                                     <?php echo $form->dropDownList($model,'tahun_didirikan',$tahun,array('prompt'=>'Pilih Tahun','class'=>'styleSelect2')); ?>
				</td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'harga_min'); ?></span></td>
				<td><?php echo $form->textField($model,'harga_min',array('class'=>'styleText1','onkeyup'=>'calcValue()')); ?>  <?php echo $form->checkBox($model,'tampilkanKontak',array('disabled'=>'disabled', 'class'=>'tampilkanKontak')) ?><?php echo $form->labelEx($model,'tampilkanKontak') ?></td>
			</tr>
                        <tr>
                                
				<td><span><?php echo $form->labelEx($model,'harga_max'); ?></span></td>
				<td><?php echo $form->textField($model,'harga_max',array('class'=>'styleText1','onkeyup'=>'calcValue()')); ?></td>
			</tr>
			<tr>
                            
		
				<td><span><?php echo $form->labelEx($model,'penjualan'); ?></span></td>
				<td><?php echo $form->textField($model,'penjualan',array('class'=>'styleText1','onkeyup'=>'calcValue()')); ?></td>
			</tr>
			<tr>
                           
		
				<td><span> <?php echo $form->labelEx($model,'hpp'); ?></span></td>
				<td><?php echo $form->textField($model,'hpp',array('class'=>'styleText1')); ?></td>
			</tr>
                        <tr>
                            		
		
				<td><span><?php echo $form->labelEx($model,'laba_bersih_tahun'); ?></span></td>
				<td><?php echo $form->textField($model,'laba_bersih_tahun',array('class'=>'styleText1','onkeyup'=>'calcValue()')); ?></td>
			</tr>
			<tr>
                            
		
				<td><span><?php echo $form->labelEx($model,'total_aset'); ?></span></td>
				<td><?php echo $form->textField($model,'total_aset',array('class'=>'styleText1','onkeyup'=>'calcValue()')); ?></td>
			</tr>
                        <tr>
				<td><span><?php echo $form->labelEx($model,'marjin_laba_bersih'); ?></span></td>
				<td><?php echo $form->textField($model,'marjin_laba_bersih',array('class'=>'styleText1','readonly'=>'readonly')); ?></td>
			</tr>
                        <tr>
				<td><span><?php echo $form->labelEx($model,'laba_bersih_aset'); ?></span></td>
				<td><?php echo $form->textField($model,'laba_bersih_aset',array('class'=>'styleText1','readonly'=>'readonly')); ?></td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'harga_penawaran_penjualan'); ?></span></td>
				<td><?php echo $form->textField($model,'harga_penawaran_penjualan',array('class'=>'styleText1','readonly'=>'readonly')); ?></td>
			</tr>
			<tr>
                            
		
				<td><span><?php echo $form->labelEx($model,'harga_penawaran_laba_bersih'); ?></span></td>
				<td><?php echo $form->textField($model,'harga_penawaran_laba_bersih',array('class'=>'styleText1','readonly'=>'readonly')); ?></td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'harga_penawaran_aset'); ?></span></td>
				<td><?php echo $form->textField($model,'harga_penawaran_aset',array('class'=>'styleText1','readonly'=>'readonly')); ?></td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'alasan_jual_bisnis'); ?></span></td>
				<td>
                                        <?php echo $form->dropDownList($model,'dropDownAlasanJual',$alasan_jual_bisnis,array('prompt'=>'Pilih Alasan','class'=>'styleSelect2 alasanJualDropDown')); ?>
                                        <?php echo $form->checkBox($model,'alasan_jual_lainnya',array('onchange'=>'checkboxAlasanJual()','class'=>'alasanJualCheckBox')) ?><?php echo $form->labelEx($model,'alasan_jual_lainnya') ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<?php echo $form->textArea($model,'textAreaAlasanJual',array('class'=>'styleTextarea1 alasanJualTextArea','disabled'=>'disabled')); ?>
				</td>
			</tr>
			<tr>
                            
		
				<td><span><?php echo $form->labelEx($model,'deskripsi'); ?></span></td>
				<td>
					<?php echo $form->textArea($model,'deskripsi',array('class'=>'styleTextarea1')); ?>
				</td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'image'); ?></span></td>
                                <td id="imgupload">
                                    
<!--                                <span class="btn btn-success fileinput-button">
                                    <i class="icon-plus icon-white"></i>
                                    <span>Add files...</span>
                                     The file input field used as target for the file upload widget 
                                    <input id="fileupload" type="file" name="files[]" multiple>
                                </span>
                                        <br>
                                    <br>
                                     The global progress bar 
                                    <div id="progress" class="progress progress-success progress-striped">
                                        <div class="bar"></div>
                                    </div>
                                     The container for the uploaded files 
                                    <div id="files" class="files"></div>
                                    <br>-->
                                    <?php 
                                        $this->widget('ext.xupload.XUpload', array(
                                        'url' => Yii::app()->createUrl("account/upload"),
                                        'model' => $img_upload,
                                        'htmlOptions' => array('id'=>'business-form'),
                                        'attribute' => 'file',
                                        'multiple' => true,
                                        'showForm'=> true,
                                        'options'=>array(
                                            'maxNumberOfFiles'=> 5,
                                            'acceptFileTypes'=> "js:/(\.|\/)(gif|jpe?g|png)$/i",
                                            'maxFileSize'=> 2000000,
                                        ),
                                        'formView' => 'application.views.account._xupload',
                                    ));
                                    
//                                        $this->widget('ext.dropzone.EDropzone', array(
//                                            'model' => $model,
//                                            'attribute' => 'image',
//                                            'url' => $this->createUrl('account/upload'),
//                                            'mimeTypes' => array('image/jpeg', 'image/png'),
//                                            'onSuccess' => 'someJsFunction();',
//                                            'options' => array('autoProcessQueue'=>false),
//                                        ));
//                                    ?>
                                    
                                </td>
			</tr>
			<tr>
				<td></td>
				<td>
					<img src="#" width="70" height="70"/>
					<img src="#" width="70" height="70"/>
					<img src="#" width="70" height="70"/>
					<img src="#" width="70" height="70"/>
					<img src="#" width="70" height="70"/>
				</td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'dokumen'); ?></span></td>
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
//                                        'formView' => 'application.views.account._xupload_1',
//                                    ));
                                    
                                
//                                $this->widget('CMultiFileUpload', array(
//                                'model'=>$model,
//                                'attribute'=>'dokumen',
//                                'accept'=>'jpg|gif|png|pdf|doc|docx|xls|xlsx|txt',
//                                )
//                             ); 
                                ?></td>
			</tr>
		</table>
		<hr/>
                <?php echo CHtml::button('Batal', array('submit' => array("account/index/"), 'class'=>'styleSubmit2')); ?>
                <?php echo CHtml::button('Simpan Draft', array('submit' => array("account/create?stat=Draft"), 'class'=>'styleSubmit2')); ?>
		<?php echo CHtml::button('Lihat', array('class'=>'styleSubmit2','onclick'=>"preview(this.form,'_blank')")); ?>
		<?php echo CHtml::button('Kirim', array('submit' => array("account/create"), 'class'=>'styleSubmit2')); ?>
</div>
<div>
    
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
</script>