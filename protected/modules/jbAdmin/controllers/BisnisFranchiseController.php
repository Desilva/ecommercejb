<?php
$tes=date_default_timezone_Set('Asia/Krasnoyarsk');
class BisnisFranchiseController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/admin';
        
        public function actions()
        {
            return array(
                'toggle' => array(
                'class'=>'bootstrap.actions.TbToggleAction',
                'modelName' => 'Business',
                )
            );
        }
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
            return array(
			array('allow',
				'actions'=>array('create','update','index','view','delete',
                                    'toggle','GenerateKota','GenerateSubIndustri','Tolak',
                                    'uploadImage','RemoveUploadedImage','uploadDocument',
                                    'RemoveUploadedDocument'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        
        public function actionUploadDocument()
        {
            $id = $_GET['id'];
            $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".$id.'/docs/';
            if(!is_dir($path))
            {
                mkdir($path);
                chmod($path, 0777);
            }
            //Move our file to our temporary dir
            $files = $_FILES['files'];
            $file = $files['tmp_name'];
            if (is_uploaded_file($file)) {
                move_uploaded_file($file, $path.$files['name']);
                chmod($path . $files['name'], 0777);
            }
            
            if(Yii::app()->user->hasState('documents'))
            {
                $userDocuments = Yii::app()->user->getState('documents');
            }
            else
            {
                $userDocuments = array();
            }
            $userDocuments[] = array(
                "path" => $path . $files['name'],
                //the same file or a thumb version that you generated
                "name" => $files['name'],
            );
            Yii::app()->user->setState('documents', $userDocuments);
            
            echo '';
        }
        
        public function actionRemoveUploadedDocument()
        {
            $id = $_GET['id'];
            $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".$id.'/docs/';
            $pathUpdate = realpath(Yii::app()->getBasePath() . "/../uploads/docs/") . "/".$id.'/';
            $file = $path . $_POST["fileNames"];
            $fileUpdate = $pathUpdate.$_POST["fileNames"];
            if(is_file($file))
            {
               unlink($file);
            }
            else if(is_file($fileUpdate))
            {
               unlink($fileUpdate);
            }
            
            echo '';
            
        }
        
        
        public function actionUploadImage()
        {
            $id = $_GET['id'];
            $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".$id.'/';
            $pathThumbnail = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".$id.'/thumbs/';
            
            if(!is_dir($path))
            {
                mkdir($path);
                chmod($path, 0777);
            }
            if(!is_dir($pathThumbnail))
            {
                mkdir($pathThumbnail);
                chmod($pathThumbnail, 0777);
            }
            //Move our file to our temporary dir
            $files = $_FILES['files'];
            $file = $files['tmp_name'];
            if (is_uploaded_file($file)) {
                move_uploaded_file($file, $path.$files['name']);
                chmod($path . $files['name'], 0777);
            }

            //here you can also generate the image versions you need
            //using something like PHPThumb
            $thumb=Yii::app()->phpThumb->create($path.$files['name']);
            $thumb->adaptiveResize(144,96);
            $thumb->save($pathThumbnail.$files['name']);
            chmod($pathThumbnail . $files['name'], 0777);
            
            if(Yii::app()->user->hasState('images'))
            {
                $userImages = Yii::app()->user->getState('images');
            }
            else
            {
                $userImages = array();
            }
            $userImages[] = array(
                "path" => $path . $files['name'],
                //the same file or a thumb version that you generated
                "thumb" => $pathThumbnail.$files['name'],
                "name" => $files['name'],
            );
            Yii::app()->user->setState('images', $userImages);
            echo '';
            
        }
        
        public function actionRemoveUploadedImage()
        {
                $id = $_GET['id'];
                $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".$id.'/';
                $pathThumbnail = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".$id.'/thumbs/';
                $pathUpdate = realpath(Yii::app()->getBasePath() . "/../uploads/images/") . "/".$id.'/';
                $pathThumbnailUpdate = realpath(Yii::app()->getBasePath() . "/../uploads/images/") . "/".$id.'/thumbs/';
                
                $file = $path . $_POST["fileNames"];
                $fileThumbnail = $pathThumbnail . $_POST["fileNames"];
                
                $fileUpdate = $pathUpdate . $_POST["fileNames"];
                $fileThumbnailUpdate = $pathThumbnailUpdate . $_POST["fileNames"];
                if(is_file($file))
                {
                   unlink($file);
                }
                else if(is_file($fileUpdate))
                {
                    unlink($fileUpdate);
                }
                
                if(is_file($fileThumbnail))
                {
                   unlink($fileThumbnail);
                }
                else if(is_file($fileThumbnailUpdate))
                {
                    unlink($fileThumbnailUpdate);
                }
                
                echo '';
        }
        
        public function actionTolak($id)
        {
            $model = Business::model()->findByPk($id);
            $error="";
            $alasan = "";
            $alasan_tambahan="";
            if(isset($_POST['alasan']) || isset($_POST['alasan_tambahan']))
            {
                if(isset($_POST['alasan']))
                {
                    $alasan = $_POST['alasan'];
                }
                
                if(isset($_POST['alasan_tambahan']))
                {
                    $alasan_tambahan = $_POST['alasan_tambahan'];
                }
                
                if($alasan == "" && $alasan_tambahan == "")
                {
                    $error="*Pilih atau Isi Alasan Penolakan";
                }
                else if($alasan_tambahan != "")
                {
                    $check_alasan = AlasanPenolakan::model()->findByAttributes(array("alasan"=>$alasan_tambahan));
                    if($check_alasan == '' || $check_alasan == null)
                    {
                        $alasan_baru = new AlasanPenolakan();
                        $alasan_baru->alasan = $alasan_tambahan;
                        $alasan_baru->save();
                        $model->id_alasan_penolakan = $alasan_baru->id;
                    }
                    else
                    {
                        $model->id_alasan_penolakan = $check_alasan->id;
                    }
                    $model->status_approval = "Ditolak";
                    $model->save();
                    
                    
                    //function to send email
                    $user = User::model()->findByPk($model->id_user);
                    $mailSetting = Settings::model()->findByAttributes(array("nama_settings"=>"settings_admin"));
                    YiiBase::import('ext.YiiMailer.YiiMailer');
                    $mail = new YiiMailer();
                    $mail->clearLayout(); //if layout is already set in config
                    $mail->setFrom($mailSetting->alamat_email, $mailSetting->nama_email); //CHANGE THIS WHEN DEPLOYING
                    $mail->setTo($user->email); //CHANGE TO APPROPRIATE EMAIL WHEN DEPLOYING
                    $mail->setSubject("Bisnis/Franchise ".$model->nama." Anda ditolak");
                    $mail->setBody("<p>Berikut adalah keterangan lengkap: </p><p>Nama Bisnis/Franchise: $model->nama</p><p>Alasan Penolakan: ".$model->idAlasanPenolakan->alasan." </p>");
                    if($mail->send())
                    {
    //                  Yii::app()->user->setFlash('email','Email Berhasil Dikirim');
                        $this->redirect(Yii::app()->createUrl('//jbAdmin/bisnisFranchise/index'));
                    }
                    else
                    {
                        var_dump($mail->getError());
                        die;
                    }
                    
                }
                else
                {
                    $model->status_approval = "Ditolak";
                    $model->id_alasan_penolakan = $alasan;
                    $model->save();
                    
                     //function to send email
                    $user = User::model()->findByPk($model->id_user);
                    $mailSetting = Settings::model()->findByAttributes(array("nama_settings"=>"settings_admin"));
                    YiiBase::import('ext.YiiMailer.YiiMailer');
                    $mail = new YiiMailer();
                    $mail->clearLayout(); //if layout is already set in config
                    $mail->setFrom($mailSetting->alamat_email, $mailSetting->nama_email); //CHANGE THIS WHEN DEPLOYING
                    $mail->setTo($user->email); //CHANGE TO APPROPRIATE EMAIL WHEN DEPLOYING
                    $mail->setSubject("Bisnis/Franchise ".$model->nama." Anda ditolak");
                    $mail->setBody("<p>Berikut adalah keterangan lengkap: </p><p>Nama Bisnis/Franchise: $model->nama</p><p>Alasan Penolakan: ".$model->idAlasanPenolakan->alasan." </p>");
                    if($mail->send())
                    {
    //                  Yii::app()->user->setFlash('email','Email Berhasil Dikirim');
                        $this->redirect(Yii::app()->createUrl('//jbAdmin/bisnisFranchise/index'));
                    }
                    else
                    {
                        var_dump($mail->getError());
                        die;
                    }
                    
                    $this->redirect(Yii::app()->createUrl('//jbAdmin/bisnisFranchise/index'));
                }
            }
            $alasan_penolakan = AlasanPenolakan::model()->findAll();
            $this->render('tolak',array(
                'model'=>$model,
                'alasan_penolakan'=>$alasan_penolakan,
                'error'=>$error,
                'menu'=>2));
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $model=$this->loadModel($id);
            $settings = Settings::model()->findByAttributes(array('nama_settings'=>'settings_admin'));
            if($model->alasan_jual_bisnis_lainnya != null || $model->alasan_jual_bisnis_lainnya != '')
            {
                $model->alasan_jual_lainnya_check = 1;
            }
            if(Yii::app()->request->isAjaxRequest)
            {
                $model->attributes=$_POST['Business'];
                $valid=$model->validate();            
                if($valid){

                   //do anything here
                     echo CJSON::encode(array(
                          'status'=>'success'
                     ));
                    Yii::app()->end();
                    }
                    else{
                        $error = CActiveForm::validate($model);
                        if($error!='[]')
                            echo $error;
                        Yii::app()->end();
                    }
            }
                $list_alasan_jual_bisnis = AlasanJualBisnis::model()->findAll();
                $list_industri = Industri::model()->findAll();
                $list_provinsi = Provinsi::model()->findAll();
                $list_kepemilikan = array(
                    1 => "100%",
                    2 => "< 100%"
                );
                $list_tahun = array();
                $current_year = date('Y');
                for($i=1980; $i<=$current_year; $i++)
                {
                    $list_tahun[$i] = $i;
                }
//                if(isset($_GET['jenis']))
//                {
//                    $jenis = $_GET['jenis'];
//                }
//                else
//                {
//                    $jenis = 1;
//                }
//                if($jenis == 1)
//                { 
//                    $model->id_category = 1;
//                }
//                else
//                {
//                     $model->id_category = 2;
//                }
                $kategori = CHtml::listData(BusinessCategory::model()->findAll(),'id','category');
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Business']))
                {
                    if(Yii::app()->request->isAjaxRequest)
                    {
                        $model->attributes=$_POST['Business'];
                        $valid=$model->validate();            
                        if($valid){
                                          
                           //do anything here
                             echo CJSON::encode(array(
                                  'status'=>'success'
                             ));
                            Yii::app()->end();
                            }
                            else{
                                $error = CActiveForm::validate($model);
                                if($error!='[]')
                                    echo $error;
                                Yii::app()->end();
                            }
                    }
                    
                    if(isset($_GET['stat']))
                    {
                        $status_approval = $_GET['stat'];
                    }
                    else
                    {
                        $status_approval = $model->status_approval;
                    }
                    $dokumen = CUploadedFile::getInstancesByName('dokumen');
                    $model->attributes = $_POST['Business'];
                    $model->status_approval = $status_approval;
                    if($status_approval == "Diterima")
                    {
                        $model->tanggal_approval = date('Y-m-d H:i:s');
                    }
                   
                    $model->tampilkanKontak = $_POST['Business']['tampilkanKontak'];
                    if(isset($_POST['Business']['id_alasan_jual_bisnis']))
                    {
                        $model->alasan_jual_bisnis_lainnya = null;
                    }
                    if(isset($_POST['Business']['alasan_jual_bisnis_lainnya']))
                    {
                        $model->id_alasan_jual_bisnis = null;
                        $model->alasan_jual_lainnya_check = 1;
                    }
                    if($model->validate())
                    {
                         //upload image handler
                        if(Yii::app()->user->hasState('images'))
                        {
                            $userImages = Yii::app()->user->getState('images');
                            //Resolve the final path for our images
                            $path = Yii::app()->getBasePath() . "/../uploads/images/".$model->id_user.'/';
                            $pathThumbnail = Yii::app()->getBasePath() . "/../uploads/images/".$model->id_user.'/thumbs/';
                            //Create the folder and give permissions if it doesnt exists
                            if(!is_dir($path))
                            {
                                mkdir($path);
                                chmod($path, 0777);
                            }
                            if(!is_dir($pathThumbnail))
                            {
                                mkdir($pathThumbnail);
                                chmod($pathThumbnail, 0777);
                            }
                            $imgName="";
                            $i = 0;
                                foreach($userImages as $image)
                                {
                                    $i++;
                                    if(is_file($image["path"]))
                                    {
                                        $date = date('ymdhis');
                                        $temp= array_filter(explode('.',$image["name"]));
//                                        $extension = end($temp);
                                        if(isset($image["isUpdate"]))
                                        {
                                            $image_name = $image["name"];
                                        }
                                        else
                                        {
                                            $image_name = $i.'_'.$date.'_'.$image["name"];
                                        }
                                        
                                        if(rename($image["path"], $path.$image_name))
                                        {
                                            chmod( $path .$image_name, 0777);
                                            $imgName .= $image_name.',';
                                        }
                                    }
                                    else
                                    {
                                        //You can also throw an execption here to rollback the transaction
                                        Yii::log($image["path"] . " is not a file", CLogger::LEVEL_WARNING);
                                    }
                                    
                                    
                                    
                                    if(is_file($image["thumb"]))
                                    {
                                        $date = date('ymdhis');
                                        $temp= array_filter(explode('.',$image["name"]));
//                                        $extension = end($temp);
                                        if(isset($image["isUpdate"]))
                                        {
                                            $thumb_name = $image["name"];
                                        }
                                        else
                                        {
                                            $thumb_name = $i.'_'.$date.'_'.$image["name"];
                                        }
                                        
                                        if(rename($image["thumb"], $pathThumbnail .$thumb_name))
                                        {
                                            chmod( $pathThumbnail .$thumb_name, 0777);
                                        }
                                    }
                                    else
                                    {
                                        //You can also throw an execption here to rollback the transaction
                                        Yii::log($image["thumb"] . " is not a file", CLogger::LEVEL_WARNING);
                                    }
                                }
                                $model->image = $imgName;
                                //Clear the user's session
                                Yii::app()->user->setState('images', null);
                        }
                        
                        
                        
                        //upload document handler
                        if(Yii::app()->user->hasState('documents'))
                        {
                            $userDocs = Yii::app()->user->getState('documents');
                            $path = Yii::app()->getBasePath() . "/../uploads/docs/".$model->id_user.'/';
                            if(!is_dir($path))
                            {
                                mkdir($path);
                                chmod($path, 0777);
                            }
                            $docName="";
                            $i = 0;
                                foreach($userDocs as $docs)
                                {
                                    $i++;
                                    if(is_file($docs["path"]))
                                    {
                                        $date = date('ymdhis');
                                        if(isset($docs["isUpdate"]))
                                        {
                                            $name = $docs['name'];
                                        }
                                        else
                                        {
                                            $name = $date.'_'.$docs['name'];
                                        }
                                        $temp= array_filter(explode('.',$docs["name"]));
                                        $extension = end($temp);
//                                        while($this->checkDocExists($path.$original_name == true))
//                                        {
//                                            
//                                        }
                                        if(rename($docs["path"], $path .$name))
                                        {
                                            chmod( $path .$name, 0777);
                                            $docName .= $name.',';
                                        }
                                    }
                                    else
                                    {
                                        //You can also throw an execption here to rollback the transaction
                                        Yii::log($docs["path"] . " is not a file", CLogger::LEVEL_WARNING);
                                    }
                                }
                                $model->dokumen = $docName;
                                //Clear the user's session
                                Yii::app()->user->setState('documents', null);
                        }
                    }
                    if($model->save()){
                        
                        if($model->status_approval == "Diterima")
                        {
                            //function to send email
                            //notify user that their business is accepted
                            $user = User::model()->findByPk($model->id_user);
                            $mailSetting = Settings::model()->findByAttributes(array("nama_settings"=>"settings_admin"));
                            YiiBase::import('ext.YiiMailer.YiiMailer');
                            $mail = new YiiMailer();
                            $mail->clearLayout(); //if layout is already set in config
                            $mail->setFrom($mailSetting->alamat_email, $mailSetting->nama_email); //CHANGE THIS WHEN DEPLOYING
                            $mail->setTo($user->email); //CHANGE TO APPROPRIATE EMAIL WHEN DEPLOYING
                            $mail->setSubject("Bisnis/Franchise ".$model->nama." Anda diterima");
                            $mail->setBody("<p>Selamat Bisnis/Franchise $model->nama anda berhasil diterima. Bisnis/Franchise anda sudah dapat dicari dan diakses di situs kami. </p><p>Terima kasih telah menggunakan JualanBisnis.com</p>");
                            if($mail->send())
                            {
            //                  Yii::app()->user->setFlash('email','Email Berhasil Dikirim');
//                                
                            }
                            else
                            {
                                var_dump($mail->getError());
                                die;
//                                Yii::app()->user->setFlash('error', 'Error while sending email: ' . $mail->getError());
                            }
                            
                            //notify other user that has the same range_price, lokasi, and kategori(industri)
//                            $criteria_rangeharga = new CDbCriteria();
//                            $criteria_rangeharga->addBetweenCondition("(($model->harga_min + $model->harga_max)/2)", "harga_min", "harga_max");
//                            $id_rangeharga = RangePrice::model()->find($criteria_rangeharga);
                            
//                            var_dump($criteria_rangeharga);
                            $id_rangeharga = RangePrice::model()->findBySql("select id from m_range_price where ($model->harga) between harga_min and harga_max");
                            if($id_rangeharga == null)
                            {
                                //jika harga lebih dari 1 M maka akan null sehingga perlu pakai cara yang dibawah ini
                                $id_rangeharga = RangePrice::model()->findByAttributes(array('harga_min'=>1000000001));
                            }
                            $usersToSend = User::model()->findAllByAttributes(array("id_buyer_category"=>$model->id_industri,"id_buyer_location"=>$model->id_provinsi,"id_buyer_price"=>$id_rangeharga->id));
                            $emailRecipients = array();
                            foreach($usersToSend as $recipient)
                            {
                                if($recipient->id != $model->id_user)
                                {
                                    $emailRecipients[] = $recipient->email;
                                }
                                
                            }
                            
                            if(!empty($emailRecipients))
                            {

                                $mail2 = new YiiMailer();
                                $mail2->clearLayout(); //if layout is already set in config
                                $mail2->setFrom($mailSetting->alamat_email, $mailSetting->nama_email);
//                                $mail2->setTo($emailRecipients); //CHANGE TO APPROPRIATE EMAIL WHEN DEPLOYING
                                $mail2->setSubject("Terdapat Bisnis/Franchise yang mungkin sesuai minat anda");
                                $mail2->setBody("<p>Berikut adalah bisnis/franchise yang mungkin sesuai minat anda:</p><p>Nama Bisnis/Franchise: $model->nama</p><p>Lokasi Bisnis/Franchise: ".$model->idProvinsi->provinsi." </p><p>Harga: Rp.".number_format($model->harga)."</p><p>Link Bisnis/Franchise: <a href='".Yii::app()->createAbsoluteUrl("//cariBisnisFranchise/detail/$model->id")."'>Klik disini</a></p>");
                                foreach($emailRecipients as $usermail)
                                {
                                    $mail3= clone $mail2;
                                    $mail3->AddAddress($usermail);
                                    if($mail3->send())
                                    {

                                    }
                                    else
                                    {
                                         var_dump($mail3->getError());
                                         die;
                                    }

                                }
                            }
                            
                            
                            if(strtolower($model->idCategory->category) == 'franchise')
                            {
                                
                                $this->redirect(Yii::app()->createUrl('//jbAdmin/bisnisFranchise/index?kategori='.$model->id_category));
                            }
                            else
                            {
                                $this->redirect(Yii::app()->createUrl('//jbAdmin/bisnisFranchise/index'));
                            }
                            
                        }
                        
                        
                      
                            if(strtolower($model->idCategory->category) == 'franchise')
                            {
                                
                                $this->redirect(Yii::app()->createUrl('//jbAdmin/bisnisFranchise/index?kategori='.$model->id_category));
                            }
                            else
                            {
                                $this->redirect(Yii::app()->createUrl('//jbAdmin/bisnisFranchise/index'));
                            }
                    }
                        
                }
        
        Yii::app()->user->setState('images', null);
        Yii::app()->user->setState('documents', null);
            
            $pathImages = './uploads/images/'.$model->id_user.'/';
            $pathThumbnail = '.uploads/images/'.$model->id_user.'/';
            $initial_images_files = array();
            $initial_images_array = array_filter(explode(',',$model->image));
            if(!empty($initial_images_array))
            {
                foreach($initial_images_array as $images)
                {
                    if(file_exists($pathImages.$images))
                    {
                        $file["name"] = $images;
                        $file["extension"] = '.'.pathinfo($pathImages.$images, PATHINFO_EXTENSION);
                        $file["size"] = filesize($pathImages.$images);
                        $initial_images_files[] = $file;
                        
                        if(Yii::app()->user->hasState('images'))
                        {
                            $userImages = Yii::app()->user->getState('images');
                        }
                        else
                        {
                            $userImages = array();
                        }
                        $userImages[] = array(
                            "path" => $pathImages.$images,
                            //the same file or a thumb version that you generated
                            "name" => $images,
                            "thumb" => $pathThumbnail.$images,
                            "isUpdate" => 1,
                        );
                        Yii::app()->user->setState('images', $userImages);
                    }
                    
                }
            }
            
            $pathDocs = './uploads/docs/'.$model->id_user.'/';
            $initial_docs_files = array();
            $initial_docs_array = array_filter(explode(',',$model->dokumen));
            
            if(!empty($initial_docs_array))
            {
                foreach($initial_docs_array as $docs)
                {
                    if(file_exists($pathDocs.$docs))
                    {
                        $file["name"] = $docs;
                        $file["extension"] = '.'.pathinfo($pathDocs.$docs, PATHINFO_EXTENSION);
                        $file["size"] = filesize($pathDocs.$docs);
                        $initial_docs_files[] = $file;
                        
                        if(Yii::app()->user->hasState('documents'))
                        {
                            $userDocuments = Yii::app()->user->getState('documents');
                        }
                        else
                        {
                            $userDocuments = array();
                        }
                        $userDocuments[] = array(
                            "path" => $pathDocs.$docs,
                            //the same file or a thumb version that you generated
                            "name" => $docs,
                            "isUpdate" => 1,
                        );
                        Yii::app()->user->setState('documents', $userDocuments);
                    }
                    
                }
            }
        
        $this->render('update',array(
//                        'jenis'=>$jenis,
			'model'=>$model,
                        'kategori'=>$kategori,
                        'kepemilikan'=>$list_kepemilikan,
                        'tahun'=>$list_tahun,
                        'industri'=>$list_industri,
                        'provinsi'=>$list_provinsi,
                        'alasan_jual_bisnis'=>$list_alasan_jual_bisnis,
                        'initial_doc_upload'=>  json_encode($initial_docs_files),
                        'initial_image_upload'=> json_encode($initial_images_files),
                        'settings'=>$settings,
                        'menu'=>2
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//           var_dump($_GET);
            $selectedSortValue = '1';
            if(isset($_GET['kategori']))
            {
                $selectedSortValue = $_GET['kategori'];
                $criteria = new CDbCriteria();
                $criteria->condition = "id_category=$selectedSortValue";
//                $criteria->order = 'id desc';
            }
            else
            {
                $criteria = new CDbCriteria();
                $criteria->with = 'idCategory';
                $criteria->condition = "idCategory.category = 'Bisnis'";
//                $criteria->order = 't.id desc';
            }
            
//             $emailCriteria = new CDbCriteria();
//             $emailCriteria->addCondition('status= 1');
            $sortType = BusinessCategory::model()->findAll();
            //$sortType = BusinessCategory::model()->findAll();
            $business_model = new Business();
            $business_model->status_rekomendasi = '';
            $business_model->penjualan = '';
            if(isset($_GET['Business']))
			$business_model->attributes=$_GET['Business'];
           
            
            
            $dataProvider = new CActiveDataProvider('Business', array(
                'pagination' => array(
                    'pageSize' => 10,
                ),
                'sort'=>array(
                        'defaultOrder'=>
                        array('status_approval'=>CSort::SORT_DESC,'id'=>CSort::SORT_DESC)
                    ),
                'criteria'=>$criteria
            ));
		$this->render('index',array(
                    'business_model'=>$business_model,
                    'model'=>$dataProvider,
                    'sortType'=>$sortType,
                    'selectedSortValue'=>$selectedSortValue,
                    'menu'=>2));
            

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Business the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Business::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Business $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='business-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        protected function gridDeskripsi($data, $row)
        {
            $model = Business::model()->findByPk($data->id);
            return $this->renderPartial('_columnDeskripsi',array('model'=>$model),true);
        }
        
          public function actionGenerateSubIndustri()
        {
//            var_dump($_POST);
//            die;
            if(isset($_POST['Business']['id_industri']))
            {
                $id_industri = $_POST['Business']['id_industri'];
            }
            else if(isset($_POST['industri']))
            {
                $id_industri = $_POST['industri'];
            }
            
            if(isset($_POST['selected_sub_industri']))
            {
                $selected_sub_industri = $_POST['selected_sub_industri'];
            }
            else
            {
                $selected_sub_industri = '';
            }
            $list_sub_industri = SubIndustri::model()->findAllByAttributes(array('id_industri' => $id_industri));
            $data = CHtml::listData($list_sub_industri, 'id', 'sub_industri');
            echo CHtml::tag('option', array('value' => ''), 'Pilih Sub Industri', true);
            foreach($data as $value => $sub_industri)
            {
                if($value == $selected_sub_industri)
                {
                    echo CHtml::tag('option', array('value' => $value,'selected'=>'selected'), CHtml::encode($sub_industri), true);
                }
                else
                {
                    echo CHtml::tag('option', array('value' => $value), CHtml::encode($sub_industri), true);
                }
            }
        }
        
        public function actionGenerateKota()
        {
             if(isset($_POST['Business']['id_provinsi']))
            {
                $id_provinsi = $_POST['Business']['id_provinsi'];
            }
            else if(isset($_POST['provinsi']))
            {
                $id_provinsi = $_POST['provinsi'];
            }
            
            if(isset($_POST['selected_kota']))
            {
                $selected_kota = $_POST['selected_kota'];
            }
            else
            {
                $selected_kota = '';
            }
            $list_kota = City::model()->findAllByAttributes(array('id_provinsi' => $id_provinsi));
            $data = CHtml::listData($list_kota, 'id', 'city');
            echo CHtml::tag('option', array('value' => ''), 'Pilih Kota', true);
            foreach($data as $value => $kota)
            {
                if($value == $selected_kota)
                {
                    echo CHtml::tag('option', array('value' => $value,'selected'=>'selected'), CHtml::encode($kota), true);
                }
                else
                {
                    echo CHtml::tag('option', array('value' => $value), CHtml::encode($kota), true);
                }
                
            }
        }
        
}
