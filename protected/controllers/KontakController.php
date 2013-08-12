<?php

class KontakController extends Controller
{

    public $layout = 'main';

    public function actionIndex()
    {
        $model = new KontakKami();
        if(isset($_POST['KontakKami']))
        {
            $model->attributes = $_POST['KontakKami'];
            if($model->validate())
            {
                YiiBase::import('ext.YiiMailer.YiiMailer');
                //function to send email
                $mail = new YiiMailer();
                $mail->clearLayout(); //if layout is already set in config
                $mail->setFrom('kontak_kami@jb.com', 'Kontak Dari Pelanggan');
                if($model->email != null || $model->email != '')
                {
                    $mail->setReplyTo($model->email,$model->nama);
                }
                $mail->setTo('reynhart@licht-soft.com'); //CHANGE TO APPROPRIATE EMAIL WHEN DEPLOYING
                $mail->setSubject($model->subject);
                $mail->setBody("<p>Anda mendapatkan email dari pelanggan dengan detail sebagai berikut: </p><p>Nama: $model->nama</p><p>Perusahaan: $model->perusahaan</p><p>Email: $model->email </p><p>Phone: $model->phone </p><p>Fax: $model->fax</p><p>Comment: <br/>$model->comment</p>");
                if($mail->send())
                {
//                        Yii::app()->user->setFlash('email','Email Berhasil Dikirim');
                    $this->redirect(Yii::app()->createUrl('//home'));
                }
                else
                {
                    Yii::app()->user->setFlash('error', 'Error while sending email: ' . $mail->getError());
                }
            }
        }


        $this->render('index', array('model' => $model));
    }

}

?>