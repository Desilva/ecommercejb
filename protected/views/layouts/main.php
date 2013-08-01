<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jualan Bisnis</title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Bootstrap/assets/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Bootstrap/assets/css/bootstrap-responsive.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/style.css" />
</head>

<body>
	<div id="primary" class="container">
    	<div class="row-fluid header">
        	<div class="span2">
            	<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/logo.png" width="200" height="200" />
            </div>
            <div class="span10" id="rightHeader">
            	<div class="row-fluid">
                    <?php
                        if(Yii::app()->user->isGuest)
                        {
                            $this->widget('LoginFormPortlet');
                        }
                        else
                        {
                            ?> 
                            <h4> Selamat Datang, <?php echo Yii::app()->user->first_name ?> (<a href="<?php echo Yii::app()->createUrl('//authentication/logout') ?>">logout</a>)</h4>
                    <?php }
                    ?>
                </div>
                
                <div class="row-fluid separator"></div>
                
            	<div class="row-fluid">
                	<div class="span12" id="menuDiv">
                    	<div class="navbar">
                        	<div class="navbar-inner Gradient-Style1">
                            	<ul class="nav">
                                    <li class="separator-Vertical"><a style="padding-right:30px" class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//home') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/asset/iconHome.png" width="25" /></a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//cariBisnisFranchise') ?>">Cari Bisnis Franchise</a></li>
                                     <?php
                                        if(!Yii::app()->user->isGuest){
                                     ?>
                                    <?php if(Yii::app()->user->checkAccess("member")){ ?>
                                        <li class="separator-Vertical"><a class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//account/index') ?>">Jual Bisnis Franchise</a></li>
                                        <li class="separator-Vertical"><a class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//account/beli') ?>">Akun Saya</a></li>
                                    <?php } else if(Yii::app()->user->checkAccess("admin")){ ?>
                                        <li class="separator-Vertical"><a class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//jbAdmin/') ?>">Setting Admin</a></li>
                                    <?php } ?>
                                    <?php
                                        }else{
                                    ?>
                                        <li class="separator-Vertical"><a class="Font-Color-White" href="#LoginForm_email">Jual Bisnis Franchise</a></li>
                                    <?php } ?>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//layananKami') ?>">Layanan Kami</a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//article') ?>">Artikel</a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//kontak') ?>">Kontak</a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//faq') ?>">Faq</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
        <!--Content-->
       	<div class="container content">
        	<?php echo $content; ?>
        </div>
       <!--End Content -->
    </div>
</body>
</html>