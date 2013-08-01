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

<div class="span10">
    <div class="row-fluid">
    <h4>Alasan Penolakan: <?php echo $model->nama ?></h4>
    <?php if($error != ""){ ?>
        <p style="color:red"><?php echo $error ?></p>
    <?php } ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'tolak-form',
            'enableAjaxValidation'=>false,
    )); ?>
        <?php echo $form->errorSummary($model); ?>
	
		<br style="clear:both"/>
                <span><?php echo CHtml::dropDownList('alasan',0,CHtml::listData($alasan_penolakan,'id','alasan'),array('prompt'=>'Pilih Alasan')); ?></span>
                <span id="tambah_alasan"><?php echo CHtml::button('Tambah Alasan Baru', array('class'=>'btn Gradient-Style1', 'onclick'=>'displayTextArea()', 'style'=>'width:155px')) ?></span>
                <span id="batal_tambah" style="display:none"><?php echo CHtml::button('Batal', array('class'=>'btn Gradient-Style1', 'onclick'=>'hideTextArea()')) ?></span>
                <p>
                    <?php echo CHtml::textArea('alasan_tambahan','', array('class'=>'styleTextarea1','style'=>'display:none')) ?>
                </p>
		<hr/>
                <?php
                        echo CHtml::button('Simpan', array('submit' => array("bisnisFranchise/tolak/id/$model->id"), 'class'=>'btn Gradient-Style1')); 
                ?>
                </div>
</div>
<?php $this->endWidget(); ?>