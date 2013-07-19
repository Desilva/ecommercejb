 <?php
                $this->widget('bootstrap.widgets.TbExtendedGridView', array(
                    'id'=>'emailGrid',
                    'itemsCssClass' => 'table table-striped',
                    'dataProvider' => $email,
                    'summaryText' => '',
                    'enableSorting' => true,
                    'ajaxUpdate'=>'emailGrid',
                    'columns' => array(
                        array(
                            'name'=> 'tanggal',
                            'value'=> 'Yii::app()->dateFormatter->format("y-MM-d", strtotime($data->tanggal))'
                        ),
                        array(
                            'class' => 'bootstrap.widgets.TbRelationalColumn',
                            'name' => 'nama_pengirim',
                            'url' => $this->createUrl('account/getEmailDesc'),
                        ),
                        'no_telp',
                        'alamat_email'
                    ),
                ));
            ?>