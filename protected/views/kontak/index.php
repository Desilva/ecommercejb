<?php
    $form = $this->beginWidget('CActiveForm', array(
      'id' => 'kontak-kami-form',
      'enableAjaxValidation' => false,
    ));
?>
<div class="contact-form">
	<div class="row-fluid">
		<div class="contact-header">
				HUBUNGI JUALANBISNIS.COM
		</div>
		<div class="contact-header-description">
			Jika Anda memiliki pertanyaan seputar JualanBisnis.com, mohon untuk mengunjungi Frequently Asked Question (FAQ) kami. Jika pertanyaan Anda belum terdaftar di FAQ kami, silakan isi form di bawah ini dan tim customer service kami akan segera menghubungi Anda.
		</div>
		<div class="contact-header-notes">
			<span class="font-blue">Catatan,</span> Jika Anda ingin infomasi lebih jelas tentang bisnis tertentu yang terdaftar di JualanBisnis.com, silahkan mengisi form di bawah ini dan klik tombol "kirim".
		</div>
	</div>
	<div class="row-fluid">
		<div class="contact-form-content">
			<div class="contact-row-input">
				<label><?php echo $form->labelEx($model,'nama') ?></label>
				<?php echo $form->textField($model,'nama',array('class'=>'contact-input')); ?>
			</div>
			<div class="contact-row-input">
				<label><?php echo $form->labelEx($model,'perusahaan') ?></label>
				<?php echo $form->textField($model,'perusahaan',array('class'=>'contact-input')); ?>
			</div>
			<div class="contact-row-input">
				<label><?php echo $form->labelEx($model,'email') ?></label>
				<?php echo $form->textField($model,'email',array('class'=>'contact-input')); ?>
			</div>
			<div class="contact-row-input">
				<label><?php echo $form->labelEx($model,'phone') ?></label>
				<?php 
                                if(Yii::app()->user->isGuest)
                                {
                                    echo $form->textField($model,'phone',array('class'=>'contact-input'));
                                }
                                else
                                {
                                    echo $form->textField($model,'phone',array('class'=>'contact-input','value'=>Yii::app()->user->handphone));
                                }
                                     ?>
			</div>
			<div class="contact-row-input">
				<label><?php echo $form->labelEx($model,'fax') ?></label>
				<?php echo $form->textField($model,'fax',array('class'=>'contact-input')); ?>
			</div>
			<div class="contact-row-input">
				<label><?php echo $form->labelEx($model,'subject') ?></label>
				<?php echo $form->textField($model,'subject',array('class'=>'contact-input')); ?>
			</div>
			<div class="contact-row-textarea">
				<label><?php echo $form->labelEx($model,'comment') ?></label>
				<?php echo $form->textArea($model,'comment',array('class'=>'contact-textarea')); ?>
			</div>
			<div class="contact-row-button">
				<button type="submit" class="contact-button">Kirim</button>
				<?php if(Yii::app()->user->hasFlash('error')): ?>
					<div class="flash-success">
						<?php echo Yii::app()->user->getFlash('error'); ?>
					</div>
				<?php endif; ?> 
			</div>
		</div>
		<div class="contact-additional-information">
			<div class="contact-information">
				<div class="contact-information-left">
					Telephone
				</div>
				<div class="contact-information-right">
					888.777.9892<br/>Senin - Jumat [8am to 5pm, WIB]
				</div>
			</div>
			<div class="contact-information">
				<div class="contact-information-left">
					Fax
				</div>
				<div class="contact-information-right">
					415.764.1622
				</div>
			</div>
			<div class="contact-information">
				<div class="contact-information-left">
					Alamat
				</div>
				<div class="contact-information-right">
					Postal Mail	 BizBuySell.com 
					185 Berry Street, Suite 4000 
					San Francisco, CA 94107
				</div>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div>