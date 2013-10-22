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
<div class="span9">    	
        <div class="row-fluid">
        	<div class="span12">
				<div><header style="font-size:30px; font-family:Calibri;">Bisnis / Franchise</header><br style="clear:both"/></div><div style="margin-top:-35px;"></div>
            	<div class="row-fluid Top-Margin3">
					<div class="span12">
						<form method="get">
						<span>Kategori: </span><?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'Input-Size-VerySmall','submit'=> Yii::app()->createUrl("//jbAdmin/bisnisFranchise/index/")));  ?>
					</form>   	
					</div>
				</div>
				
            </div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="icon-th"></i>
						</span>
						<h5>Bisnis/Franchise</h5>
					</div>
					<div class="widget-content nopadding">
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
                                        'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/trash.png',
                                        'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/write.png',
                                    ),
                                ),
								
                            ));
                     ?>		
							</div>
                            
            </div>
            	  
            </div>
        </div>
    </div>