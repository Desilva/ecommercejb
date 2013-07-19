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
<div>
        <header style="font-size:30px; font-family:Calibri;">List Bisnis/ Franchise </header>
        <form method="post">
            <?php echo CHtml::dropDownList('sort',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'styleSelect3','style'=>'float:left','id'=>'shortBisnisFranchise','submit'=> Yii::app()->createUrl("//jbAdmin/BisnisFranchise/index/")));  ?>
        </form>
        <br style="clear:both"/>
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'dataProvider' => $model,
            'itemsCssClass' => 'table table-striped',
            'summaryText' => '',
            'ajaxUpdate' => true,
            'columns' => array(
                'nama' => array('header' => 'Nama Bisnis/Franchise', 'name' => 'nama'),
                'deskripsi',
                'penjualan' => array('header' => 'Revenue', 'name' => 'penjualan'),
                array(
                    'name' => 'tanggal_approval',
                    'value' => 'Yii::app()->dateFormatter->format("y-MM-dd", strtotime($data->tanggal_approval))'
                ),
                'status_approval',
                array(
                    'class' => 'bootstrap.widgets.TbToggleColumn',
                    'toggleAction' => 'bisnisfranchise/toggle',
                    'name' => 'status_rekomendasi',
                    'header' => 'Status Rekomendasi'
                ),
                array(
                    'class' => 'CButtonColumn',
                    'header' => 'Tindakan',
                    'template' => '{update}{delete}',
                    'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/icon/trash.png',
                    'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/icon/write.png',
                ),
            ),
        ));
        ?>
</div>