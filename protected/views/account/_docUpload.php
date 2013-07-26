<?php
$this->widget('CMultiFileUpload', array(
                                'model'=>$model,
                                'attribute'=>'dokumen',
                                'accept'=>'jpg|gif|png|pdf|doc|docx|xls|xlsx|txt',
                                )
                            );
?>
