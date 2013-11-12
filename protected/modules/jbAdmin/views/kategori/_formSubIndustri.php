<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sub-industri-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="error-field">
	<p><?php echo $form->errorSummary($model); ?></p>
<?php 
      if(isset($industri))
      {
          echo $form->hiddenField($model,'id_industri',array('value'=>$industri->id)); 
      }
      else
      {
          echo $form->hiddenField($model,'id_industri');
      }
?>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'sub_industri'); ?>
	<?php echo $form->textField($model,'sub_industri',array('size'=>60,'maxlength'=>100,'class'=>'admin-input')); ?>
</div>
<div class="admin-row">
	<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textField($model,'keterangan',array('size'=>60,'maxlength'=>500,'class'=>'admin-input')); ?>
</div>
<div class="admin-row">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'admin-button')); ?>
</div>
<?php $this->endWidget(); ?>