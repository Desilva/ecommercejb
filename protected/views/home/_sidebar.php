<table id="homeSidebar">
            	<tr >
            		<th id="titleSideBar"><h3 align="left">LATEST NEWS</h3></th>
            	</tr>
                <?php foreach($artikelTerbaru as $artikel)
                {
                ?>
                <tr>
                        <td><strong><a href="<?php echo Yii::app()->createUrl("//article/detail/$artikel->id") ?>" style="color:#1D3364"><?php echo $artikel->title ?></a></strong></td>
                </tr>
                <tr>
                	<td style="font-size:14px"><?php echo substr(strip_tags(html_entity_decode($artikel->post)), 0, 50) . "..." ?><hr/></td>
                </tr>
                <?php }?>
</table>