<?php
/*
 * STILL USED FOR LOGOUT
 * NOT USED ANYMORE FOR LOGIN, SEE /PROTECTED/COMPONENTS/LOGINFORMPORTLET FOR LOGIN
 */
class AuthenticationController extends Controller
{
    public $layout = 'main';
	
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
                        
			$model->attributes=$_POST['LoginForm'];
                        if($model->validate())
                        {
                            $check_status_verifikasi = User::model()->findByAttributes(array('email'=>$model->email));
                            /* if email not found the proceed to default login procedure which will return false */
                            if($check_status_verifikasi == '' || $check_status_verifikasi == null)
                            {
                                $model->login();
                            }
                            else
                            {
                                if($check_status_verifikasi->status_verifikasi != 1)
                                {
                                    $this->redirect(Yii::app()->createUrl('//registrasi/notifikasi',array('email'=>$check_status_verifikasi->email)));
                                }
                                else
                                {
                                    if($model->login())
                                    {
                                        $this->redirect(Yii::app()->user->returnUrl);
                                    }
                                }
                            }
                        }
			// validate user input and redirect to the previous page if valid
//			if($model->validate() && $model->login())
//				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('index',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}