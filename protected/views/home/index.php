
<?php 
if(Yii::app()->user->isGuest && (isset($_GET['alert']) && $_GET['alert']==1)){ 
?>
	<script>
		alert("Silahkan melakukan login terlebih dahulu");
	</script>
<?php 
}
?>
        <script>
    $(document).on( "mouseenter", "[data-toggle='tooltip']", function(){
        
    } );   
             
            function loginFirst(e)
            {
                $('#EmailText').popover('destroy')
				$("#EmailText").popover('show');
                                $("#EmailText").focus();
            }
        </script>
        
        
<?php 
        $contentBusinessTerbaru ='';
        foreach($business_terbaru as $businessDetail)
        {
            $imageList = array_filter(explode(',',$businessDetail->image));
            if(!empty($imageList))
            {
                $imagePathNonThumb = Yii::app()->basePath.'/../uploads/images/'.$businessDetail->id_user.'/'.$imageList[0];
                $imagePathThumb = Yii::app()->basePath.'/../uploads/images/'.$businessDetail->id_user.'/thumbs/'.$imageList[0];
                if(file_exists($imagePathThumb))
                {
                    $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail->id_user.'/thumbs/'.$imageList[0];
                }
                else if(file_exists($imagePathNonThumb))
                {
                    $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail->id_user.'/'.$imageList[0];
                }
                else
                {
                    $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
                }
            }
            else
            {
                $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
            }

            if(!Yii::app()->user->isGuest)
            {
                $detailUrl = Yii::app()->createUrl("//cariBisnisFranchise/detail/$businessDetail->id");
            }
            else
            {
                $detailUrl = '#'; //redirect to login
            }
            
            if($detailUrl == '#')
            {
                $contentBusinessTerbaru .= "<li><a class=\"tooltipCarouselBusinessTerbaru\" onclick=\"loginFirst()\" data-toggle=\"tooltip\" title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a></li>";
            }
            else
            {
//                     $contentBusinessTerbaru .= "<li><a title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a></li>";
                $contentBusinessTerbaru .= "<li><a class=\"tooltipCarouselBusinessTerbaru\" data-toggle=\"tooltip\" title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a></li>";
            }
            
        }


        $contentBusinessRekomendasi ='';
        $i=0;
        foreach($business_rekomendasi as $businessDetail)
        {
            $i++;
            $imageList = array_filter(explode(',',$businessDetail['image']));
            if(!empty($imageList))
            {
//                $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail['id_user'].'/thumbs/'.$imageList[0];
                $imagePathNonThumb = Yii::app()->basePath.'/../uploads/images/'.$businessDetail['id_user'].'/'.$imageList[0];
                $imagePathThumb = Yii::app()->basePath.'/../uploads/images/'.$businessDetail['id_user'].'/thumbs/'.$imageList[0];
                if(file_exists($imagePathThumb))
                {
                    $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail['id_user'].'/thumbs/'.$imageList[0];
                }
                else if(file_exists($imagePathNonThumb))
                {
                    $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail['id_user'].'/'.$imageList[0];
                }
                else
                {
                    $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
                }
            }
            else
            {
                $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
            }

            if(!Yii::app()->user->isGuest)
            {
                $detailUrl = Yii::app()->createUrl("//cariBisnisFranchise/detail/".$businessDetail['id']);
            }
            else
            {
                $detailUrl = '#'; //redirect to login
            }
            $tooltipBusinessRekomendasiTitle = $businessDetail['nama'];
            
            if($detailUrl == '#')
            {
                 $contentBusinessRekomendasi .= "<li><a class=\"tooltipCarouselBusinessRekomendasi\" onclick=\"loginFirst()\" data-toggle=\"tooltip\" title=\"$tooltipBusinessRekomendasiTitle\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a></li>";
            }
            else
            {
                 $contentBusinessRekomendasi .= "<li><a class=\"tooltipCarouselBusinessRekomendasi\" data-toggle=\"tooltip\" title=\"$tooltipBusinessRekomendasiTitle\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a></li>";
            }
           

            if($i== 5)
            {
                break;
            }
        }
        
            $contentFranchiseTerbaru ='';
            foreach($franchise_terbaru as $businessDetail)
            {
                $imageList = array_filter(explode(',',$businessDetail->image));
                if(!empty($imageList))
                {
//                    $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail->id_user.'/thumbs/'.$imageList[0];
                    $imagePathNonThumb = Yii::app()->basePath.'/../uploads/images/'.$businessDetail->id_user.'/'.$imageList[0];
                    $imagePathThumb = Yii::app()->basePath.'/../uploads/images/'.$businessDetail->id_user.'/thumbs/'.$imageList[0];
                    if(file_exists($imagePathThumb))
                    {
                        $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail->id_user.'/thumbs/'.$imageList[0];
                    }
                    else if(file_exists($imagePathNonThumb))
                    {
                        $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail->id_user.'/'.$imageList[0];
                    }
                    else
                    {
                        $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
                    }
                }
                else
                {
                    $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
                }

                if(!Yii::app()->user->isGuest)
                {
                    $detailUrl = Yii::app()->createUrl("//cariBisnisFranchise/detail/$businessDetail->id");
                }
                else
                {
                    $detailUrl = '#'; //redirect to login
                }
                    if($detailUrl == '#')
                    {
                        $contentFranchiseTerbaru .= "<a class=\"tooltipCarouselFranchiseTerbaru\" onclick=\"loginFirst()\" data-toggle=\"tooltip\" title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a>";
                    }
                    else
                    {
                        $contentFranchiseTerbaru .= "<a class=\"tooltipCarouselFranchiseTerbaru\"  data-tip=\"Yay tooltip!\" data-toggle=\"tooltip\" title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a>";
                    }
                    
            }

            $contentFranchiseRekomendasi ='';
            $i=0;
            foreach($franchise_rekomendasi as $businessDetail)
            {
                $i++;
                $imageList = array_filter(explode(',',$businessDetail['image']));
                if(!empty($imageList))
                {
//                     $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail['id_user'].'/thumbs/'.$imageList[0];
                    $imagePathNonThumb = Yii::app()->basePath.'/../uploads/images/'.$businessDetail['id_user'].'/'.$imageList[0];
                    $imagePathThumb = Yii::app()->basePath.'/../uploads/images/'.$businessDetail['id_user'].'/thumbs/'.$imageList[0];
                    if(file_exists($imagePathThumb))
                    {
                        $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail['id_user'].'/thumbs/'.$imageList[0];
                    }
                    else if(file_exists($imagePathNonThumb))
                    {
                        $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail['id_user'].'/'.$imageList[0];
                    }
                    else
                    {
                        $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
                    }
                }
                else
                {
                    $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
                }

                if(!Yii::app()->user->isGuest)
                {
                    $detailUrl = Yii::app()->createUrl("//cariBisnisFranchise/detail/".$businessDetail['id']);
                }
                else
                {
                    $detailUrl = '#'; //redirect to login
                }
                
                $tooltipFranchiseRekomendasiTitle = $businessDetail['nama'];
                if($detailUrl == '#')
                {
                    $contentFranchiseRekomendasi .= "<a class=\"tooltipCarouselFranchiseRekomendasi\" onclick=\"loginFirst()\" data-toggle=\"tooltip\" title=\"$tooltipFranchiseRekomendasiTitle\" href=\"$detailUrl\"><img class=\"imageGadgetClient detail\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a>";
                }
                else
                {
                    $contentFranchiseRekomendasi .= "<a class=\"tooltipCarouselFranchiseRekomendasi\" data-toggle=\"tooltip\" title=\"$tooltipFranchiseRekomendasiTitle\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a>";
                }
                

                if($i== 5)
                {
                    break;
                }
            }
?>
<!--Start Slideshow---------------------------------------------------------------------------------------------------------->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Slideshow/css/bjqs.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/library/Slideshow/js/bjqs-1.3.min.js"></script>
<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery.carouFredSel-6.2.1-packed.js"></script>-->
<!-- bxSlider Javascript file -->
<script src="<?php echo Yii::app()->request->baseUrl ?>/library/bxslider4/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo Yii::app()->request->baseUrl ?>/library/bxslider4/jquery.bxslider.css" rel="stylesheet" />
<style>
    .greyedOut{
        color:black;
    }
</style>
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

    var imageSliderBusiness = $('#bxsliderBusiness').bxSlider({
        onSliderLoad:function(){
                $(function(){
                $(".tooltipCarouselBusinessTerbaru").tipTip();
                });
        },
        minSlides: 4,
        maxSlides: 5,
        slideWidth: 170,
        slideMargin: 10,
        auto:true,
        autoHover: true,
        pager:false,
        nextSelector:'#business_next_selector',
        prevSelector:'#business_prev_selector',
        prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetLeft.png" width="20" height="20"/>',
        nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetRight.png" width="20" height="20"/>',
        useCSS:false,
      });
      
      $('#tab_business_rekomendasi').click(function(e){
        e.preventDefault();
        changeToBusinessRekomendasi();
        imageSliderBusiness.reloadSlider({
              onSliderLoad:function(){
                $(function(){
                $(".tooltipCarouselBusinessRekomendasi").tipTip();
                });
            },
              minSlides: 4,
              maxSlides: 5,
              slideWidth: 170,
              slideMargin: 10,
              auto:true,
              autoHover: true,
              pager:false,
              nextSelector:'#business_next_selector',
              prevSelector:'#business_prev_selector',
              prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetLeft.png" width="20" height="20"/>',
              nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetRight.png" width="20" height="20"/>',
              useCSS:false,
        });
      });	
      
       $('#tab_business_terbaru').click(function(e){
        e.preventDefault();
        changeToBusinessTerbaru();
        imageSliderBusiness.reloadSlider({
            onSliderLoad:function(){
                $(function(){
                $(".tooltipCarouselBusinessTerbaru").tipTip();
                });
            },
              minSlides: 4,
              maxSlides: 5,
              slideWidth: 170,
              slideMargin: 10,
              auto:true,
              autoHover: true,
              pager:false,
              nextSelector:'#business_next_selector',
              prevSelector:'#business_prev_selector',
              prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetLeft.png" width="20" height="20"/>',
              nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetRight.png" width="20" height="20"/>',
              useCSS:false,
        });
      });
      
      
      var imageSliderFranchise = $('#bxsliderFranchise').bxSlider({
        onSliderLoad:function(){
                $(function(){
                $(".tooltipCarouselFranchiseTerbaru").tipTip();
                });
        },
        minSlides: 4,
        maxSlides: 5,
        slideWidth: 170,
        slideMargin: 10,
        auto:true,
        autoHover: true,
        pager:false,
        nextSelector:'#franchise_next_selector',
        prevSelector:'#franchise_prev_selector',
        prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetLeft.png" width="20" height="20"/>',
        nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetRight.png" width="20" height="20"/>',
        useCSS:false,
        
      });
      
      $('#tab_franchise_rekomendasi').click(function(e){
        e.preventDefault();
        changeToFranchiseRekomendasi();
        imageSliderFranchise.reloadSlider({
              onSliderLoad:function(){
                $(function(){
                $(".tooltipCarouselFranchiseRekomendasi").tipTip();
                });
        },
              minSlides: 4,
              maxSlides: 5,
              slideWidth: 170,
              slideMargin: 10,
              auto:true,
              autoHover: true,
              pager:false,
              nextSelector:'#franchise_next_selector',
              prevSelector:'#franchise_prev_selector',
              prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetLeft.png" width="20" height="20"/>',
              nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetRight.png" width="20" height="20"/>',
              useCSS:false,
        });
      });	
      
       $('#tab_franchise_terbaru').click(function(e){
        e.preventDefault();
        changeToFranchiseTerbaru();
        imageSliderFranchise.reloadSlider({
              onSliderLoad:function(){
                $(function(){
                $(".tooltipCarouselFranchiseTerbaru").tipTip();
                });
        },
              minSlides: 4,
              maxSlides: 5,
              slideWidth: 170,
              slideMargin: 10,
              auto:true,
              autoHover: true,
              pager:false,
              nextSelector:'#franchise_next_selector',
              prevSelector:'#franchise_prev_selector',
              prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetLeft.png" width="20" height="20"/>',
              nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/navGadgetRight.png" width="20" height="20"/>',
              useCSS:false,
        });
      });
      
 });
        
        function changeToBusinessTerbaru(){
            var imageList = '<?php echo $contentBusinessTerbaru ?>';
            $('#bxsliderBusiness').empty();
            $('#bxsliderBusiness').append(imageList);
            $('#tab_business_rekomendasi').removeClass();
            $('#tab_business_terbaru').removeClass();
            $('#tab_business_rekomendasi').addClass('span5 Gradient-Style4 Border-Radius-Style1 greyedOut');
            $('#tab_business_terbaru').addClass('span5 Gradient-Style1 Border-Radius-Style1 ');
                                                                    
        }
        
	function changeToBusinessRekomendasi(){
                var imageList = '<?php echo $contentBusinessRekomendasi ?>';
		$('#bxsliderBusiness').empty();
                $('#bxsliderBusiness').append(imageList);
                $('#tab_business_rekomendasi').removeClass();
                $('#tab_business_terbaru').removeClass();
                $('#tab_business_rekomendasi').addClass('span5 Gradient-Style1 Border-Radius-Style1');
                $('#tab_business_terbaru').addClass('span5 Gradient-Style4 Border-Radius-Style1 greyedOut');
		
	}
        
        function changeToFranchiseTerbaru(){
            var imageList = '<?php echo $contentFranchiseTerbaru ?>';
            $('#bxsliderFranchise').empty();
            $('#bxsliderFranchise').append(imageList);
            $('#tab_franchise_rekomendasi').removeClass();
            $('#tab_franchise_terbaru').removeClass();
            $('#tab_franchise_rekomendasi').addClass('span5 Gradient-Style4 Border-Radius-Style1 greyedOut');
            $('#tab_franchise_terbaru').addClass('span5 Gradient-Style1 Border-Radius-Style1 ');
                                                                    
        }
        
	function changeToFranchiseRekomendasi(){
                var imageList = '<?php echo $contentFranchiseRekomendasi ?>';
		$('#bxsliderFranchise').empty();
                $('#bxsliderFranchise').append(imageList);
                $('#tab_franchise_rekomendasi').removeClass();
                $('#tab_franchise_terbaru').removeClass();
                $('#tab_franchise_rekomendasi').addClass('span5 Gradient-Style1 Border-Radius-Style1');
                $('#tab_franchise_terbaru').addClass('span5 Gradient-Style4 Border-Radius-Style1 greyedOut');
		
	}
        
        

	
	
</script>

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
							<li><a href="<?php 
                                                                if($value->url_link != '' || $value->url_link != null)
                                                                {
                                                                    echo $value->url_link;
                                                                }
                                                                else
                                                                {
                                                                    echo Yii::app()->createUrl("//home/slideshowdetail/$value->id"); 
                                                                }
                                                                
                                                                
                                                                ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slideshow/<?php echo $value->image ?>" style="width:100%; height:100%"></a></li>
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
						<?php
							echo CHtml::dropDownList('rangeharga', 'id', CHtml::listData($rangeharga, 'id', 'range_price'), array(
										'prompt' => 'Range Harga',
										'class' => 'Input-Size-Small',
							));
						?>
						<!--<?php echo CHtml::textField('keyword','',array('class'=>'Input-Size-Small','placeholder'=>'Kata Kunci')); ?>-->
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
						<div class="span5 Gradient-Style1 Border-Radius-Style1" id="tab_business_terbaru" style="cursor:pointer; padding-top:5px">
							Terbaru
						</div>
						<div class="span5 Gradient-Style4 Border-Radius-Style1 greyedOut" style="cursor:pointer; margin-left:1px; padding-top:5px" id="tab_business_rekomendasi" >
							Rekomendasi
						</div>	
					</div>		
				</div>		
				<div class="row-fluid">
					<div class="span12 Solid-White" style="padding-bottom:25px; padding-top:25px;">
						<div class="span1">
							<div id="business_prev_selector" class="prev" style="margin-left:-4px; margin-top:25px">
                                                            
							</div>
						</div>
						<div class="span10">
								<ul id="bxsliderBusiness">
                                                                    <?php echo $contentBusinessTerbaru ?>
                                                                </ul>
						</div>
						<div class="span1">
							<div id="business_next_selector" class="next" style="margin-left:5px; margin-top:25px">
                                                            <span ></span>
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
							<?php
								echo CHtml::dropDownList('rangeharga', 'id', CHtml::listData($rangeharga, 'id', 'range_price'), array(
											'prompt' => 'Range Harga',
											'class' => 'Input-Size-Small',
								));
							?>
							<!--<?php echo CHtml::textField('keyword','',array('class'=>'Input-Size-Small','placeholder'=>'Kata Kunci')); ?>-->
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
							<div class="span5 Gradient-Style1 Border-Radius-Style1" id="tab_franchise_terbaru" style=" cursor:pointer; padding-top:5px">
								Terbaru
							</div>
							<div class="span5 Gradient-Style4 Border-Radius-Style1 greyedOut" style=" cursor:pointer; margin-left:1px; padding-top:5px" id="tab_franchise_rekomendasi">
								Rekomendasi
							</div>	
						</div>		
					</div>
				<div class="row-fluid  Solid-White">
					<div class="span12" style="padding-bottom:25px; padding-top:25px;">
						<div class="span1">
							<div id="franchise_prev_selector" class="prev" style="margin-left:-4px; margin-top:25px">
								
							</div>
						</div>
						<div class="span10">
							<ul id="bxsliderFranchise">
                                                                    <?php echo $contentFranchiseTerbaru ?>
                                                        </ul>
						</div>
						<div class="span1">
							<div id="franchise_next_selector" class="next" style="margin-left:5px; margin-top:25px">
								
							</div>
						</div>				
					</div>
				</div>
			</div>	
		</div>
	</div>
		</div>
	