<?php

/**
 * This is the model class for table "m_city".
 *
 * The followings are the available columns in table 'm_city':
 * @property integer $id
 * @property string $city
 * @property integer $id_provinsi
 *
 * The followings are the available model relations:
 * @property Business[] $businesses
 * @property MProvinsi $idProvinsi
 * @property User[] $users
 */
class City extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return City the static model class
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
		return 'm_city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city, id_provinsi', 'required'),
			array('id_provinsi', 'numerical', 'integerOnly'=>true),
			array('city', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, city, id_provinsi', 'safe', 'on'=>'search'),
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
			'businesses' => array(self::HAS_MANY, 'Business', 'id_kota'),
			'idProvinsi' => array(self::BELONGS_TO, 'MProvinsi', 'id_provinsi'),
			'users' => array(self::HAS_MANY, 'User', 'id_buyer_location'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'city' => 'City',
			'id_provinsi' => 'Id Provinsi',
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
		$criteria->compare('city',$this->city,true);
		$criteria->compare('id_provinsi',$this->id_provinsi);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}