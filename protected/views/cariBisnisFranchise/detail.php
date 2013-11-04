<?php 
    Yii::app()->clientScript->registerMetaTag($model->nama,null,null,array('property'=>'og:title'));
    Yii::app()->clientScript->registerMetaTag(Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id"),null,null,array('property'=>'og:url'));
    $deskripsi = $model->deskripsi;
    if($deskripsi != '')
    {
        $deskripsi = substr(strip_tags(html_entity_decode($model->deskripsi)),0,250)."...";
    }
    else
    {
        $deskripsi = "Tidak ada deskripsi.";
    }
    Yii::app()->clientScript->registerMetaTag($deskripsi,null,null,array('property'=>'og:description'));

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
    $image_list = array();
    if(!empty($image)){ 
            if(count($image) > 1) 
            { 
                foreach($image as $imageSrc)
                {
                    if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/' . $imageSrc))
                    { 
                        if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/' . $imageSrc)) 
                        {
                               $image_list[]= Yii::app()->createAbsoluteUrl("/../uploads/images/$model->id_user/$imageSrc");
                        } 
                    } 

                }
            }
            else
            { 
                    if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/' . $image[0]))
                    {
                        $image_list[]= Yii::app()->createAbsoluteUrl("/../uploads/images/$model->id_user/$image[0]");
                    } 
                    else
                    { 
                        $image_list[]= Yii::app()->createAbsoluteUrl("/../images/no-image.gif");
                    } 

            } 
    }
    else
    { 
        $image_list[]= Yii::app()->createAbsoluteUrl("/../images/no-image.gif");

    }
    
    foreach($image_list as $imgSrc)
    {
        Yii::app()->clientScript->registerMetaTag($imgSrc,null,null,array('property'=>'og:image'));
    }
?>
<style>
.ui-tooltip
{
    font-size:12pt;
}
</style>
<?php 
if(!Yii::app()->user->isGuest)
{
?>


<?php 
if(isset($_GET['msg'])){ 
?>
	<script>
		alert("<?php echo $_GET['msg'] ?>");
	</script>
<?php 
}
?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.js"></script>
<div class="row-fluid">
	<div class="span11">
		<div class="row-fluid">
			<div class="span12" >
				<div class="row-fluid">
					<div class="span6" >
						<h4><?php echo $model->nama ?></h4>
					</div>
					<div class="span6 Text-Align-Right Top-Margin3"  style="float:right; ">
						<div class="span10" >
							Bagikan 
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id") ?>" target="_blank"><img class="imageShareArtikel" style="cursor:pointer" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/facebookIcon.png" height="30" width="30" /> </a>
							<a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id") ?>&text=JualanBisnis.com:" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/twitterIcon.png" height="30" width="30" /></a>
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id")) ?>&title=<?php echo urlencode($model->nama) ?>&summary=<?php echo urlencode(substr(strip_tags(html_entity_decode($model->deskripsi)),0,250)."...") ?>&source=<?php echo urlencode(Yii::app()->name) ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/inIcon.png" height="30" width="30" /></a> 
                                                        <!--<a href="<?php echo Yii::app()->createUrl('//LinkedIn/share',array('title'=>$model->nama,'description'=>substr(strip_tags(html_entity_decode($model->deskripsi)),0,250)."...",'url'=>Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id"),'image'=>'http://jb.infolapangan.com/images/no-image.gif')) ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/inIcon.png" height="30" width="30" /></a>--> 
						</div>
						<div class="span2">
                                                    <form>
								<?php
                                                                        if(Yii::app()->user->checkAccess("admin"))
                                                                        {
                                                                            $hide_watchlist = 'none';
                                                                        }
                                                                        else
                                                                        {
                                                                            $hide_watchlist = 'visible';
                                                                        }
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

										if(!isset($return_location)){
											if($watchlist == '0')
											{
												echo CHtml::button('Watchlist', array('submit' => array("cariBisnisFranchise/watchlist/$model->id?kategori=$return_kategori&return=$return_location"),'class'=>'btn Gradient-Style1','style'=>"display:$hide_watchlist")); 
											}
											else
											{
												echo CHtml::button('Unwatch', array('submit' => array("cariBisnisFranchise/watchlist/$model->id?kategori=$return_kategori&return=$return_location"), 'class'=>'btn Gradient-Style1','style'=>"display:$hide_watchlist")); 
											}
										}
									}
									else
									{
										if($watchlist == '0')
										{
											echo CHtml::button('Watchlist', array('submit' => array("cariBisnisFranchise/watchlist/$model->id"), 'class'=>'btn Gradient-Style1','style'=>"display:$hide_watchlist")); 
										}
										else
										{
											echo CHtml::button('Unwatch', array('submit' => array("cariBisnisFranchise/watchlist/$model->id"), 'class'=>'btn Gradient-Style1','style'=>"display:$hide_watchlist")); 
										}
									}                        
								?>
                                                        </form>
						</div>
					</div>
                                    
				</div>
                            <div id='lightboxContent' >
                                        
                                    </div>
                            
				<hr style='clear:both'/>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12 Text-Align-Justify">
                            <?php
				$image = array_filter(explode(',',$model->image));
                                $image_for_social_share = array();
				if(!empty($image)){ 
					if(count($image) > 1) 
					{ 
				?>
						<div class="ad-gallery" style="float:left; margin-right:20px; margin-bottom:10px">
                            <div class="ad-image-wrapper"></div>
							<!--<div class="ad-controls"></div>-->
							<div class="ad-nav">
								<div class="ad-thumbs">
									<ul class="ad-thumb-list">
									<?php 
										foreach($image as $imageSrc)
										{
											if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/' . $imageSrc))
											{ 
									?>
												<li>
													<a href="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/<?php echo $imageSrc ?>">
													<?php if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/thumbs/' . $imageSrc)) 
                                                                                                                {
                                                                                                                           $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../uploads/images/$model->id_user/thumbs/$imageSrc");
                                                                                                                        ?>
																<img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/thumbs/<?php echo $imageSrc ?>" style="width:50px; height:50px">
													<?php 	} 
															else
															{ 
                                                                                                                            $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../uploads/images/$model->id_user/$imageSrc");
                                                                                                                            ?>
																<img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/<?php echo $imageSrc ?>" style="width:50px; height:50px">
                                                            <?php } ?>
													</a>
												</li>
									<?php 
											} 
                                                                                        //else
                                                                                    //{ 
									?>
<!--												<li>
													<a href="<?php // echo Yii::app()->request->baseUrl ?>/images/no-image.gif">
														<img src="<?php // echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="30">
													</a>
												</li>-->
                                    <?php 
											//}
                                        } 
									?>
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
					<?php 
					}
					else
					{ 
						if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/' . $image[0]))
                                                {
                                                    $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../uploads/images/$model->id_user/$image[0]");
					?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/images/<?php echo $model->id_user?>/<?php echo $image[0] ?>" style="float:left; width:250px; height:250px; margin-right:25px"/>
					<?php 
					} 
					else
                                        { 
                                            $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../images/no-image.gif");
					?>
                         <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" style="float:left" />   
					<?php 
					} 
					?>                     
				<?php } 
				}
				else
				{ 
                                    $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../images/no-image.gif");
                                    ?>
                      <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" style="float:left; margin-right:25px; margin-bottom:11px; width:250px" />   
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
                                                    'active'=>(isset($_GET['msg']))?0:false,
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
							<h5>Detil Informasi Bisnis</h5>
						</div>
						<div class="widget-content nopadding">
							<form class="form-horizontal">
								<table class="table table-bordered table-striped table-hover">
									<tr>
										<td width="30%">Kategori</td>
										<td><?php if($model->kepemilikan ==1)echo "Kepemilikan 100%"; else if($model->kepemilikan ==2)echo "Kepemilikan <100%"; ?></td>
									</tr>
									<tr>
										<td>Industri</td>
										<td><?php
                                                                                        if($model->id_industri != '' || $model->id_industri != null)
                                                                                        {
                                                                                            echo $model->idIndustri->industri;
                                                                                        }
                                                                                        
                                                                                     ?></td>
									</tr>
									<tr>
										<td>Lokasi</td>
										<td><?php
                                                                                        if($model->id_kota != '' || $model->id_kota != null)
                                                                                        {
                                                                                            echo $model->idKota->city;
                                                                                        }
                                                                                        
                                                                                    ?></td>
									</tr>
									<tr>
										<td>Jumlah Karyawan</td>
										<td><?php if($model->jumlah_karyawan != '' || $model->jumlah_karyawan != null)echo $model->jumlah_karyawan.' Orang'; ?></td>
									</tr>
									<tr>
										<td>Tahun didirikan</td>
										<td><?php echo $model->tahun_didirikan ?></td>
									</tr>
									<tr>
										<td>Harga</td>
										<td>Rp.<?php if($model->harga != '' && is_numeric($model->harga))
                                                                                            echo number_format($model->harga) ?></td>
									</tr>
									<tr>
										<td>Penjualan / Tahun</td>
										<td>Rp.<?php if($model->penjualan != '' && is_numeric($model->penjualan))
                                                                                            echo number_format($model->penjualan) ?></td>
									</tr>
									<tr>
										<td>HPP / Tahun</td>
										<td>Rp.<?php if($model->hpp != '' && is_numeric($model->hpp))
                                                                                            echo number_format($model->hpp) ?></td>
									</tr>
									<tr>
										<td>Laba bersih / Tahun</td>
										<td>Rp.<?php if($model->laba_bersih_tahun != '' && is_numeric($model->laba_bersih_tahun))
                                                                                            echo number_format($model->laba_bersih_tahun) ?></td>
									</tr>
									<tr>
										<td>Total Asset</td>
										<Td>Rp.<?php if($model->total_aset != '' && is_numeric($model->total_aset)) 
                                                                                            echo number_format($model->total_aset) ?></td>
									</tr>
									<Tr>
										<Td>Alasan Menjual Bisnis</td>
										<td><?php 
                                                                                    if($model->id_alasan_jual_bisnis != null || $model->id_alasan_jual_bisnis != '')
                                                                                    {
                                                                                        echo $model->idAlasanJualBisnis->alasan;
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                        echo $model->alasan_jual_bisnis_lainnya;
                                                                                    }
                                                                                 ?></td>
									</tr>
									<tr>
										<Td>Marjin laba bersih</td>
										<td><?php if($model->marjin_laba_bersih != '' && is_numeric($model->marjin_laba_bersih)) 
                                                                                            echo number_format($model->marjin_laba_bersih,2,'.','');?>  %</td>
									</tr>
									<tr>
										<td>Laba bersih / Asset</td>
										<Td><?php if($model->laba_bersih_aset != '' && is_numeric($model->laba_bersih_aset)) 
                                                                                            echo number_format($model->laba_bersih_aset,2,'.','') ?> %</td>
									</tr>
									<Tr>
										<td>Harga penawaran / Penjualan</td>
										<td><?php if($model->harga_penawaran_penjualan != '' && is_numeric($model->harga_penawaran_penjualan))
                                                                                            echo number_format($model->harga_penawaran_penjualan,2,'.','') ?></td>
									</tR>
									<tr>
										<Td>Harga penawaran / Laba bersih</td>
										<td><?php if($model->harga_penawaran_laba_bersih != '' && is_numeric($model->harga_penawaran_laba_bersih)) 
                                                                                            echo number_format($model->harga_penawaran_laba_bersih,2,'.','') ?></td>
									</tR>
									
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
                                                                                    
                                                                                    $arrayImage = array();
                                                                                    $arrayUrl = array();
                                                                                    $arrayTooltip = array();
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
                                                                                            $arrayTooltip[] = $bisnis->nama;
                                                                                            
                                                                                    ?>

                                                                                <?php } ?> 
                                                                                <?php
                                                                                    if(isset($arrayImage[0]) || isset($arrayImage[1]))
                                                                                    {
                                                                                ?>
										<div class="control-group">
											<div class="span12" style="margin-left:30px; margin-top:10px">
												<div class="span6">
                                                                                                    <a data-toggle="tooltip" title="<?php echo $arrayTooltip[0] ?>" target="_blank" href="<?php echo $arrayUrl[0] ?>"><img src="<?php echo $arrayImage[0] ?>" width="90" height="90" style="width:90px; height:90px"/></a>
												</div>
                                                                                                <?php if(isset($arrayImage[1])){ ?>
                                                                                                    <div class="span6">
                                                                                                       <a data-toggle="tooltip" title="<?php echo $arrayTooltip[1] ?>" target="_blank" href="<?php echo $arrayUrl[1] ?>"><img src="<?php echo $arrayImage[1] ?>" width="90" height="90" style="width:90px; height:90px"/></a>
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
                                                                                                    <a data-toggle="tooltip" title="<?php echo $arrayTooltip[2] ?>" target="_blank" href="<?php echo $arrayUrl[2] ?>"><img src="<?php echo $arrayImage[2] ?>" width="90" height="90" style="width:90px; height:90px"/></a>
												</div>
                                                                                                <?php if(isset($arrayImage[3])){ ?>
                                                                                                    <div class="span6">
                                                                                                       <a data-toggle="tooltip" title="<?php echo $arrayTooltip[3] ?>" target="_blank" href="<?php echo $arrayUrl[3] ?>"><img src="<?php echo $arrayImage[3] ?>" width="90" height="90" style="width:90px; height:90px"/></a>
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
                                                                                                            <a data-toggle="tooltip" title="<?php echo $arrayTooltip[4] ?>" target="_blank" href="<?php echo $arrayUrl[4] ?>"><img src="<?php echo $arrayImage[4] ?>"  width="90" height="90" style="width:90px; height:90px"/></a>
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

<?php } 
else
{ ?>
    <div class="row-fluid">
	<div class="span12 Font-Size-Medium Top-Margin2">
    	<div class="row-fluid">
        	<div class="span10">
            	<div><header style="font-size:16px;">Harap login terlebih dahulu untuk melihat halaman ini.</header><br style="clear:both"/></div><div style="margin-top:-35px;"></div>
            </div>
            
        </div>
         	
    </div>
</div>
<?php 
} ?>