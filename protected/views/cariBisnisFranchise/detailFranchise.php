<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/library/ad-gallery/jquery.ad-gallery.js"></script>

<div class="row-fluid">
	<div class="span4">
    	<h4><?php echo $model->nama ?></h4>
    </div>
   	<div class="span6 Text-Align-Right">
    	Bagikan 
       <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id") ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/facebookIcon.png" height="30" width="30" /></a>
       <a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id") ?>&text=JualanBisnis.com:" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/twitterIcon.png" height="30" width="30" /></a>
       <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id")) ?>&title=<?php echo urlencode($model->nama) ?>&summary=<?php echo urlencode(substr(strip_tags(html_entity_decode($model->deskripsi)),0,250)."...") ?>&source=<?php echo urlencode(Yii::app()->name) ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/inIcon.png" height="30" width="30" /></a> 
    </div>
    <div class="span2 Text-Align-Right">
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
                   <td>:Rp.<?php echo $model->harga_min ?> - Rp.<?php echo $model->harga_max ?></td>
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
        	<div class="span12">
            	<hr/>
            </div>
        </div>
        <div class="row-fluid">
        	<div class="span6">
        <?php
            $bisnisTerkait = "";
            foreach($bisnis_terkait as $bisnis){ ?>
            <?php 
                $imageList = array_filter(explode(',',$bisnis->image));
                if(!empty($imageList))
                {
                    $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$bisnis->id_user.'/thumbs/'.$imageList[0];
                }
                else
                {
                    $imageSource = Yii::app()->request->baseUrl.'/images/no-image.gif';
                }
                
                $bisnisTerkait .= "<a href=".Yii::app()->createUrl("//cariBisnisFranchise/detail/$bisnis->id")."><img src=".$imageSource." alt=".$bisnis->nama." style=\"width:90px; height:90px \"/></a>";
            ?>
            
        <?php } ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbTabs', array(
                            'type'=>'tabs', // 'tabs' or 'pills'
                            'tabs'=>array(
                                    array('label'=>'Bisnis Terkait', 'content'=>"$bisnisTerkait", 'active'=>true),
                            ),
                    )); 
                    ?>
            </div>
        </div>
    </div>
</div>