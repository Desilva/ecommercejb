<style>
    th label{
        font-weight: bold;
    }
    
    input[type="radio"]{
        margin-top: -3px;
    }
</style>
<?php
    $form = $this->beginWidget('CActiveForm', array(
      'id' => 'user-index-form',
      'enableAjaxValidation' => false,
    ));
?>
<p><?php echo $form->errorSummary($model); ?></p>
<div class="row-fluid">
	<div class="span12">
    	<div class="span2"></div>
        <div class="span10 Font-Color-DarkBlue">
        	<h4>Informasi Member</h4>
        	Isi form dibawah ini untuk menjadi member JualanBisnis.com
        	<hr>
        </div>              
    </div>
</div>
<div class="row-fluid">
	<div class="span2"></div>
	<div class="span10">
    	<table>
        	<tr>
            	<th class="Text-Align-Left Font-Color-LightBlue" width="3%"><?php echo $form->labelEx($model,'email'); ?></th>
                <td width="14%"><?php echo $form->textField($model,'email'); ?></td>
           	</tr>
           	<tr>
            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'password'); ?></th>
           		<td><?php echo $form->passwordField($model,'password'); ?></td>
           	</tr>
           	<tr>
            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'password_repeat'); ?></th>
             	<td><?php echo $form->passwordField($model,'password_repeat'); ?></td>
          	</tr>
    </table>
    </div>
</div>
<div class="row-fluid">
	<div class="span2"></div>
	<div class="span10">
    	<table>
        	<tr>
                <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'first_name'); ?></th>
            	<td><?php echo $form->textField($model,'first_name'); ?></td>
            	<th width="20%" class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'instansi'); ?></th>
            	<td width="12%"><?php echo $form->textField($model,'instansi'); ?></td>
          	</tr>
            <tr>
            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'last_name'); ?></th>
                <td><?php echo $form->textField($model,'last_name'); ?></td>
                <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'income'); ?></th>
                <td><?php echo $form->textField($model,'income'); ?></td>
            </tr>
            <tr>
            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'gender'); ?></th>
                <td><?php echo $form->radioButtonList($model,'gender',$jenis_kelamin,array('separator'=>'','labelOptions'=>array('style'=>'display:inline; margin-right: 10px;'))) ?> </td>
                <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'office_address'); ?></th>
                <td><?php echo $form->textArea($model,'office_address'); ?></td>
            </tr>
            <tr>
            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'address'); ?></th>
                <td><?php echo $form->textArea($model,'address'); ?></td>
                <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'religion'); ?></th>
                <td>
                    <?php echo $form->dropDownList($model,'religion',$agama,array('prompt'=>'Pilih Agama')); ?>
                </td>
                
            </tr>
            <tr>
                <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'office_phone'); ?></th>
                <td><?php echo $form->textField($model,'office_phone'); ?></td>
                <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'marital_status'); ?></th>
                <td>
                    <?php echo $form->dropDownList($model,'marital_status',$status_perkawinan,array('prompt'=>'Pilih Status')); ?>
                </td>
            	

            </tr>
            <tr>
            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'handphone'); ?></th>
                <td><?php echo $form->textField($model,'handphone'); ?></td>
                <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'id_nationality'); ?></th>
                <td>
                    <?php echo $form->dropDownList($model,'id_nationality',CHtml::listData($negara,'id','country'),array('prompt'=>'Pilih Negara','class'=>'styleSelect2')); ?>
                </td>
            </tr>
            <tr>
            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'birth_place'); ?></th>
                <td><?php echo $form->dropDownList($model,'birth_place',$tempat_lahir,array('prompt'=>'Pilih Kota')); ?></td>
               <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'id_job'); ?></th>
                <td>
                    <?php echo $form->dropDownList($model,'id_job',CHtml::listData($pekerjaan,'id','job'),array('prompt'=>'Pilih Status')); ?>
                </td>
            <tr>
                <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'date_of_birth'); ?></th>
                <td>
                    <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'model'=>$model,
                                'attribute'=>'date_of_birth',
                                'options'=>array(
                                'showAnim'=>'fold',
                                'dateFormat'=>'yy-mm-dd',
                                 ),
                                 'htmlOptions'=>array(
                                     'class'=>'styleText1'
                                 ),
                          )); ?>
                </td>
            	
            </tr>
            <tr>
            	<th colspan="2" class="Font-Color-DarkBlue">Isian Khusus Pembeli</th>
            </tr>
            <tr>
            	<td colspan="2" class="Font-Color-DarkBlue">Isikan data dibawah ini untuk mendapatkan bisnis yang sesuai dengan anda secara cepat</td>
            </tr>	
            <tr>
            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'id_buyer_category'); ?></th>
                <td>
                    <?php echo $form->dropDownList($model,'id_buyer_category',CHtml::listData($kategori,'id','category'),array('prompt'=>'Pilih Kategori')); ?>
                </td>
            </tr>
            <tr>
            	<TH class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'id_buyer_location'); ?></TH>
                <td>
                    <?php echo $form->dropDownList($model,'id_buyer_location',CHtml::listData($lokasi,'id','city'),array('prompt'=>'Pilih Lokasi')); ?>              
                </td>
            </tr>
            <tr>
            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'id_buyer_price'); ?></th>
                <td>
                    <?php echo $form->dropDownList($model,'id_buyer_price',CHtml::listData($range_harga,'id','range_price'),array('prompt'=>'Pilih Range Harga','class'=>'styleSelect2')); ?>
                </td>
            </tr>
            <tr>
            	<th colspan="2" class="Font-Color-DarkBlue">
                	Dimana Anda mengetahui mengetahui JualanBisnis.com
                </th>
            </tr>
            <tr>
            	<td colspan="2">
                    <?php foreach($references1 as $value1){ ?>
                    <label class="checkbox inline Font-Color-LightBlue"><input type="checkbox" name="references[]" value="<?php echo $value1 ?>"/> <?php echo $value1 ?> </label>
                        <?php } ?>
<!--                	<label class="checkbox inline Font-Color-LightBlue">
                    	<input type="checkbox">Website
                    </label>
                    <label class="checkbox inline Font-Color-LightBlue">
                    	<input type="checkbox">Koran 
                    </label>
                    <label class="checkbox inline Font-Color-LightBlue">
                    	<input type="checkbox">Majalah
                    </label>
                    <label class="checkbox inline Font-Color-LightBlue">
                    	<input type="checkbox">Radio
                    </label>
                    <label class="checkbox inline Font-Color-LightBlue">
                    	<input type="checkbox">TV
                    </label>
                    <label class="checkbox inline Font-Color-LightBlue">
                    	<input type="checkbox">Teman
                    </label>-->
                </td>
           	</tr>
            <tr>
            	<td colspan="2">
 <?php foreach($references2 as $value2){ ?>
                    <label class="checkbox inline Font-Color-LightBlue"><input type="checkbox" name="references[]" value="<?php echo $value2 ?>"/> <?php echo $value2 ?> </label>
                        <?php } ?>
                </td>
            </tr>
            <tr>
            	<td colspan="2" class="Font-Color-DarkBlue">
                	Masukkan Karakter yang terlihat di bawah ini
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	 <?php $this->widget('CCaptcha'); ?><br/>
                        <?php echo $form->textField($model,'captcha_code'); ?><br/>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<label class="checkbox inline Font-Color-LightBlue">
                    	 <?php echo $form->checkBox($model,'agree_terms') ?>Ya, saya sudah membahas dan setuju dengan JualanBisnis Terms and Service
                    </label>
                </td>
            </tr>
            <tr>
            	<td colspan="2" class="Font-Color-LightBlue">
                	<button class="btn Gradient-Style1" type="submit">Menjadi Member</button><br>
                        Sudah menjadi member? <a href="#LoginForm_email">Klik disini untuk login</a>
                </td>
            </tr>
            <tr>
            	<td colspan="4">
                	<hr>
                </td>
            </tr>
            <tr>
            	<td colspan="3">
                	<label class="checkbox inline Font-Color-LightBlue">
                    	<?php echo $form->checkBox($model,'newsletter_status',array('checked'=>'checked')) ?>Ya, saya ingin menerima newsletter dari JualanBisnis.com yang berisi berita promosi dan penawaran
                    </label>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php $this->endWidget(); ?>