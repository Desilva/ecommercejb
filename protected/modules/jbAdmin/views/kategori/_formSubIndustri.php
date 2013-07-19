<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sub-industri-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
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
	<div class="row">
		<?php echo $form->labelEx($model,'sub_industri'); ?>
		<?php echo $form->textField($model,'sub_industri',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textField($model,'keterangan',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->