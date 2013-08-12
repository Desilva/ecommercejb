 <?php
                
//                $this->widget('zii.widgets.grid.CGridView', array(
//                    'id'=>'emailGrid',
//                    'itemsCssClass' => 'table table-striped',
//                    'dataProvider' => $email,
//                    'summaryText' => '',
//                    'enableSorting' => true,
//                    'ajaxUpdate'=>'emailGrid',
//                    'columns' => array(
//                        array(
//                            'name'=> 'tanggal',
//                            'value'=> 'Yii::app()->dateFormatter->format("y-MM-dd", strtotime($data->tanggal))'
//                        ),
//                        array(
//                            'name' => 'nama_pengirim',
//                            'type' => 'raw',
//                            'value'=> array($this,'gridEmailDeskripsi')
//                        ),
//                        'no_telp',
//                        'alamat_email'
//                    ),
//                ));
?>

<div class="span12">
            	<div class="row-fluid">
                	<div class="span12">
                    	<h4 class="Font-Color-DarkBlue">Calon buyer <?php echo $model->nama ?></h4>
                    </div>
                </div>
                <div class="row-fluid">
                	<div class="span12" id="emailList">
                    	<?php
                            if($email->totalItemCount == 0)
                            {
                                echo "Tidak ada yang mengontak bisnis ini";
                            }
                            else
                            {
                                    $this->widget('zii.widgets.grid.CGridView', array(
                                    'id'=>'emailGrid',
                                    'itemsCssClass' => 'table table-striped',
                                    'dataProvider' => $email,
                                    'summaryText' => '',
                                    'enableSorting' => true,
                                    'ajaxUpdate'=>'emailGrid',
                                    'columns' => array(
                                        array(
                                            'name'=> 'tanggal',
                                            'value'=> 'Yii::app()->dateFormatter->format("y-MM-dd", strtotime($data->tanggal))'
                                        ),
                                        array(
                                            'name' => 'nama_pengirim',
                                            'type' => 'raw',
                                            'value'=> array($this,'gridEmailDeskripsi')
                                        ),
                                        'no_telp',
                                        'alamat_email'
                                    ),
                                ));
                            }
                            
                        ?>
                    </div>
                </div>            	
            </div>