<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property integer $id_nationality
 * @property integer $id_job
 * @property string $password
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $address
 * @property string $phone
 * @property string $handphone
 * @property string $birth_place
 * @property string $date_of_birth
 * @property string $instansi
 * @property string $income
 * @property string $office_address
 * @property string $office_phone
 * @property string $religion
 * @property string $marital_status
 * @property integer $id_buyer_category
 * @property integer $id_buyer_location
 * @property integer $id_buyer_price
 * @property string $references
 * @property integer $newsletter_status
 * The followings are the available model relations:
 * @property Business[] $businesses
 * @property MBuyerCategory $idBuyerCategory
 * @property MCountry $idNationality
 * @property MJob $idJob
 * @property MCity $idBuyerLocation
 * @property MRangePrice $idBuyerPrice
 */
class UserUpdate extends CActiveRecord
{
    public $password_repeat;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_nationality, id_job, password, email, first_name, last_name, password_repeat', 'required'),
			array('id_nationality, id_job, id_buyer_category, id_buyer_location, id_buyer_price', 'numerical', 'integerOnly'=>true),
			array('password, address', 'length', 'max'=>255),
			array('email, first_name, last_name, instansi, office_address, office_phone', 'length', 'max'=>100),
                        array('email','email'),
                        array('email','unique'),
                        array('gender', 'length', 'max'=>1),
			array('phone, handphone, birth_place, income', 'length', 'max'=>20),
			array('date_of_birth', 'safe'),
                        array('password','compare','compareAttribute'=>'password_repeat'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_nationality, id_job, password, email, first_name, last_name, gender, address, phone, handphone, birth_place, date_of_birth, instansi, income, office_address, office_phone, religion, marital_status, id_buyer_category, id_buyer_location, id_buyer_price, references, newsletter_status', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    	'businesses' => array(self::HAS_MANY, 'Business', 'id_kepemilikan'),
			'idBuyerCategory' => array(self::BELONGS_TO, 'MBuyerCategory', 'id_buyer_category'),
			'idNationality' => array(self::BELONGS_TO, 'MCountry', 'id_nationality'),
			'idJob' => array(self::BELONGS_TO, 'MJob', 'id_job'),
			'idBuyerLocation' => array(self::BELONGS_TO, 'MCity', 'id_buyer_location'),
			'idBuyerPrice' => array(self::BELONGS_TO, 'MRangePrice', 'id_buyer_price'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_nationality' => 'Kewargenegaraan',
			'id_job' => 'Status Pekerjaan',
			'password' => 'Password',
			'email' => 'Email',
			'first_name' => 'Nama Depan',
			'last_name' => 'Nama Belakang',
			'gender' => 'Jenis Kelamin',
			'address' => 'Alamat',
			'phone' => 'Telepon Rumah',
			'handphone' => 'Handphone',
			'birth_place' => 'Tempat Lahir',
			'date_of_birth' => 'Tanggal Lahir',
			'instansi' => 'Instansi/Perusahaan',
                        'income' => 'Penghasilan/Tahun',
			'office_address' => 'Alamat Kantor',
			'office_phone' => 'Telepon Kantor',
			'religion' => 'Agama',
			'marital_status' => 'Status Perkawinan',
			'id_buyer_category' => 'Kategori',
			'id_buyer_location' => 'Lokasi',
			'id_buyer_price' => 'Range Harga',
                        'password_repeat' => 'Ulangi Password',
                        'captcha_code' => 'Masukkan karakter yang terlihat dibawah ini',
                        'agree_terms' => 'Ya,Saya sudah membaca dan setuju dengan jualanBisnis <a href="#">Terms and Service</a>',
                        'references' => 'References',
                        'newsletter_status' =>'Ya,Saya ingin menerima newsletter dari jualanbisnis.com yang berisi berita promosi dan penawaran'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_nationality',$this->id_nationality);
		$criteria->compare('id_job',$this->id_job);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('handphone',$this->handphone,true);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('instansi',$this->instansi,true);
		$criteria->compare('income',$this->income,true);
		$criteria->compare('office_address',$this->office_address,true);
		$criteria->compare('office_phone',$this->office_phone,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('marital_status',$this->marital_status,true);
		$criteria->compare('id_buyer_category',$this->id_buyer_category);
		$criteria->compare('id_buyer_location',$this->id_buyer_location);
		$criteria->compare('id_buyer_price',$this->id_buyer_price);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
//        public function beforeSave() 
//        { 
//            if ($this->isNewRecord)
//            $this->password=md5($this->password);
//            return true;
//        }
}