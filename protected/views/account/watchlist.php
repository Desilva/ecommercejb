<style>
    a.view img{
    width: 25px;
    height: 25px;

}
</style>	
<div>
		<header class="headerBisnis">List Bisnis/ Franchise Yang Dipilih</header>
            <form method="get">
                <?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'styleSelect3','style'=>'float:left','id'=>'shortBisnisFranchiseWatchlist','submit'=> Yii::app()->createUrl("//account/watchlist")));  ?>
            </form>
		<br style="clear:both"/>
		<HR/>
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $model,
            'itemsCssClass' => 'table table-striped',
            'summaryText' => '',
            'ajaxUpdate'=>false,
            'columns' => array(
                'idBusiness.nama',
                'idBusiness.deskripsi',
                'idBusiness.penjualan'=>array('name'=>'idBusiness.penjualan','header'=>'Revenue'),
                'idBusiness.harga_min',
                'idBusiness.harga_max',
                array(
                    'class' => 'CButtonColumn',
                    'header' => 'Tindakan',
                    'template' => '{view}',
                     'viewButtonImageUrl' => Yii::app()->request->baseUrl . '/images/icon/-.png',
                     'viewButtonUrl'=> 'Yii::app()->createUrl("cariBisnisFranchise/detail/", array("id"=>$data->id_business, "kategori"=>$data->idBusiness->id_category, "return"=>"watchlist"))',
                ),
            ),
        ));
        ?>
	</div>