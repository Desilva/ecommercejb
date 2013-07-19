<?php

class AccountController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
        public $layout='main';
        public function actions()
        {
            return array(
                'upload'=>array(
                    'class'=>'ext.xupload.actions.XUploadAction',
                    'path' =>Yii::app() -> getBasePath() . "/../uploads",
                    'publicPath' => Yii::app() -> getBaseUrl() . "/uploads",
                ),
            );
        }
        public function init()
        {
            $this->beginClip('sidebar');
                $this->renderPartial('_sidebar',array());
            $this->endClip();
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','GenerateSubIndustri','GenerateKota','upload','uploadDoc','preview','GetEmailDesc','GetEmail','dataDiri','watchlist'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                        'deniedCallback' => function() { Yii::app()->controller->redirect(array('/home/index')); }
		);
	}

        public function actionWatchlist()
        {
            $selectedSortValue = '1';
            if(isset($_POST['sort']))
            {
                $selectedSortValue = $_POST['sort'];
            }

            $sortType = BusinessCategory::model()->findAll();
            $criteria= new CDbCriteria();
            $criteria->with = 'idUser';
            $criteria->with = 'idBusiness';
            $criteria->addCondition('t.id_user ='.Yii::app()->user->id );
            $criteria->addCondition('idBusiness.id_category ='.$selectedSortValue );
            $criteria->addCondition("idBusiness.status_approval = 'diterima'" );
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
            $list_kategori_buyer = BuyerCategory::model()->findAll();
            $list_kota = City::model()->findAll();
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
                'lokasi' => $list_kota,
                'range_harga' => $list_range_harga,
                'penghasilan' => $list_penghasilan,
                'tempat_lahir' => $list_tempat_lahir,
                ));
        }
        
	public function actionIndex()
	{
//            var_dump($_GET);
            $selectedSortValue = '1';
            if(isset($_POST['sort']))
            {
                $selectedSortValue = $_POST['sort'];
                $criteria = new CDbCriteria();
                $criteria->condition = "id_category=$selectedSortValue";
                $criteria->order = 'id desc';
            }
            else
            {
                $criteria = new CDbCriteria();
                $criteria->condition = "id_category=1";
                $criteria->order = 'id desc';
            }
            
//             $emailCriteria = new CDbCriteria();
//             $emailCriteria->addCondition('status= 1');
            $sortType = BusinessCategory::model()->findAll();
            //$sortType = BusinessCategory::model()->findAll();
            
            $dataProvider = new CActiveDataProvider('Business', array(
                'pagination' => array(
                    'pageSize' => 10,
                ),
                'criteria'=>$criteria
            ));
            
            
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
        
        protected function gridStatusApproval($data, $row)
        {
            $model = Business::model()->findByPk($data->id);
            return $this->renderPartial('_columnStatusApproval',array('model'=>$model),true);
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
//            var_dump($_POST);
//            var_dump($_FILES);
//            var_dump(Yii::app()->user->getState('images'));
            Yii::import("ext.xupload.models.XUploadForm");
            $img_upload = new XUploadForm;
            $doc_upload = new XUploadForm;
		$model=new Business;
                $list_alasan_jual_bisnis = array(
                    "Alasan 1"=>"Alasan 1",
                    "Alasan 2"=>"Alasan 2",
                    "Alasan 3"=>"Alasan 3"
                );
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
                    $dokumen = CUploadedFile::getInstancesByName('dokumen');
//                    var_dump($dokumen);
//                    die;
                    $model->attributes = $_POST['Business'];
                    $model->status_approval = $status_approval;
                    if(isset($_POST['Business']['alasan_jual_lainnya']))
                    {
                         $model->alasan_jual_lainnya = $_POST['Business']['alasan_jual_lainnya'];
                    }
                    $model->tampilkanKontak = $_POST['Business']['tampilkanKontak'];
                    if(isset($_POST['Business']['dropDownAlasanJual']))
                    {
                        $model->dropDownAlasanJual = $_POST['Business']['dropDownAlasanJual'];
                        $model->alasan_jual_bisnis = $_POST['Business']['dropDownAlasanJual'];
                    }
                    if(isset($_POST['Business']['textAreaAlasanJual']))
                    {
                        $model->textAreaAlasanJual = $_POST['Business']['textAreaAlasanJual'];
                        $model->alasan_jual_bisnis = $_POST['Business']['textAreaAlasanJual'];
                    }
                    if($model->validate())
                    {
                        if(Yii::app()->user->hasState('images'))
                        {
                            $userImages = Yii::app()->user->getState('images');
                            //Resolve the final path for our images
                            $path = Yii::app()->getBasePath() . "/../uploads/";
                            //Create the folder and give permissions if it doesnt exists
                            if(!is_dir($path))
                            {
                                mkdir($path);
                                chmod($path, 0777);
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
                                        $extension = end($temp);
                                        if(rename($image["path"], $path .'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension))
                                        {
                                            chmod( $path .'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension, 0777);
                                            $imgName .= 'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension.',';
    //                                        $img = new Image( );
    //                                        $img->size = $image["size"];
    //                                        $img->mime = $image["mime"];
    //                                        $img->name = $image["name"];
    //                                        $img->source = "/images/uploads/{$this->id}/" . $image["filename"];
    //                                        $img->somemodel_id = $this->id;
    //                                        if(!$img->save())
    //                                        {
    //                                            //Its always good to log something
    //                                            Yii::log("Could not save Image:\n" . CVarDumper::dumpAsString(
    //                                                            $img->getErrors()), CLogger::LEVEL_ERROR);
    //                                            //this exception will rollback the transaction
    //                                            throw new Exception('Could not save Image');
    //                                        }
                                        }
                                    }
                                    else
                                    {
                                        //You can also throw an execption here to rollback the transaction
                                        Yii::log($image["path"] . " is not a file", CLogger::LEVEL_WARNING);
                                    }
                                }
                                $model->image = $imgName;
                                //Clear the user's session
                                Yii::app()->user->setState('images', null);

                        }
                    }
                    if($model->save()) 
                        $this->redirect('index');
                }
        Yii::app()->user->setState('images', null);
        $this->render('create',array(
                        'jenis'=>$jenis,
			'model'=>$model,
                        'kategori'=>$kategori,
                        'kepemilikan'=>$list_kepemilikan,
                        'tahun'=>$list_tahun,
                        'industri'=>$list_industri,
                        'provinsi'=>$list_provinsi,
                        'alasan_jual_bisnis'=>$list_alasan_jual_bisnis,
                        'img_upload'=>$img_upload,
                        'doc_upload'=>$doc_upload,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $model=$this->loadModel($id);
            var_dump($_POST);
            Yii::import("ext.xupload.models.XUploadForm");
            $img_upload = new XUploadForm;
            $doc_upload = new XUploadForm;
                $list_alasan_jual_bisnis = array(
                    "Alasan 1"=>"Alasan 1",
                    "Alasan 2"=>"Alasan 2",
                    "Alasan 3"=>"Alasan 3"
                );
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
                    $dokumen = CUploadedFile::getInstancesByName('dokumen');
//                    var_dump($dokumen);
//                    die;
                    $model->attributes = $_POST['Business'];
//                    $model->status_approval = $status_approval;
                    if(isset($_POST['Business']['alasan_jual_lainnya']))
                    {
                         $model->alasan_jual_lainnya = $_POST['Business']['alasan_jual_lainnya'];
                    }
                    $model->tampilkanKontak = $_POST['Business']['tampilkanKontak'];
                    if(isset($_POST['Business']['dropDownAlasanJual']))
                    {
                        $model->dropDownAlasanJual = $_POST['Business']['dropDownAlasanJual'];
                        $model->alasan_jual_bisnis = $_POST['Business']['dropDownAlasanJual'];
                    }
                    if(isset($_POST['Business']['textAreaAlasanJual']))
                    {
                        $model->textAreaAlasanJual = $_POST['Business']['textAreaAlasanJual'];
                        $model->alasan_jual_bisnis = $_POST['Business']['textAreaAlasanJual'];
                    }
                    if($model->validate())
                    {
                        if(Yii::app()->user->hasState('images'))
                        {
                            $userImages = Yii::app()->user->getState('images');
                            //Resolve the final path for our images
                            $path = Yii::app()->getBasePath() . "/../uploads/";
                            //Create the folder and give permissions if it doesnt exists
                            if(!is_dir($path))
                            {
                                mkdir($path);
                                chmod($path, 0777);
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
                                        $extension = end($temp);
                                        if(rename($image["path"], $path .'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension))
                                        {
                                            chmod( $path .'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension, 0777);
                                            $imgName .= 'bf'.'_'. Yii::app()->user->id .'_'.$date.'_'.$i.'.'.$extension.',';
    //                                        $img = new Image( );
    //                                        $img->size = $image["size"];
    //                                        $img->mime = $image["mime"];
    //                                        $img->name = $image["name"];
    //                                        $img->source = "/images/uploads/{$this->id}/" . $image["filename"];
    //                                        $img->somemodel_id = $this->id;
    //                                        if(!$img->save())
    //                                        {
    //                                            //Its always good to log something
    //                                            Yii::log("Could not save Image:\n" . CVarDumper::dumpAsString(
    //                                                            $img->getErrors()), CLogger::LEVEL_ERROR);
    //                                            //this exception will rollback the transaction
    //                                            throw new Exception('Could not save Image');
    //                                        }
                                        }
                                    }
                                    else
                                    {
                                        //You can also throw an execption here to rollback the transaction
                                        Yii::log($image["path"] . " is not a file", CLogger::LEVEL_WARNING);
                                    }
                                }
                                $model->image = $imgName;
                                //Clear the user's session
                                Yii::app()->user->setState('images', null);

                        }
                    }
                    if($model->save())
                        $this->redirect('index');
                }
        Yii::app()->user->setState('images', null);
        $this->render('update',array(
                        'jenis'=>$jenis,
			'model'=>$model,
                        'kategori'=>$kategori,
                        'kepemilikan'=>$list_kepemilikan,
                        'tahun'=>$list_tahun,
                        'industri'=>$list_industri,
                        'provinsi'=>$list_provinsi,
                        'alasan_jual_bisnis'=>$list_alasan_jual_bisnis,
                        'img_upload'=>$img_upload,
                        'doc_upload'=>$doc_upload,
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
        
        
        public function actionUpload()
        {
//            var_dump($_FILES);
//            die;
//            $date = date('ymdhis');
//            $userId= Yii::app()->user->id;
//            $target = Yii::app()->basePath.'/../uploads/'.$userId.'-'.$date.'-'.'.jpg';
//            var_dump($_FILES['files']['tmp_name']);
//            var_dump($target);
//            $data = implode($_FILES['files']['tmp_name']);
//            move_uploaded_file($data, $target);
            Yii::import("ext.xupload.models.XUploadForm");
            //Here we define the paths where the files will be stored temporarily
            $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/";
            $publicPath = Yii::app()->getBaseUrl() . "/uploads/tmp/";

            //This is for IE which doens't handle 'Content-type: application/json' correctly
            header('Vary: Accept');
            if(isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false))
            {
                header('Content-type: application/json');
            }
            else
            {
                header('Content-type: text/plain');
            }

            //Here we check if we are deleting and uploaded file
            if(isset($_GET["_method"]))
            {
                if($_GET["_method"] == "delete")
                {
                    if($_GET["file"][0] !== '.')
                    {
                        $file = $path . $_GET["file"];
                        if(is_file($file))
                        {
                            unlink($file);
                        }
                    }
                    echo json_encode(true);
                }
            }
            else
            {
                $model = new XUploadForm;
                $model->file = CUploadedFile::getInstance($model, 'file');
                //We check that the file was successfully uploaded
                if($model->file !== null)
                {
                    //Grab some data
                    $model->mime_type = $model->file->getType();
                    $model->size = $model->file->getSize();
                    $model->name = $model->file->getName();
                    //(optional) Generate a random name for our file
                    $filename = md5(Yii::app()->user->id . microtime() . $model->name);
                    $filename .= "." . $model->file->getExtensionName();
                    if($model->validate())
                    {
                        //Move our file to our temporary dir
                        $model->file->saveAs($path . $filename);
                        chmod($path . $filename, 0777);
                        //here you can also generate the image versions you need 
                        //using something like PHPThumb
                        //Now we need to save this path to the user's session
                        if(Yii::app()->user->hasState('images'))
                        {
//                            $delImages = Yii::app()->user->getState('images');
//                            foreach($delImages as $del)
//                            {
//                                $file = $del["path"];
//                                if(is_file($file))
//                                {
//                                    unlink($file);
//                                }
//                            }
//                            Yii::app()->user->setState('images',null);
//                            $userImages = array();
                            $userImages = Yii::app()->user->getState('images');

//                            $userImages = array();
                        }
                        else
                        {
                            $userImages = array();
                        }
                        $userImages[] = array(
                            "path" => $path . $filename,
                            //the same file or a thumb version that you generated
                            "thumb" => $path . $filename,
                            "filename" => $filename,
                            'size' => $model->size,
                            'mime' => $model->mime_type,
                            'name' => $model->name,
                        );
                        Yii::app()->user->setState('images', $userImages);

                        //Now we need to tell our widget that the upload was succesfull
                        //We do so, using the json structure defined in
                        // https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
                        echo json_encode(array(array(
                                "name" => $model->name,
                                "type" => $model->mime_type,
                                "size" => $model->size,
                                "url" => $publicPath . $filename,
                                "thumbnail_url" => $publicPath . "/$filename",
                                "delete_url" => $this->createUrl("upload", array(
                                    "_method" => "delete",
                                    "file" => $filename
                                )),
                                "delete_type" => "POST"
                        )));
                    }
                    else
                    {
                        //If the upload failed for some reason we log some data and let the widget know
                        echo json_encode(array(
                            array("error" => $model->getErrors('file'),
                        )));
                        Yii::log("XUploadAction: " . CVarDumper::dumpAsString($model->getErrors()), CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction"
                        );
                    }
                }
                else
                {
                    throw new CHttpException(500, "Could not upload file");
                }
            }
        }
        
//         public function actionUploadDoc()
//        {
//            Yii::import("ext.xupload.models.XUploadForm");
//            //Here we define the paths where the files will be stored temporarily
//            $path = realpath(Yii::app()->getBasePath() . "/../uploads/tmp/") . "/";
//            $publicPath = Yii::app()->getBaseUrl() . "/uploads/tmp/";
//
//            //This is for IE which doens't handle 'Content-type: application/json' correctly
//            header('Vary: Accept');
//            if(isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false))
//            {
//                header('Content-type: application/json');
//            }
//            else
//            {
//                header('Content-type: text/plain');
//            }
//
//            //Here we check if we are deleting and uploaded file
//            if(isset($_GET["_method"]))
//            {
//                if($_GET["_method"] == "delete")
//                {
//                    if($_GET["file"][0] !== '.')
//                    {
//                        $file = $path . $_GET["file"];
//                        if(is_file($file))
//                        {
//                            unlink($file);
//                        }
//                    }
//                    echo json_encode(true);
//                }
//            }
//            else
//            {
//                $model = new XUploadForm;
//                $model->file = CUploadedFile::getInstance($model, 'file');
//                //We check that the file was successfully uploaded
//                if($model->file !== null)
//                {
//                    //Grab some data
//                    $model->mime_type = $model->file->getType();
//                    $model->size = $model->file->getSize();
//                    $model->name = $model->file->getName();
//                    //(optional) Generate a random name for our file
//                    $filename = md5(Yii::app()->user->id . microtime() . $model->name);
//                    $filename .= "." . $model->file->getExtensionName();
//                    if($model->validate())
//                    {
//                        //Move our file to our temporary dir
//                        $model->file->saveAs($path . $filename);
//                        chmod($path . $filename, 0777);
//                        //here you can also generate the image versions you need 
//                        //using something like PHPThumb
//                        //Now we need to save this path to the user's session
//                        if(Yii::app()->user->hasState('docs'))
//                        {
////                            $delImages = Yii::app()->user->getState('images');
////                            foreach($delImages as $del)
////                            {
////                                $file = $del["path"];
////                                if(is_file($file))
////                                {
////                                    unlink($file);
////                                }
////                            }
////                            Yii::app()->user->setState('images',null);
////                            $userImages = array();
//                            $userDocs = Yii::app()->user->getState('docs');
//
////                            $userImages = array();
//                        }
//                        else
//                        {
//                            $userDocs = array();
//                        }
//                        $userDocs[] = array(
//                            "path" => $path . $filename,
//                            //the same file or a thumb version that you generated
//                            "thumb" => $path . $filename,
//                            "filename" => $filename,
//                            'size' => $model->size,
//                            'mime' => $model->mime_type,
//                            'name' => $model->name,
//                        );
//                        Yii::app()->user->setState('docs', $userDocs);
//
//                        //Now we need to tell our widget that the upload was succesfull
//                        //We do so, using the json structure defined in
//                        // https://github.com/blueimp/jQuery-File-Upload/wiki/Setup
//                        echo json_encode(array(array(
//                                "name" => $model->name,
//                                "type" => $model->mime_type,
//                                "size" => $model->size,
//                                "url" => $publicPath . $filename,
//                                "thumbnail_url" => $publicPath . "/$filename",
//                                "delete_url" => $this->createUrl("upload", array(
//                                    "_method" => "delete",
//                                    "file" => $filename
//                                )),
//                                "delete_type" => "POST"
//                        )));
//                    }
//                    else
//                    {
//                        //If the upload failed for some reason we log some data and let the widget know
//                        echo json_encode(array(
//                            array("error" => $model->getErrors('file'),
//                        )));
//                        Yii::log("XUploadAction: " . CVarDumper::dumpAsString($model->getErrors()), CLogger::LEVEL_ERROR, "xupload.actions.XUploadAction"
//                        );
//                    }
//                }
//                else
//                {
//                    throw new CHttpException(500, "Could not upload file");
//                }
//            }
//        }
        
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
                $emailCriteria = new CDbCriteria();
                $emailCriteria->addCondition('status= 1');
                $emailCriteria->addCondition("id_business=$id_business");
            }
            else
            {
                $emailCriteria = new CDbCriteria();
                $emailCriteria->addCondition('id=0'); // tidak menampilkan apa-apa
            }
            
                        
            $emailDataProvider = new CActiveDataProvider('Email',array(
             'pagination' => array(
                    'pageSize' => 5,
                ),
                'criteria'=>$emailCriteria
            ));
            $this->renderPartial('_emailList',array('email'=>$emailDataProvider));
        }
}
