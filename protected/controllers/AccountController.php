<?php

$set=date_default_timezone_set('Asia/Krasnoyarsk');

class AccountController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
        public $layout='main';
        public function actions()
        {
//            return array(
//                'upload'=>array(
//                    'class'=>'ext.xupload.actions.XUploadAction',
//                    'path' =>Yii::app() -> getBasePath() . "/../uploads",
//                    'publicPath' => Yii::app() -> getBaseUrl() . "/uploads",
//                ),
//                'uploadDocs'=>array(
//                    'class'=>'ext.swfupload.SWFUploadAction',
//                    'filepath'=>Yii::app() -> getBasePath() . '/../uploads/'.md5(Yii::app()->user->id . microtime()).microtime().'.EXT',
//                    'onAfterUpload'=>array($this,'saveFile'),
//                    
//                    ),
//            );
        }
        public function init()
        {
            $this->beginClip('sidebar');
                $this->renderPartial('_sidebar',array());
            $this->endClip();
        }
        
        public function actionUploadDocument()
        {
            $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".Yii::app()->user->id.'/docs/';
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
            $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".Yii::app()->user->id.'/docs/';
            $pathUpdate = realpath(Yii::app()->getBasePath() . "/../uploads/docs/") . "/".Yii::app()->user->id.'/';
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
            $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".Yii::app()->user->id.'/';
            $pathThumbnail = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".Yii::app()->user->id.'/thumbs/';
            
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
            $thumb->resize(100,100);
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
                $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".Yii::app()->user->id.'/';
                $pathThumbnail = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/".Yii::app()->user->id.'/thumbs/';
                $pathUpdate = realpath(Yii::app()->getBasePath() . "/../uploads/images/") . "/".Yii::app()->user->id.'/';
                $pathThumbnailUpdate = realpath(Yii::app()->getBasePath() . "/../uploads/images/") . "/".Yii::app()->user->id.'/thumbs/';
                
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
        
        public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array(
                                    'index','view','create','update','delete',
                                    'GenerateSubIndustri','GenerateKota',
                                    'preview',
                                    'GetEmailDesc','GetEmail','dataDiri',
                                    'watchlist','beli','uploadImage','RemoveUploadedImage',
                                    'uploadDocument','RemoveUploadedDocument'),
				'roles'=>array('member'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                        //'deniedCallback' => function() { Yii::app()->controller->redirect(array('/home/index')); }
		);
	}
        
        public function actionBeli()
        {
            $selectedSortValue = '1';
            if(isset($_GET['kategori']))
            {
                $selectedSortValue = $_GET['kategori'];
            }
            $sortType = BusinessCategory::model()->findAll();
            $criteria = new CDbCriteria();
            $criteria->with= 'idBusiness';
            $criteria->addCondition("t.id_user =".Yii::app()->user->id);
            $criteria->addCondition("idBusiness.id_category=$selectedSortValue");
            $criteria->order = 't.tanggal desc';
            $criteria->order = 't.id desc';
            $model = new CActiveDataProvider('Email',
                    array(
                        'criteria'=>$criteria,
                        'pagination'=>array(
                            'pageSize'=>10,
                        )
                    )
                    );
            $this->render('beli',array(
                'model'=>$model,
                'sortType'=>$sortType,
                'selectedSortValue'=>$selectedSortValue
                ));
        }
        public function actionWatchlist()
        {
            $selectedSortValue = '1';
            if(isset($_GET['kategori']))
            {
                $selectedSortValue = $_GET['kategori'];
            }

            $sortType = BusinessCategory::model()->findAll();
            $criteria= new CDbCriteria();
            $criteria->with = 'idUser';
            $criteria->with = 'idBusiness';
            $criteria->addCondition('t.id_user ='.Yii::app()->user->id );
            $criteria->addCondition('idBusiness.id_category ='.$selectedSortValue );
            $criteria->addCondition("idBusiness.status_approval = 'diterima'" );
            $criteria->order = 't.id desc';
           //$model = Watchlist::model()->with('idUser,idBusiness')->findAllByAttributes(array('id_user'=>Yii::app()->user->id,'idBusiness.id_category'=>"$selected_business_category"));
            $model = new CActiveDataProvider('Watchlist',array(
                'pagination' => array(
                    'pageSize' => 5,
                ),
                'criteria'=>$criteria
            ));
            $this->render('watchlist',array('model'=>$model,'sortType'=>$sortType,'selectedSortValue'=>$selectedSortValue));
        }
        
        public function actionDataDiri()
        {
            $model = UserUpdate::model()->findByPk(Yii::app()->user->id);
            $list_tempat_lahir = CHtml::listData(City::model()->findAll(), "city", "city");
            $list_tempat_lahir += array('Lainnya'=>'Lainnya');
            $list_penghasilan = array(
                "<2jt" => "<2jt",
                "<5jt" => "<5jt",
                "<10jt" => "<10jt",
                ">10jt" => ">10jt",
            );
            $list_agama = array(
                "Kristen" => "Kristen",
                "Katolik" => "Katolik",
                "Islam" => "Islam",
                "Hindu" => "Hindu",
                "Buddha" => "Buddha",
                "Lainnya" => "Lainnya",
            );
            $list_pekerjaan = Job::model()->findAll();
            $list_status_perkawinan = array(
                "Belum Menikah" => "Belum Menikah",
                "Sudah Menikah" => "Sudah Menikah",
                "Janda" => "Janda",
                "Duda" => "Duda"
            );
            $list_jenis_kelamin = array(
                "L" => "Laki-laki",
                "P" => "Perempuan"
            );
            $list_negara = Country::model()->findAll();
            $list_kategori_buyer = Industri::model()->findAll();
            $list_provinsi = Provinsi::model()->findAll();
            $list_range_harga = RangePrice::model()->findAll();
            
            if(isset($_POST['UserUpdate']))
            {
                    $model->attributes=$_POST['UserUpdate'];
                    if($_POST['UserUpdate']['password'] == '' && $_POST['UserUpdate']['password_repeat'] == '')
                    {
                        $old_password = UserUpdate::model()->findByPk(Yii::app()->user->id);
                        $model->password = $old_password->password;
                        $model->password_repeat = $old_password->password;
                    }
                    
                    if($model->validate())
                    {
                        if($_POST['UserUpdate']['password'] != '')
                        {
                            $pass_temp = $model->password;
                            $model->password = md5($pass_temp);
                        }
                       
                        $model->save(false);
                        $this->redirect(Yii::app()->createUrl('//account/index'));
                    }
            }
            
            $model->password = '';
            $this->render('dataDiri',array(
                'model'=>$model,
                'agama'=>$list_agama,
                'pekerjaan'=>$list_pekerjaan,
                'jenis_kelamin'=>$list_jenis_kelamin,
                'status_perkawinan' => $list_status_perkawinan,
                'negara' => $list_negara,
                'kategori' => $list_kategori_buyer,
                'lokasi' => $list_provinsi,
                'range_harga' => $list_range_harga,
                'penghasilan' => $list_penghasilan,
                'tempat_lahir' => $list_tempat_lahir,
                ));
        }
        
        /* action for jual */
	public function actionIndex()
	{
//            var_dump($_GET);
            $selectedSortValue = '1';
            /*list business or franchise */
            if(isset($_GET['kategori']))
            {
                $selectedSortValue = $_GET['kategori'];
                $criteria = new CDbCriteria();
                $criteria->condition = "id_category=$selectedSortValue";
                $criteria->order = 'id desc';
                $criteria->addCondition("id_user = ".Yii::app()->user->id);
            }
            else
            {
                $criteria = new CDbCriteria();
                $criteria->with = 'idCategory';
                $criteria->condition = "idCategory.category = 'Bisnis'";
                $criteria->order = 't.id desc';
                $criteria->addCondition("id_user = ".Yii::app()->user->id);
            }
            
            $sortType = BusinessCategory::model()->findAll();
            $dataProvider = new CActiveDataProvider('Business', array(
                'pagination' => array(
                    'pageSize' => 10,
                ),
                'criteria'=>$criteria
            ));
            
            /* list email associated with business or franchise */
            if(isset($_GET['id_business']))
            {
                $id_business = $_GET['id_business'];
                $emailCriteria = new CDbCriteria();
                $emailCriteria->addCondition('status= 1');
                $emailCriteria->addCondition("id_business=$id_business");
            }
            else
            {
                $emailCriteria = new CDbCriteria();
                $emailCriteria->addCondition('id=0'); // tidak menampilkan apa-apa
            }
//                $emailCriteria->with = 'idBusiness';
                
            $emailDataProvider = new CActiveDataProvider('Email',array(
             'pagination' => array(
                    'pageSize' => 5,
                ),
                'criteria'=>$emailCriteria
            ));
		$this->render('index',array('model'=>$dataProvider,'sortType'=>$sortType,'selectedSortValue'=>$selectedSortValue,'email'=>$emailDataProvider));
	}
        
       

	/**
	 * @return array action filters
	 */
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        
        public function actionPreview()
        {
            
            $model = new Business();
            $model->attributes = $_POST['Business'];
            if($_POST['Business']['id_category'] == '1')
            {
                $this->render('preview',array('model'=>$model));
            }
            else if($_POST['Business']['id_category'] == '2')
            {
                $this->render('previewFranchise',array('model'=>$model));
            }
        }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
//            Yii::app()->user->setState('docs', null);
          //  var_dump(Yii::app()->user->getState('docs'));
//            var_dump($_POST);
//            var_dump($_FILES);
//            var_dump(Yii::app()->user->getState('images'));
//            Yii::import("ext.xupload.models.XUploadForm");
//            $img_upload = new XUploadForm();
//            $doc_upload = new XUploadForm();
                $settings = Settings::model()->findByAttributes(array('nama_settings'=>'settings_admin'));
		$model=new Business;
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
                if(isset($_GET['jenis']))
                {
                    $jenis = $_GET['jenis'];
                }
                else
                {
                    $jenis = 1;
                }
                if($jenis == 1)
                { 
                    $model->id_category = 1;
                }
                else
                {
                     $model->id_category = 2;
                }
                $kategori = CHtml::listData(BusinessCategory::model()->findAll(),'id','category');
		// Uncomment the following line if AJAX validation is needed
//		$this->performAjaxValidation($model);

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
                        $status_approval = "Verifikasi";
                    }
//                    $dokumen = CUploadedFile::getInstancesByName('dokumen');
//                    var_dump($dokumen);
//                    die;
                    $model->attributes = $_POST['Business'];
                    $model->status_approval = $status_approval;
                    if(isset($_POST['Business']['alasan_jual_lainnya']))
                    {
                         $model->alasan_jual_lainnya = $_POST['Business']['alasan_jual_lainnya'];
                    }
                    $model->tampilkanKontak = $_POST['Business']['tampilkanKontak'];
//                    if(isset($_POST['Business']['dropDownAlasanJual']))
//                    {
//                        $model->dropDownAlasanJual = $_POST['Business']['dropDownAlasanJual'];
//                        $model->alasan_jual_bisnis = $_POST['Business']['dropDownAlasanJual'];
//                    }
//                    if(isset($_POST['Business']['textAreaAlasanJual']))
//                    {
//                        $model->textAreaAlasanJual = $_POST['Business']['textAreaAlasanJual'];
//                        $model->alasan_jual_bisnis = $_POST['Business']['textAreaAlasanJual'];
//                    }
                    if($model->validate())
                    {
                        
                        //upload image handler
                        if(Yii::app()->user->hasState('images'))
                        {
                            $userImages = Yii::app()->user->getState('images');
                            //Resolve the final path for our images
                            $path = Yii::app()->getBasePath() . "/../uploads/images/".Yii::app()->user->id.'/';
                            $pathThumbnail = Yii::app()->getBasePath() . "/../uploads/images/".Yii::app()->user->id.'/thumbs/';
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
                                        $image_name = $i.'_'.$date.'_'.$image["name"];
                                        if(rename($image["path"], $path.$image_name))
                                        {
                                            chmod( $path .$image_name, 0777);
                                            $imgName .= $image_name.',';
                                        }
//                                        $date = date('ymdhis');
//                                        $temp= array_filter(explode('.',$image["name"]));
//                                        $extension = end($temp);
//                                        if(rename($image["path"], $path .'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension))
//                                        {
//                                            chmod( $path .'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension, 0777);
//                                            $imgName .= 'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension.',';
//                                        }
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
                                        $thumb_name = $i.'_'.$date.'_'.$image["name"];
                                        if(rename($image["thumb"], $pathThumbnail .$thumb_name))
                                        {
                                            chmod( $pathThumbnail .$thumb_name, 0777);
                                        }
//                                        $date = date('ymdhis');
//                                        $temp= array_filter(explode('.',$image["name"]));
//                                        $extension = end($temp);
//                                        if(rename($image["thumb"], $pathThumbnail .'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension))
//                                        {
//                                            chmod( $pathThumbnail .'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension, 0777);
//                                        }
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
                            $path = Yii::app()->getBasePath() . "/../uploads/docs/".Yii::app()->user->id.'/';
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
                                        $name = $i.'_'.$date.'_'.$docs['name'];
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
                    if($model->save()) 
                        $this->redirect('index');
               }
        Yii::app()->user->setState('images', null);
        Yii::app()->user->setState('documents', null);
        $this->render('create',array(
                        'jenis'=>$jenis,
			'model'=>$model,
                        'kategori'=>$kategori,
                        'kepemilikan'=>$list_kepemilikan,
                        'tahun'=>$list_tahun,
                        'industri'=>$list_industri,
                        'provinsi'=>$list_provinsi,
                        'alasan_jual_bisnis'=>$list_alasan_jual_bisnis,
                        'settings'=>$settings,
//                        'img_upload'=>$img_upload,
//                        'doc_upload'=>$doc_upload,
		));
	}
        
//        public function checkDocsExist($directory)
//        {
//            if(file_exists($directory))
//            {
//                return true;
//            }
//            else
//            {
//                return false;
//            }
//        }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $settings = Settings::model()->findByAttributes(array('nama_settings'=>'settings_admin'));
            $model=$this->loadModel($id);
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
            if($model->id_user != Yii::app()->user->id)
            {
                $this->redirect(Yii::app()->createUrl('//account/index'));
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
                $kategori = CHtml::listData(BusinessCategory::model()->findAll(),'id','category');
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);
                
		if(isset($_POST['Business']))
                {
                    if(isset($_GET['stat']))
                    {
                        $status_approval = $_GET['stat'];
                    }
                    else
                    {
                        $status_approval = "Verifikasi";
                    }
//                    $dokumen = CUploadedFile::getInstancesByName('dokumen');
//                    var_dump($dokumen);
//                    die;
                    $model->attributes = $_POST['Business'];
                    $model->status_approval = $status_approval;
//                    var_dump($_POST['Business']);
//                    var_dump($model->attributes);
//                    die;
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
                            $path = Yii::app()->getBasePath() . "/../uploads/images/".Yii::app()->user->id.'/';
                            $pathThumbnail = Yii::app()->getBasePath() . "/../uploads/images/".Yii::app()->user->id.'/thumbs/';
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
                            $path = Yii::app()->getBasePath() . "/../uploads/docs/".Yii::app()->user->id.'/';
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
                    if($model->save())
                        $this->redirect(Yii::app()->createUrl('//account/index'));
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
//            $temp = json_encode($initial_docs_files);
//            var_dump($temp); die;
//            var_dump($initial_docs_files);
//            var_dump(Yii::app()->user->getState('documents'));
            
        $this->render('update',array(
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
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Business('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Business']))
			$model->attributes=$_GET['Business'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
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
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='business-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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
        
        
        public function actionGetEmailDesc()
        {
            if(isset($_GET['id']))
            {
                $model = Email::model()->findByPk($_GET['id']);
                $this->renderPartial('_emailDescription', array('model'=>$model));
            }
        }
        
        public function actionGetEmail()
        {
            if(isset($_GET['id']))
            {
                $id_business = $_GET['id'];
                $model = Business::model()->findByPk($id_business);
                $emailCriteria = new CDbCriteria();
                $emailCriteria->addCondition('status= 1');
                $emailCriteria->addCondition("id_business=$id_business");
            }
            else
            {
                $model ='';
                $emailCriteria = new CDbCriteria();
                $emailCriteria->addCondition('id=0'); // tidak menampilkan apa-apa
            }
            
                        
            $emailDataProvider = new CActiveDataProvider('Email',array(
             'pagination' => array(
                    'pageSize' => 5,
                ),
                'criteria'=>$emailCriteria
            ));
            
            $this->renderPartial('_emailList',array('email'=>$emailDataProvider,'model'=>$model));
        }
        
        
        protected function gridStatusApproval($data, $row)
        {
            $model = Business::model()->with('idAlasanPenolakan')->findByPk($data->id);
            return $this->renderPartial('_columnStatusApproval',array('model'=>$model),true);
        }
        
        protected function gridEmailDeskripsi($data, $row)
        {
            $model = Email::model()->findByPk($data->id);
            return $this->renderPartial('_columnEmailDeskripsi',array('model'=>$model),true);
        }
        
        protected function gridDeskripsi($data, $row)
        {
            $model = Business::model()->findByPk($data->id);
            return $this->renderPartial('_columnDeskripsi',array('model'=>$model),true);
        }
        
        /*grid deskripsi for beli */
        protected function gridDeskripsiBeli($data, $row)
        {
            $model = Email::model()->with('idBusiness')->findByPk($data->id);
            return $this->renderPartial('_columnDeskripsiBeli',array('model'=>$model),true);
        }
}
