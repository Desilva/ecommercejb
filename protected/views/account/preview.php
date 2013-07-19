<style>
    input[type="button"].buttonKontak {
    background: -moz-linear-gradient(center top , #1568AE, #1568AE) repeat scroll 0 0 transparent;
    border: 1px solid #FFFFFF;
    border-radius: 2px 2px 2px 2px;
    color: #FEF4E9;
    height: 30px;
    width: 100px;
}
</style>
<div>
	<div>
		<header style="font-size:50px; font-family:Calibri;"><?php echo $model->nama ?></header>
		<br style="clear:both"/>
		<HR/>
	</div>
	<div style="text-align:justify">
            <img style="float:left" src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" height="300"/>
        <?php echo $model->deskripsi ?>
	<p>
           
	</p>
    </div>
    <br/>
    <div style="clear:both">
    	<?php
//			if(isset($_GET['gadget'])){
//				include "kontak.php";	
//			}
		?>
    <hr/>
    </div>
    <div>
    	<h2>DETIL INFORMASI BISNIS</h2>
        <table id="tableLatestNews">
        	<tr>
            	<td id="tableLatestNewsC1">Kategori</td>
                <td id="tableLatestNewsC2">:Kepemilikan <?php if($model->kepemilikan ==1)echo '100%'; else if($model->kepemilikan ==2)echo '<100%'; ?></td>
                <td id="tableLatestNewsC3">Margin Laba Bersih</td>
                <td id="tableLatestNewsC4">:Rp.<?php echo $model->marjin_laba_bersih ?></td>
            </tr>
            <tr>
            	<td>Industri</td>
                <td>:<?php // echo $model->idIndustri->industri ?></td>
                <td>Laba Bersih/Asset</td>
                <td>:Rp.<?php echo $model->laba_bersih_aset ?></td>
            </tr>
            <tr>
            	<td>Lokasi</td>
                <td>:<?php // echo $model->idKota->city ?></td>
                <td>Harga Penawaran/penjualan</td>
                <td>:Rp.<?php echo $model->harga_penawaran_penjualan ?></td>
            </tr>
            <tr>
            	<td>Jumlah Karyawan</td>
                <td>:<?php if($model->jumlah_karyawan != '' || $model->jumlah_karyawan != null)echo $model->jumlah_karyawan.' Orang';else echo "Tidak ada data"; ?></td>
                <td>Harga Penawaran/Laba Bersih</td>
                <td>:Rp.<?php echo $model->harga_penawaran_laba_bersih ?></td>
            </tr>
            <tr>
            	<td>Tahun Didirikan</td>
                <td>:<?php echo $model->tahun_didirikan ?></td>
                <td>Harga Penawaran/Asset</td>
                <td>:Rp.<?php echo $model->harga_penawaran_aset ?></td>
            </tr>
            <tr>
            	<td>Harga</td>
                <td>:Rp.<?php echo $model->harga_min ?> - Rp.<?php echo $model->harga_max ?></td>
                <td>File Pendukung
<!--                	<br/>
                    &nbsp;SIUP.pdf<br/>
                    &nbsp;Top.docx<br/>
                    &nbsp;Laporan Keuangan<br/>
                    &nbsp;Asset Perusahaan-->
                </td>
                <td></td>
            </tr>
            <tr>
            	<td>Penjualan/Tahun</td>
                <td>:Rp.<?php echo $model->penjualan ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td>HPP/Tahun</td>
                <td>:Rp.<?php echo $model->hpp ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td>Laba Bersih/Tahun</td>
                <td>:Rp.<?php echo $model->laba_bersih_tahun ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td>Total Asset</td>
                <td>:Rp.<?php echo $model->total_aset ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td>Alasan Menjual Bisnis</td>
                <td>:<?php echo $model->alasan_jual_bisnis ?></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <hr/>
    </div>
</div>