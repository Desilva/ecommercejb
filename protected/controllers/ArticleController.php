<?php
$tes=date_default_timezone_Set('Asia/Krasnoyarsk');
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
        $selectedArticleCategoryPembaca = "";
        $articleCategory = ArticleCategory::model()->findAll();
        $articleCategoryPembaca = ArticleCategoryPembaca::model()->findAll();
        
        if(isset($_GET['kategori']) && $_GET['kategori'] != '')
        {
            $selectedArticleCategory = $_GET['kategori'];
        }
        
        if(isset($_GET['kategoriPembaca']) && $_GET['kategoriPembaca'] != '')
        {
            if(intval($_GET['kategoriPembaca']) == 0)
            {
                $temp = ArticleCategoryPembaca::model()->findByAttributes(array('category_pembaca'=> $_GET['kategoriPembaca']));
                $selectedArticleCategoryPembaca = $temp->id;
            }
            else
            {
                $selectedArticleCategoryPembaca = $_GET['kategoriPembaca'];
            }
            
        }
        
        if($selectedArticleCategory !="" && $selectedArticleCategoryPembaca != "")
        {
            $criteria = new CDbCriteria();
            $criteria->condition = "id_article_category_pembaca = '$selectedArticleCategoryPembaca'";
            $criteria->addCondition("id_article_category = $selectedArticleCategory"); 
        }
        else if($selectedArticleCategory != "" && $selectedArticleCategoryPembaca == "")
        {
            $criteria = new CDbCriteria();
            $criteria->condition = "id_article_category = $selectedArticleCategory";
        }
        else if($selectedArticleCategory == "" && $selectedArticleCategoryPembaca != "")
        {
            $criteria = new CDbCriteria();
            $criteria->condition = "id_article_category_pembaca = '$selectedArticleCategoryPembaca'";
        }
        else 
        {
            $criteria = new CDbCriteria();
        }
        
        $article = new CActiveDataProvider('Article', array(
                'criteria' => $criteria,
                'sort' => array(
                    'defaultOrder' => array('post_date'=>CSort::SORT_DESC)),
                'pagination' => array(
                    'pageSize' => 10,
                ),
            ));
        $this->render('index', array('model' => $article,'articleCategory'=>$articleCategory,'selectedArticleCategory'=>$selectedArticleCategory,'articleCategoryPembaca'=>$articleCategoryPembaca,'selectedArticleCategoryPembaca'=>$selectedArticleCategoryPembaca));
    }
    
    public function actionDetail($id)
    {
        $article = Article::model()->findByPk($id);
        $this->render('detail',array('model' => $article));
    }
}