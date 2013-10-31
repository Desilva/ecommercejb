<style>
    .list-view-loading {
    background: url("loading.gif") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
}
.list-view .summary {
    margin: 0 0 5px;
    text-align: right;
}
.list-view .sorter {
    margin: 0 0 5px;
    text-align: right;
}
.list-view .pager {
    margin: 5px 0 0;
    text-align: right;
}
.list-view .sorter {
    font-size: 15px;
}
.list-view .sorter ul {
    display: inline;
    list-style: none outside none;
    margin: 0;
    padding: 0;
}
.list-view .sorter li {
    display: inline;
    margin: 0 0 0 5px;
    padding: 0;
}
.list-view .sorter a.asc {
    background: url("<?php echo Yii::app()->baseUrl ?>/images/upArrow.png") no-repeat scroll right center rgba(0, 0, 0, 0);
    background-size: 18px 18px;
    padding-right: 17px;
}
.list-view .sorter a.desc {
    background: url("<?php echo Yii::app()->baseUrl ?>/images/downArrow.png") no-repeat scroll right center rgba(0, 0, 0, 0);
    background-size: 18px 18px;
    padding-right: 17px;
}
</style>
    	<!--<div class="row-fluid">
        	<div class="span6">
            	<h4 class="Font-Color-DarkBlue">Artikel-artikel jualanbisnis.com</h4>
            </div>       	
        </div>
        <!--<div class="row-fluid">
        	<div class="span6">
            <form method="GET">
            	Kategori Pembaca 
                    <?php //echo CHtml::dropDownList('kategoriPembaca',$selectedArticleCategoryPembaca, CHtml::listData($articleCategoryPembaca,'id','category_pembaca'), array('prompt'=>'Semua','class'=>'Input-Size-VerySmall')) ?>
                Kategori 
                    <?php //echo CHtml::dropDownList('kategori',$selectedArticleCategory, CHtml::listData($articleCategory,'id','category'), array('prompt'=>'Semua','class'=>'Input-Size-VerySmall')) ?>
                <input type="submit" class="btn Gradient-Style1" value="Cari" />
            </form>
                </div>
        </div>-->
<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<div class="span3">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="icon-align-justify"></i>									
						</span>
						<h5>Kategori</h5>
					</div>
					<div class="widget-content nopadding">
						<form method="get">
							<table class="table">
								<tr>
									<td>Kategori Pembaca</td>
									<td>
										<?php echo CHtml::dropDownList('kategoriPembaca',$selectedArticleCategoryPembaca, CHtml::listData($articleCategoryPembaca,'id','category_pembaca'), array('prompt'=>'Semua','class'=>'Input-Size-VerySmall')) ?>
									</td>
								</tr>
								<tr>
									<td>Kategori Artikel</td>
									<td>
										<?php echo CHtml::dropDownList('kategori',$selectedArticleCategory, CHtml::listData($articleCategory,'id','category'), array('prompt'=>'Semua','class'=>'Input-Size-VerySmall')) ?>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="submit" class="btn Gradient-Style1" value="Cari" /></td>
								</tr>
							</table>
						</form>
					</div>
				</div>						
			</div>
			<div class="span7" style="margin-left:10px;">
				<div>
					<?php 
					$this->widget('zii.widgets.CListView', array(
							'dataProvider'=>$model,
							'itemView'=>'_list',
							'summaryText'=>'',
							'ajaxUpdate' => true,
							'sorterHeader' => 'Urutkan Berdasarkan:',
							'sortableAttributes'=>array(
								'post_date'=>'Tanggal',
							),
							'template' => '	<div>
												<header style="font-size:30px; font-family:Calibri;">Artikel-artikel jualanbisnis.com</header>{sorter}<br style="clear:both"/>
											</div>
											<div style="margin-top:-35px;"><hr/>{items}</div>{pager}'
					));
					?>
				</div>        
			</div>
		</div>
    </div>
</div>
