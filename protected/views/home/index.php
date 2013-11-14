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
//                e.preventDefault();
                $('#login-email').popover('destroy')
				$("#login-email").popover('show');
                                $("#login-email").focus();
            }
        </script>
        
        
<?php 
        $contentBusinessTerbaru ='';
        $i = 0;
        $addValue = 40;
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
                $detailUrl = 'javascript:void(0)'; //redirect to login
            }
            
            if($detailUrl == 'javascript:void(0)')
            {
                $contentBusinessTerbaru .= "<li><a class=\"tooltipCarouselBusinessTerbaru\" onclick=\"loginFirst()\" data-toggle=\"tooltip\" title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:125px; height:83px;  \" /></a></li>";
                $i++;
            }
            else
            {
//                     $contentBusinessTerbaru .= "<li><a title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a></li>";
                $contentBusinessTerbaru .= "<li><a class=\"tooltipCarouselBusinessTerbaru\" data-toggle=\"tooltip\" title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:125px; height:83px;  \" /></a></li>";
                $i++;
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
                $detailUrl = 'javascript:void(0)'; //redirect to login
            }
            $tooltipBusinessRekomendasiTitle = $businessDetail['nama'];
            
            if($detailUrl == 'javascript:void(0)')
            {
                 $contentBusinessRekomendasi .= "<li><a class=\"tooltipCarouselBusinessRekomendasi\" onclick=\"loginFirst()\" data-toggle=\"tooltip\" title=\"$tooltipBusinessRekomendasiTitle\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:125px; height:83px;  \" /></a></li>";
            }
            else
            {
                 $contentBusinessRekomendasi .= "<li><a class=\"tooltipCarouselBusinessRekomendasi\" data-toggle=\"tooltip\" title=\"$tooltipBusinessRekomendasiTitle\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:125px; height:83px;  \" /></a></li>";
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
                    $detailUrl = 'javascript:void(0)'; //redirect to login
                }
                    if($detailUrl == 'javascript:void(0)')
                    {
                        $contentFranchiseTerbaru .= "<li><a class=\"tooltipCarouselFranchiseTerbaru\" onclick=\"loginFirst()\" data-toggle=\"tooltip\" title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:125px; height:83px;  \" /></a></li>";
                    }
                    else
                    {
                        $contentFranchiseTerbaru .= "<li><a class=\"tooltipCarouselFranchiseTerbaru\"  data-tip=\"Yay tooltip!\" data-toggle=\"tooltip\" title=\"$businessDetail->nama\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:125px; height:83px;  \" /></a></li>";
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
                    $detailUrl = 'javascript:void(0)'; //redirect to login
                }
                
                $tooltipFranchiseRekomendasiTitle = $businessDetail['nama'];
                if($detailUrl == 'javascript:void(0)')
                {
                    $contentFranchiseRekomendasi .= "<li><a class=\"tooltipCarouselFranchiseRekomendasi\" onclick=\"loginFirst()\" data-toggle=\"tooltip\" title=\"$tooltipFranchiseRekomendasiTitle\" href=\"$detailUrl\"><img class=\"imageGadgetClient detail\" src=\"$imageSource\" style=\"width:125px; height:83px;  \" /></a></li>";
                }
                else
                {
                    $contentFranchiseRekomendasi .= "<li><a class=\"tooltipCarouselFranchiseRekomendasi\" data-toggle=\"tooltip\" title=\"$tooltipFranchiseRekomendasiTitle\" href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:125px; height:83px; \" /></a></li>";
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
<script src="<?php echo Yii::app()->request->baseUrl ?>/library/bxslider4/jquery.bxslider.js"></script>
<!-- bxSlider CSS file -->
<link href="<?php echo Yii::app()->request->baseUrl ?>/library/bxslider4/jquery.bxslider.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/AnythingSlider/css/anythingslider.css">
<script src="<?php echo Yii::app()->request->baseUrl ?>/library/AnythingSlider/js/jquery.anythingslider.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/AnythingSlider/css/theme-mini-light-modified.css">
<script src="<?php echo Yii::app()->request->baseUrl ?>/library/AnythingSlider/js/jquery.anythingslider.fx.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/library/AnythingSlider/js/jquery.anythingslider.video.js"></script>
<style>
    .greyedOut{
        color:black;
    }
</style>
<script>
    var baseUrl = '<?php echo Yii::app()->request->baseUrl ?>';
    $(document).ready(function($) {
//			$('#banner-slide').bjqs({
//				animtype      : 'slide',
//				height        : 340,
//				width         : 705,
//				responsive    : true,
//				randomstart   : true,
//			});
        $('#mainSlider').anythingSlider({
            expand: true,
            resizeContents: true,
            hashTags : false,
            autoPlay : true,     
            autoPlayLocked : true,
            resumeDelay : 3000,
            resumeOnVisible  : false, 
            theme: 'mini-light',
            appendNavigationTo: '#mainSliderPages',
            navigationFormatter : function(index, panel){
               return "" + index; 
            }// This would have each tab with the text 'Panel #X' where X = index
        }).anythingSliderVideo();

        var imageSliderBusiness = $('#bxsliderBusiness').bxSlider({
            onSliderLoad:function(){
                    $(function(){
                    $(".tooltipCarouselBusinessTerbaru").tipTip();
                    });
            },
            minSlides: 1,
            maxSlides: 4,
            slideWidth: 153,
            slideMargin: 0,
            auto:true,
            autoHover: true,
            pager:false,
//            nextSelector:'#business_next_selector',
//            prevSelector:'#business_prev_selector',
//            prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-left.png" width="20" height="20"/>',
//            nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-right.png" width="20" height="20"/>',
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
                  minSlides: 1,
                  maxSlides: 5,
                  slideWidth: 153,
                  slideMargin: 0,
                  auto:true,
                  autoHover: true,
                  pager:false,
//                  nextSelector:'#business_next_selector',
//                  prevSelector:'#business_prev_selector',
//                  prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-left.png" width="20" height="20"/>',
//                  nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-right.png" width="20" height="20"/>',
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
                  minSlides: 1,
                  maxSlides: 5,
                  slideWidth: 153,
                  slideMargin: 0,
                  auto:true,
                  autoHover: true,
                  pager:false,
//                  nextSelector:'#business_next_selector',
//                  prevSelector:'#business_prev_selector',
//                  prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-left.png" width="20" height="20"/>',
//                  nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-right.png" width="20" height="20"/>',
                  useCSS:false,
            });
          });
      
      
          var imageSliderFranchise = $('#bxsliderFranchise').bxSlider({
            onSliderLoad:function(){
                    $(function(){
                    $(".tooltipCarouselFranchiseTerbaru").tipTip();
                    });
            },
            minSlides: 1,
            maxSlides: 5,
            slideWidth: 153,
            slideMargin: 0,
            auto:true,
            autoHover: true,
            pager:false,
//            nextSelector:'#franchise_next_selector',
//            prevSelector:'#franchise_prev_selector',
//            prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-left.png" width="20" height="20"/>',
//            nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-right.png" width="20" height="20"/>',
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
                  minSlides: 1,
                  maxSlides: 5,
                  slideWidth: 153,
                  slideMargin: 0,
                  auto:true,
                  autoHover: true,
                  pager:false,
//                  nextSelector:'#franchise_next_selector',
//                  prevSelector:'#franchise_prev_selector',
//                  prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-left.png" width="20" height="20"/>',
//                  nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-right.png" width="20" height="20"/>',
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
                  minSlides: 1,
                  maxSlides: 5,
                  slideWidth: 153,
                  slideMargin: 0,
                  auto:true,
                  autoHover: true,
                  pager:false,
//                  nextSelector:'#franchise_next_selector',
//                  prevSelector:'#franchise_prev_selector',
//                  prevText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-left.png" width="20" height="20"/>',
//                  nextText:'<img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/arrow-right.png" width="20" height="20"/>',
                  useCSS:false,
            });
          });
      
    });
        
    function changeToBusinessTerbaru(){
        var imageList = '<?php echo $contentBusinessTerbaru ?>';
        $('#bxsliderBusiness').empty();
        $('#bxsliderBusiness').append(imageList);
        $('#tab_business_rekomendasi').removeClass('div-slider-header-choose');
        $('#tab_business_terbaru').addClass('div-slider-header-choose');
                                                                
    }
        
	function changeToBusinessRekomendasi(){
        var imageList = '<?php echo $contentBusinessRekomendasi ?>';
		$('#bxsliderBusiness').empty();
        $('#bxsliderBusiness').append(imageList);
        $('#tab_business_terbaru').removeClass('div-slider-header-choose');
        $('#tab_business_rekomendasi').addClass('div-slider-header-choose');
		
	}
        
    function changeToFranchiseTerbaru(){
        var imageList = '<?php echo $contentFranchiseTerbaru ?>';
        $('#bxsliderFranchise').empty();
        $('#bxsliderFranchise').append(imageList);
        $('#tab_franchise_rekomendasi').removeClass('div-slider-header-choose');
        $('#tab_franchise_terbaru').addClass('div-slider-header-choose');
    }
        
	function changeToFranchiseRekomendasi(){
        var imageList = '<?php echo $contentFranchiseRekomendasi ?>';
		$('#bxsliderFranchise').empty();
        $('#bxsliderFranchise').append(imageList);
        $('#tab_franchise_terbaru').removeClass('div-slider-header-choose');
        $('#tab_franchise_rekomendasi').addClass('div-slider-header-choose');
	}
        
        

	
	
</script>

<!--End Slideshow------------------------------------------------------------------------------------------------------------>
<div class="row-fluid">
	<div class="span7" style="margin-top:15px">
		<div class="row-fluid tagline">
			<div class="tagline-text">Situs Jual Beli Bisnis Terbesar Di Indonesia</div>
		</div>
		<div class="row-fluid" style="height:340px; position:relative">
                    <style>
                        .thumbNav{
                            list-style-type: none;
                            font-size : 20px;
                            position:absolute; 
                            z-index:500; 
                           width: 100%;
                           text-align: center;
                           margin-left: 0px;
                        }
                        .thumbNav li{
                            display: inline;
                            padding-left: 5px;
                            left:0;
                            right:0;
                            
                            
                        }
                        #mainSliderPages
                        {
                            position:absolute;
                            top:290px; 
                            left:0px;
                            right:0px;
                            width:100%;
                            
                            
                        }
                        .thumbNav li a{
                            -moz-border-bottom-colors: none;
                            -moz-border-left-colors: none;
                            -moz-border-right-colors: none;
                            -moz-border-top-colors: none;
                            background-color: #F5F5F5;
                            background-image: linear-gradient(to bottom, #FFFFFF, #E6E6E6);
                            background-repeat: repeat-x;
                            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #B3B3B3;
                            border-image: none;
                            border-radius: 4px 4px 4px 4px;
                            border-style: solid;
                            border-width: 1px;
                            box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
                            color: #333333;
                            cursor: pointer;
                            display: inline-block;
                            font-size: 14px;
                            line-height: 20px;
                            margin-bottom: 0;
                            padding: 4px 12px;
                            text-align: center;
                            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
                            vertical-align: middle;
                            
                        }
                    </style>
                    <div id="mainSliderPages"></div>
					<div id="mainSlider">
						<?php 
                                                foreach($slideshow as $value)
						{

							if($value->image != null && $value->image != "")
							{
                                                            if(substr($value->image,-3) == "mp4" || substr($value->image,-3)== "ogg")
                                                            { ?>
                                                                <div><video controls>
                                                                     <source src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slideshow/<?php echo $value->image ?>" >
                                                                             Browser Anda Tidak Bisa Menampilkan Video Ini.</video>
                                                                </div>
                                                      <?php }
                                                            else
                                                            {
                                                                
                                                            
						?>
							<div><a href="<?php 
                                                                if($value->url_link != '' && $value->url_link != null)
                                                                {
                                                                    echo $value->url_link;
                                                                }
                                                                else
                                                                {
                                                                    echo Yii::app()->createUrl("//home/slideshowdetail/$value->id"); 
                                                                }
                                                                
                                                                ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slideshow/<?php echo $value->image ?>" style="width:100%; height:100%">

                                                            </a></div>
						<?php 
                                                
                                                } } }
                                                ?>
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
	<div class="span6 padding-bottom-small">
		<div class="row-fluid">
			<div class="span12 div-header">BISNIS</div>
		</div>
        <div class="row-fluid div-content">
    		<form class="form-search" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari/') ?>">
    			<div class="row-fluid div-row-input">
					<?php echo CHtml::hiddenField('jenis', '1') ?>
					<?php
						echo CHtml::dropDownList('provinsi', 'id', CHtml::listData($provinsi, 'id', 'provinsi'), array(
									'prompt' => 'Pilih Provinsi',
									'class' => 'div-input',
						));
					?>
    			</div>
    			<div class="row-fluid div-row-input">
					<?php
						echo CHtml::dropDownList('kategori', 'id', CHtml::listData($kategori, 'id', 'industri'), array(
									'prompt' => 'Pilih Kategori',
									'class' => 'div-input',
						));
					?>
    			</div>
    			<div class="row-fluid">
                    <div class="div-row-input-harga">
					<?php
						echo CHtml::dropDownList('rangeharga', 'id', CHtml::listData($rangeharga, 'id', 'range_price'), array(
									'prompt' => 'Range Harga',
									'class' => 'div-input-harga',
						));
					?>
                    </div>
					<!--<?php echo CHtml::textField('keyword','',array('class'=>'Input-Size-Small','placeholder'=>'Kata Kunci')); ?>-->

                    <?php echo CHtml::submitButton('Cari', array('submit' => array("/cariBisnisFranchise/cari/"),'class' => 'div-input-button')); ?>
    			</div>
    		</form>
    		<div class="row-fluid div-line">
    		</div>
    		<div class="row-fluid">
				<div class="row-fluid div-slider-header">
					<div class="div-slider-header-left div-slider-header-choose" id="tab_business_terbaru">
                        <div class="text-center font-white">
						  Terbaru
                        </div>
					</div>
					<div class="div-slider-header-right" id="tab_business_rekomendasi" >
						<div class="text-center font-white">
                          Rekomendasi
                        </div>
					</div>
				</div>		
				<div class="row-fluid div-slider-content">
					<div id="business_prev_selector" class="prev div-slider-prev"></div>
					<div class="div-slider-image">
						<ul id="bxsliderBusiness">
                            <?php echo $contentBusinessTerbaru ?>
                        </ul>
					</div>
					<div id="business_next_selector" class="next  div-slider-next">
					</div>
				</div>
    		</div>
        </div>
	</div>

	<div class="span6 padding-bottom-small">
		<div class="row-fluid">
            <div class="span12 div-header">FRANCHISE</div>
		</div>
        <div class="row-fluid div-content">
    		<form class="form-search" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari/') ?>">
    			<div class="row-fluid div-row-input">
					<?php echo CHtml::hiddenField('jenis', '2') ?>
					<?php
						echo CHtml::dropDownList('provinsi', 'id', CHtml::listData($provinsi, 'id', 'provinsi'), array(
								'prompt' => 'Pilih Provinsi',
								'class' => 'div-input',
						));
					?>
    			</div>
    			<div class="row-fluid div-row-input">
					<?php
    					echo CHtml::dropDownList('kategori', 'id', CHtml::listData($kategori, 'id', 'industri'), array(
    						'prompt' => 'Pilih Kategori',
    						'class' => 'div-input',
    					));
					?>
    			</div>
    			<div class="row-fluid">
					<div class="div-row-input-harga">
    					<?php
    						echo CHtml::dropDownList('rangeharga', 'id', CHtml::listData($rangeharga, 'id', 'range_price'), array(
    									'prompt' => 'Range Harga',
    									'class' => 'div-input-harga',
    						));
    					?>
                    </div>
					<!--<?php echo CHtml::textField('keyword','',array('class'=>'Input-Size-Small','placeholder'=>'Kata Kunci')); ?>-->
                    <?php echo CHtml::submitButton('Cari', array('submit' => array("/cariBisnisFranchise/cari/"),'class' => 'div-input-button')); ?>
    			</div>
    		</form>
    		<div class="row-fluid div-line">
            </div>
            <div class="row-fluid">
                <div class="row-fluid div-slider-header">
                    <div class="div-slider-header-left div-slider-header-choose" id="tab_franchise_terbaru">
						<div class="text-center font-white">
                          Terbaru
                        </div>
					</div>
					<div class="div-slider-header-right" id="tab_franchise_rekomendasi">
						<div class="text-center font-white">
                          Rekomendasi
                        </div>
					</div>	
				</div>
				<div class="row-fluid div-slider-content">
					<div id="franchise_prev_selector" class="prev div-slider-prev"></div>
					<div class="div-slider-image">
						<ul id="bxsliderFranchise">
                            <?php echo $contentFranchiseTerbaru ?>
                        </ul>
					</div>
					<div id="franchise_next_selector" class="next  div-slider-next"></div>
				</div>
			</div>	
		</div>
	</div>
</div>
	