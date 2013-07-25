<?php

class CariBisnisFranchiseController extends Controller
{
    public $layout = 'main';
        public function init()
        {
            $list_provinsi = Provinsi::model()->findAll();
            $list_kategori = Industri::model()->findAll();
            $list_subkategori = SubIndustri::model()->findAll();
            $list_rangeharga = array(
                '1' => '<1 jt',
                '2' => '1jt - 10jt',
                '3' => '>10 jt'
            );
            $list_omzet = array(
                '1' => '<1 jt',
                '2' => '1jt - 10jt',
                '3' => '>10 jt'
            );
            $this->beginClip('sidebar');
                $this->renderPartial('_sidebar',array(
                    'provinsi'=>$list_provinsi,
                    'kategori'=>$list_kategori,
                    'subkategori'=>$list_subkategori,
                    'rangeharga'=>$list_rangeharga,
                    'omzet'=>$list_omzet));
            $this->endClip();
        }
	public function actionIndex()
	{
            $selectedSortValue = '5';
            if(isset($_POST['sort']))
            {
                $selectedSortValue = $_POST['sort'];
            }
            $sortType = array(
                '1' =>'Nama A-Z',
                '2' =>'Nama Z-A',
                '3' =>'Harga Termurah',
                '4' =>'Harga Tertinggi',
                '5' =>'Tanggal',
                '6' =>'Revenue',
                //'7' =>'Popular'
            );
            
            $criteria=new CDbCriteria();
            $criteria->addCondition('status_approval="diterima"');
            $criteria->with = 'idKota';
            
                $model = new CActiveDataProvider('Business',array(
                'criteria'=>$criteria,
                'sort'=>array(
                        'defaultOrder'=>'tanggal_approval DESC'),
                'pagination'=>array(
                    'pageSize'=>10,
                ),
                ));
            
//            $model = Business::model()->with('idKota')->findAll($criteria);
            $this->render('index',array('model'=>$model,'sortType'=>$sortType,'selectedSortValue'=>$selectedSortValue));
	}
        
        
        public function actionWatchlist($id)
        {
            $id = $_GET['id'];
            $return_location = "";
            $return_kategori = "";
            if(isset($_GET['return']) && isset($_GET['kategori']))
            {
                $return_location = $_GET['return'];
                $return_kategori = $_GET['kategori'];
            }
            $existing_watchlist = Watchlist::model()->findByAttributes(array('id_user'=>Yii::app()->user->id,'id_business'=>$id));
            if($existing_watchlist != '' || $existing_watchlist != null)
            {
                $existing_watchlist->delete();
                if($return_location != "" && $return_kategori != "")
                {
                    $this->redirect(Yii::app()->createUrl("cariBisnisFranchise/detail/$id?kategori=$return_kategori&return=$return_location"));
                }
                else
                {
                    $this->redirect(Yii::app()->createUrl("cariBisnisFranchise/detail/$id"));
                }
            }
            else
            {
                $watchlist = new Watchlist();
                $watchlist->id_user = Yii::app()->user->id;
                $watchlist->id_business = $id;
                $watchlist->save();
                if($return_location != "" && $return_kategori != "")
                {
                    $this->redirect(Yii::app()->createUrl("cariBisnisFranchise/detail/$id?kategori=$return_kategori&return=$return_location"));
                }
                else
                {
                    $this->redirect(Yii::app()->createUrl("cariBisnisFranchise/detail/$id"));
                }
            }
        }
        public function actionCari()
        {
            $selectedSortValue = '5';
            if(isset($_POST['sort']))
            {
                $selectedSortValue = $_POST['sort'];
            }
            $sortType = array(
                '1' =>'Nama A-Z',
                '2' =>'Nama Z-A',
                '3' =>'Harga Termurah',
                '4' =>'Harga Tertinggi',
                '5' =>'Tanggal',
                '6' =>'Revenue',
                //'7' =>'Popular'
            );
            $criteria=new CDbCriteria();
            $criteria->addCondition('status_approval="diterima"');
            //$criteria->order = 't.tanggal_approval desc';
            $criteria->with = 'idKota';
            
            if(isset($_GET['jenis']))
            {
                if($_GET['jenis'] != '')
                {
                    $jenis = $_GET['jenis'];
                    $criteria->addCondition('t.id_category='.$jenis);
                }
            }
            
            if(isset($_GET['provinsi']))
            {
                if($_GET['provinsi'] != '')
                {
                    $provinsi = $_GET['provinsi'];
                    $criteria->addCondition('t.id_provinsi='.$provinsi);
                }
            }
            
            if(isset($_GET['kota']))
            {
                if($_GET['kota'] != '')
                {
                    $kota = $_GET['kota'];
                    $criteria->addCondition('t.id_kota='.$kota);
                }
            }
            
            if(isset($_GET['kategori']))
            {
                if($_GET['kategori']!= '')
                {
                    $kategori = $_GET['kategori'];
                    $criteria->addCondition('t.id_industri='.$kategori);
                }
            }
            
            if(isset($_GET['keyword']))
            {
                if($_GET['keyword']!= '')
                {
                    $katakunci = $_GET['keyword'];
                    $criteria->addCondition('t.nama like :katakunci OR t.deskripsi like :katakunci ');
                    $criteria->params = array(':katakunci'=>"%$katakunci%");
    //                $criteria->addSearchCondition('nama',$katakunci);
    //                $criteria->addSearchCondition('deskripsi',$katakunci,true,'OR');
                }
            }
            
            if(isset($_GET['subkategori']))
            {
                if($_GET['subkategori']!= '')
                {
                    $subkategori = $_GET['subkategori'];
                    $criteria->addCondition('t.id_sub_industri='.$subkategori);
                }
            }
            
            if(isset($_GET['rangeharga']))
            {
                if($_GET['rangeharga'] != '')
                {
                    $rangeharga = $_GET['rangeharga'];
                    if($rangeharga == '1')
                    {
                         $criteria->addCondition('harga_max < 1000000');
                    }
                    else if($rangeharga == '2') 
                    {
                        $criteria->addCondition('harga_max >= 1000000');
                        $criteria->addCondition('harga_max <= 10000000');
                    }
                    else
                    {
                        $criteria->addCondition('harga_max >= 10000000');
                    }
                }
                
            }
            
            if(isset($_GET['omzet']))
            {
                if($_GET['omzet'] != '')
                {
                     $omzet = $_GET['omzet'];
                    if($omzet == '1')
                    {
                        $criteria->addCondition('penjualan < 1000000');
                    }
                    else if($omzet == '2') 
                    {
                        $criteria->addCondition('penjualan >= 1000000');
                        $criteria->addCondition('penjualan <= 10000000');
                    }
                    else
                    {
                        $criteria->addCondition('penjualan >= 10000000');
                    }
                }
               
            }
                $model = new CActiveDataProvider('Business',array(
                'criteria'=>$criteria,
                'sort'=>array(
                        'defaultOrder'=>'tanggal_approval DESC'),
                'pagination'=>array(
                    'pageSize'=>10,
                ),
                ));

//            $model = Business::model()->with('idKota')->findAllByAttributes($search,$criteria);
            $this->render('index',array('model'=>$model,'sortType'=>$sortType,'selectedSortValue'=>$selectedSortValue));
            
        }
        
        /*
         * Params: $returnId
         */
        public function actionDetail()
        {
            $id = $_GET['id'];
            $return_location = "";
            $return_kategori = "";
            if(isset($_GET['return']) && isset($_GET['kategori']))
            {
                $return_location = $_GET['return'];
                $return_kategori = $_GET['kategori'];
            }
            $model = Business::model()->with(array('idIndustri','idKota'))->findByPk($id);
            $jumlah_click = $model->jumlah_click;
            $jumlah_click += 1;
            $model->jumlah_click = $jumlah_click;
            $model->save();
            $criteria_bisnis_terkait = new CDbCriteria();
            $criteria_bisnis_terkait->addCondition("t.id != $model->id");
            $criteria_bisnis_terkait->addCondition("t.status_approval = 'diterima'");
            $criteria_bisnis_terkait->limit = 5;
            
            $watchlist_check = Watchlist::model()->findByAttributes(array('id_user'=>Yii::app()->user->id,'id_business'=>$id));
            if($watchlist_check != '' || $watchlist_check != null)
            {
                $watchlist_check = 1;
            }
            else
            {
                $watchlist_check=0;
            }
            $list_bisnis_terkait = Business::model()->findAllByAttributes(array('id_industri'=>$model->id_industri,'id_category'=>$model->id_category),$criteria_bisnis_terkait);
            if(strtolower($model->idCategory->category) == 'bisnis')
            {
                 $this->render('detail',array('model'=>$model,'bisnis_terkait'=>$list_bisnis_terkait,'watchlist'=>$watchlist_check,'return_location'=>$return_location,'return_kategori'=>$return_kategori));
            }
            else if(strtolower($model->idCategory->category) == 'franchise')
            {
                $this->render('detailFranchise',array('model'=>$model,'bisnis_terkait'=>$list_bisnis_terkait,'watchlist'=>$watchlist_check,'return_location'=>$return_location, 'return_kategori'=>$return_kategori));
            }
           
        }
        
        
        public function actionKontakBisnis($id)
        {
            $model = new Email();
            $business = Business::model()->findByPk($id);
            if($business->id_user == Yii::app()->user->id)
            {
                $this->redirect(Yii::app()->createUrl("//cariBisnisFranchise/detail/$id"));
            }
            $businessOwner = User::model()->findByPk($business->id_user);
            if(isset($_POST['Email']))
            {
                if($_POST['Email']['status'] == '1')
                {
                    //fungsi kirim email ke alamat email yg disediakan user
                }
                if($_POST['Email']['status'] == '0')
                {
                    //kirim ke alamat email asli admin???
                }
                $model->attributes = $_POST['Email'];
                if($model->save())
                {
                    $this->redirect(Yii::app()->createUrl("//cariBisnisFranchise/detail/$id"));
                }
                
            }
            $this->render('kontak',array('model'=>$model,'business'=>$business,'business_owner'=>$businessOwner));
        }

        public function actionGenerateSubIndustri()
        {
            $list_sub_industri = SubIndustri::model()->findAllByAttributes(array('id_industri' => $_POST['kategori']));
            $data = CHtml::listData($list_sub_industri, 'id', 'sub_industri');
            echo CHtml::tag('option', array('value' => ''), 'Pilih Sub Industri', true);
            foreach($data as $value => $sub_industri)
            {
                echo CHtml::tag('option', array('value' => $value), CHtml::encode($sub_industri), true);
            }
        }
        
        public function actionGenerateKota()
        {
            $list_kota = City::model()->findAllByAttributes(array('id_provinsi' => $_POST['provinsi']));
            $data = CHtml::listData($list_kota, 'id', 'city');
            echo CHtml::tag('option', array('value' => ''), 'Pilih Kota', true);
            foreach($data as $value => $kota)
            {
                echo CHtml::tag('option', array('value' => $value), CHtml::encode($kota), true);
            }
        }
        
/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','GenerateSubIndustri','GenerateKota','Cari'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('detail','kontakBisnis','watchlist'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                        'deniedCallback' => function() { Yii::app()->controller->redirect(array('/home/index')); }
		);
	}
}