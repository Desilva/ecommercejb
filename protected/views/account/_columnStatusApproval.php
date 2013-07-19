<?php 
    if(strtolower($model->status_approval) == "ditolak")
    {
?>
    <span title='Alasan Penolakan: <?php echo $model->alasan_penolakan ?>' rel='tooltip'><strong><?php echo $model->status_approval ?></strong></span>
<?php
    }
    else
    {
        echo $model->status_approval;
    }
?>
