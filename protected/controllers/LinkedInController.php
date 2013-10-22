<?php

class LinkedInController extends Controller
{
//    public $layout = 'main';
    
    public function actionShare()
    {
        require_once Yii::app()->getBasePath().'/../library/SLinkedIn/simplelinkedin.class.php';
        
        if(!Yii::app()->user->hasState('LinkedInData'))
        {
            $linkedInData = array(
                'title'=>$_GET['title'],
                'description'=>$_GET['description'],
                'url' => $_GET['url'],
                'image'=>$_GET['image'],
            );
            
            Yii::app()->user->setState('LinkedInData',$linkedInData);
            
        }
//        $title = $_GET['title'];
//        $description = $_GET['description'];
//        if($description == '...')
//        {
//            $description = 'Tidak ada deskripsi';
//        }
//        $url = $_GET['url'];
//        $image = $_GET['image'];
        //Set up the API
        $ln = new SimpleLinkedIn('vu1fh3t02all', 'cxNP1GKEI3nlRtBS');
        $ln->addScope('rw_nus');
        //Authorize.
        if($ln->authorize()){
            
            //Make an example post, and print the result with print_r
            $ln->fetch('POST','/v1/people/~/shares',
                array(
                    'comment' => 'JualanBisnis.com, lihat business/franchise berikut:',
                    'content' => array(
                        'title' => $title,
                        'description' => $description,
                        'submittedUrl' => $url,
                        'submitted-image-url' =>$image,
                    ),
                    'visibility' => array('code' => 'anyone' )
                )
            );
            
            
        }
    }
}

?>