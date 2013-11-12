<?php
  $this->menu = $menu;
?>
<script>
function displayTextArea()
{
    $('#alasan_tambahan').removeAttr('disabled');
    $('#alasan_tambahan').show();
    $('#alasan').attr('disabled','disabled');
    $('#tambah_alasan').hide();
    $('#batal_tambah').show();
}

function hideTextArea()
{
    $('#alasan_tambahan').attr('disabled','disabled');
    $('#alasan_tambahan').hide();
    $('#alasan').removeAttr('disabled');
    $('#tambah_alasan').show();
    $('#batal_tambah').hide();
}

</script>
<div class="account-header">
  ALASAN PENOLAKAN: <?php echo strtoupper($model->nama); ?>
</div>
<div class="admin-form">
  <div class="admin-row">
    <?php if($error != ""){ ?>
        <p style="color:red"><?php echo $error ?></p>
    <?php } ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'tolak-form',
            'enableAjaxValidation'=>false,
    )); ?>
        <?php echo $form->errorSummary($model); ?>
  </div>
  <div class="admin-row">
    <div class="admin-row-select">
    <?php echo CHtml::dropDownList('alasan',0,CHtml::listData($alasan_penolakan,'id','alasan'),array('prompt'=>'Pilih Alasan','class'=>'admin-select')); ?>
    </div>
    <?php echo CHtml::button('Tambah Alasan Baru', array('class'=>'admin-header-button', 'id' => 'tambah_alasan', 'onclick'=>'displayTextArea()')) ?>
    <?php echo CHtml::button('Batal', array('class'=>'admin-header-button','id' => 'batal_tambah', 'onclick'=>'hideTextArea()', 'style' => 'display:none')) ?>
  </div>
  <div class="admin-row">
    <?php echo CHtml::textArea('alasan_tambahan','', array('class'=>'admin-textarea admin-textarea-lainnya','style'=>'display:none')) ?>
  </div>
  <div class="admin-row">
    <?php
      echo CHtml::button('Simpan', array('submit' => array("bisnisFranchise/tolak/id/$model->id"), 'class'=>'admin-button')); 
    ?>
  </div>
</div>
<?php $this->endWidget(); ?>