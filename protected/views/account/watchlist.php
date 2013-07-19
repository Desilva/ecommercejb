<style>
    a.viewBusiness img{
    width: 25px;
    height: 25px;

}
</style>	
<div>
		<header class="headerBisnis">List Bisnis/ Franchise Yang Dipilih</header>
		<form method="post">
                        <?php
                            echo CHtml::dropDownList('sort',$selectedSortValue,  CHtml::listData($sortType,'id','category'),array('class'=>'styleSelect3','style'=>'float:left','id'=>'shortBisnisFranchiseWatchlist','submit'=> Yii::app()->createUrl("//account/watchlist")));
                        ?>
<!--			<select class="styleSelect2" id="shortBisnisFranchiseWatchlist" style="float:left">
				<option>Kategori</option>
				<option>Kategori</option>
			</select>-->
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
                    'template' => '{viewBusiness}',
                    'buttons' => array(
                        'viewBusiness' => array(
                            'label' => 'Lihat Business/Franchise',
                            'imageUrl' => Yii::app()->request->baseUrl . '/images/icon/write.png',
                            'options' => array('class' => 'viewBusiness'),
                            'url' => 'Yii::app()->createUrl("cariBisnisFranchise/detail/", array("id"=>$data->id_business))', 
                        )
                    ),
                ),
            ),
        ));
        ?>
	</div>