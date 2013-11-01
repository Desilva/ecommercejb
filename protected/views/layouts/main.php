<?php
$set=date_default_timezone_set('Asia/Krasnoyarsk');
?>
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
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/css/tipTip.css" />
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.tipTip.js">
</script>
<script type="text/javascript">
    $(document).ready(function(){
        jQuery('ul.nav li.dropdown').hover(function() {
        jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
      }, function() {
        jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
      });
	
		$('.detail').click(function(e){
                                e.preventDefault();
				$('#EmailText').popover('destroy')
				$("#EmailText").popover('show');
                                $("#EmailText").focus();
			});
			
		$("#EmailText").blur(function(){
				$("#EmailText").popover('destroy');			});
		
                $('.klikUntukLogin').click(function(e){
                                e.preventDefault();
                                $("#EmailText").focus();
			});
    });
    
 
	

    

</script>
</head>
<body>

	<div id="primary" class="container">
    	<div class="row-fluid header">
        	<div class="span2" id="leftHeader">
            	<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/logo.png" width="146" height="146" style="margin-top:20px; margin-left:100px" />
            </div>
            <div class="span9" id="rightHeader">
            	<div class="row-fluid">
                    <?php
                        if(Yii::app()->user->isGuest)
                        {
                            $this->widget('LoginFormPortlet');
                        }
                        else
                        {
                            ?> 
                            <!--<h4> Selamat Datang, <?php //echo Yii::app()->user->first_name ?> (<a href="<?php //echo Yii::app()->createUrl('//authentication/logout') ?>">logout</a>)</h4>-->
							<div class="span12" id="loginDiv">
								<div class="span12">
								
									 <h5 class="Text-Align-Right" style="margin-right:40px; margin-right:40px">Hi, <?php echo Yii::app()->user->first_name ?> |<a href="<?php echo Yii::app()->createUrl('//authentication/logout') ?>">logout</a></h5>
									<div class="separator-verySmall"></div>
								
								</div>	
								
								
							</div>
					
					<?php }
                    ?>
                </div>
                
            	<div class="row-fluid">
                	<div class="span12" id="menuDiv">
                    	<div class="navbar">
                        	<div class="navbar-inner Transparent-Navbar Noborder-Navbar">
                            	<ul class="nav">
                                    <li style="margin-left:-19px; padding-left:10px;" class="home-button">
                                    	<a style="padding-right:30px" class="Font-Color-Navbar" href="<?php echo Yii::app()->createUrl('//home') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/asset/iconHome.png" width="25" />
                                        </a>
                                        <div class="Border-Bottom-Navbar"></div>
                                    </li>
                                    <li>
                                        <a class="Font-Color-Navbar" href="<?php echo Yii::app()->createUrl('//cariBisnisFranchise') ?>">Cari Bisnis Franchise</a>
                                        <div class="Border-Bottom-Navbar"></div>
                                    </li>
                                     <?php
                                        if(!Yii::app()->user->isGuest){
                                     ?>
                                    <?php if(Yii::app()->user->checkAccess("member")){ ?>
                                        <li>
                                            <a class="Font-Color-Navbar" href="<?php echo Yii::app()->createUrl('//account/index') ?>">Jual Bisnis Franchise</a>
                                            <div class="Border-Bottom-Navbar"></div>
                                        </li>
                                        <li>
                                            <a class="Font-Color-Navbar" href="<?php echo Yii::app()->createUrl('//account/beli') ?>">Akun Saya</a>
                                            <div class="Border-Bottom-Navbar"></div>
                                        </li>
                                    <?php } else if(Yii::app()->user->checkAccess("admin")){ ?>
                                        <li>
                                            <a class="Font-Color-Navbar" href="<?php echo Yii::app()->createUrl('//jbAdmin/') ?>">Setting Admin</a>
                                            <div class="Border-Bottom-Navbar"></div>
                                        </li>
                                    <?php } ?>
                                    <?php
                                        }else{
                                    ?>
                                    <li>
                                        <a class="detail Font-Color-Navbar" href="#LoginForm_email">Jual Bisnis Franchise</a>
                                        <div class="Border-Bottom-Navbar"></div>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a class="Font-Color-Navbar" href="<?php echo Yii::app()->createUrl('//layananKami') ?>">Layanan Kami</a>
                                        <div class="Border-Bottom-Navbar"></div>
                                    </li>
                                    <li class="dropdown">
                                        <a href="<?php echo Yii::app()->createUrl('//article') ?>" class="dropdown-toggle Font-Color-Navbar" >
                                        Artikel
                                        </a>
                                        <div class="Border-Bottom-Navbar"></div>
                                        <ul class="dropdown-menu">
                                            <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl('//article?kategoriPembaca=franchisee') ?>">Franchisee</a></li>
                                            <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl('//article?kategoriPembaca=franchisor') ?>">Franchisor</a></li>
                                            <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl('//article?kategoriPembaca=penjual bisnis') ?>">Penjual Bisnis</a></li>
                                            <li><a tabindex="-1" href="<?php echo Yii::app()->createUrl('//article?kategoriPembaca=pembeli bisnis') ?>">Pembeli Bisnis</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="Font-Color-Navbar" href="<?php echo Yii::app()->createUrl('//kontak') ?>">Kontak</a>
                                        <div class="Border-Bottom-Navbar"></div>
                                    </li>
                                    <li>
                                        <a class="Font-Color-Navbar" href="<?php echo Yii::app()->createUrl('//faq') ?>">Faq</a>
                                        <div class="Border-Bottom-Navbar"></div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
        <!--Content-->
       	<div class="container content padding-left-small">
        	<?php echo $content; ?>
        </div>
		
       <!--End Content -->
	   <div class="row-fluid">
			<div class="span12" >
			<hr/>
			Copyright &copy 2013 JualanBisnis.com <a href="<?php echo Yii::app()->createUrl('//privacyPolicy')?>">[Privacy Policy</a><a href="<?php echo Yii::app()->createUrl('//home/sitemap')?>">|Sitemap</a><a href="<?php echo Yii::app()->createUrl('//home/disclaimer')?>">|Disclaimer</a><a href="<?php echo Yii::app()->createUrl('//SyaratDanKetentuan') ?>">|Syarat dan Ketentuan</a><a href="<?php echo Yii::app()->createUrl('//faq')?>">|FAQ]</a>
		</div>
	</div>
    </div>
	
</body>
</html>