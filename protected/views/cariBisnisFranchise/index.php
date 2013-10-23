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
<!--<div>
    <div>
		<header style="font-size:30px; font-family:Calibri;">Hasil Pencarian</header>
		  <form method="post">
                    <?php
//                        echo CHtml::dropDownList('sort',$selectedSortValue,$sortType,array('class'=>'styleSelect3','style'=>'float:left','id'=>'shortBisnisFranchise','submit'=> Yii::app()->createUrl("//CariBisnisFranchise/index/"))); 
                    ?>
                </form>
		<br style="clear:both"/>
                <?php 
//                 $params = array_merge($_GET, array('yourKey1'=>'yourValue1',));
//                 var_dump($params);
//                 $url ='?';
//                 $i = -1;
//                 foreach($params as $key=>$value)
//                 {
//                     $i++;
//                     if($i == 0)
//                     { 
//                        $url .= "$key=$value";
//                     }
//                     else
//                     {
//                         $url .= "&$key=$value";
//                     }
//                 }
                ?>
                <a href="<?php // echo $url ?>">test</a>
	</div>
	<div style="margin-top:-18px;">
    <hr/>-->
<!--</div>-->
<script>

    function dropDownChange()
    {
      
    }
</script>
<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<div class="span3">
				<?php 
					if(!empty($this->clips['sidebar'])) echo
                     $this->clips['sidebar']
				?>
			</div>
			<div class="span8" style="margin-left:5px;">
				<div class="row-fluid">
					<div class="span12">
						<table class="table">
							<tr>
								<th>Gambar</th>
								<th>Deskripsi</th>
                                                                <th>Tanggal</th>
								<th>Lokasi</th>
								<th>Harga</th>
								<th>Omzet</th>
							</tr>
							<?php 
							$this->widget('zii.widgets.CListView', array(
									'dataProvider'=>$model,
									'itemView'=>'_list',
									'summaryText'=>'',
									'ajaxUpdate' => false,
									'sorterHeader' => 'Urutkan Berdasarkan:',
									'sortableAttributes'=>array(
										'tanggal_approval'=>'Tanggal',
										'harga'=>'Harga',
										'nama'=>'Nama',
										'penjualan'=>'Revenue'
									),
									'template' => '<div><header style="font-size:30px; font-family:Calibri;">Hasil Pencarian</header>{sorter}<br style="clear:both"/></div><div style="margin-top:-35px;"><hr/>{items}</div>{pager}'
							));
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


