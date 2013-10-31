<?php

class LupaPasswordController extends Controller
{
    public $layout = 'main';
    
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
                    array('deny',  // deny authenticated users
                            'users'=>array('@'),
                    ),
            );
    }
    
    public function actionNotifikasi()
    {
                $email = $_GET['email'];
                $this->render('notifikasi',array('email'=>$email));
    }
    
    public function actionIndex()
    {
        
        $model = new LupaPassword();
        if(isset($_POST['LupaPassword']))
        {
            $model->attributes = $_POST['LupaPassword'];
            if($model->validate())
            {
                $settings = Settings::model()->findByAttributes(array('nama_settings'=>'settings_admin'));
                $new_password_hash = md5(microtime());
                $user = UserUpdate::model()->findByAttributes(array('email'=>$model->email));
                if($user != null && $user != '')
                {
                    YiiBase::import('ext.YiiMailer.YiiMailer');
                    $user->lupa_password_hash = $new_password_hash;
                    $user->lupa_password_date_expired = date("Y-m-d H:i:s",  strtotime('+6 hours'));
                    $user->password_repeat = $user->password;
                    $user->save();
                    //function to send email
                    $mail = new YiiMailer();
                    $mail->clearLayout();//if layout is already set in config
                    $mail->setFrom($settings->alamat_email, $settings->nama_email);
                    $mail->setTo($user->email);
                    $mail->setSubject('Perubahan Password');
                    $mail->setBody("Harap klik link dibawah untuk melakukan reset terhadap password anda:<br /><a href=".Yii::app()->createAbsoluteUrl("//lupaPassword/resetPassword?id=$user->id&kode=$new_password_hash").">Klik Disini</a>");
                    if ($mail->send()) {
//                        Yii::app()->user->setFlash('email','Email Berhasil Dikirim');
                        $this->redirect(Yii::app()->createUrl('//lupaPassword/notifikasi',array('email'=>$model->email)));
                    } else {
                       var_dump($mail->getError());
                       die;
                    }
                    
                    
                }
                else
                {
                    $model->addError('email',"Email tidak terdaftar");
                }
               
            }
            
        }
        $this->render('index',array('model'=>$model));
    }
    
    public function actionResetPassword()
    {
        if(isset($_POST['UserUpdate']))
        {
            $user = UserUpdate::model()->findByAttributes(array('id'=>$_POST['UserUpdate']['id'],'lupa_password_hash'=>$_POST['UserUpdate']['lupa_password_hash']));
            
            if($user !=null && $user != '')
            {
                $user->password=md5($_POST['UserUpdate']['password']);
                $user->password_repeat = md5($_POST['UserUpdate']['password_repeat']);
                if(Yii::app()->request->isAjaxRequest)
                {
                    
                    $valid=$user->validate();            
                    if($valid){

                       //do anything here
                         echo CJSON::encode(array(
                              'status'=>'success'
                         ));
                        Yii::app()->end();
                        }
                        else{
                            $error = CActiveForm::validate($user);
                            if($error!='[]')
                                echo $error;
                            Yii::app()->end();
                        }
                }
                $user->lupa_password_hash= null;
                $user->save();
                $autoLogin = new AutoLoginIdentity($user->email,'');
                $autoLogin->authenticate();
                Yii::app()->user->login($autoLogin, $duration = 0); // Do not remember Auto login user
                $this->redirect(Yii::app()->createUrl('//home'));
            }
            else
            {
                 $this->render('resetPassword',array('error'=>true));
            }
            
        }
        else
        {
            $id = $_GET['id'];
            $password_hash = $_GET['kode'];
            $user = UserUpdate::model()->findByAttributes(array('id'=>$id,'lupa_password_hash'=>$password_hash));
            
            if($user != null && $user !='')
            {
                $current_date_time = strtotime('now');
                $password_hash_expired_date_time = strtotime($user->lupa_password_date_expired);
                if(($password_hash_expired_date_time - $current_date_time) < 0 )
                {
                    $this->render('resetPassword',array('error'=>true));
                }
                else
                {
                    $user->password = '';
                    $this->render('resetPassword',array('user'=>$user));
                }
                
            }
            else
            {
                $this->render('resetPassword',array('error'=>true));
            }
        }
       
    }
}

?>