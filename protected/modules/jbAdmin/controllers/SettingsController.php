<?php

class SettingsController extends Controller
{

    public $layout = '//layouts/admin';
    
    public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', 
				'actions'=>array(
                                    'index'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
    public function actionIndex()
    {
        $settings = Settings::model()->findByAttributes(array('nama_settings'=>'settings_admin'));
        $url_link_list = array(
            null => 'Tidak ada/Default',
            Yii::app()->createUrl('//faq')=> 'FAQ' ,
            Yii::app()->createUrl('//kontak')=>'Kontak',
            'custom' => 'Input Link',
        );
        for($i = 1; $i <= 5; $i++)
        {
            ${'slideshow_data' . $i} = Slideshow::model()->findByPk($i);
            if(${'slideshow_data' . $i} == "" || ${'slideshow_data' . $i} == null)
            {
                ${'slideshow_data' . $i} = new Slideshow();
            }
            ${'slideshow_data' . $i}->url_custom_link = ${'slideshow_data' . $i}->url_link;
            if(array_key_exists(${'slideshow_data' . $i}->url_link, $url_link_list) === FALSE)
            {
                ${'slideshow_data' . $i}->url_link = 'custom';
            }
        }
        if(isset($_POST["Slideshow"]))
        {
            
            $slideshow_form_data = $_POST["Slideshow"];
            $i = 1;
            foreach($slideshow_form_data as $key => $value)
            {
                if(${'slideshow_data' . $i} != "" && ${'slideshow_data' . $i} != null)
                {
//                    var_dump($value);
                    ${'slideshow_data' . $i}->title = $value["title"];
                    ${'slideshow_data' . $i}->deskripsi = $value["deskripsi"];
                    ${'slideshow_data' . $i}->url_link = $value["url_link"];
                    if(isset($value["url_custom_link"]))
                    {
                        ${'slideshow_data' . $i}->url_link = $value["url_custom_link"];
                    }
//                    var_dump(${'slideshow_data' . $i}->url_link);
                    
                    if(CUploadedFile::getInstance(${'slideshow_data' . $i}, "[$i]image") != null)
                    {
                        $imageSave = CUploadedFile::getInstance(${'slideshow_data' . $i}, "[$i]image");
                        ${'slideshow_data' . $i}->image_validator = $imageSave;
                        if( ${'slideshow_data' . $i}->validate())
                        {
                            ${'slideshow_data' . $i}->image_validator = "";
                            ${'slideshow_data' . $i}->image = "$i.$imageSave->extensionName";
                            ${'slideshow_data' . $i}->save();
                            $imageSave->saveAs(Yii::app()->basePath . "/../uploads/slideshow/$i.$imageSave->extensionName");
                        }
                    }
                    else
                    {
                         ${'slideshow_data' . $i}->save();
                    }
                    $i++;
                }
            }
        }
        if(isset($_POST["Settings"]))
        {
            $settings->attributes = $_POST["Settings"];
            if($settings->validate())
            {
                $settings->save();
            }
        }
        $this->render('index', array('slideshow1' => $slideshow_data1,
            'slideshow2' => $slideshow_data2,
            'slideshow3' => $slideshow_data3,
            'slideshow4' => $slideshow_data4,
            'slideshow5' => $slideshow_data5,
            'settings'=> $settings,
            'url_link_list'=>$url_link_list,
            'menu'=>4
        ));
    }

//    public function actionSaveSettings()
//    {
//        $errorList = array();
//        $slideshow_data = $_POST["Slideshow"];
//        var_dump($slideshow_data);
//        die;
//        $i = 1;
//        foreach($slideshow_data as $key => $value)
//        {
//            $slideshow = Slideshow::model()->findByPk($i);
//            if($slideshow != "" || $slideshow != null)
//            {
//                $save = SettingsController::actionSaveSlideshowData($slideshow, $value, $i);
//                if($save != "")
//                {
//                    array_push($errorList,$save);
//                }
//                $i++;
//            }
//            else
//            {
//                $slideshow = new Slideshow();
//                SettingsController::actionSaveSlideshowData($slideshow, $value, $i);
//                $i++;
//            }
//        }
//        $this->redirect(array('index','errorList' => $errorList));
//    }

//    private static function actionSaveSlideshowData($slideshow, $value, $i)
//    {
//        $error = "";
//        $slideshow->title = $value["title"];
//        $slideshow->deskripsi = $value["deskripsi"];
//        if(CUploadedFile::getInstance($slideshow, "[$i]image") != null)
//        {
//            $imageSave = CUploadedFile::getInstance($slideshow, "[$i]image");
//            $slideshow->image_validator = $imageSave;
//            if($slideshow->validate())
//            {
//                $slideshow->image_validator = "";
//                $slideshow->image = "$i.$imageSave->extensionName";
//                $imageSave->saveAs(Yii::app()->basePath . "/../uploads/slideshow/$i.$imageSave->extensionName");
//            }
//            else
//            {
//                $error = $slideshow->errors["image_validator"][0];
//            }
//        }
//        $slideshow->save();
//        return $error;
//    }

}

?>