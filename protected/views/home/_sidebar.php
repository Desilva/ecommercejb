<table class="table">
	<tr>
    	<th class="latest-news-header">ARTIKEL TERBARU</th>
    </tr>
 <?php foreach($artikelTerbaru as $artikel)
 {
 /* image parser, get the first image from article post, if not found, use default image */
    $post_array = explode("<", strip_tags($artikel->post, '<input>'));
    $flag = 0;
    $imgsource = Yii::app()->baseUrl.'/images/no-image.gif';
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
                    $smileycheck = parse_url($imgsource);
                    if(strpos($smileycheck['path'],'ckeditor/plugins/smiley') !== FALSE )
                    {
                        $imgsource = Yii::app()->baseUrl.'/images/no-image.gif';
                    }
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
                    $smileycheck = parse_url($imgsource);
                    if(strpos($smileycheck['path'],'ckeditor/plugins/smiley') !== FALSE )
                    {
                        $imgsource = Yii::app()->baseUrl.'/images/no-image.gif';
                    }
                    $flag = 1;
                }
            }
        }
    }
?>
    <tr>
        <td class="latest-news-td">
            <div class="latest-news-body">

                <a href="<?php echo Yii::app()->createUrl("//article/detail/$artikel->id") ?>"><img style="width:55px; height:55px; float:left; padding-right: 5px" src="<?php echo $imgsource ?>" /><label><?php echo $artikel->title ?></label></a><p style="margin-top:-10px"> Kategori Pembaca: <?php echo $artikel->idArticleCategoryPembaca->category_pembaca ?> </p> 
              <span style="margin-top:-13px; float: left">
<?php 
            if(strlen(strip_tags(html_entity_decode($artikel->post))) > 35)
            {
                echo substr(strip_tags(html_entity_decode($artikel->post)), 0, 35) . "..." ;
            }
            else 
            {
                echo strip_tags(html_entity_decode($artikel->post));
            }
?>
                </span>
            </div>
        </td>
    </tr>
    <?php }?>
</table>