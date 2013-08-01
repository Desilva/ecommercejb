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
    	<img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" style="float:left" />   
        <?php echo $model->deskripsi ?>
        </div>
</div>
<div class="row-fluid">
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
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td><?php echo $model->franchise_alasan_kerjasama ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
               <tr class="Tr-Size-Medium">
                  <td>Persyaratan Menjadi Franchise:</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td><?php echo $model->franchise_persyaratan ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td>Dukungan Franchise:</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td><?php echo $model->franchise_dukungan_franchisor ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
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