<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
<!--	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->
        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.ad-gallery.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style_old.css" />
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery-1.9.1.min.js"></script>
  	<script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.slides.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.ad-gallery.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/tytabs.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/gadgets.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styleSlideshow.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/script.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/application.js"></script>	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="primaryDiv">
	<div class="headerDiv">
        	<div class="logoDiv"></div>
                <div class="rightHeader">
                        <div class="loginDiv">
                                <?php
                                        //not yet fully working, username and password not yet validated from database
                                        if (Yii::app()->user->isGuest)
                                        {
                                            $form=$this->beginWidget('CActiveForm', array(
                                            'id'=>'login-form',
                                            'action'=>Yii::app()->createUrl('//authentication/login'),
                                            'enableClientValidation'=>true,
                                            'clientOptions'=>array(
                                                'validateOnSubmit'=>true,
                                                ),
                                            ));
                                            if(!isset($model))
                                            {
                                                $model = new LoginForm;
                                            }
                                        ?> 
                                         <table>
                                            <tr>
                                                <td width="118"><a href="<?php echo Yii::app()->createUrl('//registrasi') ?>">Member Baru?</a></td>
                                                <td width="30">||</td>
                                                <td width="128"><a href="#">Lupa Password</a></td>
                                                <td align="center" width="128">Nama<br/><?php echo $form->textField($model,'email'); ?></td>
                                                <td align="center" width="128">Password<br/><?php echo $form->passwordField($model,'password'); ?></td>
                                                <td><?php echo CHtml::submitButton('Masuk'); ?> <?php echo $form->errorSummary($model); ?> </td>
                                            </tr>
                                        </table>   
                                  <?php $this->endWidget();} 
                                        else
                                        { ?> 
                                            <h3> Selamat Datang, <?php echo Yii::app()->user->name ?> (<a href="<?php echo Yii::app()->createUrl('//authentication/logout') ?>">logout</a>)</h3>
                                  <?php }
                                   
                                           
                                  ?>
                        </div>

                        <div class="menuDiv">
                                                <ul>
                                                    <li><a href="<?php echo Yii::app()->createUrl('//home') ?>">Beranda</a></li>
                                                    <li><a href="#">Cari Bisnis/Franchise</a></li>
                                                    <li><a href="<?php if(isset($_SESSION['username'])){ echo "#";}else{ echo "#";}?>">Jual Bisnis / Franchise</a></li>
                                                    <li><a href="#">Layanan Kami</a></li>
                                                    <li><a href="#">Artikel</a></li>
                                                    <li><a href="#">Kontak</a></li>
                                                    <li><a href="#">FAQ</a></li>
                                                </ul>
                        </div>
		</div>
        </div>
        <div class="contentDiv">
            <?php echo $content; ?>
        </div>
		
    </div>
    <div class="footer">
		&copy;2013 JualBisnis.com | <a href="#" title="Cek Aja Title nya" class="tooltip">Privacy and policy</a> | <a href="#">Term and condition</a>
    </div>

</body>
</html>