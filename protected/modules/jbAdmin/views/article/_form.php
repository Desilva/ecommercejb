<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Harus diisi <span class="required">*</span></p>

	<?php echo $form->errorSummary($model); ?>

        <table>
            <tr>
                <td><?php echo $form->labelEx($model,'title'); ?></td>
                <td><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'created_by'); ?></td>
                <td><?php echo $form->textField($model,'created_by',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'created_by'); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'post_date'); ?></td>
                <td><?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                      'model'=>$model,
                      'attribute'=>'post_date',
                      'options'=>array(
                      'showAnim'=>'fold',
                      'dateFormat'=>'yy-mm-dd',
                       ),
                      'htmlOptions'=>array(
                        'style'=>'height:20px;'
                       ),
                )); ?>
		<?php echo $form->error($model,'post_date'); ?> </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'id_article_category'); ?></td>
                <td><?php echo $form->dropDownList($model,'id_article_category',CHtml::listData($category,'id','category'),array('prompt'=>'Pilih Kategori')); ?>
		<?php echo $form->error($model,'id_article_category'); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'post'); ?></td>
                <td><?php echo $form->textArea($model,'post', array('id'=>'ckeditorTextArea')); ?>
		<?php echo $form->error($model,'post'); ?></td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'resume'); ?></td>
                <td><?php echo $form->textField($model,'resume',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'resume'); ?></td>
            </tr>
        </table>
        <script type="text/javascript">
            CKEDITOR.config.width = 688;
            CKEDITOR.replace( 'ckeditorTextArea' );
        </script>
	<div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tambah' : 'Simpan'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->