<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.js"></script>
<div class="row-fluid detail-bisnis-top">
	<div class="span3">
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
         		$image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../uploads/images/$model->id_user/thumbs/$imageSrc");
?>
								<img src="<?php echo Yii::app()->request->baseUrl ?>/uploads/images/<?php echo $model->id_user ?>/thumbs/<?php echo $imageSrc ?>" style="width:50px; height:50px">
<?php
					} else { 
            $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../uploads/images/$model->id_user/$imageSrc");
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
    <img src="<?php echo Yii::app()->baseUrl ?>/uploads/images/<?php echo $model->id_user?>/<?php echo $image[0] ?>" style="float:left; width: 300px; height: 225px;"/>
<?php 
			} else { 
        $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../images/no-image.gif");
?>
		<img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" height:"225" style="float:left" />   
<?php 
			} 
?>                     
<?php 		
		} 
	} else { 
    $image_for_social_share[]= Yii::app()->createAbsoluteUrl("/../images/no-image.gif");
?>
      <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" style="float:left; width: 300px; height: 225px" />   
<?php 
	} 
?>
	</div>
	<div class="span7">
		<div class="row-fluid detail-bisnis-header">
			<div class=" detail-bisnis-title" >
				<?php echo $model->nama ?>
			</div>
		</div>
		<div id='lightboxContent' ></div>
    <div class="row-fluid detail-bisnis-description">
    	<?php if($model->deskripsi =='' || $model->deskripsi ==null) echo "Tidak ada deskripsi"; else echo $model->deskripsi ?>
  	</div>
	</div>
</div>
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
    	'Kontak' => $this->renderpartial('//cariBisnisFranchise/kontak', array('model'=>$email,'business'=>$business,'business_owner'=>$businessOwner, 'settings'=>$settings), true),),
                                    // additional javascript options for the accordion plugin
      'options' => array(
        'collapsible' => true,
        'active'=>(isset($_GET['msg']))?0:false,
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
<div class="row-fluid">
	<div class="span7">
		<div class="detail-bisnis-informasi-header">
			Detail Informasi Franchise
		</div>
		<div class="detail-bisnis-informasi-content">
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
					<td>Rp.<?php echo number_format($model->harga) ?></td>
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
  if(!empty($docList))
  { 
    foreach($docList as $dokumen)
    { 
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
				Bisnis/Franchise yang terkait dengan franchise anda akan tampil disini.
			</div>
		</div>
	</div>
</div>