<table width="200" class="tableSidebar">
    <tr height="40" style="">
        <th><hr/>KATEGORI<hr/></th>
</tr>
<?php
foreach($articleCategory as $value)
{
    ?>
    <tr style="border-bottom:solid 1px #999;">
        <td style="border-bottom:solid 1px #999;"><a href="<?php echo Yii::app()->createUrl("//article/index/category/$value->id") ?>"><?php echo $value->category ?></a></td>
    </tr>
<?php } ?>
</table>