<div class="span12" id="loginDiv">
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
    <div class="control-label">
        <a href="<?php echo Yii::app()->createUrl('//registrasi') ?>">Member Baru</a> | <a href="<?php echo Yii::app()->createUrl('//lupaPassword') ?>">Lupa Password </a>
        <?php echo $form->textField($model, 'email', array('placeholder' => 'Email', 'class' => 'input-medium')); ?>
        <?php echo $form->passwordField($model, 'password', array('placeholder' => 'Kata Sandi', 'class' => 'input-medium')); ?>
        <button type="submit" class="btn Gradient-Style2" />Masuk</button>
    </div>      	
    <div class="control-group">
        <div class="span8"></div>
        <?php if($model->errors) echo "Invalid email/password" ?>
        <label class="checkbox">
            <?php echo $form->checkBox($model, 'rememberMe', array()); ?>Simpan Kata Sandi
        </label>
    </div>
    <?php $this->endWidget(); ?>
</div>