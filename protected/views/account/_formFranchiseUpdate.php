<div>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'business-form',
            'enableAjaxValidation'=>false,
    )); ?>
        <?php echo $form->errorSummary($model); ?>
	
		<span style="float:right">
			 <?php
                            if(strtolower($model->status_approval) == 'terjual' || strtolower($model->status_approval)== 'tidak aktif')
                            {
                                  echo '<strong>Status</strong>:'.$model->status_approval;
                            }
                            else
                            {
                                   echo $form->radioButtonList($model,'status_approval',array('Terjual' =>'Terjual', 'Tidak Aktif'=>'Non Aktifkan'),array('separator'=>'&nbsp;'));
                            }
                        ?>
		</span>
		<br style="clear:both"/>
                <?php echo $form->hiddenField($model,'id_user',array('value'=>Yii::app()->user->id)) ?>
                <?php echo $form->hiddenField($model,'kepemilikan',array('value'=>'0')) ?>
		<table>
			<tr>
				<td><span><?php echo $form->labelEx($model,'id_category'); ?></span></td>
				<td>
					<?php echo $form->hiddenField($model,'id_category'); ?>
					<?php 
                                            if($model->id_category == 1)
                                            {
                                                echo "Bisnis";
                                            }
                                            else if($model->id_category == 2)
                                            {
                                                echo "Franchise";
                                            }
                                            else
                                            {
                                                echo "Error";
                                            }
                                        ?>
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
                                       if(strtolower($model->status_approval) == 'terjual' || strtolower($model->status_approval)== 'tidak aktif')
                                         {
                                             //list image
                                         }
                                         else
                                         {
//                                             $this->widget('ext.xupload.XUpload', array(
//                                                'url' => Yii::app()->createUrl("account/upload"),
//                                                'model' => $img_upload,
//                                                'htmlOptions' => array('id'=>'business-form'),
//                                                'attribute' => 'file',
//                                                'multiple' => true,
//                                                'showForm'=> true,
//                                                'options'=>array(
//                                                    'maxNumberOfFiles'=> 5,
//                                                    'acceptFileTypes'=> "js:/(\.|\/)(gif|jpe?g|png)$/i",
//                                                    'maxFileSize'=> 2000000,
//                                                ),
//                                                'formView' => 'application.views.account._xupload',
//                                            ));
                                         }
                                    
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
<!--					<img src="#" width="70" height="70"/>
					<img src="#" width="70" height="70"/>
					<img src="#" width="70" height="70"/>
					<img src="#" width="70" height="70"/>
					<img src="#" width="70" height="70"/>-->
				</td>
			</tr>
			<tr>
				<td><span><?php echo $form->labelEx($model,'dokumen'); ?></span></td>
				<td></td>
			</tr>
		</table>
		<hr/>
                <?php
                    if(strtolower($model->status_approval) == 'terjual' || strtolower($model->status_approval)== 'tidak aktif')
                    {
                        echo CHtml::button('Kembali', array('submit' => array("account/index/"), 'class'=>'styleSubmit2'));
                    }
                    else
                    {
                        echo CHtml::button('Batal', array('submit' => array("account/index/"), 'class'=>'styleSubmit2'));
                        //echo CHtml::button('Simpan Draft', array('submit' => array("account/update/"), 'class'=>'styleSubmit2')); 
                        echo CHtml::button('Lihat', array('submit' => array("account/preview"), 'class'=>'styleSubmit2')); 
                        echo CHtml::button('Kirim', array('submit' => array("account/update/$model->id"), 'class'=>'styleSubmit2')); 
                    }
                ?>
</div>
<?php $this->endWidget(); ?>