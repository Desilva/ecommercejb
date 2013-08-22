<style>
    a.view img{
    width: 25px;
    height: 25px;

}
</style>
<div class="row-fluid">
	<div class="span11">
		<div class="span2">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="icon-th"></i>
					</span>
					<h5>Jualan Bisnis</h5>
				</div>
				<div class="widget-content nopadding">
					<?php 
						if(!empty($this->clips['sidebar'])) echo
                            $this->clips['sidebar']?>
							
				</div>
			</div>
		</div>
		<div class="span9">
			<div>
				<header style="font-size:30px; font-family:Calibri;">List Bisnis/Franchise Yang Pernah Dikontak</header><br style="clear:both"/>
			</div>
			<div style="margin-top:-35px;"></div>
			<div class="row-fluid Top-Margin3">
				<div class="span12">
					<form method="get">
						<span>Kategori: </span><?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'Input-Size-VerySmall','submit'=> Yii::app()->createUrl("//account/watchlist")));  ?>
					</form>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="icon-th"></i>
							</span>
							<h5>Watchlist</h5>
						</div>
						<div class="widget-content nopadding">
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
										'idBusiness.harga_max',array(
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
		</div>
	</div>
</div>

