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
        $criteria = new CDbCriteria();
        $criteria->limit = 5;
        $criteria->order = 'id desc';
        $artikelTerbaru = Article::model()->findAll($criteria);
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
        $list_rangeharga = RangePrice::model()->findAll();
        $list_slideshow = Slideshow::model()->findAll();
        
        $criteria_business_terbaru = new CDbCriteria();
        $criteria_business_terbaru->limit = 5;
        $criteria_business_terbaru->with = 'idCategory';
        $criteria_business_terbaru->order = 'tanggal_approval desc';
        $criteria_business_terbaru->addCondition("status_approval = 'diterima'");
        $criteria_business_terbaru->addCondition("idCategory.category = 'Bisnis'");
        $list_business_terbaru = Business::model()->findAll($criteria_business_terbaru);
        
        $criteria_franchise_terbaru = new CDbCriteria();
        $criteria_franchise_terbaru->limit = 5;
        $criteria_franchise_terbaru->with = 'idCategory';
        $criteria_franchise_terbaru->order = 'tanggal_approval desc';
        $criteria_franchise_terbaru->addCondition("status_approval = 'diterima'");
        $criteria_franchise_terbaru->addCondition("idCategory.category = 'Franchise'");
        $list_franchise_terbaru = Business::model()->findAll($criteria_franchise_terbaru);
        
        $criteria_business_rekomendasi = new CDbCriteria();
        $criteria_business_rekomendasi->with = 'idCategory';
        $criteria_business_rekomendasi->addCondition("status_approval = 'diterima'");
        $criteria_business_rekomendasi->addCondition("idCategory.category = 'Bisnis'");
        $criteria_business_rekomendasi->addCondition("status_rekomendasi = 1");
        $list_business_rekomendasi = Business::model()->findAll($criteria_business_rekomendasi);
        $list_array_business_rekomendasi = array();
        foreach($list_business_rekomendasi as $list)
        {
           array_push($list_array_business_rekomendasi,$list->attributes);
        }
        $shuffled_business_rekomendasi = $this->shuffle_assoc($list_array_business_rekomendasi);
        
        $criteria_franchise_rekomendasi = new CDbCriteria();
        $criteria_franchise_rekomendasi->with = 'idCategory';
        $criteria_franchise_rekomendasi->addCondition("status_approval = 'diterima'");
        $criteria_franchise_rekomendasi->addCondition("idCategory.category = 'Franchise'");
        $criteria_franchise_rekomendasi->addCondition("status_rekomendasi = 1");
        $list_franchise_rekomendasi = Business::model()->findAll($criteria_franchise_rekomendasi);
        $list_array_franchise_rekomendasi = array();
        foreach($list_franchise_rekomendasi as $list)
        {
           array_push($list_array_franchise_rekomendasi,$list->attributes);
        }
        $shuffled_franchise_rekomendasi = $this->shuffle_assoc($list_array_franchise_rekomendasi);
        
        $this->render('index',array(
            'slideshow'=>$list_slideshow,
            'kategori'=>$list_kategori,
            'kota'=>$list_kota,
            'rangeharga'=>$list_rangeharga,
            'provinsi'=>$list_provinsi,
            'business_terbaru'=>$list_business_terbaru,
            'franchise_terbaru'=>$list_franchise_terbaru,
            'business_rekomendasi'=>$shuffled_business_rekomendasi,
            'franchise_rekomendasi'=>$shuffled_franchise_rekomendasi));
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
    
    private function shuffle_assoc($list)
    {
        if(!is_array($list))
            return $list;

        $keys = array_keys($list);
        shuffle($keys);
        $random = array();
        foreach($keys as $key)
        {
            $random[] = $list[$key];
        }
        return $random;
    }

}