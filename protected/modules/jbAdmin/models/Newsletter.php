<?php

/**
 * This is the model class for table "newsletter".
 *
 * The followings are the available columns in table 'newsletter':
 * @property integer $id
 * @property string $judul
 * @property string $deskripsi
 * @property string $isi
 * @property string $tanggal
 * @property integer $id_pembuat
 *
 * The followings are the available model relations:
 * @property User $idPembuat
 */
class Newsletter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Newsletter the static model class
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
		return 'newsletter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('judul, isi, tanggal, id_pembuat', 'required'),
			array('id_pembuat', 'numerical', 'integerOnly'=>true),
			array('judul', 'length', 'max'=>500),
			array('deskripsi', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, judul, deskripsi, isi, tanggal, id_pembuat', 'safe', 'on'=>'search'),
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
			'idPembuat' => array(self::BELONGS_TO, 'User', 'id_pembuat'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'judul' => 'Judul',
			'deskripsi' => 'Deskripsi',
			'isi' => 'Isi',
			'tanggal' => 'Tanggal',
			'id_pembuat' => 'Id Pembuat',
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
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('isi',$this->isi,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('id_pembuat',$this->id_pembuat);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}