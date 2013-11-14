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
	if(!Yii::app()->user->isGuest) {
?>
<?php 
		if(isset($_GET['msg'])) { 
?>
	<script>
		alert("<?php echo $_GET['msg'] ?>");
	</script>
<?php 
		}
?>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.js"></script>
<div class="row-fluid detail-bisnis-top">
	<div class="span3">
<?php
		$image = array_filter(explode(',',$model->image));
	  $image_for_social_share = array();
		if(!empty($image)) { 
			if(count($image) > 1) { 
?>
		<div class="ad-gallery" style="float:left; margin-right:20px; margin-bottom:10px">
    	<div class="ad-image-wrapper"></div>
			<!--<div class="ad-controls"></div>-->
			<div class="ad-nav">
				<div class="ad-thumbs">
					<ul class="ad-thumb-list">
<?php 
				foreach($image as $imageSrc) {
					if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/' . $imageSrc)) { 
?>
						<li>
							<a href="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/<?php echo $imageSrc ?>">
<?php 
						if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/thumbs/' . $imageSrc)) { 
?>
								<img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/thumbs/<?php echo $imageSrc ?>" style="width:50px; height:50px">
<?php 	
						} else { 
?>
               	<img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/<?php echo $imageSrc ?>" style="width:50px; height:50px">
<?php 
						} 
?>
							</a>
						</li>
<?php 
					}
				}
?>
<!--												<li>
													<a href="<?php // echo Yii::app()->request->baseUrl ?>/images/no-image.gif">
														<img src="<?php // echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="30">
													</a>
												</li>-->
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
			} else { 
				if(file_exists(Yii::app()->basePath . '/../uploads/images/' . $model->id_user . '/' . $image[0])) {
        $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../uploads/images/$model->id_user/$image[0]");
?>
    <img src="<?php echo Yii::app()->baseUrl ?>/uploads/images/<?php echo $model->id_user?>/<?php echo $image[0] ?>" style="float:left; width:300px; height:225px;"/>
<?php 
				} else { 
      	$image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../images/no-image.gif");
?>
		<img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" height="225" style="float:left; width: 300px; height: 225px" />   
<?php 
				}
			} 
		} else { 
    $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../images/no-image.gif");
?>
    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" style="float:left; width:300px; height: 225px" />   
<?php 
		} 
?>
	</div>
	<div class="span7">
		<div class="row-fluid detail-bisnis-header">
			<div class=" detail-bisnis-title" >
				<?php echo $model->nama ?>
			</div>
			<div class="detail-bisnis-share">
					Bagikan:&nbsp;&nbsp;
        	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id") ?>" target="_blank"><img class="imageShareArtikel" style="cursor:pointer" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/facebook.png" height="22.27" width="22.27" /> </a>
					<a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id") ?>&text=JualanBisnis.com:" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/twitter.png" height="22.27" width="22.27" /></a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id")) ?>&title=<?php echo urlencode($model->nama) ?>&summary=<?php echo urlencode(substr(strip_tags(html_entity_decode($model->deskripsi)),0,250)."...") ?>&source=<?php echo urlencode(Yii::app()->name) ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/linkedin.png" height="22.27" width="22.27" /></a> 
        	<!--<a href="<?php echo Yii::app()->createUrl('//LinkedIn/share',array('title'=>$model->nama,'description'=>substr(strip_tags(html_entity_decode($model->deskripsi)),0,250)."...",'url'=>Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id"),'image'=>'http://jb.infolapangan.com/images/no-image.gif')) ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/inIcon.png" height="30" width="30" /></a>--> 
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
				echo CHtml::button('Kembali', array('submit' => array("account/beli?kategori=$return_kategori"), 'class'=>'detail-bisnis-watch'));
			}
			else if($return_location == "watchlist")
			{
				echo CHtml::button('Kembali', array('submit' => array("account/watchlist?kategori=$return_kategori"), 'class'=>'detail-bisnis-watch'));
			}

			if($watchlist == '0')
			{
				echo CHtml::button('Watchlist', array('submit' => array("cariBisnisFranchise/watchlist/$model->id?kategori=$return_kategori&return=$return_location"),'class'=>'detail-bisnis-watch','style'=>"display:$hide_watchlist")); 
			}
			else
			{
				echo CHtml::button('Unwatch', array('submit' => array("cariBisnisFranchise/watchlist/$model->id?kategori=$return_kategori&return=$return_location"), 'class'=>'detail-bisnis-watch','style'=>"display:$hide_watchlist")); 
			}
		}
		else
		{
			if($watchlist == '0')
			{
				echo CHtml::button('Watchlist', array('submit' => array("cariBisnisFranchise/watchlist/$model->id"), 'class'=>'detail-bisnis-watch','style'=>"display:$hide_watchlist")); 
			}
			else
			{
				echo CHtml::button('Unwatch', array('submit' => array("cariBisnisFranchise/watchlist/$model->id"), 'class'=>'detail-bisnis-watch','style'=>"display:$hide_watchlist")); 
			}
		}
?>
          </form>
			</div>                      
		</div>
    <div id='lightboxContent' ></div>
    <div class="row-fluid detail-bisnis-description">
    	<?php if($model->deskripsi =='' || $model->deskripsi ==null) echo "Tidak ada deskripsi"; else echo $model->deskripsi ?>
  	</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span7">
		<div class="detail-bisnis-informasi-header">
			Detail Informasi Bisnis
		</div>
		<div class="detail-bisnis-informasi-content">
			<table class="table table-bordered table-striped table-hover">
				<tr>
					<td width="30%">Kategori</td>
					<td><?php if($model->kepemilikan ==1)echo "Kepemilikan 100%"; else if($model->kepemilikan ==2)echo "Kepemilikan <100%"; ?></td>
				</tr>
				<tr>
					<td>Industri</td>
					<td>
<?php
if($model->id_industri != '' || $model->id_industri != null) { 
echo $model->idIndustri->industri;
}
?>
					</td>
				</tr>
				<tr>
					<td>Lokasi</td>
					<td>
<?php
if($model->id_kota != '' || $model->id_kota != null) {
echo $model->idKota->city;
}
?>
					</td>
				</tr>
				<tr>
					<td>Jumlah Karyawan</td>
					<td>
						<?php if($model->jumlah_karyawan != '' || $model->jumlah_karyawan != null)echo $model->jumlah_karyawan.' Orang'; ?>
					</td>
				</tr>
				<tr>
					<td>Tahun didirikan</td>
					<td><?php echo $model->tahun_didirikan ?></td>
				</tr>
				<tr>
					<td>Harga</td>
					<td><?php if($model->harga > 0 && is_numeric($model->harga)) echo "Rp.".number_format($model->harga); else echo "-" ?></td>
				</tr>
				<tr>
					<td>Penjualan / Tahun</td>
					<td><?php if($model->penjualan > 0 && is_numeric($model->penjualan)) echo "Rp.".number_format($model->penjualan); else echo "-" ?></td>
				</tr>
				<tr>
					<td>HPP / Tahun</td>
					<td><?php if($model->hpp > 0 && is_numeric($model->hpp)) echo "Rp.".number_format($model->hpp); else echo "-" ?></td>
				</tr>
				<tr>
					<td>Laba bersih / Tahun</td>
					<td id="laba_bersih_row"><?php if(is_numeric($model->laba_bersih_tahun))
                                                  {
                                                    if($model->laba_bersih_tahun > 0)
                                                    {
                                                        echo "Rp.".number_format($model->laba_bersih_tahun); 
                                                    }
                                                    else if($model->laba_bersih_tahun == 0)
                                                    {
                                                        echo "-";
                                                    }
                                                    else
                                                    {
                                                        echo "<span style='margin-left:-5px'>-</span>Rp.".number_format(abs($model->laba_bersih_tahun)); 
                                                     ?>
                                                        <script>
                                                            $('#laba_bersih_row').attr('style','color:red;');
                                                        </script>
                                                    <?php }
                                                    
                                                  }
                                                  else echo "-" ?>
                                        </td>
				</tr>
				<tr>
					<td>Total Asset</td>
					<Td><?php if($model->total_aset >0 && is_numeric($model->total_aset)) echo "Rp.".number_format($model->total_aset); else echo "-" ?></td>
				</tr>
				<Tr>
					<Td>Alasan Menjual Bisnis</td>
					<td><?php 
                if($model->id_alasan_jual_bisnis != null && $model->id_alasan_jual_bisnis != '')
                {
                    echo $model->idAlasanJualBisnis->alasan;
                }
                else
                {
                    echo $model->alasan_jual_bisnis_lainnya;
                }
             ?>
					</td>
				</tr>
				<tr>
					<Td>Marjin laba bersih</td>
					<td id="marjin_laba_bersih_row"><?php if(is_numeric($model->marjin_laba_bersih)) 
                                                  {
                                                    if($model->marjin_laba_bersih < 0)
                                                    {
                                                        echo "<span style='margin-left:-5px'>-</span>".number_format(abs($model->marjin_laba_bersih),2,'.','')."%";
                                                    ?>
                                                        <script>
                                                            $('#marjin_laba_bersih_row').attr('style','color:red;');
                                                        </script>
                                              <?php }
                                                    else
                                                    {
                                                        echo number_format($model->marjin_laba_bersih,2,'.','')."%";
                                                    }
                                                     
                                                  }
                                                    else echo "-"?>  </td>
				</tr>
				<tr>
					<td>Laba bersih / Asset</td>
					<td id="laba_bersih_asset_row"><?php if(is_numeric($model->laba_bersih_aset))
                                                {
                                                    if($model->laba_bersih_aset <0)
                                                    {
                                                        echo "<span style='margin-left:-5px'>-</span>".number_format(abs($model->laba_bersih_aset),2,'.','')."%"; 
                                                    ?>
                                                        <script>
                                                            $('#laba_bersih_asset_row').attr('style','color:red;');
                                                        </script>
                                              <?php } 
                                                    else
                                                    {
                                                       echo number_format($model->laba_bersih_aset,2,'.','')."%"; 
                                                    }
                                                    
                                                } else echo "-" ?> </td>
				</tr>
				<Tr>
					<td>Harga penawaran / Penjualan</td>
					<td><?php if(is_numeric($model->harga_penawaran_penjualan)) echo number_format($model->harga_penawaran_penjualan,2,'.',''); else echo "-" ?></td>
				</tR>
				<tr>
					<Td>Harga penawaran / Laba bersih</td>
					<td id="harga_penawaran_laba_bersih_row"><?php if(is_numeric($model->harga_penawaran_laba_bersih))
                                                {
                                                    if($model->harga_penawaran_laba_bersih < 0 )
                                                    {
                                                        echo "<span style='margin-left:-5px'>-</span>".number_format(abs($model->harga_penawaran_laba_bersih),2,'.','');
                                                    ?>
                                                         <script>
                                                            $('#harga_penawaran_laba_bersih_row').attr('style','color:red;');
                                                        </script>
                                              <?php }
                                                    else
                                                    {
                                                        echo number_format($model->harga_penawaran_laba_bersih,2,'.','');
                                                    }
                                                    
                                                
                                                } else echo "-" ?>
                                        </td>
				</tR>
				
			</table>
		</div>
	</div>
	<div class="span3">
		<div class="row-fluid">
			<div class="detail-bisnis-file-pendukung-header">
				File Pendukung
			</div>
			<div class="detail-bisnis-file-pendukung">
<?php 
  $docList = array_filter(explode(',',$model->dokumen));
  if(!empty($docList)) { 
    foreach($docList as $dokumen) { 
      $dokumen_url = urlencode($dokumen);
      if(file_exists(Yii::app()->getBasePath() . "/../uploads/docs/".$model->id_user.'/'.$dokumen)) {
?>
        <a href="<?php echo Yii::app()->createUrl("//download?docs=1&id=$model->id_user&name=$dokumen_url") ?>"><?php echo $dokumen; ?></a>
<?php 
			}
		}
	}
?>
			</div>
		</div>
		<div class="row-fluid">
			<div class="detail-bisnis-terkait-header">
				Bisnis/Franchise yang terkait
			</div>
			<div class="detail-bisnis-terkait-content">
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
				
      	<a data-toggle="tooltip" title="<?php echo $arrayTooltip[0] ?>" target="_blank" href="<?php echo $arrayUrl[0] ?>"><img src="<?php echo $arrayImage[0] ?>" width="110" height="82.5"/></a>
<?php if(isset($arrayImage[1])){ ?>
       	<a data-toggle="tooltip" title="<?php echo $arrayTooltip[1] ?>" target="_blank" href="<?php echo $arrayUrl[1] ?>"><img src="<?php echo $arrayImage[1] ?>" width="110" height="82.5"/></a>
<?php }?>
<?php }?>
<?php
    if(isset($arrayImage[2]) || isset($arrayImage[3]))
    {
?>
				<a data-toggle="tooltip" title="<?php echo $arrayTooltip[2] ?>" target="_blank" href="<?php echo $arrayUrl[2] ?>"><img src="<?php echo $arrayImage[2] ?>" width="110" height="82.5"/></a>
<?php
			if(isset($arrayImage[3])){ 
?>
       	<a data-toggle="tooltip" title="<?php echo $arrayTooltip[3] ?>" target="_blank" href="<?php echo $arrayUrl[3] ?>"><img src="<?php echo $arrayImage[3] ?>" width="110" height="82.5"/></a>
<?php 
			}
		}
?>
<?php
    if(isset($arrayImage[4]))
    {
?>
        <a data-toggle="tooltip" title="<?php echo $arrayTooltip[4] ?>" target="_blank" href="<?php echo $arrayUrl[4] ?>"><img src="<?php echo $arrayImage[4] ?>"  width="110" height="82.5"/></a>
<?php } ?>
		</div>
	</div>
</div>
<br />
<div class="row-fluid">
	<div class="detail-bisnis-kontak">
<?php
  	if($model->id_user != Yii::app()->user->id) {
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
		      'active'=>0,
		    ),
		  ));
?>
    	</div>
		</div>
<?php 
		}
?>
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