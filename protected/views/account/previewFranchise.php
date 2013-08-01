<div class="row-fluid">
	<div class="span4">
    	<h4><?php echo $model->nama ?></h4>
    </div>
</div>

<div class="row-fluid">
	<div class="span12 Text-Align-Justify">
    	<img src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" style="float:left" />   
        <?php echo $model->deskripsi ?>
        </div>
</div>
<div class="row-fluid">
	<div class="span12">
    	<div class="row-fluid">
        	<div class="span3">
            	<font class="Font-Color-DarkBlue">DETIL INFORMASI FRANCHISE</font>
            </div>
            <div class="span9">
            <?php
                if($model->id_user != Yii::app()->user->id)
                {
                    echo CHtml::button('Kontak', array('submit' => array("cariBisnisFranchise/kontakBisnis/$model->id"), 'class'=>'btn Gradient-Style1'));
                }
            ?>
            </div>
        </div>
        <div class="row-fluid">
        	<table>
            	<tr class="Tr-Size-Medium">
                	<td width="30%">Industri</td>
                    <td width="30%">:<?php if(isset($model->idIndustri->industri)) echo $model->idIndustri->industri ?></td>
                   <td>File Pendukung</td>
                   <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                   <td>Lokasi</td>
                   <td>:<?php if(isset($model->idKota->city)) echo $model->idKota->city ?></td>
                   <td></td>
                   <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                   <td>Harga</td>
                   <td>:Rp.<?php echo $model->harga_min ?> - Rp.<?php echo $model->harga_max ?></td>
                   <td></td>
                   <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td>Alasan Franchise Mau Bekerjasama:</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td><?php echo $model->franchise_alasan_kerjasama ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
               <tr class="Tr-Size-Medium">
                  <td>Persyaratan Menjadi Franchise:</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td><?php echo $model->franchise_persyaratan ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td>Dukungan Franchise:</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="Tr-Size-Medium">
                  <td><?php echo $model->franchise_dukungan_franchisor ?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>