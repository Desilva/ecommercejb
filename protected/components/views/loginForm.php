<div class="span12" id="loginDiv" style="margin-top:20px; margin-right:40px">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'htmlOptions' => array('class' => 'form-inline form-Right'),
    ));
    ?> 
    <div class="control-label" style="margin-right:49px">
        <a href="<?php echo Yii::app()->createUrl('//registrasi') ?>">Member Baru</a> | <a href="<?php echo Yii::app()->createUrl('//lupaPassword') ?>">Lupa Password </a>
        <?php echo $form->textField($model, 'email', array('placeholder' => 'Email', 'class' => 'input-medium','id'=>'EmailText','data-content'=>'Login Terlebih Dahulu','data-placement'=>'bottom')); ?>
        <?php echo $form->passwordField($model, 'password', array('placeholder' => 'Kata Sandi', 'class' => 'input-medium')); ?>
        <button type="submit" class="btn Gradient-Style2" />Masuk</button>
    </div>      	
    <div class="control-group" style="margin-right:10px">
        <div class="span7 Text-Align-Right Font-Color-Red"><?php if($error != '') echo $error ?></div>
        
		<div class="span3">
        <label class="checkbox">
            <?php echo $form->checkBox($model, 'rememberMe', array()); ?>Simpan Kata Sandi
        </label>
		</div>
    </div>
    <?php $this->endWidget(); ?>
</div>