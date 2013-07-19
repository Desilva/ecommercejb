<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
<fieldset><legend><strong style="margin-left:10px;">Halaman Home</strong></legend>
    <?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'settings-form',
                                                    'enableAjaxValidation'=>false,
//                                                    'action'=>Yii::app()->createUrl('//jbAdmin/settings/savesettings'),
                                                    'htmlOptions'=>array('enctype'=>'multipart/form-data')
                                                ));
            echo $form->errorSummary(array($slideshow1,$slideshow2,$slideshow3,$slideshow4,$slideshow5));
    ?>
	<div id="tabsholder">
		<ul class="tabs">
			<li id="tab1">Slideshow 1</li>
			<li id="tab2">Slideshow 2</li>
			<li id="tab3">Slideshow 3</li>
			<li id="tab4">Slideshow 4</li>
			<li id="tab5">Slideshow 5</li>
		</ul>
		<div class="contents marginbot">
                    <?php
                        for($i=1; $i<=5; $i++)
                        {
                       
                    ?>
			<div id="content<?php echo $i ?>" class="tabscontent">
				<table>
					<tr>
                                                <td><?php echo $form->labelEx(${'slideshow'.$i},'title') ?></td>
						<td><?php echo $form->textField(${'slideshow'.$i},"[$i]title") ?></td>
					</tr>
					<tr>
						<td><?php echo $form->labelEx(${'slideshow'.$i},'image') ?></td>
                                                <td><img src="<?php echo Yii::app()->request->baseUrl."/uploads/slideshow/".${'slideshow'.$i}->attributes["image"] ?>" width="60" height="60"/><br/><?php echo $form->fileField(${'slideshow'.$i},"[$i]image") ?></td>
					</tr>
					<tr>
						<td><?php echo $form->labelEx(${'slideshow'.$i},'deskripsi') ?></td>
						<td><?php echo $form->textArea(${'slideshow'.$i},"[$i]deskripsi") ?></td>
                                                <script type="text/javascript">
                                                    CKEDITOR.config.width = 715;
                                                    CKEDITOR.replace( 'Slideshow_<?php echo $i ?>_deskripsi' );
                                                </script>
					</tr>
				</table>
			</div>
                        <?php }?>
		</div>
    </div>
	<hr/>
	<table>
		<tr>
			<td>Durasi Slideshow</td>
			<td>:</td>
			<td><input type="text" name="tDurasi"/></td>
		</tr>
		<tr>
			<td>Bisnis/Franchise Rekomendasi</td>
			<td>:</td>
			<td><input type="text" name="tRekomendasi"/></td>
		</tr>
		<tr>
			<td>Bisnis/Franchise Terbaru</td>
			<td>:</td>
			<td><input type="text" name="tTerbaru"/></td>
		</tr>
	</table>
</fieldset><br/>
<fieldset>
	<legend><strong style="margin-left:10px;">Setting Bisnis</strong></legend>
    <table>
    	<tr>
        	<td>Nilai minimal ditampilkan telepon</td>
            <td><input type="text" name="tTelepon"/>IDR</td>
        </tr>
    </table>
</fieldset><br/>
<fieldset>
	<legend><strong style="margin-left:10px">Setting Newsletter</strong></legend>
    <table>
    	<tr>
        	<td>Email Newslater</td>
            <td><input type="text" name="tEmailNewsletter"/></td>
        </tr>
        <tr>
        	<td>Email Password</td>
            <td><input type="password" name="tEmailPassword"/></td>
        </tr>
        <tr>
        	<td>SMTP Email</td>
            <td><input type="text" name="tSMTPEmail"/></td>
        </tr>
        <tr>
        	<td>Port</td>
            <td><input type="text" name="tPort"/></td>
        </tr>
        <tr>
        	<td>Template Newsletter</td>
            <td><textarea></textarea></td>
        </tr>
    </table>
    <input type="submit" name="bSimpan" value="Simpan"/>
</fieldset>	
<?php $this->endWidget() ?>