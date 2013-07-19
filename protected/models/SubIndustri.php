<?php

/**
 * This is the model class for table "m_sub_industri".
 *
 * The followings are the available columns in table 'm_sub_industri':
 * @property integer $id
 * @property integer $id_industri
 * @property string $sub_industri
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property Business[] $businesses
 * @property MIndustri $idIndustri
 */
class SubIndustri extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SubIndustri the static model class
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
		return 'm_sub_industri';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_industri, sub_industri', 'required'),
			array('id_industri', 'numerical', 'integerOnly'=>true),
			array('sub_industri', 'length', 'max'=>100),
			array('keterangan', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_industri, sub_industri, keterangan', 'safe', 'on'=>'search'),
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
			'businesses' => array(self::HAS_MANY, 'Business', 'id_sub_industri'),
			'idIndustri' => array(self::BELONGS_TO, 'MIndustri', 'id_industri'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_industri' => 'Id Industri',
			'sub_industri' => 'Sub Industri',
			'keterangan' => 'Keterangan',
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
		$criteria->compare('id_industri',$this->id_industri);
		$criteria->compare('sub_industri',$this->sub_industri,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}