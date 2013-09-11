<?php

/**
 * This is the model class for table "status_login".
 *
 * The followings are the available columns in table 'status_login':
 * @property integer $id
 * @property string $email
 * @property integer $jumlah_percobaan
 * @property string $waktu_gagal_login_terakhir
 * @property string $waktu_sukses_login_terakhir
 */
class StatusLogin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StatusLogin the static model class
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
		return 'status_login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),
			array('jumlah_percobaan', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>100),
			array('waktu_gagal_login_terakhir, waktu_sukses_login_terakhir', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, jumlah_percobaan, waktu_gagal_login_terakhir, waktu_sukses_login_terakhir', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'jumlah_percobaan' => 'Jumlah Percobaan',
			'waktu_gagal_login_terakhir' => 'Waktu Gagal Login Terakhir',
			'waktu_sukses_login_terakhir' => 'Waktu Sukses Login Terakhir',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('jumlah_percobaan',$this->jumlah_percobaan);
		$criteria->compare('waktu_gagal_login_terakhir',$this->waktu_gagal_login_terakhir,true);
		$criteria->compare('waktu_sukses_login_terakhir',$this->waktu_sukses_login_terakhir,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}