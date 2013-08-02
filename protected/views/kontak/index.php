
<div class="row-fluid">
	<div class="span12">
            <div class="span2">
        
        </div>
        <?php
            $form = $this->beginWidget('CActiveForm', array(
              'id' => 'kontak-kami-form',
              'enableAjaxValidation' => false,
            ));
        ?>
        <div class="span10">
        	<div class="span6 separator-Vertical">
        	<h4 class="Font-Color-DarkBlue">Hubungi JualanBisnis.com</h4>
                 <p><?php echo $form->errorSummary($model) ?></p>
        	<table>
            	<tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'nama') ?></th>
                    <td><?php echo $form->textField($model,'nama') ?></td>
                </tr>
                <tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'perusahaan') ?></th>
                    <td><?php echo $form->textField($model,'perusahaan') ?></td>
                </tr>
                <tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'email') ?></th>
                    <td><?php echo $form->textField($model,'email') ?></td>
                </tr>
                <tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'phone') ?></th>
                    <td><?php echo $form->textField($model,'phone') ?></td>
                </tr>
                <tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'fax') ?></th>
                    <td><?php echo $form->textField($model,'fax') ?></td>
                </tr>
                <Tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'subject') ?></th>
                    <td><?php echo $form->textField($model,'subject') ?></td>
                </Tr>
                <tr>
                	<th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'comment') ?></th>
                    <td><?php echo $form->textArea($model,'comment') ?></td>
                </tr>
                <tr>
                	<td></td>
                    <td><button type="submit" class="btn Gradient-Style1">Kirim</button></td>
                </tr>
            </table>
        </div>
            <?php $this->endWidget(); ?>
        <div class="span6 Text-Align-Right">
        	<h4 class="Font-Color-DarkBlue">Contact</h4>
                Contact Details Here
<!--            For further information,please contact us at<br>
            Rendy<br>
            (0812-73418448 / 021-32889456)<br>
            PT.JualanBisnis.com<br>
            Panin Life Center 1st Floor Suite 110<br>
            <img src="images/map.gif" width="350">-->
        </div>
        </div>
    </div>
</div>