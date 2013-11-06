    <?php
        $image = array_filter(explode(',',$data->image));
    ?>
            <tr>
            	<td style="min-width: 116px">
          <?php if(!empty($image)){ 
                    if(file_exists(Yii::app()->basePath.'/../uploads/images/'.$data->id_user.'/'.$image[0]))
                    {
          ?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/images/<?php echo $data->id_user?>/<?php echo $image[0] ?>" style="width: 110px; height:82.5px"/>
          <?php    }
                    else
                    {
          ?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/images/no-image.gif" style="width: 110px; height:82.5px"/>
          <?php     }
                    }
                  else
                  {
         ?>
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/no-image.gif" style="width: 110px; height:82.5px"/>
         <?php 
                  }
         ?>
                </td>
                <td width="39%" style="text-align:justify">
                	<div class="hasil-title"><?php echo $data->nama ?></div>
                    <div class="hasil-deskripsi">
                    <?php
                        if($data->deskripsi != '' || $data->deskripsi != null)
                        {
                            if(strlen($data->deskripsi) <= 100)
                            {
                                echo strip_tags(html_entity_decode($data->deskripsi));
                            }
                            else
                            {
                                echo substr(strip_tags(html_entity_decode($data->deskripsi)), 0, 100) . "...";
                            }
                        }
                        else
                        {
                            echo "Tidak ada deskripsi";
                        }
                    ?>
                    </div>
                </td>
                <td width="15%">
                	<?php setlocale(LC_TIME, 'indonesian'); setlocale(LC_TIME, 'id_ID'); echo strftime('%d %b %Y',  strtotime($data->tanggal_approval)) ?>
                </td>
                <td width="15%">
                	<?php echo $data->idKota->city ?>
                </td>
                <td>
                    Rp. <?php echo number_format($data->harga) ?>
                </td>
                <td class="omzet-field">
                    <div class="hasil-pencarian-omzet">
                	Rp. <?php echo number_format($data->penjualan) ?>
                        <br/>
                        
                       
<?php
	if(!Yii::app()->user->isGuest){
?>
                    <div class="button-detail-area">
                        <?php echo CHtml::button('Lihat Detail', array('submit' => array("/cariBisnisFranchise/detail/$data->id"),'class' => 'button-detail')); ?>
                    </div>
<?php
	} else {
										
?>
                    <div class="button-detail-area">
                        <?php echo CHtml::button('Lihat Detail', array('class' => 'detail button-detail')); ?>
                    </div>
								
<?php   } ?>
                    </div>
                </td>
            </tr>