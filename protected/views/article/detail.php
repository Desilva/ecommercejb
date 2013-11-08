<!--<meta property="og:title" content="<?php echo $model->title ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo substr(strip_tags(html_entity_decode($model->post)),0,250)."..." ?>" />-->

<div class="row-fluid">
	<div class="detail-article-body">
    <div class="row-fluid detail-article-header">
      <div class=" detail-article-title" >
        <?php echo $model->title ?>
      </div>
      <div class="detail-article-share">
        Bagikan:&nbsp;&nbsp;
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->createAbsoluteUrl("//article/detail/$model->id") ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/facebook.png" width="22.27"/></a>
        <a href="https://twitter.com/share?url=<?php echo Yii::app()->createAbsoluteUrl("//article/detail/$model->id") ?>&text=JualanBisnis lihat artikel ini" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/twitter.png" width="30"/></a>
        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(Yii::app()->createAbsoluteUrl("//article/detail/$model->id")) ?>&title=<?php echo urlencode($model->title) ?>&summary=<?php echo urlencode(substr(strip_tags(html_entity_decode($model->post)),0,250)."...") ?>&source=<?php echo urlencode(Yii::app()->name) ?>" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/linkedin.png" width="22.27"/></a>
      </div>
    </div>
    <div class="row-fluid detail-article-oleh">
      Oleh <?php echo $model->created_by ?> Pada Tanggal <?php setlocale(LC_TIME, 'indonesian'); setlocale(LC_TIME, 'id_ID'); echo strftime('%d %B %Y',  strtotime($model->post_date)) ?>
    </div>
    <div class="row-fluid detail-article-content">
      <?php echo($model->post) ?>
    </div>
  </div>
</div>