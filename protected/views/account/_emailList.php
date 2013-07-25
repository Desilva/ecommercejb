 <?php
                
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
?>