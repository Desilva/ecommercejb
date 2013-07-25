<style>
    input[type="button"].buttonGrid {
    background: -moz-linear-gradient(center top , #1568AE, #1568AE) repeat scroll 0 0 transparent;
    border: 1px solid #FFFFFF;
    border-radius: 2px 2px 2px 2px;
    color: #FEF4E9;
    height: 30px;
    width: 100px;
}

a.view img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}

</style>
<div>
        <header style="font-size:30px; font-family:Calibri;">List Bisnis/ Franchise Yang Pernah Dikontak</header>
        <form method="get">
            <?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'styleSelect3','style'=>'float:left','id'=>'shortBisnisFranchise','submit'=> Yii::app()->createUrl("//account/beli/")));  ?>
        </form>
        <br style="clear:both"/>
        <HR/>
        <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'id' => 'businessGrid',
                'dataProvider' => $model,
                'itemsCssClass' => 'table table-striped',
                'summaryText' => '',
                'ajaxUpdate' => 'emailGrid',
                'enableSorting' => false,
                'columns' => array(
                    'nama' => array('header' => 'Nama Bisnis/Franchise', 'name' => 'idBusiness.nama'),
                     array(
                        'name' => 'deskripsi',
                        'type' => 'raw',
                        'value' => array($this, 'gridDeskripsiBeli'),
                    ),
                    'idBusiness.penjualan' => array('header' => 'Revenue', 'name' => 'idBusiness.penjualan'),
                    'idBusiness.harga_min',
                    'idBusiness.harga_max',
                    array(
                        'class' => 'CButtonColumn',
                        'header' => 'Tindakan',
                        'template' => '{view}',
                        'viewButtonImageUrl' => Yii::app()->request->baseUrl . '/images/icon/-.png',
                        'viewButtonUrl'=> 'Yii::app()->createUrl("cariBisnisFranchise/detail/", array("id"=>$data->id_business,"kategori"=>$data->idBusiness->id_category,"return"=>"beli"))',
                    ),
                ),
            ));
        ?>
        <hr/>
</div>