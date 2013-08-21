<style>
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

a.sendNewsletter img{
    width: 25px;
    height: 25px;
    margin-left: 2px;
}
</style>
<script>
            function sendEmail(id)
            {
                try{
                    /*  Extract the Primary Key from the CGridView's clicked row */
                    var myPK = id;

                    /* If $.fn.yiiGridView.getSelection(id) can not find PK, then return. */
                    if(isNaN(myPK)){
                        return;
                    };

//                    /*Display the loading.gif file via jquery and CSS*/
                    $("#newsletter-grid").addClass("grid-view-loading");

                    /* Call the Ajax function to update the Child CGridView via the
                     controller’s actionAdmin */
                    var request = $.ajax({ 
                      url: "<?php echo Yii::app()->createUrl('//jbAdmin/newsletter/ajaxSendNewsletter') ?>",
                      type: "GET",
                      cache: false,
                      data: {id : myPK},
                      dataType: "html" 
                    });

                    /* See "Url Problems" at this same location in 
                     "Our own Ajax - Method-1".*/

                    request.done(function(response) { 
                        try{
                                if(response == "success")
                                {
                                    alert("Newsletter berhasil dikirim");
                                }
                                else
                                {
                                    alert("Newsletter gagal dikirim. Harap hubungi teknisi");
                                }
                                
                        }
                        catch (ex){
                            alert(ex.message); /*** Send this to the server for
                             logging when in production ***/
                        }
                        finally{
                            /*Remove the loading.gif file via jquery and CSS*/
                            $("#newsletter-grid").removeClass("grid-view-loading");

                            /*clear the ajax object after use*/
                            request = null;
                        }
                    });

                    request.fail(function(jqXHR, textStatus) {
                        try{
                            alert("Newsletter gagal dikirim. Harap hubungi teknisi");
                        }
                        catch (ex){
                            alert(ex.message); /*** Send this to the server for
                             logging when in production ***/
                        }
                        finally{
                            /*Remove the loading.gif file via jquery and CSS*/
                            $("#newsletter-grid").removeClass("grid-view-loading");

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
				<div><header style="font-size:30px; font-family:Calibri;">Mengatur Newsletter</header><br style="clear:both"/></div><div style="margin-top:-35px;"></div>
            	<div class="row-fluid Top-Margin3">
					<div class="span12">
						<form>
							<?php echo CHtml::button('Tambah Newsletter', array('submit' => array('newsletter/create'), 'class'=>'btn Gradient-Style1')); ?>
						</form>
					</div>
				</div>				
            </div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
			
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="icon-th"></i>
						</span>
						<h5>Static table</h5>
					</div>
					<div class="widget-content nopadding">
                    <?php $this->widget('zii.widgets.grid.CGridView', array(
                            'id'=>'newsletter-grid',
                            'itemsCssClass' => 'table table-bordered table-striped table-hover',
                            'summaryText' => '',
							
                            'dataProvider'=>$model,
                            'columns'=>array(
                                    'judul',
                                    'deskripsi',
                                    array(
                                            'name' => 'isi',
                                            'type' => 'raw', //because of using html-code <br/>
                                            //call the controller method gridProduct for each row
                                            'value' => array($this, 'gridIsi'),
                                        ),
                                     array(
                                                'name'=> 'tanggal',
                                                'value'=> 'Yii::app()->dateFormatter->format("y-MM-dd", strtotime($data->tanggal))'
                                            ),
                                     array(
                                            'class' => 'CButtonColumn',
                                            'header' => 'Tindakan',
                                            'template' => '{update}{delete}{sendNewsletter}',
                                            'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/trash.png',
                                            'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/write.png',
                                            'buttons' => array(
                                                    'sendNewsletter' => array(
                                                        'label' => 'Kirim Newsletter',
                                                        'imageUrl' => Yii::app()->request->baseUrl . '/images/asset/-.png',
                                                        'options' => array('class' => 'sendNewsletter'),
                                                        'url' => '$data->id', 
                                                        'click'=> "function(e){ e.preventDefault(); sendEmail($(this).attr('href'))}"

                                                    )
                                                ),
                                        ),
                            ),
                           
                    )); ?>
							</div>
                            
            </div>
                    
            </div>
        </div>
    </div>