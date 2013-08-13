<div class="row-fluid">
	<div class="span12">
    	<div class="row-fluid">
        	<div class="span6">
            	<h4 class="Font-Color-DarkBlue">Artikel-artikel jualanbisnis.com</h4>
            </div>       	
        </div>
        <div class="row-fluid">
        	<div class="span6">
            <form method="GET">
            	Kategori Pembaca 
                    <?php echo CHtml::dropDownList('kategoriPembaca',$selectedArticleCategoryPembaca, CHtml::listData($articleCategoryPembaca,'id','category_pembaca'), array('prompt'=>'Semua','class'=>'Input-Size-VerySmall')) ?>
                Kategori 
                    <?php echo CHtml::dropDownList('kategori',$selectedArticleCategory, CHtml::listData($articleCategory,'id','category'), array('prompt'=>'Semua','class'=>'Input-Size-VerySmall')) ?>
                <input type="submit" class="btn Gradient-Style1" value="Cari" />
            </form>
                </div>
        </div>
             <div class="row-fluid">
        	<div class="span12">
            	<div style="height:700px">
         <?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model,
    'itemView'=>'_list',
    'summaryText'=>'',
    'ajaxUpdate' => true,
    //'template' => '<div><header style="font-size:30px; font-family:Calibri;">Hasil Pencarian</header>{sorter}<br style="clear:both"/></div><div style="margin-top:-18px;"><hr/>{items}</div>{pager}'
    ));
   ?>
                 </div>
            </div>
        </div>
    </div>
</div>
        