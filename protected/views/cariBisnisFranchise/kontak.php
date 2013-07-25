<div style="height:600px;">
	<div style=""><header style="font-size:40px; font-family:Calibri;">Kontak <?php echo $business->nama ?></header></div>
    <div style="height:500px;">
    	<div id="kontakDiv">
        <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'business-contact-form',
                'enableAjaxValidation' => false,
            ));
        ?>
        <?php echo $form->errorSummary($model); ?>
       
            <?php echo $form->hiddenField($model,'id_business',array('value'=> $business->id));
                  echo $form->hiddenField($model,'tanggal',array('value'=> date('y-m-d')));
                  echo $form->hiddenField($model,'id_user',array('value'=> Yii::app()->user->id));
                  $harga_min = (int)$business->harga_min;
                  $harga_max = (int)$business->harga_max;
                  $average = (int)($harga_min + $harga_max)/2;
                  /* 
                   * CHANGE ALLOWED HARGA MAX WHEN THE SETTING IS AVAILABLE
                   * 
                   */
                  $harga_allowed = (int) 10000000;
                  if($average <= $harga_allowed)
                  {
                      echo $form->hiddenField($model,'status',array('value'=> '1'));
                  }
                  else
                  {
                      echo $form->hiddenField($model,'status',array('value'=> '0'));
                  }
            ?>
            	<table id="tableDiv">
            		<tr>
                        <td style="color:#0f75bd"><?php echo $form->labelEx($model,'nama_pengirim'); ?></td>
                    	<td><?php echo $form->textField($model,'nama_pengirim',array('class'=>'longText')); ?></td>
                	</tr>
                    <tr>
                    	<td style="color:#0f75bd"><?php echo $form->labelEx($model,'no_telp'); ?></td>
                        <td><?php echo $form->textField($model,'no_telp',array('class'=>'longText')); ?></td>
                    </tr>
                    <tr>
                    	<td style="color:#0f75bd"><?php echo $form->labelEx($model,'alamat_email'); ?></td>
                        <td><?php echo $form->textField($model,'alamat_email',array('class'=>'longText')); ?></td>
                    </tr>
                    <tr>
                    	<td style="color:#0f75bd"><?php echo $form->labelEx($model,'deskripsi'); ?></td>
                        <td><?php echo $form->textArea($model,'deskripsi',array('class'=>'styleTextarea1')); ?></td>
                    </tr>
            	</table>
            <input type="submit" value="Kirim" class='styleSubmit2'/>
        </div>
        <?php $this->endWidget() ?>
        <?php if($business->tampilkanKontak == 1){ ?>
            <div id="kontakDivMap">
                    <h3 style="color:#0f75bd">Kontak</h3>
                Untuk informasi lebih lanjut, harap hubungi kami di:<br/><p></p>
                <?php echo $business_owner->first_name ?><br/>
                <?php echo $business_owner->office_phone ?><br/>
                <?php echo $business->nama ?><br/>
                <?php echo $business->alamat ?><br/>
                            <p></p>
                            <p></p>
            </div>
        <?php }?>
    </div>
</div>