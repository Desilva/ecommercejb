<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
        ));
?> 
<table width="579" id="loginTable">
    <tr>
        <td width="100"><a href="<?php echo Yii::app()->createUrl('//registrasi') ?>">Member Baru?</a></td>
        <td width="9">|</td>
        <td width="107"><a href="#"> Lupa Password</a></td>
        <td width="122"><?php echo $form->textField($model, 'email', array('placeholder' => 'Email','class'=>'textLoginNama')); ?></td>
        <td width="122"><?php echo $form->passwordField($model, 'password', array('placeholder' => 'Kata Sandi','class'=>'textLoginPassword')); ?></td>
        <td width="102"><?php echo CHtml::submitButton('Masuk', array('class' => 'styleSubmit1')); ?> </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="2" style="color:red;" align="right"><?php if($model->errors)echo "Invalid email/password" ?></td>
        <td colspan="3" align="right" style="padding-right:29px" ><div><?php echo $form->checkBox($model, 'rememberMe',array()); ?>Simpan Kata Sandi</div></td>
    </tr>
</table>   
<?php $this->endWidget(); ?>