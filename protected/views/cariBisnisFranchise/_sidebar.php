<form class="form-horizontal" method="GET" action="<?php echo Yii::app()->createUrl('//cariBisnisFranchise/cari') ?>">
<div class="row-fluid">
        <div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="icon-align-justify"></i>									
							</span>
							<h5>Cari Bisnis / Franchise</h5>
						</div>
						<div class="widget-content nopadding">
							<table class="table">
								<tr>
									
									<td style="padding-left:40px">Jenis</td>
									<td style="padding-left:10px">
									
										<?php if($selected_jenis == 1){ ?>
											<label class="radio">
												<input type="radio" name="jenis" checked="checked" value="1" style="margin-left:2px" />
												Bisnis
											</label>
											<label class="radio">
												<input type="radio" name="jenis" value="2" style="margin-left:20px" />
												Franchise
											</label>
										<?php } else{?>
										<label class="radio">
											<input type="radio" name="jenis" value="1" style="margin-left:2px" />
											Bisnis
										</label>
										<label class="radio">
											<input type="radio" name="jenis" checked="checked" value="2" style="margin-left:20px" />
											Franchise
										</label>
										<?php } ?>
									</td>
								</tr>
								<tr>
									<td style="padding-left:40px">Provinsi</td>
									<td>
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
									</td>
								</tr>
								<tr>
									<Td style="padding-left:40px"> Kota</td>
									<td>
										<?php echo CHtml::hiddenField('kota_temp',$selected_kota); ?>
										<?php echo CHtml::dropDownList('kota','id',array(),array(
											'prompt'=>'Pilih Kota',
											'class'=>'Input-Size-VerySmall',
											));
										?>
                                        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-provinsi" style="display:none"/>                                                                          
									</td>
								</tr>
								<tr>
									<td style="padding-left:40px">Kategori</td>
									<td>
										<?php 
											echo CHtml::dropDownList('kategori',$selected_kategori,CHtml::listData($kategori,'id','industri'),array(
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
											))); 
										?>                    
									</td>
								</tr>
								<tr>
									<td style="padding-left:40px">Kata Kunci</td>
									<td>
										 <?php 
											echo CHtml::textField('keyword',$selected_keyword,array('style'=>'width:140px!important'));
										?>
									</td>
								</tr>
								<tr>
									<Td></td>
									<tD><button type="submit" class="btn Gradient-Style1">Cari</button></td>
								</tr>
							</table>
							<div class="" style="width: 285px; margin-left: 15px; padding-bottom:10px" >
								<?php 
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
						</div>
			</div>

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