<!--<meta property="og:title" content="<?php echo $model->title ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo substr(strip_tags(html_entity_decode($model->post)),0,250)."..." ?>" />-->

<div class="row-fluid">
	<div class="span10">
	<div class="row-fluid">
        	<div class="span12">
				<div class="row-fluid">
					<div class="span6">
					<h4><?php echo $model->title ?></h4>
					Oleh <?php echo $model->created_by ?> Pada Tanggal <?php setlocale(LC_TIME, 'indonesian'); setlocale(LC_TIME, 'id_ID'); echo strftime('%d %B %Y',  strtotime($model->post_date)) ?>
					</div>
					<div class="span6 Text-Align-Right Top-Margin3" style="float:right;">
						Bagikan 
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl("//article/detail/$model->id") ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/facebookIcon.png" width="30"/></a>
                <a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl("//article/detail/$model->id") ?>&text=JualanBisnis lihat artikel ini" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/twitterIcon.png" width="30"/></a>
                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(Yii::app()->createAbsoluteUrl("//article/detail/$model->id")) ?>&title=<?php echo urlencode($model->title) ?>&summary=<?php echo urlencode(substr(strip_tags(html_entity_decode($model->post)),0,250)."...") ?>&source=<?php echo urlencode(Yii::app()->name) ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/inIcon.png" width="30"/></a>
					</div>
				</div>
            	
            	
				<hr />
            </div>
        </div>
    	<div class="row-fluid">
        	<div class="span6">
                    <!--    LOCALE: there is two function for setting locale, the first one using 'indonesian' is for windows, and the 2nd one the id_ID is for linux-->
            	
            </div>
            <div class="span6 Text-Align-Right" style="float:right">
					
            </div>
        </div>
        
        <div class="span11" style="text-align:left; clear: both">
                <?php echo($model->post) ?>
        </div>	
    </div>
</div>