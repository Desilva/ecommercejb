<form class="form-horizontal" style="margin-left:-90px" method="GET" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari') ?>">
<div class="row-fluid">
        	<div class="span12">
        	<div class="control-group">
            	<label class="control-label Font-Color-DarkBlue" for="jenis">Jenis</label>
                <div class="controls">
                	<label class="radio">
                    	<input type="radio" name="jenis" checked="checked" value="1" />
                        Bisnis
                    </label>
                    <label class="radio">
                    	<input type="radio" name="jenis" value="2" />
                        Franchise
                    </label>
                </div>               
            </div>
           
            <div class="control-group">
            	<label class="control-label Font-Color-DarkBlue" for="lokasi">Provinsi</label>
                <div class="controls">
                    <?php echo CHtml::dropDownList('provinsi','id',CHtml::listData($provinsi,'id','provinsi'),array(
                    'prompt'=>'Pilih Provinsi',
                    'class'=>'Input-Size-VerySmall',
                    'ajax' => array(
                            'type' => 'POST',
                            'url' => Yii::app()->createUrl('//cariBisnisFranchise/generatekota'),
                            'update' => '#kota' )))
                ?>
                </div>
            </div>
            <div class="control-group">
            	<label class="control-label Font-Color-DarkBlue" for="lokasi">Kota</label>
                <div class="controls">
                    <?php echo CHtml::dropDownList('kota','id',array(),array(
                    'prompt'=>'Pilih Kota',
                    'class'=>'Input-Size-VerySmall',
                    ));
                ?>
                </div>
            </div>
            <div class="control-group">
            	<label class="control-label Font-Color-DarkBlue" for="lokasi">Kategori</label>
                <div class="controls">
                	<?php echo CHtml::dropDownList('kategori','id',CHtml::listData($kategori,'id','industri'),array(
                            'prompt'=>'Pilih Kategori',
                            'class'=>'Input-Size-VerySmall',
                            'ajax' => array(
                            'type' => 'POST',
                            'url' => Yii::app()->createUrl('//cariBisnisFranchise/generatesubindustri'),
                            'update' => '#subkategori' ))); ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
            	<label class="control-label Font-Color-DarkBlue" for="kata">Kata Kunci</label>
                <div class="controls">
                	  <?php 
                echo CHtml::textField('keyword','',array('style'=>'width:130px'));
            ?>
                </div>
            </div>
            <div class="control-group">
            	<div class="controls">
                	<button type="submit" class="btn Gradient-Style1">Cari</button>
                </div>
            </div>
        
            </div>
        </div>
    <div style="width: 260px; margin-left: 90px;">
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
    </div>
</form>