    <?php
        $image = array_filter(explode(',',$data->image));
    ?>
            <tr>
            	<td style="min-width: 116px">
          <?php if(!empty($image)){ 
                    if(file_exists(Yii::app()->basePath.'/../uploads/images/'.$data->id_user.'/thumbs/'.$image[0]))
                    {
          ?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/images/<?php echo $data->id_user?>/thumbs/<?php echo $image[0] ?>" style="width: 125px; height:83px"/>
          <?php     }
                    else if(file_exists(Yii::app()->basePath.'/../uploads/images/'.$data->id_user.'/'.$image[0]))
                    { ?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/uploads/images/<?php echo $data->id_user?>/<?php echo $image[0] ?>" style="width: 125px; height:83px"/>
          <?php     }
                    else
                    {
          ?>
                        <img src="<?php echo Yii::app()->baseUrl ?>/images/no-image.gif" style="width: 125px; height:83px"/>
          <?php     }
                    }
                  else
                  {
         ?>
                    <img src="<?php echo Yii::app()->baseUrl ?>/images/no-image.gif" style="width: 125px; height:83px"/>
         <?php 
                  }
         ?>
                </td>
                <td width="39%" style="text-align:justify">
                	<div class="hasil-title"><?php echo $data->nama ?></div>
                    <div class="hasil-deskripsi">
                    <?php
                        if($data->deskripsi != '' && $data->deskripsi != null)
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
                	 <?php
                                if($data->penjualan > 0)
                                {
                                    echo "Rp.".number_format($data->penjualan);
                                }
                                else
                                {
                                    echo "-";
                                }
                                 ?>
                        <br/>
                        
                       
<?php
	if(!Yii::app()->user->isGuest){
?>
                    <div class="button-detail-area" >
                        <?php echo CHtml::link('Lihat Detail',  Yii::app()->createUrl("//cariBisnisFranchise/detail/$data->id"), array('class' => 'button-detail', 'style'=>'padding: 5px 5px 5px 5px')); ?>
                    </div>
<?php
	} else {
										
?>
                    <div class="button-detail-area">
                        <?php echo CHtml::link('Lihat Detail','#', array('class' => 'detail button-detail','style'=>'padding: 5px 5px 5px 5px')); ?>
                    </div>
								
<?php   } ?>
                    </div>
                </td>
            </tr>