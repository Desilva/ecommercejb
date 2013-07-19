<?php

class HomeController extends Controller
{

    public $layout = 'main';

    /**
     * Declares class-based actions.
     */
    public function init()
    {
//        Yii::app()->getModule('jbAdmin');
        $artikelTerbaru = Article::model()->find(array('order' => 'id desc'));
        $this->beginClip('sidebar');
            $this->renderPartial('_sidebar',array('artikelTerbaru'=>$artikelTerbaru));
        $this->endClip();
    }

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $list_provinsi = Provinsi::model()->findAll();
        $list_kategori = Industri::model()->findAll();
        $list_kota = City::model()->findAll();
        $list_rangeharga = array(
                '1' => '<1 jt',
                '2' => '1jt - 10jt',
                '3' => '>10 jt'
            );
        $list_slideshow = Slideshow::model()->findAll();
        $this->render('index',array(
            'slideshow'=>$list_slideshow,
            'kategori'=>$list_kategori,
            'kota'=>$list_kota,
            'rangeharga'=>$list_rangeharga,
            'provinsi'=>$list_provinsi));
    }
    
    public function actionSlideshowDetail($id)
    {
        $slideshow = Slideshow::model()->findByPk($id);
        $this->render('slideshow_detail',array('model' => $slideshow));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
//		// display the login form
//		$this->render('index',array('model'=>$model));
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