<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/scripts/dropzone.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dropzone.css">
<script>
    $(document).ready(function()
    { 
       //var myDropzone = new Dropzone("td#imgupload", { url: "<?php echo Yii::app()->createUrl('/account/upload'); ?>", dictDefaultMessage:'Tekan untuk upload', uploadMultiple:true, autoProcessQueue:false}) 
       Dropzone.options.imgupload = {
           url: "<?php echo Yii::app()->createUrl('/account/upload'); ?>",
           dictDefaultMessage:'Tekan untuk upload', 
           uploadMultiple:true, 
           autoProcessQueue:false,
           addRemoveLinks:true,
       }
    });

</script>-->


<?php
$this->breadcrumbs=array(
	'Businesses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Business', 'url'=>array('index')),
	array('label'=>'Manage Business', 'url'=>array('admin')),
);
?>

<header style="float:left; font-size:30px; font-family:Calibri;">Tambah Bisnis</header>

<?php
    if($jenis== 1) //bisnis
    {
        echo $this->renderPartial('_form', array('model'=>$model,'kategori'=>$kategori,'kepemilikan'=>$kepemilikan,'tahun'=>$tahun,'industri'=>$industri,'provinsi'=>$provinsi,'alasan_jual_bisnis'=>$alasan_jual_bisnis,'img_upload'=>$img_upload,'doc_upload'=>$doc_upload)); 
    }
    else //franchise
    {
        echo $this->renderPartial('_formFranchise', array('model'=>$model,'kategori'=>$kategori,'industri'=>$industri,'provinsi'=>$provinsi,'img_upload'=>$img_upload,'doc_upload'=>$doc_upload)); 
    }
?>
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
        if(isNumber(document.getElementById('Business_harga_min').value) && isNumber(document.getElementById('Business_harga_max').value))
        {
            if (parseFloat(document.getElementById('Business_harga_min').value) < parseFloat(document.getElementById('Business_harga_max').value))
                {
                    var avg = ((parseFloat(document.getElementById('Business_harga_min').value)) + (parseFloat(document.getElementById('Business_harga_max').value)))/2;
                    /* CHANGE THE VALUE OF HARGA WHEN ITS SETTING IS AVAILABLE */
                    var harga = parseFloat(1000000);
                    if(avg < harga)
                    {
                        $('.tampilkanKontak').removeAttr('disabled');
                    }
                    else
                    {
                        $('.tampilkanKontak').attr('disabled','disabled');
                    }
                }
        }
        
         //repopulate sub industri dropdown
        if(document.getElementById('Business_id_industri').value != '' || document.getElementById('Business_id_industri').value != null)
        {
            var industri_id = document.getElementById('Business_id_industri').value;
            var selected_sub_industri = document.getElementById('sub_industri_temp').value
            $('#Business_id_sub_industri').load('<?php echo Yii::app()->createUrl('//account/generateSubIndustri') ?>',{'industri':industri_id, 'selected_sub_industri':selected_sub_industri});

        }
        
        if(document.getElementById('Business_id_provinsi').value != '' || document.getElementById('Business_id_provinsi').value != null)
        {
            var provinsi_id = document.getElementById('Business_id_provinsi').value;
            var selected_kota = document.getElementById('kota_temp').value
            $('#Business_id_kota').load('<?php echo Yii::app()->createUrl('//account/generateKota') ?>',{'provinsi':industri_id, 'selected_kota':selected_kota});

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
        var hargaMin = document.getElementById('Business_harga_min').value;
        var hargaMax = document.getElementById('Business_harga_max').value;
        var penjualan = document.getElementById('Business_penjualan').value;
        var labaBersih = document.getElementById('Business_laba_bersih_tahun').value;
        var aset= document.getElementById('Business_total_aset').value;
       
         /*calculate harga penawaran/penjualan => avg(hargamin + hargamax)/penjualan
         * calculate harga penawaran/lababersih => avg(hargamin + hargamax)/lababersih
         * calculate harga penawaran/aset => avg(hargami + hargamax)/aset
         * calculate whether tampilan kontak should be enabled
         */
//        $('.tampilkanKontak').attr('disabled','disabled');
        if(isNumber(hargaMin) && isNumber(hargaMax))
        {
            if (parseFloat(hargaMin) < parseFloat(hargaMax))
            {
                    var avg = (parseFloat(hargaMin) + parseFloat(hargaMax))/2;
                    /* CHANGE THE VALUE OF HARGA WHEN THE SETTING IS AVAILABLE */
                    var harga = parseFloat(1000000);
                    
                    //tampilan kontak
                    if(parseFloat(avg) < parseFloat(harga))
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
                        var result = parseFloat(parseFloat(avg)/parseFloat(penjualan)).toFixed(0);
                        $('#Business_harga_penawaran_penjualan').attr('value',result);
                    }
                    else
                    {
                         $('#Business_harga_penawaran_penjualan').removeAttr('value');
                    }

                    //penawaran/lababersih
                    if(isNumber(labaBersih))
                    {
                        var result = parseFloat(parseFloat(avg)/parseFloat(labaBersih)).toFixed(0);
                        $('#Business_harga_penawaran_laba_bersih').attr('value',result);
                    }
                    else
                    {
                         $('#Business_harga_penawaran_laba_bersih').removeAttr('value');
                    }

                    //penawaran/aset
                    if(isNumber(aset))
                    {
                        var result = parseFloat(parseFloat(avg)/parseFloat(aset)).toFixed(0);
                        $('#Business_harga_penawaran_aset').attr('value',result);
                    }
                    else
                    {
                         $('#Business_harga_penawaran_aset').removeAttr('value');
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
        else
        {
                $('.tampilkanKontak').attr('disabled','disabled');
                $('#Business_harga_penawaran_penjualan').removeAttr('value');
                $('#Business_harga_penawaran_laba_bersih').removeAttr('value');
                $('#Business_harga_penawaran_aset').removeAttr('value');
        }
        
        
        
        //calculate marjin laba bersih=> labaBersih/penjualan
        if(isNumber(labaBersih) && isNumber(penjualan))
        {
            var result = parseFloat(parseFloat(labaBersih)/parseFloat(penjualan)).toFixed(0);
            $('#Business_marjin_laba_bersih').attr('value',result);
        }
        else
        {
            $('#Business_marjin_laba_bersih').removeAttr('value');
        }
        
         //calculate marjin laba bersih/aset=> labaBersih/aset
        if(isNumber(labaBersih) && isNumber(aset))
        {
            var result = parseFloat(parseFloat(labaBersih)/parseFloat(aset)).toFixed(0);
            $('#Business_laba_bersih_aset').attr('value',result);
        }
        else
        {
            $('#Business_laba_bersih_aset').removeAttr('value');
        }
        
    }
    
    function calcValueFranchise()
    {
        var hargaMin = document.getElementById('Business_harga_min').value;
        var hargaMax = document.getElementById('Business_harga_max').value;
       
         /*calculate harga penawaran/penjualan => avg(hargamin + hargamax)/penjualan
         * calculate harga penawaran/lababersih => avg(hargamin + hargamax)/lababersih
         * calculate harga penawaran/aset => avg(hargami + hargamax)/aset
         * calculate whether tampilan kontak should be enabled
         */
//        $('.tampilkanKontak').attr('disabled','disabled');
        if(isNumber(hargaMin) && isNumber(hargaMax))
        {
            if (parseFloat(hargaMin) < parseFloat(hargaMax))
            {
                    var avg = (parseFloat(hargaMin) + parseFloat(hargaMax))/2;
                    /* CHANGE THE VALUE OF HARGA WHEN THE SETTING IS AVAILABLE */
                    var harga = parseFloat(1000000);
                    
                    //tampilan kontak
                    if(parseFloat(avg) < parseFloat(harga))
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


<!--<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fileupload-ui.css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.ui.widget.js"></script>
 The Load Image plugin is included for the preview images and image resizing functionality 
<script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
 The Canvas to Blob plugin is included for image resizing functionality 
<script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
 The Iframe Transport is required for browsers without support for XHR file uploads 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.iframe-transport.js"></script>
 The basic File Upload plugin 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fileupload.js"></script>
 The File Upload processing plugin 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fileupload-process.js"></script>
 The File Upload image preview & resize plugin 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fileupload-image.js"></script>
 The File Upload audio preview plugin 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fileupload-audio.js"></script>
 The File Upload video preview plugin 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fileupload-video.js"></script>
 The File Upload validation plugin 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fileupload-validate.js"></script>
<script>

/*jslint unparam: true, regexp: true */
/*global window, $ */
var fileDataArray = [];
$(function () {
    
    var flag=0;
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = '<?php echo Yii::app()->createUrl('account/upload') ?>';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 2000000, // 2 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        maxNumberOfFiles: 5,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        var type = data.originalFiles[0].type;
        fileDataArray.push(data);
        if(fileDataArray.length > 5)
        {
            flag = 1;
            alert("image melebihi 5");
            fileDataArray.pop();
        }
        else if(type.indexOf('image') == -1)
        {
            flag = 1;
            alert("upload harus berupa image");
            fileDataArray.pop();
        }
        else
        {
            data.context = $('<span/>').appendTo('#files');
            $.each(data.files, function (index, file) {
                var node = $('<span/>');
                if (!index) {

                }
                node.appendTo(data.context);
            });
        }
    }).on('fileuploadprocessalways', function (e, data) {
        if(flag == 0)
        {
                var index = data.index,
                file = data.files[index],
                node = $(data.context.children()[index]);
                if (file.preview) {
                    node
                        .prepend('&nbsp;')
                        .prepend(file.preview);
                }
                if (file.error) {
                    node
                        .append('<br>')
                        .append(file.error);
                }
                if (index + 1 === data.files.length) {
                    data.context.find('button')
                        .text('Upload')
                        .prop('disabled', !!data.files.error);
                }
        }
        else
        {
            flag = 0;
        }
        
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            var link = $('<a>')
                .attr('target', '_blank')
                .prop('href', file.url);
            $(data.context.children()[index])
                .wrap(link);
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.result.files, function (index, file) {
            var error = $('<span/>').text(file.error);
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});


function uploadImage()
{
////     $('#fileupload').processQueue();
//    for (var i = 0; i < fileDataArray.length; i++) {
//    var data = fileDataArray[i];
//    data.submit();
//}
}


</script>-->
