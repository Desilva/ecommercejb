<?php if(!Yii::app()->user->isGuest){
	$classMenu="spanMenuLogin";
}else{
	$classMenu="spanMenu";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Jualan Bisnis</title>
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>-->
        <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    	<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery-1.5.1.min.js"></script>-->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="screen">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
<!--        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-transition.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-alert.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-modal.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-dropdown.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-scrollspy.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tab.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tooltip.js"></script>
        
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-button.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-collapse.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-carousel.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-typeahead.js"></script>-->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-popover.js"></script>
</head>
    
<body>
<div id="primaryDiv">
	<div id="leftPrimaryDiv">
	<div style="width:165px; height:165px; margin-left:135px; margin-bottom:23px;">
        	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" width="150" height="150">
        </div>
				<div id="sideBarDiv">
                       
        <div class="menuMember">
                <ul>
                        <li><a href="<?php echo Yii::app()->createUrl('//jbAdmin/kategori/') ?>">Kategori Bisnis</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/') ?>">Bisnis / Franchise</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('//jbAdmin/article/') ?>">Artikel</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('//jbAdmin/settings/') ?>">Settings</a></li>
                </ul>
        </div>
        </div>
	</div>
	<div id="rightPrimaryDiv">
    	<div id="loginDiv">
            <?php
            if(Yii::app()->user->isGuest)
            {
                $this->widget('LoginFormPortlet');
            }
            else
            {
            ?> 
                <h3> Selamat Datang, <?php echo Yii::app()->user->first_name?> (<a href="<?php echo Yii::app()->createUrl('//authentication/logout') ?>">logout</a>)</h3>
            <?php }
            ?>
        </div>
        <div id="menuDiv">
                
        	<a href="<?php echo Yii::app()->createUrl('//home') ?>"><span id="leftSpanMenu"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconHome.png"/></span></a>	
            <?php
			if(!Yii::app()->user->isGuest){
			?>
                                <?php if(Yii::app()->user->checkAccess("member")){ ?>
                                    <a href="<?php echo Yii::app()->createUrl('//account/index') ?>"><span class="spanMenuLogin">Jual Bisnis/Franchise</span></a>
                                    <a href="<?php echo Yii::app()->createUrl('//account/beli') ?>"><span class="spanMenuLogin">Akun Saya</span></a>
                                <?php } else if(Yii::app()->user->checkAccess("admin")){ ?>
                                    <a href="<?php echo Yii::app()->createUrl('//jbAdmin/') ?>"><span class="spanMenuLogin">Setting Admin</span></a>
                                <?php } ?>
            <?php
			}else{
			?>
            	<a href="#"><span class="spanMenu">Jual Bisnis/Franchise</span></a>
            <?php
			}
			?>
                <a href="<?php echo Yii::app()->createUrl('//cariBisnisFranchise') ?>"><span class="<?php echo $classMenu?>">Cari Bisnis/Franchise</span></a>
                <a href="#"><span class="<?php echo $classMenu?>"><label class="labelSpanMenu">Layanan Kami</label></span></a>
                <a href="<?php echo Yii::app()->createUrl('//article') ?>"><span class="<?php echo $classMenu?>"><label class="labelSpanMenu">Artikel</label></span></a>
                <a href="#"><span class="<?php echo $classMenu?>"><label class="labelSpanMenu">Kontak</label></span></a>
                <a href="#"><span id="rightSpanMenu" class="spanMenu"><label class="labelSpanMenu">FAQ</label></span></a>
        </div>
        <div id="content">
			<?php echo $content; ?>
    	</div>
    <!--<div style="background:url(<?php echo Yii::app()->request->baseUrl ?>/images/footer.png); width:1350px; height:75px; margin-left:-390px; clear:both"></div>-->
    </div>
</div>

</body>
</html>
       
       