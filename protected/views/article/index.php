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
				<div class="row-fluid widget-title-box">
				  <div class="widget-title-text text-center">
				  	Pilih Artikel
					</div>
				</div>
				<form method="get">
					<div class="search-body">
						<div class="row-fluid">
							<div class="search-input">
								<?php echo CHtml::dropDownList('kategoriPembaca',$selectedArticleCategoryPembaca, CHtml::listData($articleCategoryPembaca,'id','category_pembaca'), array('prompt'=>'Kategori Pembaca - Semua','class'=>'div-input','placeholder' => '')) ?>
							</div>
						</div>
						<div class="row-fluid">
							<div class="search-input">
								<?php echo CHtml::dropDownList('kategori',$selectedArticleCategory, CHtml::listData($articleCategory,'id','category'), array('prompt'=>'Kategori Artikel - Semua','class'=>'div-input')) ?>
							</div>
						</div>
						<div class="row-fluid">
							<div class="search-row-button">
								<button type="submit" class="btn search-button">Cari</button></td>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="span7">
				<div class="row-fluid hasil-pencarian">
					<div class="hasil-pencarian-content">
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
													<header class="hasil-pencarian-header">Daftar Artikel</header>{sorter}<br style="clear:both"/>
												</div>
												{pager}
												<div>{items}</div>{pager}'
						));
						?>
					</div>
				</div>        
			</div>
		</div>
  </div>
</div>
