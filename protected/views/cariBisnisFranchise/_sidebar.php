<form class="form-horizontal" method="GET" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari') ?>">
<div class="row-fluid widget-title-box">
  <div class="widget-title-text text-center">
  	Cari Bisnis / Franchise
	</div>
</div>
<div class="search-body">
	<div class="row-fluid">
		<div class="search-jenis">
			<?php if($selected_jenis == 1){ ?>
			<label class="radio-button-label">
				<input type="radio" name="jenis" checked="checked" value="1" class="radio-button" style="margin-left:2px" />
				Bisnis
			</label>
			<label class="radio-button-label">
				<input type="radio" name="jenis" class="radio-button" value="2" style="margin-left:20px" />
				Franchise
			</label>
			<?php } else{?>
			<label class="radio-button-label">
				<input type="radio" name="jenis" class="radio-button" value="1" style="margin-left:2px" />
				Bisnis
			</label>
			<label class="radio-button-label">
				<input type="radio" name="jenis" class="radio-button" checked="checked" value="2" style="margin-left:20px" />
				Franchise
			</label>
			<?php } ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="search-input">
			<?php echo CHtml::dropDownList('provinsi',$selected_provinsi,CHtml::listData($provinsi,'id','provinsi'),array(
	        'prompt'=>'Pilih Provinsi',
	        'class'=>'div-input',
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
		</div>
	</div>
	<div class="row-fluid">
		<div class="search-input">
			<?php echo CHtml::hiddenField('kota_temp',$selected_kota); ?>
				<?php echo CHtml::dropDownList('kota','id',array(),array(
					'prompt'=>'Pilih Kota',
					'class'=>'div-input',
					));
			?>
      <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-provinsi" style="display:none" class="loading-animation"/>
		</div>
	</div>
	<div class="row-fluid">
		<div class="search-input">
			<?php 
				echo CHtml::dropDownList('kategori',$selected_kategori,CHtml::listData($kategori,'id','industri'),array(
				'prompt'=>'Pilih Kategori',
				'class'=>'div-input',
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
				)));
			?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="search-input-kunci">
			<?php 
				echo CHtml::textField('keyword',$selected_keyword,array('class' => 'search-input-textbox','placeholder'=>'Masukkan kata kunci'));
			?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="search-advanced">
			<?php 
			$this->widget('zii.widgets.jui.CJuiAccordion', array(
			'panels' => array(
				'Pencarian Lainnya' => $this->renderpartial('//cariBisnisFranchise/_pencarianLainnya', array('subkategori' => $subkategori, 'rangeharga' => $rangeharga, 'omzet' => $omzet, 'selected_subkategori'=>$selected_subkategori,'selected_rangeharga'=> $selected_rangeharga,'selected_omzet'=>$selected_omzet), true),
         
			),
			// additional javascript options for the accordion plugin
			'options' => array(
					'collapsible' => true,
					'active' => 0
				),
			));
			?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="search-row-button">
			<button type="submit" class="btn search-button">Cari</button></td>
		</div>
	</div>
</div>
</form>

<script>
$(document).ready(function(){
        $('.radio-button').each(function() {
        	if ($(this).is(':checked')) {
        		$(this).parent().css('background-position','0 0');
        	} else {
        		$(this).parent().css('background-position','0 -17px');
        	}
        });

        $('.radio-button').click(function() {
        	$('.radio-button').each(function() {
	        	if ($(this).is(':checked')) {
	        		$(this).parent().css('background-position','0 0');
	        	} else {
	        		$(this).parent().css('background-position','0 -17px');
	        	}
	        });
        });
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

        $()
       
    }
    );
    </script>