<!--<div>
    <div>
		<header style="font-size:30px; font-family:Calibri;">Hasil Pencarian</header>
		  <form method="post">
                    <?php
                       // echo CHtml::dropDownList('sort',$selectedSortValue,$sortType,array('class'=>'styleSelect3','style'=>'float:left','id'=>'shortBisnisFranchise','submit'=> Yii::app()->createUrl("//CariBisnisFranchise/index/"))); 
                    ?>
                </form>
		<br style="clear:both"/>
		
	</div>-->
<!--	<div style="margin-top:-18px;">
    <hr/>-->
    <?php
        $image = array_filter(explode(',',$data->image));
    ?>
    <div>
    	<div id="C1">
            <?php if(!empty($image)){ ?>
                    <img src="<?php echo Yii::app()->baseUrl ?>/uploads/<?php echo $image[0] ?>" width="128" height="128"/>
            <?php }
                  else
                  {
            ?>
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/no-image.gif" width="128" height="128"/>
            <?php 
                  }
            ?>
         </div>
        <div id="C2">
        	<font id="titleCariBisnis"><?php echo $data->nama ?></font>
			<br/>
                        <!--    LOCALE: there is two function for setting locale, the first one using 'indonesian' is for windows, and the 2nd one the id_ID is for linux-->
			<strong><?php echo $data->idKota->city ?>, <?php setlocale(LC_TIME, 'indonesian'); setlocale(LC_TIME, 'id_ID'); echo strftime('%d %B %Y',  strtotime($data->tanggal_approval)) ?></strong><br/>
                                <?php echo substr($data->deskripsi,0,250).'...' ?>
        </div>
        <div id="C3">
        	<strong>
            	Harga
            </strong><br/>
            	<font>Rp.<?php echo $data->harga_min ?> -</font><br/>
                <font>Rp.<?php echo $data->harga_max ?></font>
            <p>
            </p>
            <strong>
            	Revenue
            </strong><br/>
            	<font>Rp.<?php echo $data->penjualan ?></font><br/>
            <p>
            </p>
			<?php
				if(!Yii::app()->user->isGuest){
			?>
					<?php echo CHtml::button('Lihat Detail', array('submit' => array("/cariBisnisFranchise/detail/$data->id"),'class' => 'styleSubmit2')); ?>
			<?php
				}
                                else
                                {
			?>
                                        <a href="#">Login untuk melihat detail</a>
                        <?php   } ?>
        </div>
        <br style="clear:both"/>
        <hr/>
    </div>
</div>
 