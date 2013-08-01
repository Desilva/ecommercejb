<style>
a.view img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}

</style>
<div class="row-fluid">
	<div class="span2">
    	 <?php if(!empty($this->clips['sidebar'])) echo
                            $this->clips['sidebar']?>
    </div>
    <div class="span10">
    	<h4 class="Font-Color-DarkBlue">List Bisnis/Franchise Yang Pernah Dikontak</h4>
        <div class="row-fluid">
        	<div class="span12">
                <form method="get">
                    <span>Kategori: </span><?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'Input-Size-VerySmall','submit'=> Yii::app()->createUrl("//account/beli/")));  ?>
                </form> 	
             
            </div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
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
            </div>
        </div>
    </div>
</div>