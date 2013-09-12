<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
 <?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'settings-form',
                                                    'enableAjaxValidation'=>false,
//                                                    'action'=>Yii::app()->createUrl('//jbAdmin/settings/savesettings'),
                                                    'htmlOptions'=>array('enctype'=>'multipart/form-data','class'=>'form-horizontal')
                                                ));
            
?>
<div class="span9" style="padding-left: 30px">    	
        <div class="row-fluid">
        	<div class="span12">
				<div><header style="font-size:30px; font-family:Calibri;">Setting Web JualanBisnis.com</header><br style="clear:both"/></div><div style="margin-top:-35px;"></div>
            </div>
            <?php echo $form->errorSummary(array($slideshow1,$slideshow2,$slideshow3,$slideshow4,$slideshow5,$settings)); ?>
        </div>
        <div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-align-justify"></i>									
				</span>
				<h5>Halaman Home</h5>
			</div>
			<div class="widget-content nopadding">
				
					<div class="control-group">
						<div class="span12">
							<div class="span12">
								<div class="tabbable">
                                     <?php 
                                            for($i=1; $i<=5; $i++)
                                            {
                                                ${'content'.$i} = "
												<div class='control-group'>
													<div class='span12'>
														<div class='span11'>
															<label class='control-label'>".$form->labelEx(${'slideshow'.$i},'title')."</label>
															<div class='controls'>
																".$form->textField(${'slideshow'.$i},"[$i]title")."
															</div>
														</div>
													</div>	
												</div>
												
												<div class='control-group'>
													<div class='span12'>
														<div class='span11'>
															<label class='control-label'>".$form->labelEx(${'slideshow'.$i},'image')."</label>
															<div class='controls'>
																<img src=".Yii::app()->request->baseUrl."/uploads/slideshow/".${'slideshow'.$i}->attributes["image"]." width=\"60\" height=\"60\"/><br/>".$form->fileField(${'slideshow'.$i},"[$i]image")."
															</div>
														</div>
													</div>	
												</div>
												
												<div class='control-group'>
													<div class='span12'>
														<div class='span11'>
															<label class='control-label'>".$form->labelEx(${'slideshow'.$i},'deskripsi')."</label>
															<div class='controls'>
																".$form->textArea(${'slideshow'.$i},"[$i]deskripsi")."
															</div>
														</div>
													</div>
												</div>
												
												<script type=\"text/javascript\">
<<<<<<< HEAD
                                                    //CKEDITOR.config.width = 570;
                                                    CKEDITOR.replace( 'Slideshow_".$i."_deskripsi' );
                                                </script>
=======
                                                                                                    //CKEDITOR.config.width = 570;
                                                                                                    CKEDITOR.replace( 'Slideshow_".$i."_deskripsi' );
                                                                                                </script>
                                                                                                
                                                                                                <div class='control-group'>
													<div class='span12'>
														<div class='span11'>
															<label class='control-label'>".$form->labelEx(${'slideshow'.$i},'url_link')."</label>
															<div class='controls'>
																".$form->dropDownList(${'slideshow'.$i},"[$i]url_link",$url_link_list)."
															</div>
														</div>
													</div>	
												</div>
>>>>>>> d6f58c21f4c7f38056829d3d4ed1f17ed9a58a6a
												";
                                            }
                                            $this->widget('bootstrap.widgets.TbTabs', array(
                                            'type'=>'tabs', // 'tabs' or 'pills'
                                            'tabs'=>array(
                                                    array('label'=>'Slideshow 1', 'content'=>"$content1", 'active'=>true),
                                                    array('label'=>'Slideshow 2', 'content'=>"$content2"),
                                                    array('label'=>'Slideshow 3', 'content'=>"$content3"),
                                                    array('label'=>'Slideshow 4', 'content'=>"$content4"),
                                                    array('label'=>'Slideshow 5', 'content'=>"$content5"),
                                            ),
                                    )); 
                                ?>

                                </div>
							</div>
						</div>						
					</div>
					
			</div>
		</div>
		
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-align-justify"></i>									
				</span>
				<h5>Setting Bisnis</h5>
			</div>
			<div class="widget-content nopadding">
                                        <div class="control-group">
						
                                                <div class="span12">
							<div class="span11">
									<label class="control-label">Durasi Slideshow</label>
									<div class="controls">
										<?php echo $form->textField($settings,'durasi_slideshow') ?>
									</div>
							</div>
						</div>						
					</div>
                                        <div class="control-group">
						
                                                <div class="span12">
							<div class="span11">
									<label class="control-label">Jumlah Bisnis/Franchise Terbaru</label>
									<div class="controls">
										<?php echo $form->textField($settings,'jumlah_terbaru') ?>
									</div>
							</div>
						</div>						
					</div>
                                        <div class="control-group">
						
                                                <div class="span12">
							<div class="span11">
									<label class="control-label">Jumlah Bisnis/Franchise Rekomendasi</label>
									<div class="controls">
										<?php echo $form->textField($settings,'jumlah_rekomendasi') ?>
									</div>
							</div>
						</div>						
					</div>
					<div class="control-group">
						<div class="span12">
							<div class="span11">
									<label class="control-label">Nilai min ditampilkan telepon</label>
									<div class="controls">
										<?php echo $form->textField($settings,'nilai_min_telpon_tampil') ?>
									</div>
							</div>
						</div>						
					</div>
			
					
				
			</div>
		</div>
		
		<div class="widget-box">
			<div class="widget-title">
				<span class="icon">
					<i class="icon-align-justify"></i>									
				</span>
				<h5>Setting Email</h5>
			</div>
			<div class="widget-content nopadding">
				
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label">Alamat Email:</label>
								<div class="controls">
									<?php echo $form->textField($settings,'alamat_email') ?>
                                </div>
							</div>
						</div>						
					</div>
					
					<div class="control-group">
						<div class="span12">
							<div class="span11">
								<label class="control-label">Nama:</label>
								<div class="controls">
									<?php echo $form->textField($settings,'nama_email') ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
					
				
			</div>
		</div>

<?php $this->endWidget() ?>