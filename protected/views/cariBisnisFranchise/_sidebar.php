<?php 
//    $form = $this->beginWidget('CActiveForm', array(
//        'id' => 'search-businessfranchise-form',
//        'enableAjaxValidation' => false,
//        'htmlOptions' => array('name'=>'search','method'=>'get'),
//        'action' => Yii::app()->createUrl('//cariBisnisFranchise/cari'),
//    ));
?>
<form method="GET" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari') ?>">
<table width="200" class="tableSidebar">
    	<tr height="40" style="border-top:solid 1px #999">
    	<th align="left" class="titleSidebar" style="border-bottom:solid 1px #999"><input type="radio" name="jenis" value="1" checked="checked" /> BISNIS</th>
        <td></td>
    </tr>
    <tr height="40">
    	<th align="left" class="titleSidebar"><input type="radio" name="jenis" value="2" /> FRANCHISE</th>
    </tr>
    <tr>
    	<td>
            <hr/>Provinsi<br/>
        	<?php echo CHtml::dropDownList('provinsi','id',CHtml::listData($provinsi,'id','provinsi'),array(
                    'prompt'=>'Pilih Provinsi',
                    'class'=>'styleSelect2',
                    'ajax' => array(
                            'type' => 'POST',
                            'url' => Yii::app()->createUrl('//cariBisnisFranchise/generatekota'),
                            'update' => '#kota' )))
                ?>
            </select>
        </td>
    </tr>
    <tr>
    	<td>
            <hr/>Kategori<br/>
            <?php echo CHtml::dropDownList('kategori','id',CHtml::listData($kategori,'id','industri'),array(
                'prompt'=>'Pilih Kategori',
                'class'=>'styleSelect2',
                'ajax' => array(
                            'type' => 'POST',
                            'url' => Yii::app()->createUrl('//cariBisnisFranchise/generatesubindustri'),
                            'update' => '#subkategori' ))); ?>
        </td>
    </tr>
    <tr>
    	<td>
        	<hr/>Kota<br/>
            <?php echo CHtml::dropDownList('kota','id',array(),array('prompt'=>'Pilih Kota','class'=>'styleSelect2')); ?>
        </td>
    </tr>
    <tr>
    	<td><hr/>
            Kata Kunci<br/>
            <?php 
                echo CHtml::textField('keyword','',array('class'=>'styleText1'));
            ?>
        </td>
    </tr>
    <tr>
    	<td><hr/>
            <?php 
                $this->widget('zii.widgets.jui.CJuiAccordion', array(
                    'panels' => array(
                        'Pencarian Lainnya' => $this->renderpartial('//cariBisnisFranchise/_pencarianLainnya', array('subkategori' => $subkategori, 'rangeharga' => $rangeharga, 'omzet' => $omzet), true),
                   
                    ),
                    // additional javascript options for the accordion plugin
                    'options' => array(
                        'collapsible' => 'true',
                        'active' => 'false'
                    ),
                ));
            ?>
        </td>
    </tr>
    <tr>
    	<td><input type="submit" class="styleSubmit2" style="float:right" value="Cari"/></td>
    </tr>
</table>
</form>
<?php // $this->endWidget(); ?>