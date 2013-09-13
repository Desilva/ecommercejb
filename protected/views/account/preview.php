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
				</div>
				<hr/>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12 Text-Align-Justify">
				<?php 
                                    if(Yii::app()->user->hasState('images'))
                                    {
                                        $image = Yii::app()->user->getState('images');
                                    }
                                    else
                                    {
                                        $image = array();
                                    }
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
											if(file_exists($imageSrc['path']))
											{ 
									?>
												<li>
													<a href="<?php echo Yii::app()->request->baseUrl ?>/uploads/tmp/<?php echo $model->id_user ?>/<?php echo $imageSrc['name'] ?>">
													<?php if(file_exists(Yii::app()->basePath . '/../uploads/tmp/' . $model->id_user . '/thumbs/' . $imageSrc['name'])) 
															{ ?>
																<img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/tmp/<?php echo $model->id_user ?>/thumbs/<?php echo $imageSrc['name'] ?>" style="width:50px; height:50px">
													<?php 	} 
															else
															{ ?>
																<img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/tmp/<?php echo $model->id_user ?>/<?php echo $imageSrc['name'] ?>" style="width:50px; height:50px">
                                                            <?php } ?>
													</a>
												</li>
									<?php 
											} 
											 
									?>
												
                                    <?php 
											
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
						if(file_exists($image[0]['path']))
                                                { 
					?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/tmp/<?php echo $model->id_user?>/<?php echo $image[0]['name'] ?>" style="float:left; width:250px; height:250px; margin-right:25px"/>
					<?php 
                                                } 
					else
                                        { 
					?>
                         <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" style="float:left" />   
					<?php 
					} 
					?>                     
				<?php } 
				}
				else
				{ ?>
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
							<h5>Detil Informasi Bisnis</h5>
						</div>
						<div class="widget-content nopadding">
							<form class="form-horizontal">
								<table class="table table-bordered table-striped table-hover">
									<tr>
										<td width="30%">Kategori</td>
										<td>Kepemilikan <?php if($model->kepemilikan ==1)echo '100%'; else if($model->kepemilikan ==2)echo '<100%'; ?></td>
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
										<td><?php if($model->jumlah_karyawan != '' || $model->jumlah_karyawan != null)echo $model->jumlah_karyawan.' Orang';else echo "Tidak ada data"; ?></td>
									</tr>
									<tr>
										<td>Tahun didirikan</td>
										<td><?php echo $model->tahun_didirikan ?></td>
									</tr>
									<tr>
										<td>Harga</td>
										<td>Rp.<?php echo $model->harga ?></td>
									</tr>
									<tr>
										<td>Penjualan / Tahun</td>
										<td>Rp.<?php echo $model->penjualan ?></td>
									</tr>
									<tr>
										<td>HPP / Tahun</td>
										<td>Rp.<?php echo $model->hpp ?></td>
									</tr>
									<tr>
										<td>Laba bersih / Tahun</td>
										<td>Rp.<?php echo $model->laba_bersih_tahun ?></td>
									</tr>
									<tr>
										<td>Total Asset</td>
										<Td>Rp.<?php echo $model->total_aset ?></td>
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
										<Td>Margin harga bersih</td>
										<td>Rp.<?php echo $model->marjin_laba_bersih ?></td>
									</tr>
									<tr>
										<td>Laba bersih / asset</td>
										<Td>Rp.<?php echo $model->laba_bersih_aset ?></td>
									</tr>
									<Tr>
										<td>Harga penawaran / penjualan</td>
										<td>Rp.<?php echo $model->harga_penawaran_penjualan ?></td>
									</tR>
									<tr>
										<Td>Harga penawaran / Laba bersih</td>
										<td>Rp.<?php echo $model->harga_penawaran_laba_bersih ?></td>
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
                                                                if(Yii::app()->user->hasState('documents'))
                                                                {
                                                                    $docList = Yii::app()->user->getState('documents');
                                                                }
                                                                else
                                                                {
                                                                    $docList = array();
                                                                }
                                                                    if(!empty($docList))
                                                                    { 
                                                                        foreach($docList as $dokumen)
                                                                        { 
                                                                            
                                                                            if(file_exists(Yii::app()->getBasePath() . "/../uploads/tmp/".$model->id_user.'/docs/'.$dokumen['name']))
                                                                            {
                                                                            ?>
                                                                            <div class="control-group">
                                                                                <div class="span12" style="margin-left:10px">
                                                                                        <?php echo $dokumen['name']; ?>
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
                                                                                Bisnis/Franchise yang terkait dengan yang anda buat akan ditampilkan di sini.
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
