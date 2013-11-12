<?php
/* @var $this KategoriController */
/* @var $model Industri */
/* @var $form CActiveForm */
?>
<?php
  $form = $this->beginWidget('CActiveForm', array(
    'id' => 'industri-form',
		'htmlOptions'=>array(),
    'enableAjaxValidation' => false,
  ));
?>
<div class="error-field">
	<p><?php echo $form->errorSummary($model); ?></p>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model, 'industri'); ?>
	<?php echo $form->textField($model, 'industri', array('size' => 60, 'maxlength' => 100, 'class'=>"admin-input")); ?>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model, 'keterangan'); ?>
	<?php echo $form->textField($model, 'keterangan', array('size' => 60, 'maxlength' => 500,'class'=>'admin-input')); ?>
</div>
<div class="admin-row">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'admin-button')); ?>
</div>
<?php $this->endWidget(); ?>