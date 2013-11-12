<?php
  $this->menu = $menu;
?>
<script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
 <?php 
            $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'settings-form',
                                                    'enableAjaxValidation'=>false,
//                                                    'action'=>Yii::app()->createUrl('//jbAdmin/settings/savesettings'),
                                                    'htmlOptions'=>array('enctype'=>'multipart/form-data')
                                                ));
            
?>
<script>
  //set saved valued
  $(document).ready(function(){
      for (var i=1;i<=5;i++)
      {
          var value = document.getElementById('Slideshow_'+ i +'_url_link').value;
          if(value == 'custom')
          {
              $('#Slideshow_'+ i +'_url_custom_link').removeAttr('disabled');
          }
          else
          {
              $('#Slideshow_'+ i +'_url_custom_link').val("");
          }
      }
  });
</script>
<div class="account-header">
  SETTING WEB JUALANBISNIS.COM
</div>
<div class="error-field">
	<?php echo $form->errorSummary(array($slideshow1,$slideshow2,$slideshow3,$slideshow4,$slideshow5,$settings)); ?>
</div>
<div class="admin-nav">
	<?php 
	  for($i=1; $i<=5; $i++)
	  {
	    if(substr(${'slideshow'.$i}->attributes["image"],-3) == 'mp4' || substr(${'slideshow'.$i}->attributes["image"],-3) == 'ogg')
	    {
	      $mediaContent = "<video controls width='320' height='180'><source src=".Yii::app()->request->baseUrl."/uploads/slideshow/".${'slideshow'.$i}->attributes["image"]." >Browser Anda Tidak Bisa Menampilkan Video Ini.</video>";
	    } else {
	      $mediaContent = "<img src=".Yii::app()->request->baseUrl."/uploads/slideshow/".${'slideshow'.$i}->attributes["image"]." width=\"300\" height=\"300\"/>";
	    }
	    ${'content'.$i} = "
	    	<div class='admin-form'>
					<div class='admin-row'>
						".$form->labelEx(${'slideshow'.$i},'title')."
						".$form->textField(${'slideshow'.$i},"[$i]title",array('class'=>'admin-input'))."	
					</div>
					<div class='admin-row'>
						".$form->labelEx(${'slideshow'.$i},'image')."
		        ".$mediaContent."<div class='additional'>".$form->fileField(${'slideshow'.$i},"[$i]image",array('class'=>'admin-input'))."</div>
					</div>			
					<div class='admin-row'>
						".$form->labelEx(${'slideshow'.$i},'deskripsi')."
						".$form->textArea(${'slideshow'.$i},"[$i]deskripsi",array('class'=>'admin-input'))."
					</div>
														
					<script type=\"text/javascript\">
		          //CKEDITOR.config.width = 570;
		          CKEDITOR.replace( 'Slideshow_".$i."_deskripsi' );
		      </script>
		      
		      <div class='admin-row'>
		      	".$form->labelEx(${'slideshow'.$i},'url_link')."</label><div class='admin-row-select'>
						".$form->dropDownList(${'slideshow'.$i},"[$i]url_link",$url_link_list,array('onchange' => "url_custom$i()",'class'=>'admin-select'))."</div><div class='additional'>
	          ".$form->textField(${'slideshow'.$i},"[$i]url_custom_link",array('disabled'=>'disabled','class'=>'admin-input-2'))."</div>
	      		<script>
	            function url_custom".$i."()
	            {
	              var value = document.getElementById('Slideshow_".$i."_url_link').value;
	              if(value == 'custom')
	              {
	                  $('#Slideshow_".$i."_url_custom_link').removeAttr('disabled');
	              }
	              else
	              {
	                  $('#Slideshow_".$i."_url_custom_link').attr('disabled','disabled');
	              }

	            }
	          </script>
						</div>
					</div>
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
<div class="account-header admin-setting-subheader">
  SETTING BISNIS
</div>
<div class="admin-form">
	<div class="admin-row">
		<label>Durasi Slideshow</label>
		<?php echo $form->textField($settings,'durasi_slideshow',array('class'=>'admin-input')) ?>
	</div>
	<div class="admin-row">
		<label>Jumlah Bisnis/Franchise Terbaru</label>
		<?php echo $form->textField($settings,'jumlah_terbaru',array('class'=>'admin-input')) ?>
	</div>
	<div class="admin-row">
		<label>Jumlah Bisnis/Franchise Rekomendasi</label>
		<?php echo $form->textField($settings,'jumlah_rekomendasi',array('class'=>'admin-input')) ?>
	</div>
	<div class="admin-row">
		<label>Nilai min ditampilkan telepon</label>
		<?php echo $form->textField($settings,'nilai_min_telpon_tampil',array('class'=>'admin-input')) ?>
	</div>
</div>
<div class="account-header admin-setting-subheader">
  SETTING EMAIL
</div>
<div class="admin-form">
	<div class="admin-row">
		<label>Alamat Email</label>
		<?php echo $form->textField($settings,'alamat_email',array('class'=>'admin-input')) ?>
	</div>
	<div class="admin-row">
		<label>Alamat Email Masuk</label>
		<?php echo $form->textField($settings,'incoming_mailbox',array('class'=>'admin-input')) ?>
	</div>
	<div class="admin-row">
		<label>Nama</label>
		<?php echo $form->textField($settings,'nama_email',array('class'=>'admin-input')) ?>
	</div>
	<div class="admin-row">
		<button type="submit" class="admin-button">Simpan</button>
	</div>
</div>
<?php $this->endWidget() ?>