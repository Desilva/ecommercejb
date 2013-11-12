<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'htmlOptions'=>array(),
	'enableAjaxValidation'=>false,
)); ?>
<div class="error-field">
	<?php echo $form->hiddenField($model,'id_pembuat',array('size'=>60,'maxlength'=>500,'value'=>  Yii::app()->user->id)); ?>
	<p><?php echo $form->errorSummary($model); ?></p>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'judul'); ?>
	<?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>500, 'class'=>"admin-input")); ?>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'tanggal'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
        'model'=>$model,
        'attribute'=>'tanggal',
        'options'=>array(
          'showAnim'=>'fold',
          'dateFormat'=>'yy-mm-dd',
          'changeMonth' => true,
          'changeYear' => true,
          'yearRange' => '1900:2050',
          'maxDate' => date('Y-m-d')
         ),
        'htmlOptions'=>array(
          'style'=>'height:20px;',
          'class' => 'admin-input'
         ),
  )); ?>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'deskripsi'); ?>
	<?php echo $form->textArea($model,'deskripsi',array('class'=>"admin-input")); ?>
</div>
<div class="admin-row-subtitle">
	<?php echo $form->labelEx($model,'isi'); ?>
</div>
<div class="admin-row">
	<?php echo $form->textArea($model,'isi', array('id'=>'ckeditorTextArea')); ?>
	<script>
    //CKEDITOR.config.width = 570;
    CKEDITOR.replace( 'ckeditorTextArea' );
  </script>
</div>
<div class="admin-row">
	<?php 
    if($model->isNewRecord)
    {
        echo CHtml::button('Simpan Dan Kirim', array('submit' => array("newsletter/create?action=kirim"), 'class'=>'admin-button'));
        echo CHtml::button('Simpan', array('submit' => array("newsletter/create"), 'class'=>'admin-button')); 
    }
    else
    {
        echo CHtml::button('Simpan Dan Kirim', array('submit' => array("newsletter/update/id/$model->id?action=kirim"), 'class'=>'admin-button'));
        echo CHtml::button('Simpan', array('submit' => array("newsletter/update"), 'class'=>'admin-button')); 
    }
  ?>
</div>
<?php $this->endWidget(); ?>