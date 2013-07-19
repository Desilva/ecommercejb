<div id="primaryArtikelDiv">
	<div>
		<header style="font-size:30px; font-family:Calibri;">ARTIKEL</header>
                <?php
//                    $form=$this->beginWidget('CActiveForm', array(
//                    'id'=>'category-form',
//                    'enableAjaxValidation'=>false)); 
//                    echo $form->dropDownList($model_category,'id',CHtml::listData($category,'id','category'),array('prompt'=>'All','class'=>'styleSelect3','id'=>'shortBisnisFranchise','submit'=> Yii::app()->createUrl("//article/index/"))); 
//                    $this->endWidget();
                ?>
		<br style="clear:both"/>
		<HR/>
	</div>
    <div class="artikelDiv">
<?php
    foreach ($model as $artikel) {
    /* image parser, get the first image from article post, if not found, use default image */
    $post_array = explode("<", strip_tags($artikel->post, '<input>'));
    $flag = 0;
    $imgsource = "";
    foreach($post_array as $value)
    {
        $parser = explode('/>', $value);
        $check1 = strpos($parser[0], 'input');
        $check2 = strpos($parser[0], 'type="image"');
        if($check1 !== false && $check2 !== false)
        {
            $check3 = strpos($parser[0], 'src');
            if($check3 !==false)
            {
                if($flag == 0)
                {
                    $imgtemp = explode('"', substr($parser[0], strpos($parser[0], 'src')));
                    $imgsource = $imgtemp[1];
                    $flag = 1;
                }
            }

        }
    }
    /* fallback if image use format <img src /> */
    $post_array2 = explode("<", strip_tags($artikel->post, '<img>'));
    foreach($post_array2 as $value)
    {
        $parser = explode('/>', $value);
        $check = strpos($parser[0], 'img');
        if($check !== false)
        {
            $check3 = strpos($parser[0], 'src');
            if($check3 !==false)
            {
                if($flag == 0)
                {
                    $imgtemp = explode('"', substr($parser[0], strpos($parser[0], 'src')));
                    $imgsource = $imgtemp[1];
                    $flag = 1;
                }
            }
        }
    }
?>
    <div class="oneArtikelDiv">
        <div class="headerArtikelDiv"><h3><?php echo $artikel->title ?></h3></div>
            <div>
            	<div class="imageArtikelDiv"> 
           <?php
                if($imgsource == "")
                {
                ?>
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" style="width:145px; height:150px; "/>
          <?php }
                else
                {
          ?>
                    <img src="<?php echo $imgsource ?>" style="width:145px; height:150px; "/>
          <?php } ?>
                </div>
                <div class="contentArtikelDiv">
                	<div class="authorArtikelDiv" style="">
                                    <!--    LOCALE: there is two function for setting locale, the first one using 'indonesian' is for windows, and the 2nd one the id_ID is for linux-->
			Oleh <?php echo $artikel->created_by ?> , <?php setlocale(LC_TIME, 'indonesian'); setlocale(LC_TIME, 'id_ID'); echo strftime('%d %B %Y',  strtotime($artikel->post_date)) ?>
                        
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl("//article/detail/$artikel->id") ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/facebookIcon.png" height="20" width="20" /></a>
                        <a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl("//article/detail/$artikel->id") ?>&text=JualanBisnis lihat artikel ini" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/twitterIcon.png" height="20" width="20" /></a>
                        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(Yii::app()->createAbsoluteUrl("//article/detail/$artikel->id")) ?>&title=<?php echo urlencode($artikel->title) ?>&summary=<?php echo urlencode(substr(strip_tags(html_entity_decode($artikel->post)),0,250)."...") ?>&source=<?php echo urlencode(Yii::app()->name) ?>" target="_blank"><img class="imageShareArtikel" src="<?php echo Yii::app()->request->baseUrl ?>/images/inIcon.png" height="20" width="20" /></a>
					</div>
                    <div class="storyArtikelDiv">
						<hr/>
                    	<?php echo substr(strip_tags(html_entity_decode($artikel->post)),0,250)."..." ?>
                        <br />
                    	<?php
                            echo CHtml::button('Lihat Detail', array('submit' => array("/article/detail/$artikel->id"),'class' => 'styleSubmit2'));   
                        ?>
                    </div>
                </div>
            </div>
      </div>
    <?php } ?>
    </div>
        