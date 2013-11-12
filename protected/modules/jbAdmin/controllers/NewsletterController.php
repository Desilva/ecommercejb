<?php

class NewsletterController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/admin';

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
				'actions'=>array('create','update','index','view','delete','AjaxSendNewsletter'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        public function actionAjaxSendNewsletter()
        {
            $id_newsletter = $_GET['id'];
            $send = $this->sendNewsletter($id_newsletter);
            if($send == true)
            {
                echo "success";
            }
            else
            {
                var_dump($send);
            }
            
        }


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Newsletter;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Newsletter']))
		{
			$model->attributes=$_POST['Newsletter'];
                        
			if($model->save())
                        {
                            if(isset($_GET['action']) && strtolower($_GET['action']) == "kirim")
                            {
                                //kirim email
                                $this->sendNewsletter($model->id);
                            }
                            $this->redirect(Yii::app()->createUrl('//jbAdmin/newsletter'));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Newsletter']))
		{
			$model->attributes=$_POST['Newsletter'];
                        
			if($model->save())
                        {
                            if(isset($_GET['action']) && strtolower($_GET['action']) == "kirim")
                            {
                                //kirim email
                                $this->sendNewsletter($model->id);
                                
                            }
                            $this->redirect(Yii::app()->createUrl('//jbAdmin/newsletter'));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
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
                $criteria = new CDbCriteria();
//                $criteria->order = 't.tanggal desc';
                $model=new CActiveDataProvider('Newsletter',array(
                    'criteria'=> $criteria,
                    'pagination' => array(
                    'pageSize' => 10,
                ),
                    'sort'=>array(
                       'defaultOrder'=>
                       array('id'=>CSort::SORT_DESC)
                   ),
                ));
		$this->render('index',array(
                        'model'=>$model,
		));
                
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Newsletter the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Newsletter::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Newsletter $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='newsletter-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        protected function gridIsi($data, $row)
        {
            $model = Newsletter::model()->findByPk($data->id);
            return $this->renderPartial('_columnDeskripsi',array('model'=>$model),true);
        }
        
        private function sendNewsletter($id_newsletter)
        {
                $mailSetting = Settings::model()->findByAttributes(array("nama_settings"=>"settings_admin"));
                $user = User::model()->findAllByAttributes(array('newsletter_status'=>'1'));
                $newsletter = Newsletter::model()->findByPk($id_newsletter);
                $newsletterRecipients = array();
                foreach($user as $recipients)
                {
                    $newsletterRecipients[] = $recipients->email;
                }
                $linkUnsubscribe = Yii::app()->createAbsoluteUrl("//registrasi/unsubscribeNewsletter");
                $signature="<br/><br/><hr/><p>Anda menerima email ini dikarenakan anda telah berlangganan newsletter dari JualanBisnis.com.<a href='".$linkUnsubscribe."'>Klik disini</a> untuk berhenti berlangganan <p>";
                
                if(!empty($newsletterRecipients))
                {
                    YiiBase::import('ext.YiiMailer.YiiMailer');
                    //function to send email
                    $mail = new YiiMailer();
                    $mail->clearLayout(); //if layout is already set in config
                    $mail->setFrom($mailSetting->alamat_email, $mailSetting->nama_email);
                    $mail->setTo($newsletterRecipients); //CHANGE TO APPROPRIATE EMAIL WHEN DEPLOYING
                    $mail->setSubject($mailSetting->nama_email.': '.$newsletter->judul);
                    $mail->setBody($newsletter->isi.$signature);
                    if($mail->send())
                    {
                        return true;
                    }
                    else
                    {
                         return $mail->getError();
                         var_dump($mail->getError());
                    }
                }
                
        }
}
