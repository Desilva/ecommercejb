<?php

class RegistrasiController extends Controller
{
    public $layout = 'main';
    public function actions(){
        return array(
          // captcha action renders the CAPTCHA image displayed on the user registration page
          'captcha'=>array(
            'class'=>'CCaptchaAction',
            'backColor'=>0xFFFFFF,
            'testLimit'=> '3',
          ),
        );
    }
    public function actionIndex()
    {
        if(isset($_POST))
        {
//            var_dump($_POST["references"]);
//            die;
//            var_dump($_POST["references"]);
//            die;
        }
        $model=new User;
        $list_references1 = array(
            "Website"=>"Website",
            "Koran"=>"Koran",
            "Majalah"=>"Majalah",
            "Radio"=>"Radio",
        );
        $list_references2 = array(
            "Televisi"=>"Televisi",
            "Teman"=>"Teman",
            "Keluarga"=>"Keluarga",
            "Event"=>"Event"
        );
        $list_tempat_lahir = CHtml::listData(City::model()->findAll(), "city", "city");
        $list_tempat_lahir += array('Lainnya'=>'Lainnya');
        $list_penghasilan = array(
            "<2jt" => "<2jt",
            "<5jt" => "<5jt",
            "<10jt" => "<10jt",
            ">10jt" => ">10jt",
        );
        $list_agama = array(
            "Kristen" => "Kristen",
            "Katolik" => "Katolik",
            "Islam" => "Islam",
            "Hindu" => "Hindu",
            "Buddha" => "Buddha",
            "Lainnya" => "Lainnya",
        );
        $list_pekerjaan = Job::model()->findAll();
        $list_status_perkawinan = array(
            "Belum Menikah" => "Belum Menikah",
            "Sudah Menikah" => "Sudah Menikah",
            "Janda" => "Janda",
            "Duda" => "Duda"
        );
        $list_jenis_kelamin = array(
            "L" => "Laki-laki",
            "P" => "Perempuan"
        );
        $list_negara = Country::model()->findAll();
        $list_kategori_buyer = BuyerCategory::model()->findAll();
        $list_kota = City::model()->findAll();
        $list_range_harga = RangePrice::model()->findAll();
        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-index-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            if($model->validate())
            {
                $pass_temp = $model->password;
                $model->password = md5($pass_temp);
                $m_references = "";
                if(isset($_POST['references']))
                {
                    foreach($_POST['references'] as $value)
                    {
                        
                        $m_references .= $value.',';
                    }
                }
                if($references != "")
                {
                    $model->references = $references;
                }
                $model->save(false);
                $this->redirect(Yii::app()->createUrl('//Home'));
            }
        }
        $this->render('index',array(
            'model'=>$model,
            'agama'=>$list_agama,
            'pekerjaan'=>$list_pekerjaan,
            'jenis_kelamin'=>$list_jenis_kelamin,
            'status_perkawinan' => $list_status_perkawinan,
            'negara' => $list_negara,
            'kategori' => $list_kategori_buyer,
            'lokasi' => $list_kota,
            'range_harga' => $list_range_harga,
            'penghasilan' => $list_penghasilan,
            'tempat_lahir' => $list_tempat_lahir,
            'references1' => $list_references1,
            'references2' => $list_references2,
            ));
    }
}