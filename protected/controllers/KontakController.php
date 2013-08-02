<?php

class KontakController extends Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        $model = new KontakKami();
        if(isset($_POST['KontakKami']))
        {
            if($model->validate())
            {
                //send email to jualan bisnis
                
            }
        }
                
        $this->render('index',array('model'=>$model));
    }
}

?>