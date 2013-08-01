<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="library/Bootstrap/assets/css/bootstrap.css" />
<link rel="stylesheet" href="library/Bootstrap/assets/css/bootstrap-responsive.css" />
<link rel="stylesheet" href="style/style.css" />
<script type="text/javascript">
	$('#myTab a').click(function (e) {
 		e.preventDefault();
  		$(this).tab('show');
	})
</script>
<!--Start Slideshow---------------------------------------------------------------------------------------------------------->
<link rel="stylesheet" href="library/Slideshow/css/bjqs.css" />
<script type="text/javascript" src="library/Slideshow/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="library/Slideshow/js/bjqs-1.3.min.js"></script>
<script>
        jQuery(document).ready(function($) {
          
          $('#banner-slide').bjqs({
            animtype      : 'slide',
            height        : 320,
            width         : 868,
            responsive    : true,
            randomstart   : true
          });
          
        });
      </script>
<!--End Slideshow------------------------------------------------------------------------------------------------------------>
</head>

<body>
	<div id="primary" class="container">
    	<div class="row-fluid header">
        	<div class="span2">
            	<img src="images/asset/logo.png" width="200" height="200" />
            </div>
            <div class="span10" id="rightHeader">
            	<div class="row-fluid">
                	<div class="span12" id="loginDiv">
                    	<form class="form-inline form-Right">
                        	<div class="control-label">
                            	<a href="?page=registrasi">Member Baru</a> | Lupa Password
                            	<input type="text" class="input-medium" placeholder="Username" />
                            	<input type="text" class="input-medium" placeholder="Password" />
                            	<button type="submit" class="btn Gradient-Style2" />Masuk</button>
                            </div>      	
                            <div class="control-group">
                            	<div class="span8"></div>
                            	<label class="checkbox">
                                	<input type="checkbox" />Remember Me ?
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="row-fluid separator"></div>
                
            	<div class="row-fluid">
                	<div class="span12" id="menuDiv">
                    	<div class="navbar">
                        	<div class="navbar-inner Gradient-Style1">
                            	<ul class="nav">
                                	<li class="separator-Vertical"><a style="padding-right:30px" class="Font-Color-White" href="index.php"><img src="images/asset/iconHome.png" width="25" /></a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="?page=cariBisnisFranchise">Cari Bisnis Franchise</a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="?page=akunSayaBeli">Akun Saya</a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="#">Jual Bisnis Franchise</a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="?page=layananKami">Layanan Kami</a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="?page=artikel">Artikel</a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="?page=kontak">Kontak</a></li>
                                    <li class="separator-Vertical"><a class="Font-Color-White" href="?page=faq">Faq</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
        <!--Content-->
       	<div class="container content">
        	<?php
				if(isset($_GET['page'])){
					include "content/" . $_GET['page'] . ".php";
				}else{
					include "content/home.php";
				}	
			?>
        </div>
       <!--End Content -->
    </div>
</body>


</html>