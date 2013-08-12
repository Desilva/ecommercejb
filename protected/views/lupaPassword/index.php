<div class="row-fluid">
	<div class="span12">
    	<div class="row-fluid">
        	<div class="span6">
            	<h4 class="Font-Color-DarkBlue">Lupa Password</h4>
                <p>Masukan Email Anda</p>
                <p>Password Baru Akan Dikirimkan Ke Email Anda</p>
            <?php
                $form = $this->beginWidget('CActiveForm', array(
                  'id' => 'user-index-form',
                  'enableAjaxValidation' => false,
                ));
            ?>
                <?php echo $form->errorSummary($model); ?>
                <table>
        	<tr>
                    <th class="Text-Align-Left Font-Color-LightBlue"><?php echo $form->labelEx($model,'email'); ?></th>
                    <td><?php echo $form->textField($model,'email'); ?></td>
           	</tr>
                </table>
                <input type="submit" class="btn Gradient-Style1" value="Kirim" />
               <?php $this->endWidget(); ?>
            </div>
        </div>
<?php if(Yii::app()->user->hasFlash('error')): ?>
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('error'); ?>
</div>
 
<?php endif; ?> 	
    </div>
</div>