<?php
/* @var $this KategoriController */
/* @var $model Industri */
/* @var $form CActiveForm */
?>
<div class="span7" style="padding-left:35px;">
    <div class="row-fluid">
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'industri-form',
                'enableAjaxValidation' => false,
            ));
            ?>

            <p><?php echo $form->errorSummary($model); ?></p>

            <div class="row">
                <?php echo $form->labelEx($model, 'industri'); ?>
                <?php echo $form->textField($model, 'industri', array('size' => 60, 'maxlength' => 100)); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'keterangan'); ?>
                <?php echo $form->textField($model, 'keterangan', array('size' => 60, 'maxlength' => 500)); ?>
            </div>

            <div class="row buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn Gradient-Style1')); ?>
            </div>

<?php $this->endWidget(); ?>
    </div>
</div>