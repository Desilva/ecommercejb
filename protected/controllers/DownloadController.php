<?php

class DownloadController extends Controller
{
	public function actionIndex()
	{
            $filePath ='';
                if($_GET['docs'] == 1)
                {
                    $filePath = Yii::app()->getBasePath().'/../uploads/docs/'.$_GET['id'].'/'.$_GET['name'];
                }
//                var_dump($filePath);
//                die;
		$this->render('index',array('filePath'=>$filePath,'name'=>$_GET['name']));
	}

	// Uncomment the following methods and override them if needed
	
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array(
                                    'index'),
				'roles'=>array('member','admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
}