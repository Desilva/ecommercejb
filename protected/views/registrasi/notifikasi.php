

<?php if(isset($status) && $status != ''){ ?>
<div class="row-fluid">
	<div class="span12">
    	<div class="row-fluid">
        	<div class="span6">
            	<h4 class="Font-Color-DarkBlue">Verifikasi Email</h4>
                
            </div>
        </div>
        <div class="row-fluid">
        	<p><?php echo $status ?></p>
        </div>  	
    </div>
</div>

<?php } else { ?>

<div class="row-fluid">
	<div class="span12">
    	<div class="row-fluid">
        	<div class="span6">
            	<h4 class="Font-Color-DarkBlue">Verifikasi Email</h4>
                
            </div>
        </div>
        <div class="row-fluid">
        	<p>Email untuk mem-verifikasikan akun anda sudah terkirim ke:</p>
                <p><strong><?php echo $model->email ?></strong></p>
                <p>Harap melakukan verifikasi dengan meng-klik link yang dikirimkan</p>
                <p><?php 
                echo CHtml::ajaxLink(
                "Klik disini",
                Yii::app()->createUrl('//registrasi/resendVerifikasi'),
                array( 
                  'type' => 'POST',
                  'beforeSend' => "function( request )
                                   {
                                    $('#verifikasi-ulang').attr('style','display:none');
                                    $('#loading-animation').removeAttr('style');
                                     // Set up any pre-sending stuff like initializing progress indicators
                                   }",
                  'success' => "function( data )
                                {
                                  if(data == 'success')
                                  {
                                     $('#loading-animation').attr('style','display:none');
                                     $('#verifikasi-ulang').removeAttr('style');
                                     $('#verifikasi-ulang').html('Kode verifikasi berhasil dikirim ulang');
                                  }
                                  else
                                  {
                                     $('#loading-animation').attr('style','display:none');
                                     $('#verifikasi-ulang').removeAttr('style');
                                     $('#verifikasi-ulang').html('Gagal mengirim ulang kode verifikasi, harap menghubungi kami');
                                  }
                                  
                                }",
                  'data' => array( 'email' => "$model->email")
                )
//                array( //htmlOptions
//                  'href' => Yii::app()->createUrl( 'myController/ajaxRequest' ),
//                  'class' => $class
//                )
              );
                
                ?>
                untuk mengirim ulang kode verifikasi <img src="<?php echo Yii::app()->request->baseUrl ?>/images/asset/spinner.gif" id="loading-animation" style="display:none"/></p>
                <p id="verifikasi-ulang" style="display:none"></p>
                <br/>
                <p>* Harap menunggu 1x24 jam jika email dari kami belum sampai di email anda, atau hubungi kami untuk bantuan</p>
        </div>  	
    </div>
</div>

<?php } ?>