<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jualan Bisnis</title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Bootstrap/assets/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Bootstrap/assets/css/bootstrap-responsive.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/style.css" />

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Bootstrap/assets/css/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Bootstrap/assets/css/uniform.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Bootstrap/assets/css/select2.css" />

		
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Bootstrap/assets/css/unicorn.main.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Bootstrap/assets/css/unicorn.grey.css" class="skin-color" />

<script type="text/javascript">

    $(document).ready(function(){
        jQuery('ul.nav li.dropdown').hover(function() {
        jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
      }, function() {
        jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
      });
    });
</script>
</head>

<body>
	<div id="primary" class="container">
    	<div class="row-fluid header">
        	<div class="span2">
            	<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/logo.png" width="200" height="200" style="margin-top:20px; margin-left:10px" />
            </div>
            <div class="span10" id="rightHeader">
				<div class="row-fluid">
                	<div class="span12"></div>
                </div>
            	<div class="row-fluid">
                    <?php
                        if(Yii::app()->user->isGuest)
                        {
                            $this->widget('LoginFormPortlet');
                        }
                        else
                        {
                            ?> 
                            
                    
							<div class="span12" id="loginDiv">
								<div class="span12">
									 <h5 class="Text-Align-Right"> Selamat Datang, <?php echo Yii::app()->user->first_name ?> (<a href="<?php echo Yii::app()->createUrl('//authentication/logout') ?>">logout</a>)</h4>
								<div class="separator-verySmall"></div>
								</div>
								
								
								
							</div>
					
					
					<?php }
                    ?>
                </div>
                
                <div class="row-fluid separator"></div>
                
            	<div class="row-fluid">
                	<div class="span12" id="menuDiv">
                    	<div class="navbar">
                        	<div class="navbar-inner Gradient-Style1 Border-Radius-Style1">
                            	<ul class="nav">
                                    <li class="separator-Vertical Border-Radius-Style2" style="margin-left:-19px; padding-left:10px;">
										<a style="padding-right:30px" class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//home') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/asset/iconHome.png" width="25" /></a>
									</li>
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
                                        <li class="separator-Vertical"><a class="Font-Color-White" href="#">Jual Bisnis Franchise</a></li>
                                    <?php } ?>
                                  <li class="separator-Vertical"><a class="Font-Color-White" href="<?php echo Yii::app()->createUrl('//layananKami') ?>">Layanan Kami</a></li>
                                    <li class="dropdown separator-Vertical">
                                        <a href="<?php echo Yii::app()->createUrl('//article') ?>" class="dropdown-toggle Font-Color-White" >
                                        Artikel
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl('//article?kategoriPembaca=franchisee') ?>">Franchisee</a></li>
                                            <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl('//article?kategoriPembaca=franchisor') ?>">Franchisor</a></li>
                                            <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl('//article?kategoriPembaca=penjualBisnis') ?>">Penjual Bisnis</a></li>
                                            <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl('//article?kategoriPembaca=pembeliBisnis') ?>">Pembeli Bisnis</a></li>
                                        </ul>
                                    </li>
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
       	<div class="container content padding-left-small">
        <div class="row-fluid">
		<div class="span11">
	<div class="span2 Top-Margin2">
		<div class="widget-box">
		<div class="widget-title">
						<span class="icon">
							<i class="icon-th"></i>
						</span>
						<h5>Jualan Bisnis</h5>
					</div>
					<div class="widget-content nopadding">
    	<table class="table">
        	<tr>
            	<td><a href="<?php echo Yii::app()->createUrl('//jbAdmin/kategori/') ?>">Kategori Bisnis</a></td>
            </tr>
            <tr>
            	<td><a href="<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/') ?>">Bisnis / Franchise</a></a></td>
            </tr>
            <tr>
            	<td><a href="<?php echo Yii::app()->createUrl('//jbAdmin/article/') ?>">Artikel</a></td>
            </tr>
            <tr>
            	<td><a href="<?php echo Yii::app()->createUrl('//jbAdmin/settings/') ?>">Settings</a></td>
            </tr>
            <tr>
            	<td><a href="<?php echo Yii::app()->createUrl('//jbAdmin/newsletter/') ?>">Newsletter</a></td>
            </tr>
        </table>
		</div>
		</div>
    </div>
        	<?php echo $content; ?>
			</div>
        </div>
        </div>
       <!--End Content -->
	   <div class="row-fluid">
		<div class="span12">
			<hr/>
			Copyright &copy 2013 JualBisnis <a href="<?php echo Yii::app()->createUrl('//privacyPolicy')?>">Privacy Policy</a>
		</div>
	</div>
    </div>
</body>
</html>
       
       