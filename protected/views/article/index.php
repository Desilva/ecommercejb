<div id="primaryArtikelDiv">
	<div>
		<header style="font-size:30px; font-family:Calibri;">ARTIKEL</header>
		<br style="clear:both"/>
		<HR/>
	</div>
    <div class="artikelDiv">
         <?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model,
    'itemView'=>'_list',
    'summaryText'=>'',
    'ajaxUpdate' => false,
    //'template' => '<div><header style="font-size:30px; font-family:Calibri;">Hasil Pencarian</header>{sorter}<br style="clear:both"/></div><div style="margin-top:-18px;"><hr/>{items}</div>{pager}'
    ));
   ?>
    </div>
        