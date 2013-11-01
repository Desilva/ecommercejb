<div class="span12" id="loginDiv" style="margin-bottom:20px">
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
    <div class="control-label" id="login-forms">
        
        <?php echo $form->textField($model, 'email', array('placeholder' => 'Email', 'class' => 'input-medium','id'=>'login-email','data-content'=>'Login Terlebih Dahulu','data-placement'=>'bottom')); ?>
        <?php echo $form->passwordField($model, 'password', array('placeholder' => 'Kata Sandi', 'class' => 'input-medium','id'=>'login-password')); ?>
        <button type="submit" id="login-button" />Masuk</button>
    </div>     	
    <div class="control-group" id="login-form-below">
        <a href="<?php echo Yii::app()->createUrl('//registrasi') ?>" id="member-baru">Member Baru</a>
        <label class="checkbox" id="remember-me">
            <?php echo $form->checkBox($model, 'rememberMe', array()); ?>Simpan Kata Sandi
        </label>
        
        <a href="<?php echo Yii::app()->createUrl('//lupaPassword') ?>" id="forget-password">Lupa Sandi? </a>
    </div>
    <div class="control-group">
        <div class="span12 Text-Align-Right Font-Color-Red"><?php if($error != '') echo $error ?></div>
    </div>
    <?php $this->endWidget(); ?>
</div>