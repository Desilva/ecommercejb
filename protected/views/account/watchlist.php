<style>
    a.view img{
    width: 25px;
    height: 25px;

}
</style>	
<div class="row-fluid">
	<div class="span2">
<?php if(!empty($this->clips['sidebar'])) echo
                            $this->clips['sidebar']?>
    </div>
    <div class="span9">
    	<h4 class="Font-Color-DarkBlue">List Bisnis/Franchise Yang Dipilih</h4>
        <div class="row-fluid">
        	<div class="span12">
            <form method="get">
                <span>Kategori: </span><?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'Input-Size-VerySmall','submit'=> Yii::app()->createUrl("//account/watchlist")));  ?>
            </form>
            </div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
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
        </div>
    </div>
</div>