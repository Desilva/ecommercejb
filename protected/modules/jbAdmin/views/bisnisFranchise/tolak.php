<script>
function displayTextArea()
{
    $('#alasan_tambahan').show();
}

</script>

<div>
    <h2>Alasan Tolak: <?php echo $model->nama ?></h2>
    <?php if($error != ""){ ?>
        <p><?php echo $error ?></p>
    <?php } ?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'tolak-form',
            'enableAjaxValidation'=>false,
    )); ?>
        <?php echo $form->errorSummary($model); ?>
	
		<br style="clear:both"/>
                <span><?php echo CHtml::dropDownList('alasan',0,$alasan_penolakan,array('prompt'=>'Pilih Alasan','class'=>'styleSelect2')); ?></span>
                <span><?php echo CHtml::button('Tambah Alasan Baru', array('class'=>'StyleSubmit2', 'onclick'=>'displayTextArea()', 'style'=>'width:140px')) ?></span>
                <p>
                    <?php echo CHtml::textArea('alasan_tambahan','', array('class'=>'styleTextarea1','style'=>'display:none')) ?>
                </p>
		<hr/>
                <?php
                        echo CHtml::button('Simpan', array('submit' => array("bisnisFranchise/tolak/id/$model->id"), 'class'=>'styleSubmit2')); 
                ?>
</div>
<?php $this->endWidget(); ?>