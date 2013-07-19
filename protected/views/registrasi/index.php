<div id="registerDiv">
        <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-index-form',
        'enableAjaxValidation' => false,
    ));
    ?>
<?php echo $form->errorSummary($model); ?>
	<header id="headerRegister">Form Data Diri</header>
	<table>
		<tr class="formTR">
			<td id="tableDataDiriCol1"><span><?php echo $form->labelEx($model,'email'); ?></span></td>
			<td id="tableDataDiriCol2"><?php echo $form->textField($model,'email',array('class'=>'styleText1')); ?></td>
			<td id="tableDataDiriCol3"></td>
			<td id="tableDataDiriCol4"></td>
		</tr>
		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'password'); ?></span></td>
			<td><?php echo $form->passwordField($model,'password',array('class'=>'styleText1')); ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'password_repeat'); ?></span></td>
			<td><?php echo $form->passwordField($model,'password_repeat',array('class'=>'styleText1')); ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'first_name'); ?></span></td>
			<td><?php echo $form->textField($model,'first_name',array('class'=>'styleText1')); ?></td>
			<td><span><?php echo $form->labelEx($model,'instansi'); ?></span></td>
			<td><?php echo $form->textField($model,'instansi',array('class'=>'styleText1')); ?></td>
		</tr>

		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'last_name'); ?></span></td>
			<td><?php echo $form->textField($model,'last_name',array('class'=>'styleText1')); ?></td>
			<td><span><?php echo $form->labelEx($model,'income'); ?></span></td>
			<td>
                            <?php echo $form->dropDownList($model,'income',$penghasilan,array('prompt'=>'Pilih Penghasilan','class'=>'styleSelect2')); ?>
			</td>
		</tr>
		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'gender'); ?></span></td>
			<td>
                                <?php echo $form->radioButtonList($model,'gender',$jenis_kelamin,array('separator'=>'&nbsp;')) ?>
<!--				<input type="radio"/><label style="font-family:Calibri; color:#26529d">Laki-laki</label>
				<input type="Radio"/><label style="font-family:Calibri; color:#26529d">Perempuan</label>-->
			</td>
			<td><span><?php echo $form->labelEx($model,'office_address'); ?></span></td>
			<td><?php echo $form->textArea($model,'office_address',array('class'=>'styleText1')); ?></td>
		</tr>
		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'address'); ?></span></td>
			<td><?php echo $form->textArea($model,'address',array('class'=>'styleText1')); ?></td>
			<td><span><?php echo $form->labelEx($model,'office_phone'); ?></span></td>
			<td><?php echo $form->textField($model,'office_phone',array('class'=>'styleText1')); ?></td>
		</tr>
		<tr class="formTR">
			<td></td>
			<td></td>
			<td><span><?php echo $form->labelEx($model,'religion'); ?></span></td>
			<td>
				<?php echo $form->dropDownList($model,'religion',$agama,array('prompt'=>'Pilih Agama','class'=>'styleSelect2')); ?>
			</td>
		</tr>
 
		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'phone'); ?></span></td>
			<td><?php echo $form->textField($model,'phone',array('class'=>'styleText1')); ?></td>
			<td><span><?php echo $form->labelEx($model,'id_nationality'); ?></span></td>
			<td>
				<?php echo $form->dropDownList($model,'id_nationality',CHtml::listData($negara,'id','country'),array('prompt'=>'Pilih Negara','class'=>'styleSelect2')); ?>
			</td>
		</tr>
		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'handphone'); ?></span></td>
			<td><?php echo $form->textField($model,'handphone',array('class'=>'styleText1')); ?></td>
			<td><span><?php echo $form->labelEx($model,'marital_status'); ?></span></td>
			<td>
				<?php echo $form->dropDownList($model,'marital_status',$status_perkawinan,array('prompt'=>'Pilih Status','class'=>'styleSelect2')); ?>
			</td>
		</tr>

		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'birth_place'); ?></span></td>
			<td><?php echo $form->dropDownList($model,'birth_place',$tempat_lahir,array('prompt'=>'Pilih Kota','class'=>'styleSelect2')); ?></td>
			<td></td>
			<td></td>
		</tr>
                <tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'date_of_birth'); ?></span></td>
			<td><?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'=>$model,
                                'attribute'=>'date_of_birth',
                                'options'=>array(
                                'showAnim'=>'fold',
                                'dateFormat'=>'yy-mm-dd',
                                 ),
                                 'htmlOptions'=>array(
                                     'class'=>'styleText1'
                                 ),
                          )); ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr class="formTR">
			<td><span><?php echo $form->labelEx($model,'id_job'); ?></span></td>
			<td>
                            <?php echo $form->dropDownList($model,'id_job',CHtml::listData($pekerjaan,'id','job'),array('prompt'=>'Pilih Status','class'=>'styleSelect2')); ?>
			</td>
			<td></td>
			<td></td>
		</tr>
	</table>

    <div style="background-color:#e7e8ea; padding:10px;">
		<table>
			<header id="headerRegister">Isian Tambahan</header>
			<tr class="formTR">
				<Td><span><?php echo $form->labelEx($model,'id_buyer_category'); ?></span></td>
				<td>
                                    <?php echo $form->dropDownList($model,'id_buyer_category',CHtml::listData($kategori,'id','category'),array('prompt'=>'Pilih Kategory','class'=>'styleSelect2')); ?>
				</td>
			</tr>
			<tr class="formTR">
				<td><span><?php echo $form->labelEx($model,'id_buyer_location'); ?></span></td>
				<td>
                                    <?php echo $form->dropDownList($model,'id_buyer_location',CHtml::listData($lokasi,'id','city'),array('prompt'=>'Pilih Lokasi','class'=>'styleSelect2')); ?>
				</td>
			</tr>
			<tr class="formTR">
				<td><span><?php echo $form->labelEx($model,'id_buyer_price'); ?></span></td>
				<td>
                                    <?php echo $form->dropDownList($model,'id_buyer_price',CHtml::listData($range_harga,'id','range_price'),array('prompt'=>'Pilih Range Harga','class'=>'styleSelect2')); ?>
				</td>
			</tr>
		</table>
	</div>
    <table>
		<tr class="formTR">
			<td><span>Darimana Anda megetahui JualanBisnis.com</span></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<?php //echo $form->checkBoxList($model,'references', $references1, array('template'=>'<td>{input}{label}</td>', 'separator'=>'')) ?>
                        <?php foreach($references1 as $value1){ ?>
			<td><input type="checkbox" name="references[]" value="<?php echo $value1 ?>"/><?php echo $value1 ?></td>
                        <?php } ?>
		</tr>
		<tr>
			<td></td>
			   <?php //echo $form->checkBoxList($model,'references', $references2, array('template'=>'<td>{input}{label}</td>','separator'=>'')) ?>
                        <?php foreach($references2 as $value2){ ?>
                            <td><input type="checkbox" name="references[]" value="<?php echo $value2 ?>"/><?php echo $value2 ?></td>
                        <?php } ?>
		</tr>
	</table>
	<span><?php echo $form->labelEx($model,'captcha_code'); ?></span><br/>
    <?php $this->widget('CCaptcha'); ?><br/>
    <?php echo $form->textField($model,'captcha_code'); ?><br/>
 <?php echo $form->checkBox($model,'agree_terms') ?><?php echo $form->labelEx($model,'agree_terms') ?></span>
    <br/>
    <?php echo $form->checkBox($model,'newsletter_status') ?><?php echo $form->labelEx($model,'newsletter_status') ?>
	<hr/>
	<input type="submit" value="Menjadi Member"/>
        <br/>
        <span>Sudah Menjadi Member? <a href="#">Klik disini untuk login</a></span>
</div>
<?php $this->endWidget(); ?>