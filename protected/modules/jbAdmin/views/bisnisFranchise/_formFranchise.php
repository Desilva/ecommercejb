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
  <?php echo $form->hiddenField($model,'id_user',array('value'=>$model->id_user)) ?>
  <?php echo $form->hiddenField($model,'kepemilikan',array('value'=>'0')) ?>
  <p><?php echo $form->errorSummary($model); ?></p>
</div>
<div class="admin-row">
  <?php echo $form->labelEx($model,'id_category'); ?>
  <?php echo $form->hiddenField($model,'id_category',array('readonly'=>'')); ?>
  <div class="admin-jenis">
    <?php 
        echo $model->idCategory->category;
    ?>
  </div>
</div>
<div class="admin-divide-line">
  &nbsp;
</div>
<div class="admin-row">
  <?php echo $form->labelEx($model,'id_industri'); ?>
  <div class="admin-row-select">
    <?php echo $form->dropDownList($model,'id_industri',CHtml::listData($industri,'id','industri'),array(
      'prompt'=>'Pilih Industri','class'=>'admin-select',
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
<div class="admin-row">
  <?php echo $form->labelEx($model,'id_sub_industri'); ?>
  <div class="admin-row-select">
    <?php echo Chtml::hiddenField('sub_industri_temp', $model->id_sub_industri) ?>
    <?php echo $form->dropDownList($model,'id_sub_industri',array(),array('prompt'=>'Pilih Sub Industri','class'=>'admin-select')); ?>
    <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-industri" class="admin-loading-animation-industri" style="display:none"/>
  </div>
</div>
<div class="admin-divide-line">
  &nbsp;
</div>
<div class="admin-row">
  <label><?php echo $form->labelEx($model,'nama'); ?></label>
  <?php echo $form->textField($model,'nama',array('class'=>'admin-input')); ?>
</div>
<div class="admin-row">
  <label><?php echo $form->labelEx($model,'alamat'); ?></label>
  <?php echo $form->textArea($model,'alamat',array('class'=>'admin-textarea')); ?>
</div>
<div class="admin-row">
  <label><?php echo $form->labelEx($model,'id_provinsi'); ?></label>
  <div class="admin-row-select-2">
    <?php echo $form->dropDownList($model,'id_provinsi',CHtml::listData($provinsi,'id','provinsi'),array(
        'prompt'=>'Pilih Provinsi','class'=>'admin-select',
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
<div class="admin-row">
  <?php echo Chtml::hiddenField('kota_temp', $model->id_kota) ?>
  <label><?php echo $form->labelEx($model,'id_kota'); ?></label>
  <div class="admin-row-select-2">
    <?php echo $form->dropDownList($model,'id_kota',array(),array('prompt'=>'Pilih Kota','class'=>'admin-select')); ?>
  </div>
  <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-provinsi" class="account-loading-animation-provinsi" style="display:none"/>
</div>
<div class="admin-row">
  <label><?php echo $form->labelEx($model,'harga'); ?></label>                                            
  <?php  echo $form->hiddenField($model,'harga'); ?>
  <?php  echo Chtml::textField('harga_field','',array('onkeyup'=>'valueCalcWrapper("harga_field","Business_harga")','class'=>'admin-input')); ?>
  <div class="additional">
    <?php  echo $form->checkBox($model,'tampilkanKontak',array('disabled'=>'disabled', 'class'=>'tampilkanKontak')) ?>
    <?php  echo $form->labelEx($model,'tampilkanKontak', array('style'=>'display:inline; margin-left:3px;')) ?>
  </div>
</div>
<div class="admin-divide-line">
  &nbsp;
</div>
<div class="admin-row-subtitle">
  Deskripsi
</div>
<div class="admin-row">
  <?php echo $form->textArea($model,'deskripsi'); ?>
  <script>
    //CKEDITOR.config.width = 570;
    CKEDITOR.replace( 'Business_deskripsi' );
  </script>
</div>
<div class="admin-divide-line">
  &nbsp;
</div>
<div class="admin-row-subtitle">
  Image(s)
</div>
<div class="admin-row">
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
      var initialImageFiles = <?php echo $initial_image_upload ?>;
      $(document).ready(function () {
        $("#upload").kendoUpload({
          multiple: true,
          async: {
              saveUrl: '<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/uploadImage',array('id'=>$model->id_user)) ?>',
              removeUrl: "<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/removeUploadedImage',array('id'=>$model->id_user)) ?>",
              autoUpload: true
          },
          template: kendo.template($('#fileTemplate').html()),
          files:initialImageFiles,
          select: onSelectImage,
          success: onSuccessImage,
          remove: onRemoveImage,
        });
      });
              
      function getImageName(name)
      {

      }
              
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
              var location = '<?php echo Yii::app()->request->baseUrl ?>/uploads/tmp/<?php echo $model->id_user ?>/'+this.name;
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
<div class="admin-divide-line">
  &nbsp;
</div>
<div class="admin-row-subtitle">
  Dokumen
</div>
<div class="admin-row">
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
      var initialDocsFiles = <?php echo $initial_doc_upload ?>;
      $(document).ready(function () {
        $("#upload2").kendoUpload({
             multiple: true,
            async: {
                saveUrl: '<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/uploadDocument',array('id'=>$model->id_user)) ?>',
                removeUrl: "<?php echo Yii::app()->createUrl('//jbAdmin/bisnisFranchise/removeUploadedDocument',array('id'=>$model->id_user)) ?>",
                autoUpload: true
            },
            template: kendo.template($('#fileTemplate2').html()),
            select: onSelectDocument,
            files: initialDocsFiles


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
<div class="admin-divide-line">
  &nbsp;
</div>
<div class="admin-row">
  <?php echo CHtml::button('Batal', array('submit' => array("bisnisFranchise/index/"), 'class'=>'admin-button'));
//                        echo CHtml::button('Simpan', array('submit' => array("bisnisFranchise/update/id/$model->id"), 'class'=>'admin-button')); 
//                        echo CHtml::button('Terima', array('submit' => array("bisnisFranchise/update/id/$model->id/stat/Diterima"), 'class'=>'admin-button')); 
  ?>      
  <?php echo CHtml::ajaxSubmitButton('Simpan',CHtml::normalizeUrl(array("bisnisFranchise/update/id/$model->id")),
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
         ),array('class'=>'admin-button')); ?>
                        
               
  <?php echo CHtml::button('Tolak', array('submit' => array("bisnisFranchise/tolak/id/$model->id"), 'class'=>'admin-button')); ?>
  <?php echo CHtml::ajaxSubmitButton('Terima',CHtml::normalizeUrl(array("bisnisFranchise/update/id/$model->id")),
    array(
        'dataType'=>'json',
        'type'=>'post',
        'success'=>'function(data) {  
           if(data.status=="success"){
               terima();
           }
            else{
               formErrors(data,form="#business-form");
               document.location.href="#business-form_es_";
           }       
       }',                    
        'beforeSend'=>'function(){                        
              $("#AjaxLoader").show();
         }'
        ),array('class'=>'admin-button')); ?>
  <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="AjaxLoader" style="display:none"/>
</div>
<?php $this->endWidget(); ?>
<script>
    function terima()
    {
        $("#business-form").attr("action",'<?php echo Yii::app()->createUrl("//jbAdmin/bisnisFranchise/update/id/$model->id?stat=Diterima"); ?>');
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