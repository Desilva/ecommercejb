<?php

class LayananKamiController extends Controller
{
     public $layout = 'main';
    public function actionIndex()
    {
        $this->render('index');
    }
}

?>