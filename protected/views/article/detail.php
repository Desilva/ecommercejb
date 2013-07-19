<div>
	<div>
		<header style="font-size:50px; font-family:Calibri; float:left"><?php echo $model->title ?></header>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl("//article/detail/$model->id") ?>" target="_blank"><img style="float:right; margin-top:30px;" src="<?php echo Yii::app()->request->baseUrl ?>/images/facebookIcon.png" width="20" height="20"/></a>
                <a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl("//article/detail/$model->id") ?>&text=JualanBisnis lihat artikel ini" target="_blank"><img style="float:right; margin-top:30px;" src="<?php echo Yii::app()->request->baseUrl ?>/images/twitterIcon.png" width="20" height="20"/></a>
                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(Yii::app()->createAbsoluteUrl("//article/detail/$model->id")) ?>&title=<?php echo urlencode($model->title) ?>&summary=<?php echo urlencode(substr(strip_tags(html_entity_decode($model->post)),0,250)."...") ?>&source=<?php echo urlencode(Yii::app()->name) ?>" target="_blank"><img style="float:right; margin-top:30px;" src="<?php echo Yii::app()->request->baseUrl ?>/images/inIcon.png" width="20" height="20"/></a>
		<br style="clear:both"/>
		<HR/>
	</div>
    <div style="text-align:justify">
    	<?php echo($model->post) ?>
    </div>
</div>