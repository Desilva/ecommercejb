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
                                                else
                                                { ?>
                                                    <li>
                                                        <a href="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif">
                                                            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="50">
                                                        </a>
                                                    </li>
                                          <?php }
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
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/images/<?php echo $model->id_user?>/<?php echo $image[0] ?>" width="300" height="300" style="float:left; width:300px; height:300px"/>
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
<<<<<<< HEAD
					
		
			</div>
		</div>
		<div class="row-fluid" style="clear:both">
			<div class="span12"></div>
		</div>
		<div class="row-fluid">
=======
        </div>
</div>
<div class="row-fluid" style="clear:both">
	<div class="span12"></div>
</div>
<div class="row-fluid">
	<div class="span12">
    	<div class="row-fluid">
        	<div class="span3">
            	<font class="Font-Color-DarkBlue">DETIL INFORMASI FRANCHISE</font>
            </div>
            <div class="span9">
            <?php
                if($model->id_user != Yii::app()->user->id)
                {
                    echo CHtml::button('Kontak', array('submit' => array("cariBisnisFranchise/kontakBisnis/$model->id"), 'class'=>'btn Gradient-Style1'));
                }
            ?>
            </div>
        </div>
        <div class="row-fluid">
        	<table>
            	<tr class="Tr-Size-Medium">
                	<td width="30%">Industri</td>
                    <td width="30%">:<?php echo $model->idIndustri->industri ?></td>
                   <td>File Pendukung</td>
                   <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                   <td>Lokasi</td>
                   <td>:<?php echo $model->idKota->city ?></td>
                   <td></td>
                   <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                   <td>Harga</td>
                   <td>:Rp.<?php echo $model->harga ?></td>
                   <td></td>
                   <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td>Alasan Franchise Mau Bekerjasama:</td>
                  <td rowspan='5' valign='top'>File Pendukung:
                           <?php 
                            $docList = array_filter(explode(',',$model->dokumen));
                            if(!empty($docList))
                            { 
                                foreach($docList as $dokumen)
                                { 
                                    $dokumen_url = urlencode($dokumen);
                                    ?>
                        <p><a href="<?php echo Yii::app()->createUrl("//download?docs=1&id=$model->id_user&name=$dokumen_url") ?>" ><?php echo $dokumen; ?></a></p>
                       <?php } } ?>
                        
                    </td>
                  
                </tr>
                <tr class="Tr-Size-Medium">
                  <td><?php echo $model->franchise_alasan_kerjasama ?></td>
                  
                </tr>
               <tr class="Tr-Size-Medium">
                  <td>Persyaratan Menjadi Franchise:</td>
                  
                </tr>
                <tr class="Tr-Size-Medium">
                  <td><?php echo $model->franchise_persyaratan ?></td>
                  
                </tr>
                <tr class="Tr-Size-Medium">
                  <td>Dukungan Franchise:</td>
                  
                </tr>
                <tr class="Tr-Size-Medium">
                  <td><?php echo $model->franchise_dukungan_franchisor ?></td>
                 
                </tr>
            </table>
        </div>
        <div class="row-fluid">
>>>>>>> d6f58c21f4c7f38056829d3d4ed1f17ed9a58a6a
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
										<td>Rp.<?php echo $model->harga_min ?> - Rp.<?php echo $model->harga_max ?></td>
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
								<div class="control-group">
									<div class="span12" style="margin-left:10px">
										<a href="#">SIUP.PDF</a>
									</div>						
								</div>
								<div class="control-group">
									<div class="span12" style="margin-left:10px">
										<a href="#">TOP.Docx</a>
									</div>						
								</div>
								<div class="control-group">
									<div class="span12" style="margin-left:10px">
										<a href="#">Laporan Keuangan</a>
									</div>
								</div>
								<div class="control-group">
									<div class="span12" style="margin-left:10px">
										<a href="#">Akte Perusahaan</a>
									</div>
								</div>	
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
									<h5>Bisnis yang terkait</h5>
								</div>
								<div class="widget-content nopadding">
									<form class="form-horizontal">
										<div class="control-group">
											<div class="span12" style="margin-left:30px; margin-top:10px">
												<div class="span6">
													<img src="#" width="90" height="90"/>
												</div>
												<div class="span6">
													<img src="#" width="90" height="90"/>
												</div>
											</div>
										</div>
										<div class="control-group">
											<div class="span12" style="margin-left:30px; margin-top:10px">
												<div class="span6">
													<img src="#" width="90" height="90"/>
												</div>
												<div class="span6">
													<img src="#" width="90" height="90"/>
												</div>
											</div>
										</div>
										<div class="control-group">
											<div class="span12" style="margin-left:30px; margin-top:10px">
												<div class="span6">
													<img src="#" width="90" height="90"/>
												</div>
												<div class="span6">
													<img src="#" width="90" height="90"/>
												</div>
											</div>
										</div>
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