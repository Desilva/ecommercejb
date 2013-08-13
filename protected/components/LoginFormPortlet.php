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
            if($model->validate())
            {
                $check_status_verifikasi = User::model()->findByAttributes(array('email' => $model->email));
                /* if email not found the proceed to default login procedure which will return false */
                if($check_status_verifikasi == '' || $check_status_verifikasi == null)
                {
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
                        die;
                        if($model->login())
                        {
                            $this->controller->redirect(Yii::app()->user->returnUrl);
                        }
                    }
                }
            }
        }
        // display the login form
        $this->render('loginForm',array('model'=>$model));
    }

}
