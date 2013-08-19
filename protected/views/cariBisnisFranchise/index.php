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
	<div class="span3">
    	       <?php if(!empty($this->clips['sidebar'])) echo
                            $this->clips['sidebar']?>
    </div>
    <div class="span7" style="margin-left:10px;">
<!--    	<div class="row-fluid">
        	<div class="span12">
            	<div class="span3">
                	<b>Hasil Pencarian</b>
                </div>
                <div class="span9">
                	<b>Urutkan</b>
                    &nbsp;                	
        			<select class="Input-Size-VerySmall">
        				<option>1</option>
            			<option>2</option>
            			<option>3</option>
        			</select>
                </div>
            </div>
        </div>-->
        <div class="row-fluid">
        	<div class="span12">
           <table class="table">
        	<tr>
            	<th>Gambar</td>
                <th>Deskripsi</td>
                <th>Lokasi</td>
                <th>Harga</td>
                <th>Revenue</td>
            </tr>
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
            'template' => '<div><header style="font-size:30px; font-family:Calibri;">Hasil Pencarian</header>{sorter}<br style="clear:both"/></div><div style="margin-top:-35px;"><hr/>{items}</div>{pager}'
            ));
   ?>
           </table>
            </div>
        </div>
    </div>
</div>