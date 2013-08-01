<!--Start Slideshow---------------------------------------------------------------------------------------------------------->
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/library/Slideshow/css/bjqs.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/library/Slideshow/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/library/Slideshow/js/bjqs-1.3.min.js"></script>
<script>
    var baseUrl = '<?php echo Yii::app()->request->baseUrl ?>';
</script>
<script>
        jQuery(document).ready(function($) {
          
          $('#banner-slide').bjqs({
            animtype      : 'slide',
            height        : 320,
            width         : 868,
            responsive    : true,
            randomstart   : true
          });
          
        });
      </script>
<!--End Slideshow------------------------------------------------------------------------------------------------------------>
<div class="row-fluid">
            	<div class="span9">
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
                                        <li><a href="<?php echo Yii::app()->createUrl("//home/slideshowdetail/$value->id") ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slideshow/<?php echo $value->image ?>" style="width:100%; height:100%"></a></li>
                                    <?php } }?>
        			</ul>
      				</div>
                        </div>
                    </div>                	
                </div>
            	<div class="span3">
                      <?php if(!empty($this->clips['sidebar'])) echo
                            $this->clips['sidebar']?>
                </div>                
            </div>
            <div class="row-fluid">
            	<div class="span12"></div>
            </div>
            <div class="row-fluid">
            	<div class="span6 Gradient-Style4">
                	<div class="row-fluid">
                    	<div class="span12 Font-Size-Medium Text-Align-Center Div-Style-Header Gradient-Style3 Font-Color-White Border-Radius-Style1">BISNIS</div>
                    </div>
                    <form class="form-search" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari/') ?>">
                    <div class="row-fluid">
                    	<div class="span2"></div>
                    	<div class="span6">
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
                    	<div class="span2"></div>
                    	<div class="span6">
                        	<?php
                                            echo CHtml::dropDownList('kategori', 'id', CHtml::listData($kategori, 'id', 'industri'), array(
                                                'prompt' => 'Pilih Kategori',
                                                'class' => 'Input-Size-Medium Gradient-Style5',
                                            ));
                                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="row-fluid">
                    	<div class="span2"></div>
                    	<div class="span6">
                        	
                        		<div class="input-prepend">
                                            <?php echo CHtml::submitButton('Cari', array('submit' => array("/cariBisnisFranchise/cari/"),'class' => 'btn')); ?>
                                            <?php echo CHtml::textField('keyword','',array('class'=>'Input-Size-Small','placeholder'=>'Kata Kunci')); ?>
                           	 	</div>
                        </div>
                    </div>
                    </form>

                    <div class="row-fluid">
                    	<div class="span2"></div>
                    	<div class="span6">
                        	<hr class="Line-Size-Medium" />
                        </div>
                    </div>
                    <div class="row-fluid Div-Style-Content">
                    	<div class="span11 Text-Align-Center Solid-White">
<!--                    		<div class="tabbable">
                        		<ul class="nav nav-tabs">
                            		<li class="active">
                                		<a class="Gradient-Style1" href="#tab1" data-toggle="tab">Rekomendasi Kami</a>                                    
                                	</li>
                                	<li>
                                		<a class="Gradient-Style1" href="#tab2" data-toggle="tab">Terbaru</a>
                                	</li>
                            	</ul>
                            	<div class="tab-content">
                            		<div class="tab-pane active" id="tab1">
                                		<p>
                                			<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                		</p>
                                	</div>
                                	<div class="tab-pane" id="tab2">
                                		<p>
                                			<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                		</p>
                                	</div>
                            	</div>
                        	</div>-->
                                <?php 
                                        $contentBusinessTerbaru ='';
                                        foreach($business_terbaru as $businessDetail)
                                        {
                                            $imageList = array_filter(explode(',',$businessDetail->image));
                                            if(!empty($imageList))
                                            {
                                                $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail->id_user.'/thumbs/'.$imageList[0];
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

                                            $contentBusinessTerbaru .= "<a href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a>";
                                        }


                                        $contentBusinessRekomendasi ='';
                                        $i=0;
                                        foreach($business_rekomendasi as $businessDetail)
                                        {
                                            $i++;
                                            $imageList = array_filter(explode(',',$businessDetail['image']));
                                            if(!empty($imageList))
                                            {
                                                $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail['id_user'].'/thumbs/'.$imageList[0];
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

                                            $contentBusinessRekomendasi .= "<a href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a>";

                                            if($i== 5)
                                            {
                                                break;
                                            }
                                        }
                                        $this->widget('bootstrap.widgets.TbTabs', array(
                                            'type'=>'tabs', // 'tabs' or 'pills'
                                            'tabs'=>array(
                                                    array('label'=>'Terbaru', 'content'=>"$contentBusinessTerbaru", 'active'=>true),
                                                    array('label'=>'Rekomendasi', 'content'=>"$contentBusinessRekomendasi"),
                                            ),
                                    )); 

                                    ?>
                    	</div>
                	</div>
                </div>
                
                <div class="span6 Gradient-Style4">
                	<div class="row-fluid">
                    	<div class="span12 Text-Align-Center Font-Size-Medium Div-Style-Header Gradient-Style3 Font-Color-White  Border-Radius-Style1">FRANCHISE</div>
                    </div>
                    <form class="form-search" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari/') ?>">
                    <div class="row-fluid">
                    	<div class="span2"></div>
                    	<div class="span6">
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
                    	<div class="span2"></div>
                    	<div class="span6">
                        	  	<?php
                                            echo CHtml::dropDownList('kategori', 'id', CHtml::listData($kategori, 'id', 'industri'), array(
                                                'prompt' => 'Pilih Kategori',
                                                'class' => 'Input-Size-Medium Gradient-Style5',
                                            ));
                                            ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                    	<div class="span2"></div>
                    	<div class="span6">
                        	
                        		<div class="input-prepend">
                            		    <?php echo CHtml::submitButton('Cari', array('submit' => array("/cariBisnisFranchise/cari/"),'class' => 'btn')); ?>
                                            <?php echo CHtml::textField('keyword','',array('class'=>'Input-Size-Small','placeholder'=>'Kata Kunci')); ?>
                           	 	</div>
                        	</form>
                        </div>
                    </div>
                    <div class="row-fluid">
                    	<div class="span2"></div>
                    	<div class="span6">
                        	<hr class="Line-Size-Medium" />
                        </div>
                    </div>
                    <div class="row-fluid Div-Style-Content">
                    	<div class="span11 Text-Align-Center Solid-White">
<!--                    		<div class="tabbable">
                        		<ul class="nav nav-tabs" id="myTab">
                            		<li class="active">
                                		<a class="Gradient-Style1" href="#tab1" data-toggle="tab">Rekomendasi Kami</a></li>                                   
                                	</li>
                                	<li>
                                		<a class="Gradient-Style1" href="#tab2" data-toggle="tab">Terbaru</a></li>
                                	</li>
                            	</ul>
                            	<div class="tab-content">
                            		<div class="tab-pane active" id="tab1">
                                		<p>
                                			<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                		</p>
                                	</div>
                                	<div class="tab-pane" id="tab2">
                                		<p>
                                			<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                    		<img src="images/asset/clientPhoto.png" width="90" />
                                		</p>
                                	</div>
                            	</div>
                        	</div>-->
                            <?php 
                                        $contentFranchiseTerbaru ='';
                                        foreach($franchise_terbaru as $businessDetail)
                                        {
                                            $imageList = array_filter(explode(',',$businessDetail->image));
                                            if(!empty($imageList))
                                            {
                                                $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail->id_user.'/thumbs/'.$imageList[0];
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
                                                $contentFranchiseTerbaru .= "<a href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a>";
                                        }

                                        $contentFranchiseRekomendasi ='';
                                        $i=0;
                                        foreach($franchise_rekomendasi as $businessDetail)
                                        {
                                            $i++;
                                            $imageList = array_filter(explode(',',$businessDetail['image']));
                                            if(!empty($imageList))
                                            {
                                                 $imageSource = Yii::app()->baseUrl.'/uploads/images/'.$businessDetail['id_user'].'/thumbs/'.$imageList[0];
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

                                            $contentFranchiseRekomendasi .= "<a href=\"$detailUrl\"><img class=\"imageGadgetClient\" src=\"$imageSource\" style=\"width:90px; height:90px \" /></a>";

                                            if($i== 5)
                                            {
                                                break;
                                            }
                                        }
                                        $this->widget('bootstrap.widgets.TbTabs', array(
                                            'type'=>'tabs', // 'tabs' or 'pills'
                                            'tabs'=>array(
                                                    array('label'=>'Terbaru', 'content'=>"$contentFranchiseTerbaru", 'active'=>true),
                                                    array('label'=>'Rekomendasi', 'content'=>"$contentFranchiseRekomendasi"),
                                            ),
                                    )); 

                                    ?>
                    	</div>
                    </div>
                </div>
            </div>