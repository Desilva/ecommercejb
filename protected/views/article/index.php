<div class="row-fluid">
	<div class="span12">
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
				<div class="span3 styleBackground-SolidColor-Grey Border-Radius-Style3 padding-top-small Top-Margin2" style="margin-left:-30px;">
					<form method="GET" class="form-horizontal Left-Margin-Minus1" style="padding-bottom:3px;">
						<div class="row-fluid">
							<div class="span12">
								<div class="control-group">
									<label class="control-label Font-Color-DarkBlue ">Kategori Pembaca</label>
									<div class="controls">
										<?php echo CHtml::dropDownList('kategoriPembaca',$selectedArticleCategoryPembaca, CHtml::listData($articleCategoryPembaca,'id','category_pembaca'), array('prompt'=>'Semua','class'=>'Input-Size-VerySmall')) ?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label Font-Color-DarkBlue">Kategori</label>
									<div class="controls">
										<?php echo CHtml::dropDownList('kategori',$selectedArticleCategory, CHtml::listData($articleCategory,'id','category'), array('prompt'=>'Semua','class'=>'Input-Size-VerySmall')) ?>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<input type="submit" class="btn Gradient-Style1" value="Cari" />
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="span7" style="margin-left:10px;">
					<div style="height:700px">
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
							'template' => '<div><header style="font-size:30px; font-family:Calibri;">Artikel-artikel jualanbisnis.com</header>{sorter}<br style="clear:both"/></div><div style="margin-top:-35px;"><hr/>{items}</div>{pager}'
						));
						?>
                 </div>
            </div>
        </div>
    </div>
</div>
        