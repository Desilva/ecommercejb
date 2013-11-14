<style>
a.view img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}
</style>
<div class="row-fluid account-body">
	<div class="account-sidebar">
		<div class="account-sidebar-header">
			Akun Saya
		</div>
			<?php echo $this->renderPartial('_sidebar', array('menu'=>$menu)); ?>
	</div>
	<div class="account-content">
		<div class="account-header">
			LIST BISNIS/FRANCHISE YANG PERNAH DIKONTAK
		</div>
		<div class="account-beli-category">
			<form method="get">
				<div class="account-beli-select-div">
					<?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'account-beli-select','submit'=> Yii::app()->createUrl("//account/beli/")));  ?>
				</div>
			</form>
		</div>
		<div class="account-beli-table">
			<?php
				$this->widget('zii.widgets.grid.CGridView', array(
					'id' => 'businessGrid',
					'dataProvider' => $model,
					'itemsCssClass' => 'table table-bordered table-striped table-hover',
					'summaryText' => '',
					'ajaxUpdate' => 'emailGrid',
					'enableSorting' => false,
					'columns' => array(
							'nama' => array('header' => 'Nama Bisnis/Franchise', 'name' => 'idBusiness.nama'),array(
							'name' => 'deskripsi',
							'type' => 'raw',
							'value' => array($this, 'gridDeskripsiBeli'),
							), 
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
                                                        'viewButtonLabel'=>'Lihat',
							'viewButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/icon-view.png',
							'viewButtonUrl'=> 'Yii::app()->createUrl("cariBisnisFranchise/detail/", array("id"=>$data->id_business,"kategori"=>$data->idBusiness->id_category,"return"=>"beli"))',
						),
					),
				));
			?>     		
		</div>
	</div>
</div>

