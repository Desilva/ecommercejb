<?php

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
				'actions'=>array('create','update','index','view','delete','toggle','GenerateKota','GenerateSubIndustri','Tolak'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        
        public function actionTolak($id)
        {
            $model = Business::model()->findByPk($id);
            $error="";
            if(isset($_POST['alasan']) || isset($_POST['alasan_tambahan']))
            {
                $alasan = $_POST['alasan'];
                $alasan_tambahan = $_POST['alasan_tambahan'];
                if($alasan == '' && $alasan_tambahan == '')
                {
                    $error="Pilih atau Isi Alasan Penolakan";
                }
                else
                {
                    $model->status_approval = "Ditolak";
                    if($alasan != "" && $alasan_tambahan !="")
                    {
                        $model->alasan_penolakan = $alasan.'<br/>'.$alasan_tambahan;
                    }
                    else if($alasan == "" && $alasan_tambahan !="")
                    {
                        $model->alasan_penolakan = $alasan_tambahan;
                    }
                    else if($alasan != "" && $alasan_tambahan =="")
                    {
                        $model->alasan_penolakan = $alasan;
                    }
                    $model->save();
                    $this->redirect(Yii::app()->createUrl('//jbAdmin/bisnisFranchise/index'));
                }
            }
            $alasan_penolakan = array(
                "Alasan 1"=>"Alasan 1",
                "Alasan 2"=>"Alasan 2",
                "Alasan 3"=>"Alasan 3",
            );
            $this->render('tolak',array('model'=>$model,'alasan_penolakan'=>$alasan_penolakan,'error'=>$error));
        }
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $model=$this->loadModel($id);
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
                        $status_approval = $model->status_approval;
                    }
                    $dokumen = CUploadedFile::getInstancesByName('dokumen');
                    $model->attributes = $_POST['Business'];
                    $model->status_approval = $status_approval;
                    if($status_approval == "Diterima")
                    {
                        $model->tanggal_approval = date('Y-m-d');
                    }
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
                        $this->redirect(Yii::app()->createUrl('//jbAdmin/bisnisFranchise/index'));
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
		$this->render('index',array('model'=>$dataProvider,'sortType'=>$sortType,'selectedSortValue'=>$selectedSortValue));
	
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
