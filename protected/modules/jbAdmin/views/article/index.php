<style>
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
				<div><header style="font-size:30px; font-family:Calibri;">Mengatur Artikel</header><br style="clear:both"/></div><div style="margin-top:-35px;"></div>
            	<div class="row-fluid Top-Margin3">
					<div class="span12">
						<form>
							<?php echo CHtml::button('Tambah Artikel', array('submit' => array('article/create'), 'class'=>'btn Gradient-Style1')); ?>
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
						<h5>Static table</h5>
					</div>
					<div class="widget-content nopadding">
								  <?php $this->widget('zii.widgets.grid.CGridView', array(
                            'id'=>'article-grid',
                            'itemsCssClass' => 'table table-bordered table-striped table-hover',
                            'summaryText' => '',
                            'dataProvider'=>$model,
                            'columns'=>array(
                                    array(
                                                'name'=> 'Kategori',
                                                'value'=> '$data->idArticleCategory->category'
                                            ),
                                    'created_by',
                                     array(
                                                'name'=> 'post_date',
                                                'value'=> 'Yii::app()->dateFormatter->format("y-MM-dd", strtotime($data->post_date))'
                                            ),
                                    array(
                                            'name' => 'post',
                                            'type' => 'raw', //because of using html-code <br/>
                                            //call the controller method gridProduct for each row
                                            'value' => array($this, 'gridDeskripsi'),
                                        ),
                                    'title',
                                    'resume',
                                    array(
                                            'class' => 'CButtonColumn',
                                            'header' => 'Tindakan',
                                            'template' => '{update}{delete}',
                                            'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/trash.png',
                                            'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/write.png',
                                        ),
                            ),
                           
                    )); ?>
							</div>
                            
            </div>
                    
            </div>
        </div>
    </div>