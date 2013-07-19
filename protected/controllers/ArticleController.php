<?php

class ArticleController extends Controller
{
    public $layout = 'main';
    
    public function init()
    {
//        Yii::app()->getModule('jbAdmin');
        $articleCategory = ArticleCategory::model()->findAll();
        $this->beginClip('sidebar');
            $this->renderPartial('_sidebar',array('articleCategory'=>$articleCategory));
        $this->endClip();
    }
   
    public function actionIndex($category="")
    {
        if(isset($_POST['ArticleCategory']['id']))
        {
            $category = $_POST['ArticleCategory']['id'];
        }
        
        $articleCategoryList = ArticleCategory::model()->FindAll();
        if($category =="")
        {
            $articleCategory = new ArticleCategory();
            $article = Article::model()->FindAll();
            $this->render('index',array('model' => $article,'model_category'=>$articleCategory,'category' => $articleCategoryList));
        }
        else 
        {
            $articleCategory = ArticleCategory::model()->findByPk($category);
            $article = Article::model()->findAllByAttributes(array('id_article_category'=>$category));
            $this->render('index',array('model' => $article,'model_category'=>$articleCategory,'category' => $articleCategoryList));
        }
    }
    
    public function actionDetail($id)
    {
        $article = Article::model()->findByPk($id);
        $this->render('detail',array('model' => $article));
    }
}