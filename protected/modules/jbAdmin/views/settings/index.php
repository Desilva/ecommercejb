<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
 <?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'settings-form',
                                                    'enableAjaxValidation'=>false,
//                                                    'action'=>Yii::app()->createUrl('//jbAdmin/settings/savesettings'),
                                                    'htmlOptions'=>array('enctype'=>'multipart/form-data')
                                                ));
            echo $form->errorSummary(array($slideshow1,$slideshow2,$slideshow3,$slideshow4,$slideshow5));
?>
<div class="span10" style="padding-left: 30px">    	
        <div class="row-fluid">
        	<div class="span12">
            	<h4>Setting Web JualanBisnis.com</h4>
            </div>
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
                                                                                    CKEDITOR.config.width = 715;
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
                                    <td><input  type="text">&nbsp;S</td>
                                </tr>
                                <tr>
                                	<td>Bisnis / Franchise Rekomendasi</td>
                                    <td><input type="text">&nbsp;Buah</td>
                                </tr>
                                <tr>
                                	<td>Bisnis / Franchise Terbaru</td>
                                    <td><input type="text">&nbsp;Buah</td>
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
                                    <td><input type="text">&nbsp;IDR</td>
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
                	<legend>Setting Newsletter</legend>
                    <div class="row-fluid">
                    	<div class="span12">
                        	<table>
                            	<tr>
                                	<td>Email Newsletter</td>
                                    <td><input type="text"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                	<Td>Email Password</Td>
                                    <td><input type="text"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                	<td>SMTP Email</td>
                                    <td><input type="text"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                	<td>PORT</td>
                                    <td><input type="text"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                	<Td>Template Newsletter</Td>
                                    <td colspan="2"><textarea rows="8" style="width:800px;"></textarea></td>
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