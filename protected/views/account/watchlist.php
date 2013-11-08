<style>
    a.view img{
    width: 25px;
    height: 25px;

}
</style>
<div class="row-fluid account-body">
	<div class="account-sidebar">
		<div class="account-sidebar-header">
			Akun Saya
		</div>
		<?php 
			if(!empty($this->clips['sidebar'])) echo $this->clips['sidebar'];
		?>
	</div>
	<div class="account-content">
		<div class="account-header">
			WATCHLIST
		</div>
		<div class="account-jual-category">
			<form method="get">
				<div class="account-beli-select-div">
					<?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'account-beli-select','submit'=> Yii::app()->createUrl("//account/watchlist")));  ?>
				</div>
			</form>
		</div>
		<div class="account-beli-table">
			<?php
				$this->widget('zii.widgets.grid.CGridView', array(
					'dataProvider' => $model,
					'itemsCssClass' => 'table table-striped',
					'summaryText' => '',
					'ajaxUpdate'=>false,
					'columns' => array(
						'idBusiness.nama',
						'idBusiness.deskripsi',
						array('header' => 'Revenue (Rp.)', 
                 	'name' => 'idBusiness.penjualan', 
            			'value'=>'number_format($data->idBusiness->penjualan)'),
						array(
                  'header'=> 'Harga (Rp.)',
                  'name'=>'idBusiness.harga',
                  'value'=> 'number_format($data->idBusiness->harga)'
            ),
            array(
							'class' => 'CButtonColumn',
							'header' => 'Tindakan',
							'template' => '{view}',
							'viewButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/-.png',
							'viewButtonUrl'=> 'Yii::app()->createUrl("cariBisnisFranchise/detail/", array("id"=>$data->id_business, "kategori"=>$data->idBusiness->id_category, "return"=>"watchlist"))',
						),
					),
				));
			?>
		</div>
	</div>
</div>