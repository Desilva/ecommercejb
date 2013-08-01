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
            <tr>
            	<td>
          <?php if(!empty($image)){ 
                    if(file_exists(Yii::app()->basePath.'/../uploads/images/'.$data->id_user.'/'.$image[0]))
                    {
          ?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/images/<?php echo $data->id_user?>/<?php echo $image[0] ?>" width="120" height="120"/>
          <?php    }
                    else
                    {
          ?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/images/no-image.gif" width="120" height="120"/>
          <?php     }
                    }
                  else
                  {
         ?>
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/no-image.gif" width="120" height="120"/>
         <?php 
                  }
         ?>
                </td>
                <td width="39%" style="text-align:justify">
                	<h5><?php echo $data->nama ?></h5>
                    <?php
                            if($data->deskripsi != '' || $data->deskripsi != null)
                            {
                                if(strlen($data->deskripsi) <= 200)
                                {
                                    echo strip_tags(html_entity_decode($data->deskripsi));
                                }
                                else
                                {
                                    echo substr(strip_tags(html_entity_decode($data->deskripsi)), 0, 200) . "...";
                                }
                            }
                            else
                            {
                                echo "Tidak ada deskripsi";
                            }
                        ?>
                </td>
                <td width="15%">
                	<?php echo $data->idKota->city ?>
                </td>
                <td>
                	Rp. <?php echo $data->harga_min ?> -<br>
                    Rp. <?php echo $data->harga_max ?>
                </td>
                <td>
                	<?php echo $data->penjualan ?>
                        <?php
				if(!Yii::app()->user->isGuest){
			?>
					<?php echo CHtml::button('Lihat Detail', array('submit' => array("/cariBisnisFranchise/detail/$data->id"),'class' => 'btn Gradient-Style1')); ?>
			<?php
				}
                                else
                                {
			?>
                                        <a href="#LoginForm_email">Login untuk melihat detail</a>
                        <?php   } ?>
                </td>
            </tr>