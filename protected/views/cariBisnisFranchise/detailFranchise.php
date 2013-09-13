<?php 
    //not finished
    Yii::app()->clientScript->registerMetaTag('mogt', null, null, array('property' => 'og:title'));
    Yii::app()->clientScript->registerMetaTag(Yii::app()->request->baseUrl.'/images/no-image.gif', null, null, array('property' => 'og:image'));
    Yii::app()->clientScript->registerMetaTag('Test', null, null, array('property' => 'og:description'));

?>
<?php 
if($message_kontak != ''){ 
?>
	<script>
		alert("<?php echo $message_kontak ?>");
	</script>
<?php 
}
?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.js"></script>
<div class="row-fluid">
	<div class="span11">
		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<div class="span6">
						<h4><?php echo $model->nama ?></h4>
					</div>
					<div class="span6 Text-Align-Right Top-Margin3" style="float:right;">
						<div class="span10">
							Bagikan 
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id") ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/facebookIcon.png" height="30" width="30" /></a>
							<a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id") ?>&text=JualanBisnis.com:" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/twitterIcon.png" height="30" width="30" /></a>
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id")) ?>&title=<?php echo urlencode($model->nama) ?>&summary=<?php echo urlencode(substr(strip_tags(html_entity_decode($model->deskripsi)),0,250)."...") ?>&source=<?php echo urlencode(Yii::app()->name) ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/inIcon.png" height="30" width="30" /></a> 
						</div>
						<div class="span2">
							<form>
								<?php
									if($return_location != '' && $return_kategori != '')
									{
										if($return_location == "beli")
										{
											 echo CHtml::button('Kembali', array('submit' => array("account/beli?kategori=$return_kategori"), 'class'=>'btn Gradient-Style1'));
										}
										else if($return_location == "watchlist")
										{
											echo CHtml::button('Kembali', array('submit' => array("account/watchlist?kategori=$return_kategori"), 'class'=>'btn Gradient-Style1'));
										}
										if($watchlist == '0')
										{
											echo CHtml::button('Watchlist', array('submit' => array("cariBisnisFranchise/watchlist/$model->id?kategori=$return_kategori&return=$return_location"),'class'=>'btn Gradient-Style1')); 
										}
										else
										{
											echo CHtml::button('Unwatch', array('submit' => array("cariBisnisFranchise/watchlist/$model->id?kategori=$return_kategori&return=$return_location"), 'class'=>'btn Gradient-Style1')); 
										}
									}
									else
									{
										if($watchlist == '0')
										{
											echo CHtml::button('Watchlist', array('submit' => array("cariBisnisFranchise/watchlist/$model->id"), 'class'=>'btn Gradient-Style1')); 
										}
										else
										{
											echo CHtml::button('Unwatch', array('submit' => array("cariBisnisFranchise/watchlist/$model->id"), 'class'=>'btn Gradient-Style1')); 
										}
									}
									
										
									?>
							</form>
						</div>
					</div>
					
				</div>
				<hr/>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12 Text-Align-Justify">
						<?php 
        /*
         * Loop through available image
         * if theres no image present in the database or the image count is just one
         * then it will just display static image of the image in the database or 
         * the no-image if there isn't any image data in the database
         * 
         * More than one image will be displayed using slideshow
         * if thumbnails of the image didn't exist the slideshow will use the full scaled image
         * and just resize it by specifying the width and height in <img src />
         * 
         */
        $image = array_filter(explode(',',$model->image));
        if(!empty($image)){ 
            if(count($image) > 1) 
            { ?>
                            <div class="ad-gallery" style=" width: 300px; float:left">
                            <div class="ad-image-wrapper">

                            </div>
                              <div class="ad-controls">
                              </div>
                              <div class="ad-nav">
                                  <div class="ad-thumbs">
                                      <ul class="ad-thumb-list">
                                       <?php 
                                            foreach($image as $imageSrc)
                                            {
                                                if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/' . $imageSrc))
                                                { ?>
                                                    <li>
                                                        <a href="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/<?php echo $imageSrc ?>">
                                                            <?php if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/thumbs/' . $imageSrc)) 
                                                                   { ?>
                                                                        <img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/thumbs/<?php echo $imageSrc ?>" width="50" height="50">
                                                             <?php } 
                                                                  else
                                                                  { ?>
                                                                      <img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/<?php echo $imageSrc ?>" width="50" height="50">
                                                            <?php } ?>
                                                        </a>
                                                    </li>
                                          <?php } 
                                                //else
                                                //{ ?>
<!--                                                    <li>
                                                        <a href="<?php // echo Yii::app()->request->baseUrl ?>/images/no-image.gif">
                                                            <img src="<?php // echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="50">
                                                        </a>
                                                    </li>-->
                                          <?php //}
                                            } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function(){
                                        var galleries = $('.ad-gallery').adGallery({
                                            loader_image: '<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/loader.gif',
                                            width:'300',
                                            height:'200',
                                            update_window_hash:false,
                                            slideshow: {
                                                enable: true,
                                                autostart: true,
                                                speed: 5000,
                                                start_label: 'Start',
                                                stop_label: 'Stop',
                                                // Should the slideshow stop if the user scrolls the thumb list?
                                                stop_on_scroll: false, 
                                              },
                                        });

                                    });
                                </script>
                   
      <?php }
            else
            { 
                if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/' . $image[0]))
                    { ?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/images/<?php echo $model->id_user?>/<?php echo $image[0] ?>" style="float:left; width:250px; height:250px; margin-right:25px"/>
              <?php } 
                    else
                    { ?>
                         <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" style="float:left" />   
              <?php } ?>
                     
      <?php } 
                   
        }
        else
        { ?>
                      <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" style="float:left" />   
        <?php } ?>
    	
        <?php if($model->deskripsi =='' || $model->deskripsi ==null) echo "Tidak ada deskripsi"; else echo $model->deskripsi ?>
                      	</div>
		</div>
		<div class="row-fluid" style="clear:both">
			<div class="span12"></div>
		</div>
            <?php
                if($model->id_user != Yii::app()->user->id)
                {
            ?>
                <div class="row-fluid">
			<div class="span12">
                             <?php
                                    $this->widget('zii.widgets.jui.CJuiAccordion', array(
                                    'panels' => array(
                                            'Kontak' => $this->renderpartial('//cariBisnisFranchise/kontak', array('model'=>$email,'business'=>$business,'business_owner'=>$businessOwner, 'settings'=>$settings), true),

                                    ),
                                    // additional javascript options for the accordion plugin
                                    'options' => array(
                                                    'collapsible' => true,
                                                    'active'=>($message_kontak != '')?0:false,
                                            ),
                                    ));
                            ?>
                        </div>
		</div>
                <?php }?>
            <div class="row-fluid">
        	<div class="span12">
				<div class="span8">
				<div class="widget-box">
						<div class="widget-title">
								<span class="icon">
								<i class="icon-align-justify"></i>									
							</span>
							<h5>Detil Informasi Franchise</h5>
						</div>
						<div class="widget-content nopadding">
							<form class="form-horizontal">
								<table class="table table-bordered table-striped table-hover">
									<tr>
										<td width="30%">Industri</td>
										<td><?php echo $model->idIndustri->industri ?></td>
									</tr>
									<tr>
										<td>Lokasi</td>
										<td><?php echo $model->idKota->city ?></td>
									</tr>
									<tr>
										<td>Harga</td>
										<td>Rp.<?php echo $model->harga ?></td>
									</tr>
									<tr>
										<td>Alasan Franchise Mau Bekerjasama</td>
										<td><?php echo $model->franchise_alasan_kerjasama ?></td>
									</tr>
									<tr>
										<td>Persyaratan Menjadi Franchise</td>
										<td><?php echo $model->franchise_dukungan_franchisor ?></td>
									</tr>			
								</table>
							</form>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="row-fluid">
						<div class="span12">
							<div class="widget-box">
						<div class="widget-title">
								<span class="icon">
								<i class="icon-align-justify"></i>									
							</span>
							<h5>File Pendukung</h5>
						</div>
						<div class="widget-content nopadding">
							<form class="form-horizontal">
								<?php 
                                                                    $docList = array_filter(explode(',',$model->dokumen));
                                                                    if(!empty($docList))
                                                                    { 
                                                                        foreach($docList as $dokumen)
                                                                        { 
                                                                            $dokumen_url = urlencode($dokumen);
                                                                            if(file_exists(Yii::app()->getBasePath() . "/../uploads/docs/".$model->id_user.'/'.$dokumen))
                                                                            {
                                                                            ?>
                                                                            <div class="control-group">
                                                                                <div class="span12" style="margin-left:10px">
                                                                                        <a href="<?php echo Yii::app()->createUrl("//download?docs=1&id=$model->id_user&name=$dokumen_url") ?>"><?php echo $dokumen; ?></a>
                                                                                </div>						
                                                                            </div>
                                                                <?php } } } ?>
							</form>
						</div>
					</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<div class="widget-box">
								<div class="widget-title">
									<span class="icon">
										<i class="icon-align-justify"></i>									
									</span>
									<h5>Bisnis/Franchise yang terkait</h5>
								</div>
								<div class="widget-content nopadding">
									<form class="form-horizontal">
										<?php
                                                                                    $bisnisTerkait = "";
                                                                                    $arrayImage = array();
                                                                                    $arrayUrl = array();
                                                                                    foreach($bisnis_terkait as $bisnis){ ?>
                                                                                    <?php 
                                                                                        $imageList = array_filter(explode(',',$bisnis->image));
                                                                                        
                                                                                        if(!empty($imageList))
                                                                                        {
                                                                                            $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$bisnis->id_user.'/thumbs/'.$imageList[0];
                                                                                            $arrayImage[] = $imageSource;
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                            $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
                                                                                            $arrayImage[] = $imageSource;
                                                                                        }
                                                                                        $arrayUrl[] = Yii::app()->createUrl("//cariBisnisFranchise/detail/$bisnis->id");
                                                                                    ?>

                                                                                <?php } ?> 
                                                                                <?php
                                                                                    if(isset($arrayImage[0]) || isset($arrayImage[1]))
                                                                                    {
                                                                                ?>
										<div class="control-group">
											<div class="span12" style="margin-left:30px; margin-top:10px">
												<div class="span6">
                                                                                                    <a href="<?php echo $arrayUrl[0] ?>"><img src="<?php echo $arrayImage[0] ?>" width="90" height="90" style="width:90px; height:90px"/></a>
												</div>
                                                                                                <?php if(isset($arrayImage[1])){ ?>
                                                                                                    <div class="span6">
                                                                                                       <a href="<?php echo $arrayUrl[1] ?>"><img src="<?php echo $arrayImage[1] ?>" width="90" height="90" style="width:90px; height:90px"/></a>
                                                                                                    </div>
                                                                                                <?php }?>
											</div>
										</div>
                                                                                <?php }?>
                                                                                <?php
                                                                                    if(isset($arrayImage[2]) || isset($arrayImage[3]))
                                                                                    {
                                                                                ?>
										<div class="control-group">
											<div class="span12" style="margin-left:30px; margin-top:10px">
												<div class="span6">
                                                                                                    <a href="<?php echo $arrayUrl[2] ?>"><img src="<?php echo $arrayImage[2] ?>" width="90" height="90" style="width:90px; height:90px"/></a>
												</div>
                                                                                                <?php if(isset($arrayImage[3])){ ?>
                                                                                                    <div class="span6">
                                                                                                       <a href="<?php echo $arrayUrl[3] ?>"><img src="<?php echo $arrayImage[3] ?>" width="90" height="90" style="width:90px; height:90px"/></a>
                                                                                                    </div>
                                                                                                <?php }?>
											</div>
										</div>
                                                                                <?php }?>
                                                                                <?php
                                                                                    if(isset($arrayImage[4]))
                                                                                    {
                                                                                ?>
                                                                                    <div class="control-group">
                                                                                            <div class="span12" style="margin-left:30px; margin-top:10px">
                                                                                                    <div class="span6">
                                                                                                            <a href="<?php echo $arrayUrl[4] ?>"><img src="<?php echo $arrayImage[4] ?>" width="90" height="90" style="width:90px; height:90px"/></a>
                                                                                                    </div>
                                                                                            </div>
                                                                                    </div>
                                                                                    <?php } ?>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>   
		
	
	</div>

	
	

</div>