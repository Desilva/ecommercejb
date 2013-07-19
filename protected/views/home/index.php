<style type="text/css">
    .timer { display: none !important; }
    div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
</style>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/jquery.orbit-1.2.3.js"></script>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/orbit-1.2.3.css">


<script type="text/javascript">
    $(window).load(function() {
        $('#featured').orbit({
            bullets: true,
        });
    });
    
    function getSlideshowDetail(id)
    {
        window.location = '<?php echo Yii::app()->createUrl('//home/slideshowdetail') ?>' + '/' +id;
    }
</script>
<div id="motoDiv"><h3 align="center">SITUS JUAL BELI BISNIS <font size="+3">TERBESAR</font> DI <font size="+3">INDONESIA</font></h3></div>
<div id="slideShowDiv">
    <div id="featured">
        <?php foreach($slideshow as $value)
        {
            
            if($value->image != null || $value->image != "")
            {
        ?>
        <span class="orbit-caption" id="htmlCaption<?php echo $value->id ?>"><?php echo $value->title ?> </span>
<!--		<div class="content" style="background: url('<?php echo Yii::app()->request->baseUrl; ?>/uploads/slideshow/<?php echo $value->image ?>'); background-repeat: no-repeat; background-size: 100% 100% ">
			<h3>Text description</h3>
		</div>-->
        <img onclick="getSlideshowDetail(<?php echo $value->id ?>)" style="cursor:pointer" width="750" height="300" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/slideshow/<?php echo $value->image ?>" data-caption="#htmlCaption<?php echo $value->id ?>" />
        <?php } }?>
    </div>
    
</div>
<div id="gadgetsDiv">
	<div id="gadgetsLeftDiv">
	<div class="titleGadgets">
		<span style="">Bisnis</span>
	</div>
    <form>
		<div>
			<table style="">
                                <?php echo CHtml::hiddenField('jenis', '1') ?>
				<tr height="50">
					<td style="padding-left:50px;">
						<?php
                                            echo CHtml::dropDownList('provinsi', 'id', CHtml::listData($provinsi, 'id', 'provinsi'), array(
                                                'prompt' => 'Pilih Provinsi',
                                                'class' => 'styleSelect1',
                                                ));
                                            ?>
					</td>
				</tr>
				<tr height="50">
					<td style="padding-left:50px;">
						  <?php
                                            echo CHtml::dropDownList('kategori', 'id', CHtml::listData($kategori, 'id', 'industri'), array(
                                                'prompt' => 'Pilih Kategori',
                                                'class' => 'styleSelect1',
                                                ));
                                            ?>
					</td>
				</tr>
				<tr height="50">
					<td style="padding-left:50px;">
                                            <form action="/cariBisnisFranchise/cari/" method="GET">
                                            <?php echo CHtml::textField('keyword','',array('class'=>'styleText1','placeholder'=>'Kata Kunci')); ?> 
                                            <?php echo CHtml::submitButton('Cari', array('submit' => array("/cariBisnisFranchise/cari/?id_category=1"),'class' => 'styleSubmit2','style'=>'width:65px;')); ?>
                                            </form>
                                        </td>
				</tr>
			</table>
		</div>
    </form>
    <hr width="340px"/>
		<div id="gadgetLeft">
			<div id="titleGadgetLeft">
				<div id="gadgetLeftSubtitleDiv" class="subTitleGadgets">
					<span id="gadgetLeftSubtitleSpan">Rekomendasi Kami</span>
				</div>
				<div id="gadgetLeftSubtitleDiv2" class="subTitleGadgets">
					<span id="gadgetLeftSubtitleSpan2">Terbaru</span>
				</div>
			</div>
			<div>
				<img id="imageNavGadgetLeft" src="<?php echo Yii::app()->request->baseUrl; ?>/images/navGadgetLeft.png" />
				<img class="imageGadgetClient" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientPhoto.png" />
                <img class="imageGadgetClient" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientPhoto.png" />
               	<img class="imageGadgetClient" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientPhoto.png" />
                <img class="imageGadgetClient" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientPhoto.png" />
				<img id="imageNavGadgetRight" src="<?php echo Yii::app()->request->baseUrl; ?>/images/navGadgetRight.png"/>
			</div>
		</div>
    </div>                
    <div id="gadgetsRightDiv">
		<div class="titleGadgets">
			<span style="">Franchise</span>
		</div>
        <form>
			<div>
				<table>	
                                    <?php echo CHtml::hiddenField('jenis', '2') ?>
					<tr height="50">
						<td style="padding-left:50px;">
								<?php
                                            echo CHtml::dropDownList('provinsi', 'id', CHtml::listData($provinsi, 'id', 'provinsi'), array(
                                                'prompt' => 'Pilih Provinsi',
                                                'class' => 'styleSelect1',
                                                ));
                                            ?>
						</td>
					</tr>
					<tr height="50">
						<td style="padding-left:50px;">
								  <?php
                                                    echo CHtml::dropDownList('kategori', 'id', CHtml::listData($kategori, 'id', 'industri'), array(
                                                        'prompt' => 'Pilih Kategori',
                                                        'class' => 'styleSelect1',
                                                    ));
                                                    ?>
						</td>
					</tr>
					<tr height="50">
						<td style="padding-left:50px"><?php  echo CHtml::textField('keyword','',array('class'=>'styleText1','placeholder'=>'Kata Kunci')); ?>
                                                <?php echo CHtml::submitButton('Cari', array('submit' => array("/cariBisnisFranchise/cari/"),'class' => 'styleSubmit2','style'=>'width:65px;','placeholder'=>'Kata Kunci')); ?>
                                                </td>
					</tr>
				</table>
			</div>
        </form>
        <hr width="340px"/>
       <div id="gadgetLeft">
			<div  id="titleGadgetLeft">
				<div id="gadgetLeftSubtitleDiv" class="subTitleGadgets">
					<span id="gadgetLeftSubtitleSpan">Rekomendasi Kami</span>
				</div>
				<div id="gadgetLeftSubtitleDiv2" class="subTitleGadgets">
					<span id="gadgetLeftSubtitleSpan2">Terbaru</span>
				</div>
			</div>
			<div>
				<img id="imageNavGadgetLeft" src="<?php echo Yii::app()->request->baseUrl; ?>/images/navGadgetLeft.png" />
				<img class="imageGadgetClient" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientPhoto.png" />
                <img class="imageGadgetClient" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientPhoto.png" />
               	<img class="imageGadgetClient" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientPhoto.png" />
                <img class="imageGadgetClient" src="<?php echo Yii::app()->request->baseUrl; ?>/images/clientPhoto.png" />
				<img id="imageNavGadgetRight" src="<?php echo Yii::app()->request->baseUrl; ?>/images/navGadgetRight.png"/>
			</div>
		</div>
	</div>
<!--	<div style="background:url(<?php echo Yii::app()->request->baseUrl; ?>/images/footer.png); width:1350px; height:75px; margin-left:-390px; clear:both"></div>-->
</div>