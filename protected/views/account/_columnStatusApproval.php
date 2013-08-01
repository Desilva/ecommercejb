<?php 
    if(strtolower($model->status_approval) == "ditolak")
    {
        
?>
    <a href="javascript:void(0)" data-html=true data-trigger='hover' title='Alasan Penolakan' data-placement='top' data-content='<?php if(isset($model->idAlasanPenolakan->alasan)) echo $model->idAlasanPenolakan->alasan; else echo "Tidak Ada Data" ?>' rel='popover'><strong><?php echo $model->status_approval ?></strong></a>
<?php
    }
    else
    {
        echo $model->status_approval;
    }
?>
