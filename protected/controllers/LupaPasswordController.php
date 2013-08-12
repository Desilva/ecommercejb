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
    
    public function actionIndex()
    {
        
        $model = new LupaPassword();
        if(isset($_POST['LupaPassword']))
        {
            $model->attributes = $_POST['LupaPassword'];
            if($model->validate())
            {
                $new_password = md5(microtime());
                $user = User::model()->findByAttributes(array('email'=>$model->email));
                if($user != null || $user != '')
                {
                    YiiBase::import('ext.YiiMailer.YiiMailer');
                    $user->password = md5($new_password);
                    $user->save();
                    //function to send email
                    $mail = new YiiMailer();
                    $mail->clearLayout();//if layout is already set in config
                    $mail->setFrom('donotreply@jb.com', 'JualanBisnis.com');
                    $mail->setTo('reynhart@licht-soft.com'); //CHANGE TO APPROPRIATE EMAIL WHEN DEPLOYING
                    $mail->setSubject('Perubahan Password');
                    $mail->setBody('Berikut adalah password baru anda untuk login:<br />'.$new_password);
                    if ($mail->send()) {
//                        Yii::app()->user->setFlash('email','Email Berhasil Dikirim');
                        $this->redirect(Yii::app()->createUrl('//home'));
                    } else {
                        Yii::app()->user->setFlash('error','Error while sending email: '.$mail->getError());
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
}

?>