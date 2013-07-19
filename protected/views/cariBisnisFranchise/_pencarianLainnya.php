<div>
    <table>
        <tr>
            <td>Sub Kategori<br/>
                <?php echo CHtml::dropDownList('subkategori','id',array(),array('prompt'=>'Pilih Sub Kategori','class'=>'styleSelect2')); ?>
            </td>
        </tr>
        <tr>
            <td>Range Harga<br/>
                <?php echo CHtml::dropDownList('rangeharga','id',$rangeharga,array('prompt'=>'Pilih Harga','class'=>'styleSelect2')); ?>
            </td>
        </tr>
        <tr>
            <td>Range Omzet<br/>
                <?php echo CHtml::dropDownList('omzet','id',$omzet,array('prompt'=>'Pilih Omzet','class'=>'styleSelect2')); ?>
            </td>
        <tr/>
    </table>
</div>