<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
 <?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'settings-form',
                                                    'enableAjaxValidation'=>false,
//                                                    'action'=>Yii::app()->createUrl('//jbAdmin/settings/savesettings'),
                                                    'htmlOptions'=>array('enctype'=>'multipart/form-data')
                                                ));
            
?>
<div class="span9" style="padding-left: 30px">    	
        <div class="row-fluid">
        	<div class="span12">
				<div><header style="font-size:30px; font-family:Calibri;">Setting Web JualanBisnis.com</header><br style="clear:both"/></div><div style="margin-top:-35px;"></div>
            </div>
            <?php echo $form->errorSummary(array($slideshow1,$slideshow2,$slideshow3,$slideshow4,$slideshow5,$settings)); ?>
        </div>
        
        <div class="row-fluid">
        	<div class="span12">
        		<fieldset>
                	<legend>Halaman Home</legend>
                    <div class="row-fluid">
                    	<div class="span12">
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
                                                                                    CKEDITOR.config.width = 755;
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
                    <div class="row-fluid">
                    	<div class="span12">
                        	<table>
                            	<tr>
                                	<Td>Durasi Slideshow</Td>
                                    <td><?php echo $form->textField($settings,'durasi_slideshow') ?>&nbsp;S</td>
                                </tr>
                                <tr>
                                	<td>Bisnis / Franchise Rekomendasi</td>
                                    <td><?php echo $form->textField($settings,'jumlah_rekomendasi') ?>&nbsp;Buah</td>
                                </tr>
                                <tr>
                                	<td>Bisnis / Franchise Terbaru</td>
                                    <td><?php echo $form->textField($settings,'jumlah_terbaru') ?>&nbsp;Buah</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        
        <div class="row-fluid">
        	<div class="span12">
            	<fieldset>
                	<legend>Setting Bisnis</legend>
                    <div class="row-fluid">
                    	<div class="span12">
                        	<table>
                            	<tr>
                                	<td>Nilai min ditampilkan telepon</td>
                                    <td><?php echo $form->textField($settings,'nilai_min_telpon_tampil') ?>&nbsp;IDR</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        
        <div class="row-fluid">
        	<div class="span12">
            	<fieldset>
                	<legend>Setting Email</legend>
                    <div class="row-fluid">
                    	<div class="span12">
                        	<table>
                            	<tr>
                                	<td>Alamat Email:</td>
                                    <td><?php echo $form->textField($settings,'alamat_email') ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                	<td>Nama:</td>
                                    <td><?php echo $form->textField($settings,'nama_email') ?></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>	
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row-fluid">
        	<div class="span12">
            	<button type="submit" class="btn">Simpan</button>
            </div>
        </div>
    </div>
<?php $this->endWidget() ?>