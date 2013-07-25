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
        
        if($category =="")
        {
            $article= new CActiveDataProvider('article',array(
                'sort'=>array(
                        'defaultOrder'=>'post_date DESC'),
                'pagination'=>array(
                    'pageSize'=>10,
                ),
                ));

            $this->render('index',array('model' => $article));
        }
        else 
        {
            $criteria = new CDbCriteria();
            $criteria->condition = "id_article_category = $category";
            $article = new CActiveDataProvider('article', array(
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => 'post_date DESC'),
                'pagination' => array(
                    'pageSize' => 10,
                ),
            ));

            $this->render('index', array('model' => $article));
        }
    }
    
    public function actionDetail($id)
    {
        $article = Article::model()->findByPk($id);
        $this->render('detail',array('model' => $article));
    }
}