<?php 
    if(strtolower($model->status_approval) == "ditolak")
    {
?>
    <!--<span title='Alasan Penolakan: <?php echo $model->alasan_penolakan ?>' rel='tooltip'><strong><?php echo $model->status_approval ?></strong></span>-->
    <a href="javascript:void(0)" data-html=true data-trigger='hover' title='Alasan Penolakan' data-placement='top' data-content='<?php echo $model->alasan_penolakan ?>' rel='popover'><strong><?php echo $model->status_approval ?></strong></a>
<?php
    }
    else
    {
        echo $model->status_approval;
    }
?>
