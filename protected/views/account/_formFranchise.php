<div>
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
		<p style="clear:both"><?php echo $form->errorSummary($model); ?></p>
                <?php echo $form->hiddenField($model,'id_user',array('value'=>Yii::app()->user->id)) ?>
                <?php echo $form->hiddenField($model,'kepemilikan',array('value'=>'0')) ?>
		<table>
			<tr>
				<td><span><?php echo $form->labelEx($model,'id_category'); ?></span></td>
				<td>
					<?php echo $form->radioButtonList($model,'id_category',$kategori,array('onchange'=>'changeCategory(1)')) ?>
				</td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'id_industri'); ?></span></td>
				<td>
                                    <?php
                                    echo $form->dropDownList($model, 'id_industri', CHtml::listData($industri, 'id', 'industri'), array(
                                        'prompt' => 'Pilih Industri',
                                        'class' => 'styleSelect2',
                                        'ajax' => array(
                                            'type' => 'POST',
                                            'url' => Yii::app()->createUrl('//account/generatesubindustri'),
                                            'update' => '#' . CHtml::activeId($model, 'id_sub_industri'),
                                    )));
                                    ?>
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
				<td><span><?php echo $form->labelEx($model,'harga_min'); ?></span></td>
				<td><?php echo $form->textField($model,'harga_min',array('class'=>'styleText1','onkeyup'=>'calcValueFranchise()')); ?>  <?php echo $form->checkBox($model,'tampilkanKontak',array('disabled'=>'disabled', 'class'=>'tampilkanKontak')) ?><?php echo $form->labelEx($model,'tampilkanKontak') ?></td>
			</tr>
                        <tr>
				<td><span><?php echo $form->labelEx($model,'harga_max'); ?></span></td>
				<td><?php echo $form->textField($model,'harga_max',array('class'=>'styleText1','onkeyup'=>'calcValueFranchise()')); ?></td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'franchise_menu'); ?></span></td>
				<td>
					<?php echo $form->textArea($model,'franchise_menu',array('class'=>'styleTextarea1')); ?>
				</td>
			</tr>
                        <tr>
				<td><span><?php echo $form->labelEx($model,'franchise_alasan_kerjasama'); ?></span></td>
				<td>
					<?php echo $form->textArea($model,'franchise_alasan_kerjasama',array('class'=>'styleTextarea1')); ?>
				</td>
			</tr>
                        <tr>
				<td><span><?php echo $form->labelEx($model,'franchise_persyaratan'); ?></span></td>
				<td>
					<?php echo $form->textArea($model,'franchise_persyaratan',array('class'=>'styleTextarea1')); ?>
				</td>
			</tr>
                        <tr>
				<td><span><?php echo $form->labelEx($model,'franchise_dukungan_franchisor'); ?></span></td>
				<td>
					<?php echo $form->textArea($model,'franchise_dukungan_franchisor',array('class'=>'styleTextarea1')); ?>
				</td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'image'); ?></span></td>
				<td><?php 
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
//                                    ?></td>
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
				<td></td>
			</tr>
		</table>
		<hr/>
                <?php echo CHtml::button('Batal', array('submit' => array("account/index/"), 'class'=>'styleSubmit2')); ?>
                <?php //echo CHtml::button('Simpan Draft', array('submit' => array("account/create?stat=Draft"), 'class'=>'styleSubmit2')); ?>
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
                     ),array('class'=>'styleSubmit2')); ?>
                <?php echo CHtml::button('Lihat', array('class'=>'styleSubmit2','onclick'=>"preview(this.form,'_blank')")); ?>
		<?php //echo CHtml::button('Kirim', array('submit' => array("account/create"), 'class'=>'styleSubmit2')); ?>
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
                     ),array('class'=>'styleSubmit2')); ?>
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