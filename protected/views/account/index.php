<style>
    input[type="button"].buttonGrid {
    background: -moz-linear-gradient(center top , #1568AE, #1568AE) repeat scroll 0 0 transparent;
    border: 1px solid #FFFFFF;
    border-radius: 2px 2px 2px 2px;
    color: #FEF4E9;
    height: 30px;
    width: 100px;
}

a.viewEmail img{
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
<script src="<?php echo Yii::app()->request->baseUrl; ?>/library/Bootstrap/assets/js/bootstrap-popover.js"></script>
        <script>
            function getEmail(id)
            {
                try{
                    /*  Extract the Primary Key from the CGridView's clicked row */
                    var myPK = id;

                    /* If $.fn.yiiGridView.getSelection(id) can not find PK, then return. */
                    if(isNaN(myPK)){
                        return;
                    };

//                    /*Display the loading.gif file via jquery and CSS*/
                      $("#businessGrid").addClass("grid-view-loading");

                    /* Call the Ajax function to update the Child CGridView via the
                     controller’s actionAdmin */
                    var request = $.ajax({ 
                      url: "<?php echo Yii::app()->createUrl('//account/getEmail/') ?>",
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
                                document.getElementById('emailList').innerHTML = response;
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
                            $("#businessGrid").removeClass("grid-view-loading");

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
                            $("#businessGrid").removeClass("grid-view-loading");

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

		
<div class="row-fluid">
	<div class="span11">
		<div class="span2 Top-Margin2" >
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="icon-th"></i>
					</span>
					<h5>Jualan Bisnis</h5>
				</div>
				<div class="widget-content nopadding">
					<?php 
						if(!empty($this->clips['sidebar'])) echo
                            $this->clips['sidebar']
					?>
				</div>
			</div>
		</div>
		<div class="span10">
			<div>
				<header style="font-size:30px; font-family:Calibri;">List Bisnis/Franchise</header><br style="clear:both"/>
			</div>
			<div style="margin-top:-35px;"></div>
			<div class="row-fluid">
				<div class="span12 Top-Margin3">	
					<form method="get">
						<span>Kategori: </span><?php echo CHtml::dropDownList('kategori',$selectedSortValue,CHtml::listData($sortType,'id','category'),array('class'=>'Input-Size-VerySmall','submit'=> Yii::app()->createUrl("//account/index/")));  ?>
					</form>   	
              		<?php echo CHtml::button('Tambah Bisnis', array('submit' => array('account/create'), 'class'=>'btn Gradient-Style1')); ?>
                </div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title">
							<span class="icon">
								<i class="icon-th"></i>
							</span>
							<h5>Jual Bisnis/Franchise</h5>
						</div>
						<div class="widget-content nopadding">
								<?php
								$this->widget('zii.widgets.grid.CGridView', array(
									'id' => 'businessGrid',
									'dataProvider' => $model,
									'itemsCssClass' => 'table table-bordered table-striped table-hover',
									'summaryText' => '',
									'ajaxUpdate' => 'emailGrid',
									'columns' => array(
										'nama' => array(
											'header' => 'Nama Bisnis/Franchise', 'name' => 'nama'),array(
											'name' => 'deskripsi',
											'type' => 'raw', //because of using html-code <br/>
												//call the controller method gridProduct for each row
											'value' => array($this, 'gridDeskripsi'),
											),
										'jumlah_click',array(
										'name' => 'status_approval',
										'type' => 'raw', //because of using html-code <br/>
											//call the controller method gridProduct for each row
										'value' => array($this, 'gridStatusApproval'),
										),array(
											'class' => 'CButtonColumn',
											'htmlOptions' => array('style' => 'width: 85px'),
											'header' => 'Tindakan',
											'template' => '{update}{delete}{viewEmail}',
											'deleteButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/trash.png',
											'updateButtonImageUrl' => Yii::app()->request->baseUrl . '/images/asset/write.png',
											'buttons' => array(
												'viewEmail' => array(
													'label' => 'Lihat Email',
													'imageUrl' => Yii::app()->request->baseUrl . '/images/asset/-.png',
													'options' => array('class' => 'viewEmail'),
													'url' => '$data->id',
													'click' => "function(e){ e.preventDefault(); getEmail($(this).attr('href'))}"
												)
											),
										),
									),
								));
							?>				
						</div>
                    </div>
				</div>
				<div class="row-fluid" id="emailList">
					<div class="span12">
						<div class="row-fluid">
							<div class="span12">
							<h4 class="Font-Color-DarkBlue"></h4>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span12" id="emailList">
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
									'htmlOptions'=>array('hidden'=>'hidden'),
									));
								?>
							</div>
						</div>            	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>		
		

