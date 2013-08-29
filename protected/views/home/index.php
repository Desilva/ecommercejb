<?php 
if(Yii::app()->user->isGuest && (isset($_GET['alert']) && $_GET['alert']==1)){ 
?>
	<script>
		alert("Silahkan melakukan login terlebih dahulu");
	</script>
<?php 
}
?>
<!--Start Slideshow---------------------------------------------------------------------------------------------------------->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Slideshow/css/bjqs.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/library/Slideshow/js/bjqs-1.3.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script>
    var baseUrl = '<?php echo Yii::app()->request->baseUrl ?>';
        jQuery(document).ready(function($) {
			$('#banner-slide').bjqs({
				animtype      : 'slide',
				height        : 300,
				width         : 705,
				responsive    : true,
				randomstart   : true,
			});	
			changeImageTerbaru();
			changeImageTerbaru_2();
        });	
	$(function() {
		$('#foo0').carouFredSel({
			prev: '#prev2',
			next: '#next2',
					
		});

	});
	
	$(function(){
		$('#foo1').carouFredSel({
			prev: '#prev2_2',
			next: '#next2_2',
		});
	});
	function changeImageRekomendasi(){
		document.getElementById('tab1_rekomendasi').className="span5 Gradient-Style1 Border-Radius-Style1 active";
		document.getElementById('tab1_terbaru').className="span3 Gradient-Style1 Border-Radius-Style1 nonActive";
		document.getElementById('img1').src="uploads/images/5/2.jpg";
		document.getElementById('img2').src="uploads/images/5/2.jpg";
		document.getElementById('img3').src="uploads/images/5/2.jpg";
		document.getElementById('img4').src="uploads/images/5/2.jpg";
		document.getElementById('img5').src="uploads/images/5/2.jpg";
		document.getElementById('img6').src="uploads/images/5/2.jpg";
		document.getElementById('img7').src="uploads/images/5/2.jpg";
		document.getElementById('img8').src="uploads/images/5/2.jpg";
		document.getElementById('img9').src="uploads/images/5/2.jpg";
		document.getElementById('img10').src="uploads/images/5/2.jpg";
		document.getElementById('img11').src="uploads/images/5/2.jpg";
		document.getElementById('img12').src="uploads/images/5/2.jpg";
		document.getElementById('img13').src="uploads/images/5/2.jpg";
	}
	function changeImageRekomendasi_2(){
		document.getElementById('img1_2').src="uploads/images/5/2.jpg";
		document.getElementById('img2_2').src="uploads/images/5/2.jpg";
		document.getElementById('img3_2').src="uploads/images/5/2.jpg";
		document.getElementById('img4_2').src="uploads/images/5/2.jpg";
		document.getElementById('img5_2').src="uploads/images/5/2.jpg";
		document.getElementById('img6_2').src="uploads/images/5/2.jpg";
		document.getElementById('img7_2').src="uploads/images/5/2.jpg";
		document.getElementById('img8_2').src="uploads/images/5/2.jpg";
		document.getElementById('img9_2').src="uploads/images/5/2.jpg";
		document.getElementById('img10_2').src="uploads/images/5/2.jpg";
		document.getElementById('img11_2').src="uploads/images/5/2.jpg";
		document.getElementById('img12_2').src="uploads/images/5/2.jpg";
		document.getElementById('img13_2').src="uploads/images/5/2.jpg";
	}
	
	function changeImageTerbaru(){
		document.getElementById('tab1_rekomendasi').className="span5 Gradient-Style1 Border-Radius-Style1 nonActive";
		document.getElementById('tab1_terbaru').className="span3 Gradient-Style1 Border-Radius-Style1 active";
		document.getElementById('img1').src="uploads/images/5/3.jpg";
		document.getElementById('img2').src="uploads/images/5/3.jpg";
		document.getElementById('img3').src="uploads/images/5/3.jpg";
		document.getElementById('img4').src="uploads/images/5/3.jpg";
		document.getElementById('img5').src="uploads/images/5/3.jpg";
		document.getElementById('img4').src="uploads/images/5/3.jpg";
		document.getElementById('img5').src="uploads/images/5/3.jpg";
		document.getElementById('img6').src="uploads/images/5/3.jpg";
		document.getElementById('img7').src="uploads/images/5/3.jpg";
		document.getElementById('img8').src="uploads/images/5/3.jpg";
		document.getElementById('img9').src="uploads/images/5/3.jpg";
		document.getElementById('img10').src="uploads/images/5/3.jpg";
		document.getElementById('img11').src="uploads/images/5/3.jpg";
		document.getElementById('img12').src="uploads/images/5/3.jpg";
		document.getElementById('img13').src="uploads/images/5/3.jpg";		
	}
	function changeImageTerbaru_2(){
		document.getElementById('img1_2').src="uploads/images/5/3.jpg";
		document.getElementById('img2_2').src="uploads/images/5/3.jpg";
		document.getElementById('img3_2').src="uploads/images/5/3.jpg";
		document.getElementById('img4_2').src="uploads/images/5/3.jpg";
		document.getElementById('img5_2').src="uploads/images/5/3.jpg";
		document.getElementById('img6_2').src="uploads/images/5/3.jpg";
		document.getElementById('img7_2').src="uploads/images/5/3.jpg";
		document.getElementById('img8_2').src="uploads/images/5/3.jpg";
		document.getElementById('img9_2').src="uploads/images/5/3.jpg";
		document.getElementById('img10_2').src="uploads/images/5/3.jpg";
		document.getElementById('img11_2').src="uploads/images/5/3.jpg";
		document.getElementById('img12_2').src="uploads/images/5/3.jpg";
		document.getElementById('img13_2').src="uploads/images/5/3.jpg";
	}
</script>
<style type="text/css" media="all">
	.list_carousel {
		background-color: #ccc;
		margin-left:5px;
		width: 360px;
	}
	.list_carousel ul {
		margin: 0;
		padding: 0;
		list-style: none;
		display: block;
		
	}
	.list_carousel li {
		font-size: 40px;
		color: #999;
		text-align: center;
		background-color: #eee;
		border: 5px solid #999;
		width: 50px;
		height: 50px;
		padding: 0;
		margin: 6px;
		display: block;
		float: left;
	}
	
	.active{
		cursor:auto;
	}
	
	.nonActive{
		cursor:pointer;
		
		
	}
	.nonActive:hover{
		text-decoration: none;
		border:solid 1px #000;
		-webkit-box-shadow: inset 1px 0 3px 3px rgba(0, 0, 0, 0.125);
			-moz-box-shadow: inset 1px 0 3px 3px rgba(0, 0, 0, 0.125);
          box-shadow: inset 1px 0 3px 3px rgba(0, 0, 0, 0.125);
	}
	.prev{
		cursor:pointer;
	}
	.next{
		cursor:pointer;
	}
</style>
<!--End Slideshow------------------------------------------------------------------------------------------------------------>
<div class="row-fluid">
	<div class="span7" style="margin-top:15px">
		<div class="row-fluid Gradient-Style1">
			<h4 class="Text-Align-Center">SITUS JUAL BELI BISNIS <font class="Font-Size-Large">TERBESAR</font> DI <font class="Font-Size-Large">INDONESIA</font></h4>
		</div>
		<div class="row-fluid">
			<div class="span12">
				 <div id="banner-slide">
					<ul class="bjqs">
						<?php foreach($slideshow as $value)
						{

							if($value->image != null || $value->image != "")
							{
						?>
							<li><a href="<?php echo Yii::app()->createUrl("//home/slideshowdetail/$value->id") ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slideshow/<?php echo $value->image ?>" style="width:100%; height:100%"></a></li>
						<?php } }?>
					</ul>
				</div>
			</div>
		</div>                	
	</div>
	<div class="span3" style="margin-top:15px">
		  <?php if(!empty($this->clips['sidebar'])) echo
				$this->clips['sidebar']?>
	</div>                
</div>
<div class="row-fluid">
	<div class="span12"></div>
</div>
<div class="row-fluid">
	<div class="span6 Gradient-Style4 padding-bottom-small">
		<div class="row-fluid">
			<div class="span12 Font-Size-Medium Text-Align-Center Div-Style-Header Gradient-Style3 Font-Color-White Border-Radius-Style1">BISNIS</div>
		</div>
		<form class="form-search" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari/') ?>">
			<div class="row-fluid">
				<div class="span6 padding-left-small">
					<?php echo CHtml::hiddenField('jenis', '1') ?>
					<?php
						echo CHtml::dropDownList('provinsi', 'id', CHtml::listData($provinsi, 'id', 'provinsi'), array(
									'prompt' => 'Pilih Provinsi',
									'class' => 'Input-Size-Medium Gradient-Style5',
						));
					?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6 padding-left-small">&nbsp;
					<?php
						echo CHtml::dropDownList('kategori', 'id', CHtml::listData($kategori, 'id', 'industri'), array(
									'prompt' => 'Pilih Kategori',
									'class' => 'Input-Size-Medium Gradient-Style5',
						));
					?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6 padding-left-small">
					<div class="row-fluid">
						<div class="span12"></div>
					</div>
					<div class="input-prepend">
						<?php echo CHtml::submitButton('Cari', array('submit' => array("/cariBisnisFranchise/cari/"),'class' => 'btn')); ?>
						<?php echo CHtml::textField('keyword','',array('class'=>'Input-Size-Small','placeholder'=>'Kata Kunci')); ?>
					</div>
				</div>
			</div>
		</form>
		<div class="row-fluid">
			<div class="span6 padding-left-small">
				<hr class="Line-Size-Medium" />
			</div>
		</div>
		<div class="row-fluid Div-Style-Content padding-left-verySmall2">
			<div class="span11 Text-Align-Center ">
				<div class="row-fluid">
					<div class=	"span12" style="border-bottom:solid 1px #999;">
						<div class="span3  active" id="tab1_terbaru" style="padding-top:5px" onClick="changeImageTerbaru()">
							Terbaru
						</div>
						<div class="span5 nonActive" style="margin-left:1px; padding-top:5px" id="tab1_rekomendasi" onClick="changeImageRekomendasi()">
							Rekomendasi
						</div>	
					</div>		
				</div>		
				<div class="row-fluid">
					<div class="span12 Solid-White" style="padding-bottom:25px; padding-top:25px;">
						<div class="span1">
							<div id="prev2" class="prev" style="margin-left:-10px; margin-top:15px">
								<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetLeft.png" width="20" height="20"/>
							</div>
						</div>
						<div class="span10">
							<div class='list_carousel'>
								<ul id='foo0'>
									<li><img id='img1' width='50' height='50'/></li>
									<li><img id='img2' width='50' height='50'/></li>
									<li><img id='img3' width='50' height='50'/></li>
									<li><img id='img4' width='50' height='50'/></li>
									<li><img id='img5' width='50' height='50'/></li>
									<li><img id='img6' width='50' height='50'/></li>
									<li><img id='img7' width='50' height='50'/></li>
									<li><img id='img8' width='50' height='50'/></li>
									<li><img id='img9' width='50' height='50'/></li>
									<li><img id='img10' width='50' height='50'/></li>
									<li><img id='img11' width='50' height='50'/></li>
									<li><img id='img12' width='50' height='50'/></li>
									<li><img id='img13' width='50' height='50'/></li>
								</ul>
								<div class='clearfix'></div>
							</div>
						
						
						</div>
						<div class="span1">
							<div id="next2" class="next" style="margin-left:5px; margin-top:15px">
								<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetRight.png" width="20" height="20"/>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	<div class="span6 Gradient-Style4 padding-bottom-small">
		<div class="row-fluid">
			<div class="span12 Text-Align-Center Font-Size-Medium Div-Style-Header Gradient-Style3 Font-Color-White  Border-Radius-Style1">FRANCHISE</div>
		</div>
		<form class="form-search" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari/') ?>">
			<div class="row-fluid"> 
				<div class="span6 padding-left-small">
					<?php echo CHtml::hiddenField('jenis', '2') ?>
					<?php
							echo CHtml::dropDownList('provinsi', 'id', CHtml::listData($provinsi, 'id', 'provinsi'), array(
									'prompt' => 'Pilih Provinsi',
									'class' => 'Input-Size-Medium Gradient-Style5',
									));
					?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6 padding-left-small">&nbsp;
					<?php
								echo CHtml::dropDownList('kategori', 'id', CHtml::listData($kategori, 'id', 'industri'), array(
									'prompt' => 'Pilih Kategori',
									'class' => 'Input-Size-Medium Gradient-Style5',
								));
								?>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span6 padding-left-small">
					<div class="row-fluid">
						<div class="span12"></div>
					</div>
					<div class="input-prepend">
							<?php echo CHtml::submitButton('Cari', array('submit' => array("/cariBisnisFranchise/cari/"),'class' => 'btn')); ?>
							<?php echo CHtml::textField('keyword','',array('class'=>'Input-Size-Small','placeholder'=>'Kata Kunci')); ?>
					</div>
				</div>
			</div>
		</form>
		<div class="row-fluid">
			<div class="span6 padding-left-small">
				<hr class="Line-Size-Medium" />
			</div>
		</div>
		<div class="row-fluid Div-Style-Content padding-left-verySmall2">
				<div class="span11 Text-Align-Center">
					<div class="row-fluid">
						<div class=	"span12 " style="border-bottom:solid 1px #999;">
							<div class="span3 Gradient-Style1 Border-Radius-Style1 active" id="tab1_terbaru" style="padding-top:5px" onClick="changeImageTerbaru()">
								Terbaru
							</div>
							<div class="span5 Gradient-Style1 Border-Radius-Style1 nonActive" style="margin-left:1px; padding-top:5px" id="tab1_rekomendasi" onClick="changeImageRekomendasi()">
								Rekomendasi
							</div>	
						</div>		
					</div>
				<div class="row-fluid  Solid-White">
					<div class="span12" style="padding-bottom:25px; padding-top:25px;">
						<div class="span1">
							<div id="prev2_2" class="prev" style="margin-left:-10px; margin-top:15px">
								<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetLeft.png" width="20" height="20"/>
							</div>
						</div>
						<div class="span10">
							<div class='list_carousel'>
								<ul id='foo1'>
									<li><img id='img1_2' width='50' height='50'/></li>
									<li><img id='img2_2' width='50' height='50'/></li>
									<li><img id='img3_2' width='50' height='50'/></li>
									<li><img id='img4_2' width='50' height='50'/></li>
									<li><img id='img5_2' width='50' height='50'/></li>
									<li><img id='img6_2' width='50' height='50'/></li>
									<li><img id='img7_2' width='50' height='50'/></li>
									<li><img id='img8_2' width='50' height='50'/></li>
									<li><img id='img9_2' width='50' height='50'/></li>
									<li><img id='img10_2' width='50' height='50'/></li>
									<li><img id='img11_2' width='50' height='50'/></li>
									<li><img id='img12_2' width='50' height='50'/></li>
									<li><img id='img13_2' width='50' height='50'/></li>
								</ul>			
							</div>
						</div>
						<div class="span1">
							<div id="next2_2" class="next" style="margin-left:5px; margin-top:15px">
								<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetRight.png" width="20" height="20"/>
							</div>
						</div>				
					</div>
				</div>
			</div>	
		</div>
	</div>
		</div>
	