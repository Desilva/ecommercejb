<style>
        th label{
        font-weight: bold;
    }
        input[type="radio"]{
        margin-top: -3px;
    }
        input[type="checkbox"]{
        margin-top: -3px;
    }
</style>
<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'business-form',
  'enableAjaxValidation'=>true,
  'clientOptions' => array(
          'validateOnSubmit'=>true,
          'validateOnChange'=>true,
          'validateOnType'=>false,
  ),
  'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<div class="error-field">
  <?php echo $form->hiddenField($model,'id_user',array('value'=>Yii::app()->user->id)) ?>
  <?php echo $form->hiddenField($model,'kepemilikan',array('value'=>'0')) ?>
  <p><?php echo $form->errorSummary($model); ?></p>
</div>
<div class="account-create-row">
  <label><?php echo $form->labelEx($model,'id_category'); ?></label>
  <?php echo $form->radioButtonList($model,'id_category',$kategori,array("class"=>"radio-button-account-create",'onchange'=>'changeCategory(1)', 'separator' => '','labelOptions'=>array('style'=>'display:inline'))) ?>
</div>
<div class="account-create-divide-line">
  &nbsp;
</div>
<div class="account-create-row">
  <?php echo $form->labelEx($model,'id_industri'); ?>
  <div class="account-create-row-select">
    <?php echo $form->dropDownList($model,'id_industri',CHtml::listData($industri,'id','industri'),array(
      'prompt'=>'Pilih Industri','class'=>'account-create-select',
      'ajax' => array(
            'type' => 'POST',
            'url' => Yii::app()->createUrl('//account/generatesubindustri'),
            'update' => '#'.CHtml::activeId($model,'id_sub_industri'),
      'beforeSend' => "function( request )
                {
                 $('#loading-animation-industri').attr('style','display:visible; margin-top:-10px');
                  // Set up any pre-sending stuff like initializing progress indicators
                }",
            'complete' => "function( data )
                {
                     $('#loading-animation-industri').attr('style','display:none');                                  
                }",
    ))); ?>
  </div>
</div>
<div class="account-create-row">
  <?php echo $form->labelEx($model,'id_sub_industri'); ?>
  <div class="account-create-row-select">
    <?php echo Chtml::hiddenField('sub_industri_temp', $model->id_sub_industri) ?>
    <?php echo $form->dropDownList($model,'id_sub_industri',array(),array('prompt'=>'Pilih Sub Industri','class'=>'account-create-select')); ?>
    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-industri" class="account-loading-animation-industri" style="display:none"/>
  </div>
</div>
<div class="account-create-divide-line">
  &nbsp;
</div>
<div class="account-create-row">
  <label><?php echo $form->labelEx($model,'nama'); ?></label>
  <?php echo $form->textField($model,'nama',array('class'=>'account-create-input')); ?>
</div>
<div class="account-create-row">
  <label><?php echo $form->labelEx($model,'alamat'); ?></label>
  <?php echo $form->textArea($model,'alamat',array('class'=>'account-create-textarea')); ?>
</div>
<div class="account-create-row">
  <label><?php echo $form->labelEx($model,'id_provinsi'); ?></label>
  <div class="account-create-row-select-2">
    <?php echo $form->dropDownList($model,'id_provinsi',CHtml::listData($provinsi,'id','provinsi'),array(
        'prompt'=>'Pilih Provinsi','class'=>'account-create-select',
        'ajax' => array(
            'type' => 'POST',
            'url' => Yii::app()->createUrl('//account/generatekota'),
            'update' => '#'.CHtml::activeId($model,'id_kota'),
            'beforeSend' => "function( request )
                {
                 $('#loading-animation-provinsi').attr('style','display:visible; margin-top:-10px');
                  // Set up any pre-sending stuff like initializing progress indicators
                }",
            'complete' => "function( data )
                {
                     $('#loading-animation-provinsi').attr('style','display:none');                                  
                }",
      ))); 
    ?>
  </div>
</div>
<div class="account-create-row">
  <?php echo Chtml::hiddenField('kota_temp', $model->id_kota) ?>
  <label><?php echo $form->labelEx($model,'id_kota'); ?></label>
  <div class="account-create-row-select-2">
    <?php echo $form->dropDownList($model,'id_kota',array(),array('prompt'=>'Pilih Kota','class'=>'account-create-select')); ?>
  </div>
  <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-provinsi" class="account-loading-animation-provinsi" style="display:none"/>
</div>
<div class="account-create-row">
  <label><?php echo $form->labelEx($model,'harga'); ?></label>                                            
  <?php  echo $form->hiddenField($model,'harga'); ?>
  <?php  echo Chtml::textField('harga_field','',array('onkeyup'=>'valueCalcWrapper("harga_field","Business_harga")','class'=>'account-create-input')); ?>
  <div class="additional">
    <?php  echo $form->checkBox($model,'tampilkanKontak',array('disabled'=>'disabled', 'class'=>'tampilkanKontak')) ?>
    <?php  echo $form->labelEx($model,'tampilkanKontak', array('style'=>'display:inline; margin-left:3px;')) ?>
  </div>
</div>
<div class="account-create-divide-line">
  &nbsp;
</div>
<div class="account-create-row-subtitle">
  Deskripsi
</div>
<div class="account-create-row">
  <?php echo $form->textArea($model,'deskripsi'); ?>
  <script>
    //CKEDITOR.config.width = 570;
    CKEDITOR.replace( 'Business_deskripsi' );
  </script>
</div>
<div class="account-create-divide-line">
  &nbsp;
</div>
<div class="account-create-row-subtitle">
  Image(s)
</div>
<div class="account-create-row">
  <div id="example" class="k-content">
    <input type="file" name="files" id="upload" />
    <input type='hidden' value='0' id='image_incrementor' />
    <script id="fileTemplate" type="text/x-kendo-template">
      <span class='k-progress'></span>
      <div class='file-wrapper'>
          <span><img id='#=files[0].name##=files[0].size#' src='<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner-large.gif' class='file-icon' /></span>
          <div class='file-heading file-name-heading account-file-heading'>Name: #=name#</div>
          <div class='file-heading file-size-heading account-file-size'>Size: #=size# bytes</div>
          <button type='button' class='k-upload-action'></button>
      </div>
    </script>
    <script>
      var totalFiles = 0;
      $(document).ready(function () {
          $("#upload").kendoUpload({
              multiple: true,
              async: {
                  saveUrl: '<?php echo Yii::app()->createUrl('//account/uploadImage') ?>',
                  removeUrl: "<?php echo Yii::app()->createUrl('//account/removeUploadedImage') ?>",
                  autoUpload: true
              },
              template: kendo.template($('#fileTemplate').html()),
              select: onSelectImage,
              success: onSuccessImage,
              remove: onRemoveImage,
          });
      });
                
      function onSelectImage(e)
      {
        var flagExtension = 0;
        var flagSize = 0;
        var allowedExtension = [".jpg",".jpeg",".png",".gif",".bmp"];
        var selectedFiles = e.files.length;
       
        
        $.each(e.files, function(index, value) {
            if(value.size > 2097152)
            {
                flagSize = 1;
            }
            if($.inArray((value.extension).toLowerCase(), allowedExtension) === -1)
            {
                flagExtension = 1;
            }
        });
        
        if(flagExtension == 1)
        {
            alert("File yang diperbolehkan hanya berupa jpg/jpeg, png, gif, dan bmp");
            e.preventDefault();
        }
        
        if(flagSize == 1)
        {
            alert("Ukuran setiap file tidak boleh ada yang melebihi 2 MB");
            e.preventDefault();
        }
        
        if(flagExtension != 1 && flagSize != 1)
        {
            if (totalFiles + selectedFiles > 5) 
            {
                alert("Jumlah maksimum 5 file");
                e.preventDefault();
            }
            else {
                totalFiles += selectedFiles;
            }
        }
      }
                
      function onSuccessImage(e)
      {
        // Array with information about the uploaded files
        var files = e.files;
        
        if (e.operation == "upload") {
          $.each(files, function(){
              var id = this.name+this.size;
              var location = '<?php echo Yii::app()->request->baseUrl ?>/uploads/tmp/<?php echo Yii::app()->user->id ?>/'+this.name;
              $("[id='"+id+"']").attr('src',location);
  //                        $('#'+id).append('<img src="'+location+'" />');
  //                        alert('#'+id);
          });
        }   
      }
                
      function onRemoveImage(e)
      {
        totalFiles--;
      }    
    </script>
  </div>
</div>
<div class="account-create-divide-line">
  &nbsp;
</div>
<div class="account-create-row-subtitle">
  Dokumen
</div>
<div class="account-create-row">
  <div id="example2" class="k-content">
    <input type="file" name="files" id="upload2" />
    <script id="fileTemplate2" type="text/x-kendo-template">
      <span class='k-progress'></span>
      <div class='file-wrapper'>
          <span class='file-icon #=addExtensionClass(files[0].extension)#'></span>
          <div class='file-heading file-name-heading account-file-heading'>Name: #=name#</div>
          <div class='file-heading file-size-heading account-file-size'>Size: #=size# bytes</div>
          <button type='button' class='k-upload-action'></button>
      </div>
    </script>

    <script>
      $(document).ready(function () {
        $("#upload2").kendoUpload({
             multiple: true,
            async: {
                saveUrl: '<?php echo Yii::app()->createUrl('//account/uploadDocument') ?>',
                removeUrl: "<?php echo Yii::app()->createUrl('//account/removeUploadedDocument') ?>",
                autoUpload: true
            },
            template: kendo.template($('#fileTemplate2').html()),
            select: onSelectDocument,


        });
      });

      function addExtensionClass(extension) {
        switch (extension) {
          case '.jpg':
          case '.img':
          case '.png':
          case '.gif':
              return "img-file";
          case '.doc':
          case '.docx':
              return "doc-file";
          case '.xls':
          case '.xlsx':
              return "xls-file";
          case '.pdf':
              return "pdf-file";
          case '.zip':
          case '.rar':
              return "zip-file";
          default:
              return "default-file";
        }
      }
              
      function onSelectDocument(e)
      {
        var flagExtension = 0;
        var flagSize = 0;
        var allowedExtension = [".jpg",".jpeg",".png",".gif",".bmp",".pdf",".zip",".rar",".doc",".docx",".xls",".xlsx",".txt",".ppt",".pptx"];
        
        $.each(e.files, function(index, value) {
            if(value.size > 5242880)
            {
                flagSize = 1;
            }
            if($.inArray((value.extension).toLowerCase(), allowedExtension) === -1)
            {
                flagExtension = 1;
            }
        });
        
        if(flagExtension == 1)
        {
            alert("File yang diperbolehkan hanya berupa jpg/jpeg, png, gif,bmp, pdf, zip, rar, doc(x), xls(x), txt, ppt(x)");
            e.preventDefault();
        }
        
        if(flagSize == 1)
        {
            alert("Ukuran setiap file tidak boleh ada yang melebihi 5 MB");
            e.preventDefault();
        }
      }
    </script>
  </div>
</div>
<div class="account-create-divide-line">
  &nbsp;
</div>
<div class="account-create-row">
  <?php echo CHtml::button('Batal', array('submit' => array("account/index?kategori=2"), 'class'=>'account-create-button')); ?>
  <?php //echo CHtml::button('Simpan Draft', array('submit' => array("account/create?stat=Draft"), 'class'=>'btn Gradient-Style1')); ?>
  <?php echo CHtml::ajaxSubmitButton('Simpan Draft',CHtml::normalizeUrl(array('account/create','render'=>true)),
    array(
       'dataType'=>'json',
       'type'=>'post',
       'success'=>'function(data) {  
          if(data.status=="success"){
              draft();
          }
           else{
              formErrors(data,form="#business-form");
              document.location.href="#business-form_es_";
          }       
      }',                    
       'beforeSend'=>'function(){                        
             $("#AjaxLoader").show();
        }'
       ),array('class'=>'account-create-button')); ?>
  <?php echo CHtml::button('Lihat', array('class'=>'account-create-button','onclick'=>"preview(this.form,'_blank')")); ?>
  <?php // echo CHtml::button('Kirim', array('submit' => array("account/create"), 'class'=>'btn Gradient-Style1')); ?>
  <?php echo CHtml::ajaxSubmitButton('Kirim',CHtml::normalizeUrl(array('account/create','render'=>true)),
   array(
       'dataType'=>'json',
       'type'=>'post',
       'success'=>'function(data) {  
          if(data.status=="success"){
           $("#business-form").submit();
          }
           else{
              formErrors(data,form="#business-form");
              document.location.href="#business-form_es_";
          }       
      }',                    
       'beforeSend'=>'function(){                        
             $("#AjaxLoader").show();
        }'
       ),array('class'=>'account-create-button')); ?>
  <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="AjaxLoader" style="display:none"/>
</div>
<?php $this->endWidget(); ?>
<script>
    function preview(f,newtarget)
    {
        document.getElementById('business-form').target= newtarget;
        document.getElementById('business-form').action= '<?php echo Yii::app()->createUrl('//account/preview') ?>' 
        f.submit();
        document.getElementById('business-form').target= '_self';
        document.getElementById('business-form').action= '<?php echo Yii::app()->createUrl("//account/create") ?>'
    }
    
    function draft()
    {
        $("#business-form").attr("action",'<?php echo Yii::app()->createUrl("//account/create",array("stat"=>"Draft")); ?>');
        $("#business-form").submit();
    }
    
    function formErrors(data,form){
        var summary = '';
        summary="<br/><p>Silahkan perbaiki kesalahan input berikut:</p><ul>";

        $.each(data, function(key, val) {
        summary = summary + "<li>" + val.toString() + "</li>";
        });
        summary += "</ul>";
        $(form+"_es_").html(summary.toString());
        $(form+"_es_").show();

        $("[id^='update-button']").show();
        $('#AjaxLoader').hide();//css({display:'none'});
        $('#AjaxLoader').text('');
}

function hideFormErrors(form){
        //alert (form+"_es_");
        $(form+"_es_").html('');
        $(form+"_es_").hide();
        $("[id$='_em_']").html('');
}
</script>