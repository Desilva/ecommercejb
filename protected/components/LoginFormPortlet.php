<?php

Yii::import('zii.widgets.CPortlet'); // you have to import the CPortlet first

/**
 * Portlet that is rendering login form. You can call it anywhere in your view file.
 */
class LoginFormPortlet extends CPortlet
{

    /**
     * Initializing portlet
     */
    public function init()
    {
        parent::init();
    }
 
    /**
     * Renders the content of the portlet.
     */
    protected function renderContent()
    {
        $model = new LoginForm; // use LoginForm model that comes after you create new yii app
        $error = '';
        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
                echo CActiveForm::validate($model);
                Yii::app()->end();
        }

        // collect user input data
//        if(isset($_POST['LoginForm']))
//        {
//                $model->attributes=$_POST['LoginForm'];
//                // validate user input and redirect to the previous page if valid
//                if($model->validate() && $model->login())
//                        $this->controller->redirect(Yii::app()->user->returnUrl);
//                }
        
        if(isset($_POST['LoginForm']))
        {
                    
            $model->attributes = $_POST['LoginForm'];
            
            $flag_allow_login = false;
            $login_status_user = StatusLogin::model()->findByAttributes(array('email'=>$model->email));
            if($login_status_user == '' || $login_status_user == null)
            {
                //if the user email hasn't been in the database table then add new data
                $login_status_user = new StatusLogin();
                $login_status_user->id = '';
                $login_status_user->email = $model->email;
                $login_status_user->jumlah_percobaan = 0;
                $login_status_user->save();
            }
            
            if($login_status_user->waktu_gagal_login_terakhir != '' || $login_status_user->waktu_gagal_login_terakhir != null)
            {
                $last_failed_time = strtotime('+ 15 minute',strtotime($login_status_user->waktu_gagal_login_terakhir));
                $current_time = strtotime(date('Y-m-d H:i:s'));
                if(($current_time - $last_failed_time ) <= 0 && $login_status_user->jumlah_percobaan == 5) //the user tried to log again with invalid credentials before the time limit has passed
                {

//                    $model->addError('email', 'Harap tunggu 15 menit sebelum percobaan selanjutnya');
                    $login_status_user->waktu_gagal_login_terakhir = date('Y-m-d H:i:s');
                    $login_status_user->save();
                }
                else if(($current_time - $last_failed_time ) >= 0 ) 
                {
                    $login_status_user->jumlah_percobaan = 0;
                    $login_status_user->waktu_gagal_login_terakhir = date('Y-m-d H:i:s');
                    $login_status_user->save();
                    $flag_allow_login = true;
                }
                else
                {
                    $flag_allow_login = true;
                }
            }
            else
            {
                $flag_allow_login = true;
            }
            
            
            if($model->validate() && $flag_allow_login = true)
            {
                $check_status_verifikasi = User::model()->findByAttributes(array('email' => $model->email));
                
                if($check_status_verifikasi == '' || $check_status_verifikasi == null)
                {
                    /* if email not found the proceed to default login procedure which will always return false */
                    $model->login();
                }
                else
                {

                    if($check_status_verifikasi->status_verifikasi != 1)
                    {
                        $this->controller->redirect(Yii::app()->createUrl('//registrasi/notifikasi', array('email' => $check_status_verifikasi->email)));
                    }
                    else
                    {
                        if($model->login() == true)
                        {
                            $login_status_user->waktu_sukses_login_terakhir = date('Y-m-d H:i:s');
                            $login_status_user->jumlah_percobaan = 0;
                            $login_status_user->save();
                            $this->controller->redirect(Yii::app()->user->returnUrl);
                        }
                    }
                }
            }
            else
            {
                if($login_status_user->waktu_gagal_login_terakhir ==null || $login_status_user->waktu_gagal_login_terakhir == '')
                {
                    $last_failed_time = strtotime('+ 15 minute',strtotime($login_status_user->waktu_gagal_login_terakhir));
                    $current_time = strtotime(date('Y-m-d H:i:s'));
                }
                else
                {
                    $last_failed_time = strtotime('+ 15 minute',strtotime($login_status_user->waktu_gagal_login_terakhir));
                    $current_time = strtotime(date('Y-m-d H:i:s'));
                }
                if((($current_time - $last_failed_time) <= 0 && $login_status_user->jumlah_percobaan == 5) && $flag_allow_login == true) //the user tried to log again with invalid credentials before the time limit has passed
                {
                    $error = "Harap tunggu 15 menit sebelum percobaan selanjutnya";
                    $login_status_user->waktu_gagal_login_terakhir = date('Y-m-d H:i:s');
                    $login_status_user->save();
                }
                else if($login_status_user->jumlah_percobaan <5 && $flag_allow_login == true)
                {
                    
                    $jumlah_percobaan_lama = $login_status_user->jumlah_percobaan;
                    $login_status_user->jumlah_percobaan = $jumlah_percobaan_lama + 1;
                    $login_status_user->waktu_gagal_login_terakhir = date('Y-m-d H:i:s');
                    $login_status_user->save();
                    $error = "Email/Password salah";
                }
                else if(($current_time - $last_failed_time ) >= 0 && $flag_allow_login == true) //the user tried to log again with invalid credentials after the time limit has passed
                {
                    //reset fail attempts count
                    $login_status_user->jumlah_percobaan = 1;
                    $login_status_user->waktu_gagal_login_terakhir = date('Y-m-d H:i:s');
                    $login_status_user->save();
                }
                else if($flag_allow_login == false)
                {
                    $error = "Harap tunggu 15 menit sebelum percobaan selanjutnya";
//                    $model->addError('email', 'Harap tunggu 15 menit sebelum percobaan selanjutnya');
                    $login_status_user->waktu_gagal_login_terakhir = date('Y-m-d H:i:s');
                    $login_status_user->save();
                }
            }
        }
        // display the login form
        $this->render('loginForm',array('model'=>$model,'error'=>$error));
    }
    

}
