<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>

<div class="span9">
    <div class="row-fluid">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	'enableAjaxValidation'=>false,
)); ?>

	<p><?php echo $form->errorSummary($model); ?></p>

        <div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-align-justify"></i>									
				</span>
				<h5>Article</h5>
			</div>
			<div class="widget-content nopadding">
				
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label"><?php echo $form->labelEx($model,'title'); ?></label>
								<div class="controls">
									<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
									
								</div>
							</div>
						</div>						
					</div>
					
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label"><?php echo $form->labelEx($model,'created_by'); ?></label>
								<div class="controls">
									<?php echo $form->textField($model,'created_by',array('size'=>10,'maxlength'=>10)); ?>
									
								</div>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span12">
							<div class="span11">
							<label class="control-label"><?php echo $form->labelEx($model,'post_date'); ?></label>
							<div class="controls">
								<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                                        'model'=>$model,
                                                                        'attribute'=>'post_date',
                                                                        'options'=>array(
                                                                        'showAnim'=>'fold',
                                                                        'dateFormat'=>'yy-mm-dd',
                                                                        'changeMonth'=>true,
                                                                        'changeYear'=>true,
                                                                        'yearRange'=>'1900:2050',
                                                                        'maxDate' => date('Y-m-d'), 
                                                                         ),
                                                                        'htmlOptions'=>array(
                                                                          'style'=>'height:20px;'
                                                                         ),
                                                                  )); ?>
							</div>
						</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span12">
							<div class="span11">
							<label class="control-label"><?php echo $form->labelEx($model,'id_article_category'); ?></label>
							<div class="controls">
								<?php echo $form->dropDownList($model,'id_article_category',CHtml::listData($category,'id','category'),array('prompt'=>'Pilih Kategori')); ?>
							</div>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span12">
							<div class="span11">
							<label class="control-label"><?php echo $form->labelEx($model,'id_article_category_pembaca'); ?></label>
							<div class="controls">
								<?php echo $form->dropDownList($model,'id_article_category_pembaca',CHtml::listData($categoryPembaca,'id','category_pembaca'),array('prompt'=>'Pilih Kategori Pembaca')); ?>
							</div>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span12">
						<div class="span11">
							<label class="control-label"><?php echo $form->labelEx($model,'post'); ?></label>
							<div class="controls">
								<?php echo $form->textArea($model,'post', array('id'=>'ckeditorTextArea')); ?>
							</div>
						</div>
						</div>
					</div>
					
					<div class="conntrol-group">
						<div class="span12">
							<div class="span11">
							<label class="control-label"><?php echo $form->labelEx($model,'resume'); ?></label>
							<div class="controls">
								<?php echo $form->textField($model,'resume'); ?>
							</div>
						</div>
						</div>
					</div>
					
					<div class="form-actions">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan', array('class'=>'btn Gradient-Style1')); ?>
					</div>
			</div>
		</div>
        <script type="text/javascript">
            CKEDITOR.config.width = 600;
            CKEDITOR.replace( 'ckeditorTextArea' );
        </script>

<?php $this->endWidget(); ?>
</div>
    </div>