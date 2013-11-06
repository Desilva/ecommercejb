<div class="row-fluid">
    <div class="search-advanced-input">
        <?php echo CHtml::hiddenField('sub_kategori_temp',$selected_subkategori); ?>
        <?php echo CHtml::dropDownList('subkategori','id',array(),array(
                'prompt'=>'Pilih Sub Kategori',
                'class'=>'div-input')); ?>
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-kategori" class="loading-animation" style="display:none"/>
    </div>
</div>
<div class="row-fluid">
    <div class="search-advanced-input">
        <?php echo CHtml::dropDownList('rangeharga',$selected_rangeharga,CHtml::listData($rangeharga,'id','range_price'),array(
                'prompt'=>'Pilih Harga',
                'class'=>'div-input')); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="search-advanced-input">
        <?php echo CHtml::dropDownList('omzet',$selected_omzet,CHtml::listData($omzet,'id','range_price'),array(
                'prompt'=>'Pilih Omzet',
                'class'=>'div-input')); ?>
    </div>
</div>