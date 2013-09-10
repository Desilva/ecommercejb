
                	<div class="span12" style="margin-left: -110px">
                        	<div class="control-group">
                                <?php echo CHtml::hiddenField('sub_kategori_temp',$selected_subkategori); ?>
                            	<label class="control-label Left-Margin" for="Sub Kategori"><img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation-kategori" style="display:none"/> Sub Kategori</label>
                                <div class="controls">
                                    <?php echo CHtml::dropDownList('subkategori','id',array(),array(
                                        'prompt'=>'Pilih Sub Kategori',
                                        'class'=>'Input-Size-VerySmall')); ?>
                                    
                                </div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label Left-Margin" for="Range Harga">Range Harga</label>
                                <div class="controls">
                                    <?php echo CHtml::dropDownList('rangeharga',$selected_rangeharga,CHtml::listData($rangeharga,'id','range_price'),array(
                                        'prompt'=>'Pilih Harga',
                                        'class'=>'Input-Size-VerySmall')); ?>
                                </div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label Left-Margin" for="Range Omset">Range Omzet</label>
                                <div class="controls">
                                    <?php echo CHtml::dropDownList('omzet',$selected_omzet,CHtml::listData($omzet,'id','range_price'),array(
                                        'prompt'=>'Pilih Omzet',
                                        'class'=>'Input-Size-VerySmall')); ?>
                                </div>
                            </div>
							<div class="separator1"></div>
                    </div>