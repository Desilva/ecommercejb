<form class="form-horizontal Left-Margin-Minus2" method="GET" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari') ?>">
<div class="row-fluid">
        	<div class="span12">
        	<div class="control-group">
            	<label class="control-label Font-Color-DarkBlue " for="jenis">Jenis</label>
                <div class="controls">
                    <?php if($selected_jenis == 1){ ?>
                    <label class="radio">
                    	<input type="radio" name="jenis" checked="checked" value="1" />
                        Bisnis
                    </label>
                    <label class="radio">
                    	<input type="radio" name="jenis" value="2" />
                        Franchise
                    </label>
                    <?php } else{?>
                    <label class="radio">
                    	<input type="radio" name="jenis" value="1" />
                        Bisnis
                    </label>
                    <label class="radio">
                    	<input type="radio" name="jenis" checked="checked" value="2" />
                        Franchise
                    </label>
                    <?php } ?>
                </div>               
            </div>
           
            <div class="control-group">
            	<label class="control-label Font-Color-DarkBlue" for="lokasi">Provinsi</label>
                <div class="controls">
                    <?php echo CHtml::dropDownList('provinsi',$selected_provinsi,CHtml::listData($provinsi,'id','provinsi'),array(
                    'prompt'=>'Pilih Provinsi',
                    'class'=>'Input-Size-VerySmall',
                    'ajax' => array(
                            'type' => 'POST',
                            'url' => Yii::app()->createUrl('//cariBisnisFranchise/generatekota'),
                            'update' => '#kota',
                            'beforeSend' => "function( request )
                                {
                                 $('#loading-animation-provinsi').removeAttr('style');
                                  // Set up any pre-sending stuff like initializing progress indicators
                                }",
                            'complete' => "function( data )
                                {
                                     $('#loading-animation-provinsi').attr('style','display:none');                                  
                                }",    
                            )))
                ?>
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-provinsi" style="display:none"/>
                </div>
            </div>
            <div class="control-group">
            	<label class="control-label Font-Color-DarkBlue" for="lokasi">Kota</label>
                <div class="controls">
                    <?php echo CHtml::hiddenField('kota_temp',$selected_kota); ?>
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
                	<?php echo CHtml::dropDownList('kategori',$selected_kategori,CHtml::listData($kategori,'id','industri'),array(
                            'prompt'=>'Pilih Kategori',
                            'class'=>'Input-Size-VerySmall',
                            'ajax' => array(
                            'type' => 'POST',
                            'url' => Yii::app()->createUrl('//cariBisnisFranchise/generateSubIndustri'),
                            'update' => '#subkategori',
                            'beforeSend' => "function( request )
                                {
                                 $('#loading-animation-kategori').removeAttr('style');
                                  // Set up any pre-sending stuff like initializing progress indicators
                                }",
                            'complete' => "function( data )
                                {
                                     $('#loading-animation-kategori').attr('style','display:none');                                  
                                }",    
                                ))); ?>
                    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-kategori" style="display:none"/>
                </div>
            </div>
            <div class="control-group">
            	<label class="control-label Font-Color-DarkBlue" for="kata">Kata Kunci</label>
                <div class="controls">
                	  <?php 
                echo CHtml::textField('keyword',$selected_keyword,array('style'=>'width:130px'));
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
    <div class="" style="width: 285px; margin-left: 75px;">
<?php 
//        if($selected_subkategori != "" || $selected_rangeharga != "" || $selected_omzet != "")
//        {
//                $this->widget('zii.widgets.jui.CJuiAccordion', array(
//                    'panels' => array(
//                        'Pencarian Lainnya' => $this->renderpartial('//cariBisnisFranchise/_pencarianLainnya', array('subkategori' => $subkategori, 'rangeharga' => $rangeharga, 'omzet' => $omzet, 'selected_subkategori'=>$selected_subkategori,'selected_rangeharga'=> $selected_rangeharga,'selected_omzet'=>$selected_omzet), true),
//                   
//                    ),
//                    // additional javascript options for the accordion plugin
//                    'options' => array(
//                        'collapsible' => 'true',
//                        'active' => 'true'
//                    ),
//                ));
//        }
//        else
//        {
//            $this->widget('zii.widgets.jui.CJuiAccordion', array(
//                    'panels' => array(
//                        'Pencarian Lainnya' => $this->renderpartial('//cariBisnisFranchise/_pencarianLainnya', array('subkategori' => $subkategori, 'rangeharga' => $rangeharga, 'omzet' => $omzet, 'selected_subkategori'=>$selected_subkategori,'selected_rangeharga'=> $selected_rangeharga,'selected_omzet'=>$selected_omzet), true),
//                   
//                    ),
//                    // additional javascript options for the accordion plugin
//                    'options' => array(
//                        'collapsible' => 'true',
//                        'active' => 'false'
//                    ),
//                ));
//
//        }
            $this->widget('zii.widgets.jui.CJuiAccordion', array(
                    'panels' => array(
                        'Pencarian Lainnya' => $this->renderpartial('//cariBisnisFranchise/_pencarianLainnya', array('subkategori' => $subkategori, 'rangeharga' => $rangeharga, 'omzet' => $omzet, 'selected_subkategori'=>$selected_subkategori,'selected_rangeharga'=> $selected_rangeharga,'selected_omzet'=>$selected_omzet), true),
                   
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

<script>
$(document).ready(function(){
        
         //repopulate sub kategori dropdown
        if(document.getElementById('kategori').value != '' || document.getElementById('kategori').value != null)
        {
            var industri_id = document.getElementById('kategori').value;
            var selected_sub_kategori = document.getElementById('sub_kategori_temp').value;
            $('#loading-animation-kategori').removeAttr('style');
            $('#subkategori').load('<?php echo Yii::app()->createUrl('//cariBisnisFranchise/generateSubIndustri') ?>',{'kategori':industri_id, 'selected_sub_kategori':selected_sub_kategori},function(){$('#loading-animation-kategori').attr('style','display:none');});

        }
        
        //repopulate kota dropdown
        if(document.getElementById('provinsi').value != '' || document.getElementById('provinsi').value != null)
        {
            var provinsi_id = document.getElementById('provinsi').value;
            var selected_kota = document.getElementById('kota_temp').value;
            $('#loading-animation-provinsi').removeAttr('style');
            $('#kota').load('<?php echo Yii::app()->createUrl('//cariBisnisFranchise/generateKota') ?>',{'provinsi':provinsi_id, 'selected_kota':selected_kota},function(){$('#loading-animation-provinsi').attr('style','display:none');});

        }
       
    }
    );
    </script>