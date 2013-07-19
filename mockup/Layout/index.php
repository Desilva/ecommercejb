<?php
session_start();
//session_destroy();
if(isset($_SESSION['member'])){
	$classMenu="spanMenuLogin";
}else{
	$classMenu="spanMenu";
}
?>
<head>
<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
	<link rel="stylesheet" href="css/style.css" media="screen">
	<link href="css/assets/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="orbit-1.2.3.css">
		<script type="text/javascript" src="jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="jquery.orbit-1.2.3.js"></script>	
		
			
			     <style type="text/css">
			         .timer { display: none !important; }
			         div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
			    </style>
			
		
		
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit({
					"bullets" : true,
					"animation" :"horizontal-push"
					});
			});
		</script>
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured2').orbit({
					
					"animation" :"horizontal-push"
					});
			});
		</script>
</head>
<body>
	
<div id="primaryDiv">
	<div id="leftPrimaryDiv">
		<div style="width:165px; height:165px; margin-left:135px; margin-bottom:23px;">
        	<img src="images/logo.png" width="150" height="150">
        </div>
		<div id="sideBarDiv">
			<?php
				if($_GET['Sb']==1){
					include "sidebar".$_GET['page'].".php";
				}elseif($_GET['Sb']=="0"){
					echo " ";
				}else{
			?>
        	<table id="homeSidebar">
            	<tr >
            		<th id="titleSideBar"><h3 align="left">LATEST NEWS</h3></th>
            	</tr>
                <tr>
                	<td><strong>ARTIKEL</strong></td>
                </tr>
                <tr>
                	<td style="font-size:14px">Kemarin,Hari Ini dan Masa Depan<hr/></td>
                </tr>
                <tr>
                	<Td ><strong>TIPS</strong></Td>
                </tr>
                <tr>
                	<td style="font-size:14px;">Bermain Saham Sebagai Investasi<hr/></td>
                </tr>
                <tr>
                	<td><strong>TUTORIAL</strong></td>
                </tr>
                <tr>
                	<td style="font-size:14px;">Bagaimana Untuk Memulai?<hr/></td>
                </tr>
                <tr>
                	<td><strong>PETUNJUK TERBARU</strong></td>
                </tr>
                <tr>
                	<td style="font-size:14px;">Cara Registrasi Email Anda<hr/></td>
                </tr>
            </table>
			<?php
				}
			?>
        </div>
	</div>
	<div id="rightPrimaryDiv">
    	<div id="loginDiv">
        	<form method="post" action="login.php">
        		<table width="579" id="loginTable">
                	<tr>
                    	<td width="89"><a href="?page=register">Member Baru</a></td>
                        <td width="9">|</td>
                        <td width="107">Lupa Password</td>
                        <td width="122"><input id="textLoginNama" type="text" placeholder="Nama"/></td>
                        <td width="122"><input id="textLoginPassword" type="text" placeholder="Kata Sandi"/></td>
                        <td width="102"><input class="styleSubmit1" type="submit" value="Masuk"/></td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td></td>
                        <td></td>
                       
                    	<td colspan="2" align="right" style="padding-right:29px">
                        	<div>
                           		<input type="checkbox" id="checkbox5" class="css-checkbox" checked="checked"/>
								<label  for="checkbox5" name="checkbox2_lbl" class="css-label lite-blue-check">Simpan Kata Sandi</label>
                            </div>
                        </td>
                    	<td></td>
                    </tr>
                </table>
        	</form>
        </div>
        <div id="menuDiv">
        	<a href="index.php"><span id="leftSpanMenu"><img src="images/iconHome.png"/></span></a>
			<?php
			if(isset($_SESSION['member'])){
			?>
				<a href="?page=jualBisnisFranchise&&Sb=1"><span class="spanMenuLogin">Jual Bisnis/Franchise</span></a>
				<a href="?page=jualBisnisFranchise&&Sb=1&&subPage=beli"><span class="spanMenuLogin">Akun Saya</span></a>
            <?php
			}else{
			?>
            	<a href="#"><span class="spanMenu">Jual Bisnis/Franchise</span></a>
            <?php
			}
			?>
			<a href="?page=cariBisnisFranchise&&Sb=1">
				<span class="<?php echo $classMenu?>">Cari Bisnis/Franchise</span>
			</a>
            <a href="?page=layananKami&&Sb=0">
				<span class="<?php echo $classMenu?>"><label class="labelSpanMenu">Layanan Kami</label></span>
			</a>
            <a href="?page=artikel&&Sb=1">
				<span class="<?php echo $classMenu?>"><label class="labelSpanMenu">Artikel</label></span>
			</a>
            <a href="?page=kontak&&Sb=0">
				<span class="<?php echo $classMenu?>"><label class="labelSpanMenu">Kontak</label></span>
			</a>
            <a href="?page=faq&&Sb=0"><span id="rightSpanMenu" class="spanMenu"><label class="labelSpanMenu">FAQ</label></span></a>
        </div>
        <div id="content">
			<?php
				if(isset($_GET['page'])){
					include $_GET['page'].".php";
				}else{
					include "home.php";
				}
			?>
		<?php
			if(isset($_GET['page'])){
		?>
				<div style="background:url(images/footer.png); width:1350px; height:75px; margin-left:-390px;"></div>
    	<?php
			}
		?>
		</div>
    
    </div>

</div>
<script src="assets/js/jquery.js"></script>
    <script src="css/assets/js/bootstrap-transition.js"></script>
    <script src="css/assets/js/bootstrap-alert.js"></script>
    <script src="css/assets/js/bootstrap-modal.js"></script>
    <script src="css/assets/js/bootstrap-dropdown.js"></script>
    <script src="css/assets/js/bootstrap-scrollspy.js"></script>
    <script src="css/assets/js/bootstrap-tab.js"></script>
    <script src="css/assets/js/bootstrap-tooltip.js"></script>
    <script src="css/assets/js/bootstrap-popover.js"></script>
    <script src="css/assets/js/bootstrap-button.js"></script>
    <script src="css/assets/js/bootstrap-collapse.js"></script>
    <script src="css/assets/js/bootstrap-carousel.js"></script>
    <script src="css/assets/js/bootstrap-typeahead.js"></script>
</body>