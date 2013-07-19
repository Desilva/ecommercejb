<?php

/**
 * This is the model class for table "email".
 *
 * The followings are the available columns in table 'email':
 * @property integer $id
 * @property integer $id_business
 * @property string $tanggal
 * @property string $alamat_email
 * @property string $no_telp
 * @property string $nama_pengirim
 * @property string $deskripsi
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Business $idBusiness
 */
class Email extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Email the static model class
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
		return 'email';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_business, tanggal, no_telp, nama_pengirim', 'required'),
			array('id_business', 'numerical', 'integerOnly'=>true),
			array('alamat_email, no_telp, nama_pengirim', 'length', 'max'=>100),
			array('deskripsi', 'length', 'max'=>500),
			array('status', 'length', 'max'=>50),
                        array('alamat_email','email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_business, tanggal, alamat_email, no_telp, nama_pengirim, deskripsi, status', 'safe', 'on'=>'search'),
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
			'idBusiness' => array(self::BELONGS_TO, 'Business', 'id_business'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_business' => 'Id Business',
			'tanggal' => 'Tanggal',
			'alamat_email' => 'Alamat Email',
			'no_telp' => 'No Telp',
			'nama_pengirim' => 'Nama Pengirim',
			'deskripsi' => 'Deskripsi',
			'status' => 'Status',
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
		$criteria->compare('id_business',$this->id_business);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('alamat_email',$this->alamat_email,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('nama_pengirim',$this->nama_pengirim,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}