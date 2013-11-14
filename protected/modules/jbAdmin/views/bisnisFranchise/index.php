<?php
  $this->menu = $menu;
?>
<style>
    input[type="button"].buttonGrid {
    background: -moz-linear-gradient(center top , #1568AE, #1568AE) repeat scroll 0 0 transparent;
    border: 1px solid #FFFFFF;
    border-radius: 2px 2px 2px 2px;
    color: #FEF4E9;
    height: 30px;
    width: 100px;
}

a.recommend img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}
a.update img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}
a.delete img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}

</style>
<div class="account-header">
  MENGATUR BISNIS / FRANCHISE
</div>
<div class="account-jual-category">
  <form method="get">
    <div class="account-beli-select-div">
      <?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'account-beli-select','submit'=> Yii::app()->createUrl("//jbAdmin/bisnisFranchise/index/")));  ?>
    </div>
  </form>
</div>
<div class="account-beli-table">
  <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
//                                'dataProvider' => $model,
      'dataProvider'=>$business_model->search($selectedSortValue),
      'filter'=>$business_model,
      'itemsCssClass' => 'table table-bordered table-striped table-hover',
      'summaryText' => '',
      'ajaxUpdate' => true,
  //'htmlOptions' => array('style' => 'width: 720px'),
      'columns' => array(
          'nama' => array('header' => 'Nama Bisnis/Franchise', 'name' => 'nama'),
           array(
                  'name' => 'deskripsi',
                  'type' => 'raw', //because of using html-code <br/>
                  //call the controller method gridProduct for each row
                  'value' => array($this, 'gridDeskripsi'),
              ),
          'penjualan' => array('header' => 'Revenue', 'name' => 'penjualan'),
          array(
              'name' => 'tanggal_approval',
              'value' => 'Yii::app()->dateFormatter->format("y-MM-dd", strtotime($data->tanggal_approval))'
          ),
          'status_approval',
          array(
              'class' => 'bootstrap.widgets.TbToggleColumn',
              'toggleAction' => 'bisnisFranchise/toggle',
              'name' => 'status_rekomendasi',
              'header' => 'Status Rekomendasi',

          ),
          array(
              'class' => 'CButtonColumn',
              'header' => 'Tindakan',
              'template' => '{update}{delete}',
              'deleteButtonLabel'=>'Hapus',
              'updateButtonLabel'=>'Ubah',
              'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/icon-delete.png',
              'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/icon-edit.png',
          ),
      ),
    ));
  ?>   
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.yiiPager li.next > a').html("Berikutnya >>");
    $('.yiiPager li.previous > a').html("<< Sebelumnya");
  });
</script>