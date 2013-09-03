<div class="row-fluid">
	<div class="span12 Top-Margin2">
        <div class="span2">
        
        </div>
        <?php
            $form = $this->beginWidget('CActiveForm', array(
              'id' => 'kontak-kami-form',
              'enableAjaxValidation' => false,
            ));
        ?>
        <div class="span10">
			<div class="row-fluid">
				<div>
					<header style="font-size:30px; font-family:Calibri;">Hubungi JualanBisnis.com</header>
					<br style="clear:both"/>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span10 ">
					Jika Anda memiliki pertanyaan, masalah, atau saran silahkan hubungi kami 
					<p></p>
					<font class="Font-Size-Small"> 
						<font class="Font-Color-Red">Catatan</font>: Jika Anda ingin infomasi lebih jelas tentang bisnis tertentu yang terdaftar di JualanBisnis.com, silahkan mengisi form di bawah ini dan klik tombol "kirim"
					</font>
				</div>
			</div>
			
			<div class="row-fluid Top-Margin2">
				<div class="span6 separator-Vertical">
					
				<!--<div style="margin-top:-35px;">
				</div>-->
					<p><?php echo $form->errorSummary($model) ?></p>
					<table>
						<tr>
							<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'nama') ?></th>
							<td><?php echo $form->textField($model,'nama') ?></td>
						</tr>
						<tr>
							<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'perusahaan') ?></th>
							<td><?php echo $form->textField($model,'perusahaan') ?></td>
						</tr>
						<tr>
							<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'email') ?></th>
							<td><?php echo $form->textField($model,'email') ?></td>
						</tr>
						<tr>
							<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'phone') ?></th>
							<td><?php echo $form->textField($model,'phone') ?></td>
						</tr>
						<tr>
							<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'fax') ?></th>
							<td><?php echo $form->textField($model,'fax') ?></td>
						</tr>
						<Tr>
							<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'subject') ?></th>
							<td><?php echo $form->textField($model,'subject') ?></td>
						</Tr>
						<tr>
							<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'comment') ?></th>
							<td><?php echo $form->textArea($model,'comment') ?></td>
						</tr>
						<tr>
							<td></td>
							<td><button type="submit" class="btn Gradient-Style1">Kirim</button></td>
						</tr>
					</table>
					<?php if(Yii::app()->user->hasFlash('error')): ?>
					<div class="flash-success">
						<?php echo Yii::app()->user->getFlash('error'); ?>
					</div>
				<?php endif; ?> 
			</div>
			<div class="span6 Text-Align-Right">
				<table>
					<tr>
						<Th>Telephone</th>
						<td>888.777.9892<br/>Monday - Friday 8am to 5pm, PST</td>
					</tr>
					<tr>
						<Th>Fax</th>
						<td>415.764.1622 </td>
					</tr>
					<tr>
						<th>Alamat</th>
						<td>Postal Mail	 BizBuySell.com 
							185 Berry Street, Suite 4000 
							San Francisco, CA 94107 
						</td>
					</tr>
				</table>
						  
 

	 



				<!--Contact Details Here
<!--            For further information,please contact us at<br>
            Rendy<br>
            (0812-73418448 / 021-32889456)<br>
            PT.JualanBisnis.com<br>
            Panin Life Center 1st Floor Suite 110<br>
            <img src="images/map.gif" width="350">-->
			</div>
        	</div>
			
			<?php $this->endWidget(); ?>
			
        </div>
    </div>
</div>