<?php

class RegistrasiController extends Controller
{
    public $layout = 'main';
    public function actions(){
        return array(
          // captcha action renders the CAPTCHA image displayed on the user registration page
          'captcha'=>array(
            'class'=>'CCaptchaAction',
            'backColor'=>0xFFFFFF,
            'testLimit'=> '3',
          ),
        );
    }
    
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
				'actions'=>array(
                                    'unsubscribeNewsletter'),
				'users'=>array('*'),
			),
			array('deny',  // deny authenticated users
				'users'=>array('@'),
			),
		);
	}
    
    public function actionIndex()
    {
        if(isset($_POST))
        {
//            var_dump($_POST["references"]);
//            die;
//            var_dump($_POST["references"]);
//            die;
        }
        $model=new User;
        $list_references1 = array(
            "Website"=>"Website",
            "Koran"=>"Koran",
            "Majalah"=>"Majalah",
            "Radio"=>"Radio",
        );
        $list_references2 = array(
            "Televisi"=>"Televisi",
            "Teman"=>"Teman",
            "Keluarga"=>"Keluarga",
            "Event"=>"Event"
        );
//        $list_references = array(
//            "Website"=>"Website",
//            "Koran"=>"Koran",
//            "Majalah"=>"Majalah",
//            "Radio"=>"Radio",
//            "Televisi"=>"Televisi",
//            "Teman"=>"Teman",
//            "Keluarga"=>"Keluarga",
//            "Event"=>"Event"
//        );
//        $list_tempat_lahir = CHtml::listData(City::model()->findAll(), "city", "city");
//        $list_tempat_lahir += array('Lainnya'=>'Lainnya');
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
        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-index-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            if($model->validate())
            {
                $pass_temp = $model->password;
                $model->password = md5($pass_temp);
                $m_references = "";
                if(isset($_POST['references']))
                {
                    foreach($_POST['references'] as $value)
                    {
                        
                        $m_references .= $value.',';
                    }
                    
                    if($references != "")
                    {
                        $model->references = $references;
                    }
                }
                $model->kode_verifikasi = md5(microtime().$model->email);
                $model->save(false);
                //verifikasi email function
                $mailSetting = Settings::model()->findByAttributes(array("nama_settings"=>"settings_admin"));
                YiiBase::import('ext.YiiMailer.YiiMailer');
                $mail = new YiiMailer();
                $mail->clearLayout(); //if layout is already set in config
                $mail->setFrom($mailSetting->alamat_email, $mailSetting->nama_email); //CHANGE TO SETTING EMAIL ADMIN ON DEPLOYMENT
                $mail->setTo($model->email); //CHANGE TO APPROPRIATE EMAIL WHEN DEPLOYING
                $mail->setSubject('Verifikasi Email JualanBisnis.com');
                $mail->setBody("<p>Klik link dibawah ini untuk mem-verifikasikan email anda: </p><p>".Yii::app()->createAbsoluteUrl("//registrasi/verifikasi?kode=$model->kode_verifikasi&id=$model->id")."</p>");
                if($mail->send())
                {
//                  Yii::app()->user->setFlash('email','Email Berhasil Dikirim');
                    $this->redirect(Yii::app()->createUrl('//registrasi/notifikasi',array('email'=>$model->email)));
                }
                else
                {
                    Yii::app()->user->setFlash('error', 'Error while sending email: ' . $mail->getError());
                }
                
            }
        }
        $this->render('index',array(
            'model'=>$model,
            'agama'=>$list_agama,
            'pekerjaan'=>$list_pekerjaan,
            'jenis_kelamin'=>$list_jenis_kelamin,
            'status_perkawinan' => $list_status_perkawinan,
            'negara' => $list_negara,
            'kategori' => $list_kategori_buyer,
            'lokasi' => $list_provinsi,
            'range_harga' => $list_range_harga,
//            'tempat_lahir' => $list_tempat_lahir,
            'references1' => $list_references1,
            'references2' => $list_references2,
//            'references'=> $list_references,
            ));
    }
    
    public function actionNotifikasi($email)
    {
        $user_check = User::model()->findByAttributes(array('email'=>$email));
        if($user_check == '' || $user_check == null)
        {
            $this->render('notifikasi',array('status'=>'Email tidak terdaftar'));
        }
        else
        {
            if($user_check->status_verifikasi != 0)
            {
                $this->render('notifikasi',array('status'=>'Anda sudah melakukan verifikasi'));
            }
            else
            {
                $this->render('notifikasi',array('model'=>$user_check));
            }
        }
    }
    
    public function actionVerifikasi()
    {
        
        if(isset($_GET['id']) && isset($_GET['kode']))
        {
            $user_id = $_GET['id'];
            $kode_verifikasi = $_GET['kode'];
            $model = UserUpdate::model()->findByPk($user_id);
            if($model->status_verifikasi == 1)
            {
                $this->render('verifikasi',array('status'=>'Anda sudah melakukan verifikasi'));
            }
            else
            {
                if($model->kode_verifikasi == $kode_verifikasi)
                {
                    $model->password_repeat = $model->password;
                    $model->status_verifikasi = 1;
                    $model->save();
                    $autoLogin = new AutoLoginIdentity($model->email,'');
                    $autoLogin->authenticate();
                    Yii::app()->user->login($autoLogin, $duration = 0); // Do not remember Auto login user
                    $this->render('verifikasi',array('status'=>'Anda telah berhasil memverifikasikan akun anda. Terima kasih'));
                }
                else
                {
                    $this->render('verifikasi',array('status'=>'Terdapat kesalahan pada kode verifikasi, harap hubungi kami'));
                }
            }
            
        }
        else
        {
            $this->render('verifikasi',array('status'=>'Terdapat kesalahan pada kode verifikasi, harap hubungi kami'));
        }
    }
    
    public function actionResendVerifikasi()
    {
        $mailSetting = Settings::model()->findByAttributes(array("nama_settings"=>"settings_admin"));
        $email = $_POST['email'];
        $model = User::model()->findByAttributes(array('email'=>$email));
        YiiBase::import('ext.YiiMailer.YiiMailer');
        $mail = new YiiMailer();
        $mail->clearLayout(); //if layout is already set in config
        $mail->setFrom($mailSetting->alamat_email, $mailSetting->nama_email); //CHANGE TO SETTING EMAIL ADMIN ON DEPLOYMENT
        $mail->setTo($model->email); //CHANGE TO APPROPRIATE EMAIL WHEN DEPLOYING
        $mail->setSubject('Verifikasi Email JualanBisnis.com');
        $mail->setBody("<p>Klik link dibawah ini untuk mem-verifikasikan email anda: </p><p>".Yii::app()->createAbsoluteUrl("//registrasi/verifikasi?kode=$model->kode_verifikasi&id=$model->id")."</p>");
        if($mail->send())
        {
            echo "success";
        }
        else
        {
            echo "error";
        }
    }
    
    public function actionUnsubscribeNewsletter()
    {
        $model = new UnsubscribeNewsletter();
        if(isset($_POST['UnsubscribeNewsletter']))
        {
            if(Yii::app()->request->isAjaxRequest)
            {
                $model->attributes=$_POST['UnsubscribeNewsletter'];
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
        }
        
        $this->render('unsubscribeNewsletter',array('model'=>$model));
    }
    
}