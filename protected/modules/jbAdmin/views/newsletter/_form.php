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
				<h5>Newsletter</h5>
			</div>
			<div class="widget-content nopadding">
				<?php echo $form->hiddenField($model,'id_pembuat',array('size'=>60,'maxlength'=>500,'value'=>  Yii::app()->user->id)); ?>
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label"><?php echo $form->labelEx($model,'judul'); ?></label>
								<div class="controls">
									<?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>500)); ?>
								</div>
							</div>
						</div>						
					</div>
					
					<div class="control-group">
						<div class="span12">
							<div class="span11">
							<label class="control-label"><?php echo $form->labelEx($model,'tanggal'); ?></label>
							<div class="controls">
								<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                                                        'model'=>$model,
                                                                        'attribute'=>'tanggal',
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
								<label class="control-label"><?php echo $form->labelEx($model,'deskripsi'); ?></label>
								<div class="controls">
									<?php echo $form->textArea($model,'deskripsi'); ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="control-group">
						<div class="span12">
						<div class="span11">
							<label class="control-label"><?php echo $form->labelEx($model,'isi'); ?></label>
							<div class="controls">
								<?php echo $form->textArea($model,'isi', array('id'=>'ckeditorTextArea')); ?>
							</div>
						</div>
						</div>
					</div>
					
					<div class="form-actions">
                                                
                                            <?php 
                                            if($model->isNewRecord)
                                            {
                                                echo CHtml::button('Simpan Dan Kirim', array('submit' => array("newsletter/create?action=kirim"), 'class'=>'btn Gradient-Style1'));
                                                echo CHtml::button('Simpan', array('submit' => array("newsletter/create"), 'class'=>'btn Gradient-Style1')); 
                                            }
                                            else
                                            {
                                                echo CHtml::button('Simpan Dan Kirim', array('submit' => array("newsletter/update/id/$model->id?action=kirim"), 'class'=>'btn Gradient-Style1'));
                                                echo CHtml::button('Simpan', array('submit' => array("newsletter/update"), 'class'=>'btn Gradient-Style1')); 
                                            }
                                            ?>
                                                 
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