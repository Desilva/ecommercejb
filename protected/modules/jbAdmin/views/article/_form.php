<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'htmlOptions'=>array(),
	'enableAjaxValidation'=>false,
)); ?>
<div class="error-field">
	<p><?php echo $form->errorSummary($model); ?></p>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'title'); ?>
	<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class'=>"admin-input")); ?>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'created_by'); ?>
	<?php echo $form->textField($model,'created_by',array('size'=>10,'maxlength'=>10, 'class'=>"admin-input")); ?>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'post_date'); ?>
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
        'model'=>$model,
        'attribute'=>'post_date',
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
          'class'=>'admin-input'
         ),
  )); ?>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'id_article_category'); ?>
	<div class="admin-row-select-2">
		<?php echo $form->dropDownList($model,'id_article_category',CHtml::listData($category,'id','category'),array('prompt'=>'Pilih Kategori', 'class'=>"admin-select")); ?>
	</div>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'id_article_category_pembaca'); ?>
	<div class="admin-row-select-2">
		<?php echo $form->dropDownList($model,'id_article_category_pembaca',CHtml::listData($categoryPembaca,'id','category_pembaca'),array('prompt'=>'Pilih Kategori Pembaca', 'class'=>"admin-select")); ?>
	</div>
</div>
<div class="admin-row-subtitle">
	<?php echo $form->labelEx($model,'post'); ?>
</div>
<div class="admin-row">
	<?php echo $form->textArea($model,'post', array('id'=>'ckeditorTextArea')); ?>
	<script>
    //CKEDITOR.config.width = 570;
    CKEDITOR.replace( 'ckeditorTextArea' );
  </script>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'resume'); ?>
	<?php echo $form->textField($model,'resume',array('class'=>"admin-input")); ?>
</div>
<div class="admin-row">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan', array('class'=>'admin-button')); ?>
</div>
<?php $this->endWidget(); ?>