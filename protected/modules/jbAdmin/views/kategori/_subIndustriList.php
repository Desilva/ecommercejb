
<div class="account-jual-category">
  <form action="<?php echo Yii::app()->createUrl("//jbAdmin/kategori/createSubIndustri?id=$id_industri") ?>" method="post">
    <?php echo CHtml::submitButton('Tambah Sub Kategori',array('class'=>'account-jual-add','id'=>'subIndustriGridTambahButton')); ?>
  </form>
</div>
<div class="account-beli-table">
  <?php
    $this->widget('zii.widgets.grid.CGridView', array(
              'id'=>'subIndustriGrid',
              'dataProvider' => $subkategori,
              'itemsCssClass' => 'table table-striped',
              'summaryText' => '',
              'enableSorting' => false,
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
                      'deleteConfirmation' => 'PERHATIAN: Dengan menghapus sub industri ini maka bisnis/franchise yang menggunakan nya harus di set ulang ke sub industri baru. Apakah anda yakin?',
                      'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/trash.png',
                      'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/write.png',
                  ),
              ),
          ));

  ?>
</div>