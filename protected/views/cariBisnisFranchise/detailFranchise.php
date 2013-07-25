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
                <?php 
                     if($return_location != '' && $return_kategori != '')
                    {
                        if($return_location == "beli")
                        {
                             echo CHtml::button('Kembali', array('submit' => array("account/beli?kategori=$return_kategori"), 'class'=>'buttonKontak'));
                        }
                        else if($return_location == "watchlist")
                        {
                            echo CHtml::button('Kembali', array('submit' => array("account/watchlist?kategori=$return_kategori"), 'class'=>'buttonKontak'));
                        }
                        if($watchlist == '0')
                        {
                            echo CHtml::button('Watchlist', array('submit' => array("cariBisnisFranchise/watchlist/$model->id?kategori=$return_kategori&return=$return_location"),'class'=>'buttonKontak')); 
                        }
                        else
                        {
                            echo CHtml::button('Unwatch', array('submit' => array("cariBisnisFranchise/watchlist/$model->id?kategori=$return_kategori&return=$return_location"), 'class'=>'buttonKontak')); 
                        }
                    }
                    else
                    {
                        if($watchlist == '0')
                        {
                            echo CHtml::button('Watchlist', array('submit' => array("cariBisnisFranchise/watchlist/$model->id"), 'class'=>'buttonKontak')); 
                        }
                        else
                        {
                            echo CHtml::button('Unwatch', array('submit' => array("cariBisnisFranchise/watchlist/$model->id"), 'class'=>'buttonKontak')); 
                        }
                    }
                
                ?>
		<HR/>
	</div>
	<div style="text-align:justify">
            <img style="float:left" src="<?php echo Yii::app()->request->baseUrl ?>/images/no-image.gif" width="300" height="300"/>
        <?php echo $model->deskripsi ?>
	<p>
            <?php
            if($model->id_user != Yii::app()->user->id)
            {
                    echo CHtml::button('Kontak', array('submit' => array("cariBisnisFranchise/kontakBisnis/$model->id"), 'class'=>'buttonKontak')); 
            }
            ?>
	</p>
    
    </div>
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
                <td id="tableLatestNewsC3">File Pendukung
<!--                	<br/>
                    &nbsp;SIUP.pdf<br/>
                    &nbsp;Top.docx<br/>
                    &nbsp;Laporan Keuangan<br/>
                    &nbsp;Asset Perusahaan--></td>
                <td id="tableLatestNewsC4"></td>
            </tr>
            <tr>
            	<td>Industri</td>
                <td>:<?php echo $model->idIndustri->industri ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td>Lokasi</td>
                <td>:<?php echo $model->idKota->city ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td>Harga</td>
                <td>:Rp.<?php echo $model->harga_min ?> - Rp.<?php echo $model->harga_max ?></td>
                <td>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td>Alasan Franchise Mau Bekerjasama</td>
                <td>:<?php echo $model->franchise_alasan_kerjasama ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td>Persyaratan Menjadi Franchise</td>
                <td>:<?php echo $model->franchise_persyaratan ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
            	<td>Dukungan Franchise</td>
                <td>:<?php echo $model->franchise_dukungan_franchisor ?></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <hr/>
        <h2>Bisnis Terkait</h2>
        <?php foreach($bisnis_terkait as $bisnis){ ?>
        <p><a href="<?php echo Yii::app()->createUrl("//cariBisnisFranchise/detail/$bisnis->id") ?>"><?php echo $bisnis->nama ?></a></p>
        <?php } ?>
    </div>
</div>