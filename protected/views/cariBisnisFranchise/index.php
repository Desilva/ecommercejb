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
   <?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model,
    'itemView'=>'_list',
    'summaryText'=>'',
    'ajaxUpdate' => false,
    'sorterHeader' => 'Urutkan Berdasarkan:',
    'sortableAttributes'=>array(
        'tanggal_approval'=>'Tanggal',
        'harga_max'=>'Harga',
        'nama'=>'Nama',
        'penjualan'=>'Revenue'
    ),
    'template' => '<div><header style="font-size:30px; font-family:Calibri;">Hasil Pencarian</header>{sorter}<br style="clear:both"/></div><div style="margin-top:-18px;"><hr/>{items}</div>{pager}'
    ));
   ?>
<!--</div>-->
<script>

    function dropDownChange()
    {
      
    }
</script>