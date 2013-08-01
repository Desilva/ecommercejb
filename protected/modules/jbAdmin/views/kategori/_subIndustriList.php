<form action="<?php echo Yii::app()->createUrl("//jbAdmin/kategori/createSubIndustri?id=$id_industri") ?>" method="post">
<?php echo CHtml::submitButton('Tambah Sub Kategori',array('class'=>'btn Gradient-Style1')); ?>
</form>
    <?php
      $this->widget('zii.widgets.grid.CGridView', array(
                'id'=>'subIndustriGrid',
                'dataProvider' => $subkategori,
                'itemsCssClass' => 'table table-striped',
                'summaryText' => '',
                'ajaxUpdate'=>'subIndustriGrid',
                'columns' => array(
                    'sub_industri',
                    'keterangan',
                    array(
                        'class' => 'CButtonColumn',
                        'id'=>'subIndustriGridColumn',
                        'header' => 'Tindakan',
                        'template' => '{update}{delete}',
                        'deleteButtonUrl'=> 'Yii::app()->createUrl("//jbAdmin/kategori/deleteSubIndustri", array("id"=>$data->id))',
                        'updateButtonUrl'=> 'Yii::app()->createUrl("//jbAdmin/kategori/updateSubIndustri", array("id"=>$data->id))',
                        'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/trash.png',
                        'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/write.png',
                    ),
                ),
            ));

    ?>