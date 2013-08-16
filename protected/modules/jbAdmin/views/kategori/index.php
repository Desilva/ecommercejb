<style>
a.viewSubKategori img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}
a.update img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}
a.delete img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}
</style>
     <script>
            function getSubIndustri(id)
            {
                try{
                    /*  Extract the Primary Key from the CGridView's clicked row */
                    var myPK = id;

                    /* If $.fn.yiiGridView.getSelection(id) can not find PK, then return. */
                    if(isNaN(myPK)){
                        return;
                    };

//                    /*Display the loading.gif file via jquery and CSS*/
                    $("#industriGrid").addClass("grid-view-loading");

                    /* Call the Ajax function to update the Child CGridView via the
                     controller’s actionAdmin */
                    var request = $.ajax({ 
                      url: "<?php echo Yii::app()->createUrl('//jbAdmin/kategori/getSubIndustriGrid') ?>",
                      type: "GET",
                      cache: false,
                      data: {id : myPK},
                      dataType: "html" 
                    });

                    /* See "Url Problems" at this same location in 
                     "Our own Ajax - Method-1".*/

                    request.done(function(response) { 
                        try{
                            /*since you are updating innerHTML, make sure the
                            received data does not contain any javascript - for
                            security reasons*/
                            if (response.indexOf('<script') == -1){
                                /*update the view with the data received
                                 from the server*/
                                document.getElementById('subIndustriList').innerHTML = response;
                            }
                            else {
                                throw new Error('Invalid Javascript in Response - possible hacking!');
                            }
                        }
                        catch (ex){
                            alert(ex.message); /*** Send this to the server for
                             logging when in production ***/
                        }
                        finally{
                            /*Remove the loading.gif file via jquery and CSS*/
                            $("#industriGrid").removeClass("grid-view-loading");

                            /*clear the ajax object after use*/
                            request = null;
                        }
                    });

                    request.fail(function(jqXHR, textStatus) {
                        try{
                            throw new Error('Request failed: ' + textStatus );
                        }
                        catch (ex){
                            alert(ex.message); /*** Send this to the server for
                             logging when in production ***/
                        }
                        finally{
                            /*Remove the loading.gif file via jquery and CSS*/
                            $("#industriGrid").removeClass("grid-view-loading");

                            /*clear the ajax object after use*/
                            request = null;
                        }
                    });
                }
                catch (ex){
                    alert(ex.message); /*** Send this to the server for logging when in
                               production ***/
                }
            }
            
        </script>
<div class="span9">    	
        <div class="row-fluid">
        	<div class="span12">
            	<h4 class="Font-Color-DarkBlue">Mengatur Kategori</h4>
            	<form>
                    <?php echo CHtml::button('Tambah Kategori', array('submit' => array('kategori/create'), 'class'=>'btn Gradient-Style1')); ?>
            	</form>
            </div>
        </div>
        <div class="row-fluid ">
        	<div class="span12 Top-Margin-Minus1">
                        <?php
                          $this->widget('zii.widgets.grid.CGridView', array(
                                    'id'=>'industriGrid',
                                    'dataProvider' => $model,
                                    'itemsCssClass' => 'table table-striped',
                                    'summaryText' => '',
                                    'ajaxUpdate'=>'subIndustriGrid',
                                    'columns' => array(
                                        'industri',
                                        'keterangan',
                                        array(
                                            'class' => 'CButtonColumn',
                                            'id'=>'industriGridColumn',
                                            'htmlOptions' => array('style' => 'width: 85px'),
                                            'header' => 'Tindakan',
                                            'template' => '{update}{delete}{viewSubKategori}',
                                            'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/trash.png',
                                            'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/write.png',
                                            'buttons' => array(
                                                'viewSubKategori' => array(
                                                    'label' => 'Lihat Sub-Kategori',
                                                    'imageUrl' => Yii::app()->request->baseUrl . '/images/asset/folder.png',
                                                    'options' => array('class' => 'viewSubKategori'),
                                                    'url' => '$data->id', 
                                                    'click'=> "function(e){ e.preventDefault(); getSubIndustri($(this).attr('href'))}"

                                                )
                                            ),
                                        ),
                                    ),
                                ));

                        ?>
            </div>
        </div>
        <div class="row-fluid">
        	<div class="span12 Top-Margin-Minus1">
            	<div class="row-fluid">
                	<div class="span12" id="subIndustriList">
                                <?php
                                  $this->widget('zii.widgets.grid.CGridView', array(
                                            'id'=>'subIndustriGrid',
                                            'dataProvider' => $subkategori,
                                            'itemsCssClass' => 'table table-striped',
                                            'summaryText' => '',
                                            'ajaxUpdate'=>'subIndustriGrid',
                                            'columns' => array(
                                                'sub_industri',
                                                'keterangan',
                                                array(
                                                    'class' => 'CButtonColumn',
                                                    'id'=>'subIndustriGridColumn',
                                                    'header' => 'Tindakan',
                                                    'template' => '{update}{delete}',
                                                    'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/trash.png',
                                                    'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/write.png',
                                                ),
                                            ),
                                        ));

                                ?>
                    </div>
                    </div>
               </div>             	
            </div>
        </div>