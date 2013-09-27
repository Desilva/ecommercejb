
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/js/kendo.common.min.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/js/kendo.default.min.css" />
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/kendo.web.min.js"></script>
<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>

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
                            $this->clips['sidebar']
				?>
				</div>
			</div>
		</div>
		<div class="span9">
			<div>
				<header style="font-size:30px; font-family:Calibri;">Tambah 
                                    <?php if($model->idCategory->category == "Bisnis")
					{
						echo "Bisnis"; 
					}
					else if ($model->idCategory->category == "Franchise") 
					{
						echo "Franchise";
					}
                                    ?></header><br style="clear:both"/></div>
				<div style="margin-top:-35px;"></div>
				<?php
					if($model->idCategory->category == "Bisnis")
					{
						echo $this->renderPartial('_form', array('model'=>$model,'kategori'=>$kategori,'kepemilikan'=>$kepemilikan,'tahun'=>$tahun,'industri'=>$industri,'provinsi'=>$provinsi,'alasan_jual_bisnis'=>$alasan_jual_bisnis)); 
					}
					else if ($model->idCategory->category == "Franchise") 
					{
						echo $this->renderPartial('_formFranchise', array('model'=>$model,'kategori'=>$kategori,'industri'=>$industri,'provinsi'=>$provinsi)); 
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
    $(document).ready(function(){
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
                        $('#Business_harga_penawaran_penjualan').attr('value',result);
                    }
                    else
                    {
                         $('#Business_harga_penawaran_penjualan').removeAttr('value');
                    }

                    //penawaran/lababersih
                    if(isNumber(labaBersih))
                    {
                        var result = parseFloat(parseFloat(input_harga)/parseFloat(labaBersih)).toFixed(2);
                        $('#Business_harga_penawaran_laba_bersih').attr('value',result);
                    }
                    else
                    {
                         $('#Business_harga_penawaran_laba_bersih').removeAttr('value');
                    }

                    //penawaran/aset
                    if(isNumber(aset))
                    {
                        var result = parseFloat(parseFloat(input_harga)/parseFloat(aset)).toFixed(2);
                        $('#Business_harga_penawaran_aset').attr('value',result);
                    }
                    else
                    {
                         $('#Business_harga_penawaran_aset').removeAttr('value');
                    }
                    
                    //calculate marjin laba bersih=> labaBersih/penjualan
                    if(isNumber(labaBersih) && isNumber(penjualan))
                    {
                        var result = parseFloat(parseFloat(labaBersih)/parseFloat(penjualan)).toFixed(2);
                        $('#Business_marjin_laba_bersih').attr('value',result);
                    }
                    else
                    {
                        $('#Business_marjin_laba_bersih').removeAttr('value');
                    }

                     //calculate marjin laba bersih/aset=> labaBersih/aset
                    if(isNumber(labaBersih) && isNumber(aset))
                    {
                        var result = parseFloat(parseFloat(labaBersih)/parseFloat(aset)).toFixed(2);
                        $('#Business_laba_bersih_aset').attr('value',result);
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
    
    function changeCategory(category)
    {
        window.location = '<?php echo Yii::app()->createUrl('//account/create') ?>' + '?jenis=' + category;
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


