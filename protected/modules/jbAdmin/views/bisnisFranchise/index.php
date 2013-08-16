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
<div class="span10">    	
        <div class="row-fluid">
        	<div class="span12">
            	<h4 class="Font-Color-DarkBlue">Mengatur Bisnis/Franchise</h4>
            	<form method="post">
                	 <?php echo CHtml::dropDownList('sort',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'Input-Size-VerySmall','submit'=> Yii::app()->createUrl("//jbAdmin/bisnisFranchise/index/")));  ?>
            	</form>
            </div>
        </div>
        <div class="row-fluid">
        	<div class="span11 Top-Margin-Minus1">
            	     <?php
                            $this->widget('bootstrap.widgets.TbGridView', array(
                                'dataProvider' => $model,
                                'itemsCssClass' => 'table table-striped',
                                'summaryText' => '',
                                'ajaxUpdate' => true,
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
                                        'toggleAction' => 'bisnisfranchise/toggle',
                                        'name' => 'status_rekomendasi',
                                        'header' => 'Status Rekomendasi'
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