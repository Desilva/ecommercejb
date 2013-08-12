<?php

class ArticleController extends Controller
{
    public $layout = 'main';
    
    public function init()
    {
//        Yii::app()->getModule('jbAdmin');
//        $articleCategory = ArticleCategory::model()->findAll();
//        $this->beginClip('sidebar');
//            $this->renderPartial('_sidebar',array('articleCategory'=>$articleCategory));
//        $this->endClip();
    }
   
    public function actionIndex()
    {
        $selectedArticleCategory = "";
        $articleCategory = ArticleCategory::model()->findAll();
        if(isset($_GET['ArticleCategory']))
        {
            $selectedArticleCategory = $_GET['ArticleCategory'];
        }
        
        if($selectedArticleCategory =="")
        {
            $article= new CActiveDataProvider('Article',array(
                'sort'=>array(
                        'defaultOrder'=>'post_date DESC'),
                'pagination'=>array(
                    'pageSize'=>10,
                ),
                ));

            $this->render('index',array('model' => $article,'articleCategory'=>$articleCategory,'selectedArticleCategory'=>$selectedArticleCategory));
        }
        else 
        {
            $criteria = new CDbCriteria();
            $criteria->condition = "id_article_category = $selectedArticleCategory";
            $article = new CActiveDataProvider('article', array(
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => 'post_date DESC'),
                'pagination' => array(
                    'pageSize' => 10,
                ),
            ));

            $this->render('index', array('model' => $article,'articleCategory'=>$articleCategory,'selectedArticleCategory'=>$selectedArticleCategory));
        }
    }
    
    public function actionDetail($id)
    {
        $article = Article::model()->findByPk($id);
        $this->render('detail',array('model' => $article));
    }
}