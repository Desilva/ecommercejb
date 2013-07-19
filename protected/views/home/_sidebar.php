<table id="homeSidebar">
            	<tr >
            		<th id="titleSideBar"><h3 align="left">LATEST NEWS</h3></th>
            	</tr>
                <tr>
                        <td><strong><a href="<?php echo Yii::app()->createUrl("//article/detail/$artikelTerbaru->id") ?>" style="color:#1D3364"><?php echo $artikelTerbaru->title ?></a></strong></td>
                </tr>
                <tr>
                	<td style="font-size:14px"><?php echo substr(strip_tags(html_entity_decode($artikelTerbaru->post)), 0, 50) . "..." ?><hr/></td>
                </tr>
                <tr>
                	<Td ><strong>TIPS</strong></Td>
                </tr>
                <tr>
                	<td style="font-size:14px;">Bermain Saham Sebagai Investasi<hr/></td>
                </tr>
                <tr>
                	<td><strong>TUTORIAL</strong></td>
                </tr>
                <tr>
                	<td style="font-size:14px;">Bagaimana Untuk Memulai?<hr/></td>
                </tr>
                <tr>
                	<td><strong>PETUNJUK TERBARU</strong></td>
                </tr>
                <tr>
                	<td style="font-size:14px;">Cara Registrasi Email Anda<hr/></td>
                </tr>
</table>