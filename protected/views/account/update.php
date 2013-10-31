<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/js/kendo.common.min.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/js/kendo.default.min.css" />
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/kendo.web.min.js"></script>
<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
<script src="<?php  echo Yii::app()->baseUrl.'/js/autoNumeric.js'; ?>"></script>

<div class="row-fluid">
	<div class="span11">
		<div class="span2 Top-Margin2">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="icon-th"></i>
					</span>
					<h5>Jualan Bisnis</h5>
				</div>
				<div class="widget-content nopadding">
					<?php 
						if(!empty($this->clips['sidebar'])) echo
                            $this->clips['sidebar']?>
				</div>
			</div>
		</div>
		<div class="span10">
			<div>
				<header style="font-size:30px; font-family:Calibri;">Update <?php echo $model->nama ?></header><br style="clear:both"/>
			</div>
			<div style="margin-top:-35px;"></div>
				<?php
					if($model->idCategory->category == "Bisnis")
					{
						echo $this->renderPartial('_formUpdate', array('model'=>$model,'kategori'=>$kategori,'kepemilikan'=>$kepemilikan,'tahun'=>$tahun,'industri'=>$industri,'provinsi'=>$provinsi,'alasan_jual_bisnis'=>$alasan_jual_bisnis,'initial_doc_upload'=>$initial_doc_upload,'initial_image_upload'=>$initial_image_upload)); 
					}
					else if($model->idCategory->category == "Franchise")
					{
						echo $this->renderPartial('_formFranchiseUpdate', array('model'=>$model,'kategori'=>$kategori,'industri'=>$industri,'provinsi'=>$provinsi,'initial_doc_upload'=>$initial_doc_upload,'initial_image_upload'=>$initial_image_upload)); 
					}
					else
					{
						echo "Error";
					}
				?>
		</div>
	</div>
</div>




<script>
    
    function valueCalcWrapper(id,target)
    {
        setValue(id,target);
        calcValue();
    }
    
    
    function setValue(id,target)
    {
        var valueToApply = $('#'+id).autoNumeric('get');;
//        console.log(valueToApply);
//        var filteredValue = valueToApply.replace('.','');
        $('#'+target).val(valueToApply);
        
    }
    
    $(document).ready(function(){
        
        
        //set value when updating
        var harga_field_value = $('#Business_harga').val();
        var penjualan_field_value = $('#Business_penjualan').val();
        var hpp_field_value = $('#Business_hpp').val();
        var laba_bersih_tahun_field_value = $('#Business_laba_bersih_tahun').val();
        var total_aset_field_value = $('#Business_total_aset').val();
        $('#harga_field').val(harga_field_value);
        $('#penjualan_field').val(penjualan_field_value);
        $('#hpp_field').val(hpp_field_value);
        $('#laba_bersih_tahun_field').val(laba_bersih_tahun_field_value);
        $('#total_aset_field').val(total_aset_field_value);
        
        
        
        //init autonumberic
        $('#harga_field').autoNumeric({aSep:',', aDec:'.', aPad:false ,vMax: 9223372036854775807});
        $('#penjualan_field').autoNumeric({aSep:',', aDec:'.', aPad:false ,vMax: 9223372036854775807});
        $('#hpp_field').autoNumeric({aSep:',', aDec:'.', aPad:false ,vMax: 9223372036854775807});
        $('#laba_bersih_tahun_field').autoNumeric({aSep:',', aDec:'.', aPad:false ,vMax: 9223372036854775807});
        $('#total_aset_field').autoNumeric({aSep:',', aDec:'.', aPad:false ,vMax: 9223372036854775807});
       
        if($('.alasanJualCheckBox').is(':checked'))
        {
              $('.alasanJualDropDown').attr('disabled','disabled');
              $('.alasanJualTextArea').removeAttr('disabled');
//            document.getElementById('<?php echo '#'.CHtml::activeId($model,'dropDownAlasanJual') ?>').disabled = true;
//            document.getElementById('<?php echo '#'.CHtml::activeId($model,'textAreaAlasanJual') ?>').disabled = false;
        }
        else
        {
              $('.alasanJualDropDown').removeAttr('disabled');
              $('.alasanJualTextArea').attr('disabled','disabled');
//            document.getElementById('<?php echo '#'.CHtml::activeId($model,'dropDownAlasanJual') ?>').disabled = false;
//            document.getElementById('<?php echo '#'.CHtml::activeId($model,'textAreaAlasanJual') ?>').disabled = true;
        }
        
        $('.tampilkanKontak').attr('disabled','disabled');
        if(isNumber(document.getElementById('Business_harga').value) )
        {
            
                    var input_harga = document.getElementById('Business_harga').value;
                    /* CHANGE THE VALUE OF HARGA WHEN ITS SETTING IS AVAILABLE */
                    var harga = parseFloat(<?php echo $settings->nilai_min_telpon_tampil ?>);
                    if(input_harga <= harga)
                    {
                        $('.tampilkanKontak').removeAttr('disabled');
                    }
                    else
                    {
                        $('.tampilkanKontak').attr('disabled','disabled');
                    }
                
        }
        
         //repopulate sub industri dropdown
        if(document.getElementById('Business_id_industri').value != '' || document.getElementById('Business_id_industri').value != null)
        {
            var industri_id = document.getElementById('Business_id_industri').value;
            var selected_sub_industri = document.getElementById('sub_industri_temp').value;
            $('#loading-animation-industri').attr('style','display:visible; margin-top:-10px');
            $('#Business_id_sub_industri').load('<?php echo Yii::app()->createUrl('//account/generateSubIndustri') ?>',{'industri':industri_id, 'selected_sub_industri':selected_sub_industri},function(){$('#loading-animation-industri').attr('style','display:none');});

        }
        
        //repopulate kota dropdown
        if(document.getElementById('Business_id_provinsi').value != '' || document.getElementById('Business_id_provinsi').value != null)
        {
            var provinsi_id = document.getElementById('Business_id_provinsi').value;
            var selected_kota = document.getElementById('kota_temp').value;
            $('#loading-animation-provinsi').attr('style','display:visible; margin-top:-10px');
            $('#Business_id_kota').load('<?php echo Yii::app()->createUrl('//account/generateKota') ?>',{'provinsi':provinsi_id, 'selected_kota':selected_kota},function(){$('#loading-animation-provinsi').attr('style','display:none');});

        }
       
    }
    
    
    
    );
    function isNumber(n) {
        if(n.indexOf('.') != -1)
        {
            return false;
        }
        else
        {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }
        
    }
    
    function calcValue()
    {
        var form_harga = document.getElementById('Business_harga').value;
        var penjualan = document.getElementById('Business_penjualan').value;
        var labaBersih = document.getElementById('Business_laba_bersih_tahun').value;
        var aset= document.getElementById('Business_total_aset').value;
       
         /*calculate harga penawaran/penjualan => avg(hargamin + hargamax)/penjualan
         * calculate harga penawaran/lababersih => avg(hargamin + hargamax)/lababersih
         * calculate harga penawaran/aset => avg(hargami + hargamax)/aset
         * calculate whether tampilan kontak should be enabled
         */
//        $('.tampilkanKontak').attr('disabled','disabled');
        if(isNumber(form_harga))
        {
                    var input_harga = parseFloat(form_harga);
                    /* CHANGE THE VALUE OF HARGA WHEN THE SETTING IS AVAILABLE */
                    var harga = parseFloat(<?php echo $settings->nilai_min_telpon_tampil ?>);
                    
                    //tampilan kontak
                    if(parseFloat(input_harga) <= parseFloat(harga))
                    {
                        $('.tampilkanKontak').removeAttr('disabled');
                    }
                    else
                    {
                        $('.tampilkanKontak').attr('disabled','disabled');
                    }
                    
                    //penawaran/penjualan
                    if(isNumber(penjualan))
                    {
                        var result = parseFloat(parseFloat(input_harga)/parseFloat(penjualan)).toFixed(2);
                        if(result != 'Infinity' && result != 'NaN')
                        {
                            $('#Business_harga_penawaran_penjualan').attr('value',result);
                        }
                    }
                    else
                    {
                         $('#Business_harga_penawaran_penjualan').removeAttr('value');
                    }

                    //penawaran/lababersih
                    if(isNumber(labaBersih))
                    {
                        var result = parseFloat(parseFloat(input_harga)/parseFloat(labaBersih)).toFixed(2);
                        if(result != 'Infinity' && result != 'NaN')
                        {
                            $('#Business_harga_penawaran_laba_bersih').attr('value',result);
                        }
                    }
                    else
                    {
                         $('#Business_harga_penawaran_laba_bersih').removeAttr('value');
                    }

                    //penawaran/aset
                    if(isNumber(aset))
                    {
                        var result = parseFloat(parseFloat(input_harga)/parseFloat(aset)).toFixed(2);
                        if(result != 'Infinity' && result != 'NaN')
                        {
                            $('#Business_harga_penawaran_aset').attr('value',result);
                        }
                    }
                    else
                    {
                         $('#Business_harga_penawaran_aset').removeAttr('value');
                    }
                    
                    //calculate marjin laba bersih=> labaBersih/penjualan
                    if(isNumber(labaBersih) && isNumber(penjualan))
                    {
                        var result = parseFloat((parseFloat(labaBersih)/parseFloat(penjualan))*100).toFixed(2);
                        if(result != 'Infinity' && result != 'NaN')
                        {
                            $('#Business_marjin_laba_bersih').attr('value',result);
                        }
                    }
                    else
                    {
                        $('#Business_marjin_laba_bersih').removeAttr('value');
                    }

                     //calculate marjin laba bersih/aset=> labaBersih/aset
                    if(isNumber(labaBersih) && isNumber(aset))
                    {
                        var result = parseFloat((parseFloat(labaBersih)/parseFloat(aset))*100).toFixed(2);
                        if(result != 'Infinity' && result != 'NaN')
                        {
                            $('#Business_laba_bersih_aset').attr('value',result);
                        }
                    }
                    else
                    {
                        $('#Business_laba_bersih_aset').removeAttr('value');
                    }


        }
        else
        {
                $('.tampilkanKontak').attr('disabled','disabled');
                $('#Business_harga_penawaran_penjualan').removeAttr('value');
                $('#Business_harga_penawaran_laba_bersih').removeAttr('value');
                $('#Business_harga_penawaran_aset').removeAttr('value');
        }
        
        
        
       
        
    }
    
    function calcValueFranchise()
    {
        var form_harga = document.getElementById('Business_harga').value;
       
        
//        $('.tampilkanKontak').attr('disabled','disabled');
        if(isNumber(form_harga) )
        {
                    var input_harga = parseFloat(form_harga);
                    /* CHANGE THE VALUE OF HARGA WHEN THE SETTING IS AVAILABLE */
                    var harga = parseFloat(<?php echo $settings->nilai_min_telpon_tampil ?>);
                    
                    //tampilan kontak
                    if(parseFloat(input_harga) < parseFloat(harga))
                    {
                        $('.tampilkanKontak').removeAttr('disabled');
                    }
                    else
                    {
                        $('.tampilkanKontak').attr('disabled','disabled');
                    }
             
        }
        else
        {
                $('.tampilkanKontak').attr('disabled','disabled');
        }
    }
    
    
    function checkboxAlasanJual()
    {
        if($('.alasanJualCheckBox').is(':checked'))
        {
              $('.alasanJualDropDown').attr('disabled','disabled');
              $('.alasanJualTextArea').removeAttr('disabled');
//            document.getElementById('<?php echo '#'.CHtml::activeId($model,'dropDownAlasanJual') ?>').disabled = true;
//            document.getElementById('<?php echo '#'.CHtml::activeId($model,'textAreaAlasanJual') ?>').disabled = false;
        }
        else
        {
              $('.alasanJualDropDown').removeAttr('disabled');
              $('.alasanJualTextArea').attr('disabled','disabled');
//            document.getElementById('<?php echo '#'.CHtml::activeId($model,'dropDownAlasanJual') ?>').disabled = false;
//            document.getElementById('<?php echo '#'.CHtml::activeId($model,'textAreaAlasanJual') ?>').disabled = true;
        }
    }

</script>