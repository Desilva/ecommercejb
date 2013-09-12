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
	<div class="span12"></div>
</div>
<div class="row-fluid">
	<div class="span12">
    	<div class="row-fluid">
        	<div class="span3">
            	<font class="Font-Color-DarkBlue">DETIL INFORMASI BISNIS</font>
            </div>
        </div>
        <div class="row-fluid">
        	<table>
            	<tr class="Tr-Size-Medium">
                	<td width="30%">Kategori</td>
                    <td width="30%">:Kepemilikan <?php if($model->kepemilikan ==1)echo '100%'; else if($model->kepemilikan ==2)echo '<100%'; ?></td>
                    <td width="30%">Margin Laba Bersih</td>
                    <td>:Rp.<?php echo $model->marjin_laba_bersih ?></td>
                </tr>
                <tr class="Tr-Size-Medium">
                	<td>Industri</td>
                    <td>:<?php if(isset($model->idIndustri->industri)) echo $model->idIndustri->industri ?></td>
                    <td>Laba Bersih / Asset</td>
                    <td>:Rp.<?php echo $model->laba_bersih_aset ?></td>
                </tr>
                <tr class="Tr-Size-Medium">
                	<td>Lokasi</td>
                    <td>:<?php if(isset($model->idKota->city)) echo $model->idKota->city ?></td>
                    <td>Harga Penawaran / Penjualan</td>
                    <td>:Rp.<?php echo $model->harga_penawaran_penjualan ?></td>
                </tr>
                <tr class="Tr-Size-Medium">
                	<td>Jumlah Karyawan</td>
                    <td>:<?php if($model->jumlah_karyawan != '' || $model->jumlah_karyawan != null)echo $model->jumlah_karyawan.' Orang';else echo "Tidak ada data"; ?></td>
                    <td>Harga Penawaran / Laba Bersih</td>
                    <td>:Rp.<?php echo $model->harga_penawaran_laba_bersih ?></td>
                </tr>
                <tr class="Tr-Size-Medium">
                	<td>Tahun Didirikan</td>
                    <td>:<?php echo $model->tahun_didirikan ?></td>
                    <td>Harga Penawaran . Asset</td>
                    <td>:Rp.<?php echo $model->harga_penawaran_aset ?></td>
                </tr>
                <tr class="Tr-Size-Medium">	
                	<td>Harga</td>
                    <td>:Rp.<?php echo $model->harga ?></td>
                    <td>File Pendukung</td>
                </tr>
                <tr class="Tr-Size-Medium">
                	<td>Penjualan / Tahun</td>
                    <td>:Rp.<?php echo $model->penjualan ?></td>
                   
                </tr>
                <tr class="Tr-Size-Medium">
                	<td>HPP / Tahun</td>
                    <td>:Rp.<?php echo $model->hpp ?></td>
                   
                </tr>
                <tr class="Tr-Size-Medium">
                	<td>Laba Bersih / Tahun</td>
                    <td>:Rp.<?php echo $model->laba_bersih_tahun ?></td>
                   
                </tr>
                <tr class="Tr-Size-Medium">
                	<td>Total Asset</td>
                    <td>:Rp.<?php echo $model->total_aset ?></td>
                    
                </tr>
                <tr class="Tr-Size-Medium">
                	<td colspan="2">Alasan ingin menjual bisnis</td>
                </tr>
                <tr class="Tr-Size-Medium">
                	<td colspan="2"><?php echo $model->alasan_jual_bisnis ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>