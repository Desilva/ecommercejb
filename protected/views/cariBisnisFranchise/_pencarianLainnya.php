
                	<div class="span12" style="margin-left: -110px">
                        	<div class="control-group">
                                <?php echo CHtml::hiddenField('sub_kategori_temp',$selected_subkategori); ?>
                            	<label class="control-label Left-Margin" for="Sub Kategori">Sub Kategori</label>
                                <div class="controls">
                                    <?php echo CHtml::dropDownList('subkategori','id',array(),array(
                                        'prompt'=>'Pilih Sub Kategori',
                                        'class'=>'Input-Size-VerySmall')); ?>
                                </div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label Left-Margin" for="Range Harga">Range Harga</label>
                                <div class="controls">
                                    <?php echo CHtml::dropDownList('rangeharga',$selected_rangeharga,$rangeharga,array(
                                        'prompt'=>'Pilih Harga',
                                        'class'=>'Input-Size-VerySmall')); ?>
                                </div>
                            </div>
                            <div class="control-group">
                            	<label class="control-label Left-Margin" for="Range Omset">Range Omzet</label>
                                <div class="controls">
                                    <?php echo CHtml::dropDownList('omzet',$selected_omzet,$omzet,array(
                                        'prompt'=>'Pilih Omzet',
                                        'class'=>'Input-Size-VerySmall')); ?>
                                </div>
                            </div>
							<div class="separator1"></div>
                            	<button type="submit" class="btn Gradient-Style1" style="margin-left:100px">Cari</button>
                    </div>