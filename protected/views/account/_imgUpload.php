  <?php 
                                        $this->widget('ext.xupload.XUpload', array(
                                        'url' => Yii::app()->createUrl("account/upload"),
                                        'model' => $img_upload,
                                        'htmlOptions' => array('id'=>'business-form'),
                                        'id'=>'upload1',
                                        'attribute' => 'file',
                                        'multiple' => true,
                                        'showForm'=> true,
                                        'options'=>array(
                                            'maxNumberOfFiles'=> 5,
                                            'acceptFileTypes'=> "js:/(\.|\/)(gif|jpe?g|png)$/i",
                                            'maxFileSize'=> 2000000,
                                        ),
                                        'formView' => 'application.views.account._xupload',
                                    ));
                                        ?>