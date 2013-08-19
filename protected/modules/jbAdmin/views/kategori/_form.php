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
				'htmlOptions'=>array('class'=>'form-horizontal'),
                'enableAjaxValidation' => false,
            ));
            ?>

            <div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-align-justify"></i>									
				</span>
				<h5>Kategori Bisnis</h5>
			</div>
			<div class="widget-content nopadding">
				<p><?php echo $form->errorSummary($model); ?></p>
				<div class="control-group">
					<div class="span12">
						<div class="span11">
							<label class="control-label"><?php echo $form->labelEx($model, 'industri'); ?></label>
							<div class="controls">
							<?php echo $form->textField($model, 'industri', array('size' => 60, 'maxlength' => 100)); ?>
							</div>
						</div>	
					</div>
				</div>
				<div class="control-group">
					<div class="span12">
						<div class="span11">
							<label class="control-label"><?php echo $form->labelEx($model, 'keterangan'); ?></label>
							<div class="controls">
								<?php echo $form->textField($model, 'keterangan', array('size' => 60, 'maxlength' => 500)); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="form-actions">
					 <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn Gradient-Style1')); ?>
				</div>
			</div>

<?php $this->endWidget(); ?>
    </div>
</div>