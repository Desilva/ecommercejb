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
							<div class="span11">
								<div class="tabbable">
                                     <?php 
                                            for($i=1; $i<=5; $i++)
                                            {
                                                ${'content'.$i} = "<div>
                                                    <table><tr>
                                                                                <td>".$form->labelEx(${'slideshow'.$i},'title')."</td>
                                                                                <td>".$form->textField(${'slideshow'.$i},"[$i]title")."</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>".$form->labelEx(${'slideshow'.$i},'image')."</td>
                                                                                <td><img src=".Yii::app()->request->baseUrl."/uploads/slideshow/".${'slideshow'.$i}->attributes["image"]." width=\"60\" height=\"60\"/><br/>".$form->fileField(${'slideshow'.$i},"[$i]image")."</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>".$form->labelEx(${'slideshow'.$i},'deskripsi')."</td>
                                                                                <td>".$form->textArea(${'slideshow'.$i},"[$i]deskripsi")."</td>
                                                                                <script type=\"text/javascript\">
                                                                                    CKEDITOR.config.width = 600;
                                                                                    CKEDITOR.replace( 'Slideshow_".$i."_deskripsi' );
                                                                                </script>
                                                                        </tr>
                                                                </table></div>";
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
									<label class="control-label">Nilai min ditampilkan telepon</label>
									<div class="controls">
										<?php echo $form->textField($settings,'nilai_min_telpon_tampil') ?>&nbsp;IDR
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