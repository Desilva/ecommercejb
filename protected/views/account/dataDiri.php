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
<?php echo $form->errorSummary($model); 
      if(isset($dataSaved))
      {
          echo "Data Berhasil Disimpan";
      }
      ?>

<div class="row-fluid">
	<!--<div class="span2 padding-top-small">
    	<?php //if(!empty($this->clips['sidebar'])) echo
                //            $this->clips['sidebar']?>
    </div>-->
		<div class="span2 styleBackground-SolidColor-Grey padding-top-small Top-Margin2" style="margin-left:-30px;">
		<?php if(!empty($this->clips['sidebar'])) echo
                            $this->clips['sidebar']?>
	</div>
    <div class="span9">
		<div><header style="font-size:30px; font-family:Calibri;">Form Data Diri</header><br style="clear:both"/></div><div style="margin-top:-35px;"></div>
        <div class="row-fluid Top-Margin3">
        	<div class="span12">
                <div class="row-fluid">
                	<div class="span12">
                    	<table>
                        	<tr>
                            	<th class="Text-Align-Left Font-Color-LightBlue" width="4%"><?php echo $form->labelEx($model,'email'); ?></th>
                                <td width="35%"><?php echo $form->textField($model,'email',array('readonly'=>'readonly')); ?></td>
                            </tr>
                            <tr>
                            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'password'); ?></th>
                                <td><?php echo $form->passwordField($model,'password'); ?>&nbsp; *kosongkan jika tidak ingin diubah</td>
                            </tr>
                            <tr>
                            	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'password_repeat'); ?></th>
                                <td><?php echo $form->passwordField($model,'password_repeat'); ?>&nbsp; *kosongkan jika tidak ingin diubah</td>
                            </tr>
                        </table>
                    </div
                <div class="container">
                	<div class="row-fluid">
                    	<div class="span12">
                        	<table>
                            	<tr>
                                	<th width="10%" class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'first_name'); ?></th>
                                    <td width="10%"><?php echo $form->textField($model,'first_name'); ?></td>                                    
                                    <th width="10%" class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'instansi'); ?></th>
                                    <td width="20%"><?php echo $form->textField($model,'instansi'); ?></td>
                                </tr>
                                <tr>
                                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'last_name'); ?></th>
                                    <td><?php echo $form->textField($model,'last_name'); ?></td>
                                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'income'); ?></th>
                                    <td><?php echo $form->textField($model,'income'); ?></td>
                                </tr>
                                <tr>
                                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'gender'); ?></th>
                                    <td><?php echo $form->radioButtonList($model,'gender',$jenis_kelamin,array('separator'=>'','labelOptions'=>array('style'=>'display:inline; margin-right: 10px;'))) ?></td>
                                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'office_address'); ?></th>
                                    <td><?php echo $form->textArea($model,'office_address'); ?></td>
                                </tr>
                                <tr>
                                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'address'); ?></th>
                                    <td><?php echo $form->textArea($model,'address'); ?></td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'office_phone'); ?></th>
                                    <td><?php echo $form->textField($model,'office_phone'); ?></td>
                                    <th></th>
                                    <td></td>
                                </tr>
                                <tr>
                                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'phone'); ?></th>
                                    <td><?php echo $form->textField($model,'phone',array('class'=>'styleText1')); ?></td>
                                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'religion'); ?></th>
                                    <td>
                                    	<?php echo $form->dropDownList($model,'religion',$agama,array('prompt'=>'Pilih Agama')); ?>
                                    </td>
                                </tr>
                                <tr>
                                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'handphone'); ?></th>
                                    <td><?php echo $form->textField($model,'handphone',array('class'=>'styleText1')); ?></td>
                                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'id_nationality'); ?></th>
                                    <td><?php echo $form->dropDownList($model,'id_nationality',CHtml::listData($negara,'id','country'),array('prompt'=>'Pilih Negara')); ?></td>
                                </tr>
                                <tr>
                                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'birth_place'); ?></th>
                                    <td><?php echo $form->dropDownList($model,'birth_place',$tempat_lahir,array('prompt'=>'Pilih Kota')); ?></td>
                                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'marital_status'); ?></th>
                                    <td><?php echo $form->dropDownList($model,'marital_status',$status_perkawinan,array('prompt'=>'Pilih Status')); ?></td>
                                </tr>
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
                                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'id_job'); ?></th>
                                    <td>
                                            <?php echo $form->dropDownList($model,'id_job',CHtml::listData($pekerjaan,'id','job'),array('prompt'=>'Pilih Status')); ?>
                                    </td>
                                </tr>
                                <tr>
            	<th colspan="4" class="Font-Color-DarkBlue">Isian Khusus Pembeli</th>
            </tr>
            <tr>
            	<td colspan="4" class="Font-Color-DarkBlue">Isikan data dibawah ini untuk mendapatkan bisnis yang sesuai dengan anda secara cepat</td>
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
                    <?php echo $form->dropDownList($model,'id_buyer_price',CHtml::listData($range_harga,'id','range_price'),array('prompt'=>'Pilih Range Harga')); ?>
                </td>
            </tr>
            <tr>
            	<th colspan="2" class="Font-Color-DarkBlue">Status Newsletter</th>
            </tr>
            <tr>
            	<td colspan="4">
                	<label class="checkbox inline Font-Color-LightBlue">
                    	<?php echo $form->checkBox($model,'newsletter_status') ?>Ya, saya ingin menerima newsletter dari JualanBisnis.com yang berisi berita promosi dan penawaran
                    </label>
                </td>
            </tr>
                                <tr>
                                	<td></td>
                                	<th><input type="submit" class="btn Gradient-Style1" value="Simpan" /></th>
                                </tr>	
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>