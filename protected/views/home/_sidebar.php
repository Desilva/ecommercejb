<table class="table">
                    	<tr>
                        	<th class="Font-Color-DarkBlue">LATEST NEWS</th>
                        </tr>
                         <?php foreach($artikelTerbaru as $artikel)
                            {
                         ?>
                        <tr>
                            <td><a href="<?php echo Yii::app()->createUrl("//article/detail/$artikel->id") ?>"><label class="Font-Style-Bold Font-Color-DarkBlue"><?php echo $artikel->title ?></label></a><p style="margin-top:-10px; font-size:12px; color:grey"> Kategori Pembaca: <?php echo $artikel->idArticleCategoryPembaca->category_pembaca ?> </p> <?php 
                                if(strlen(strip_tags(html_entity_decode($artikel->post))) > 40)
                                {
                                    echo substr(strip_tags(html_entity_decode($artikel->post)), 0, 40) . "..." ;
                                }
                                else 
                                {
                                    echo strip_tags(html_entity_decode($artikel->post));
                                }
                            ?></td>
                        </tr>
                        <?php }?>
</table>