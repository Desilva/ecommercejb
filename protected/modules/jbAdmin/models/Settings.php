<?php

/**
 * This is the model class for table "settings".
 *
 * The followings are the available columns in table 'settings':
 * @property string $nama_settings
 * @property integer $durasi_slideshow
 * @property integer $jumlah_rekomendasi
 * @property integer $jumlah_terbaru
 * @property string $nilai_min_telpon_tampil
 * @property string $alamat_email
 * @property string $nama_email
 * @property string $incoming_mailbox
 * @property string $fb_app_id
 */
class Settings extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Settings the static model class
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
		return 'settings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('alamat_email, nama_email, incoming_mailbox, fb_app_id', 'required'),
			array('durasi_slideshow, jumlah_rekomendasi, jumlah_terbaru', 'numerical', 'integerOnly'=>true),
			array('nama_settings, alamat_email, nama_email', 'length', 'max'=>50),
			array('nilai_min_telpon_tampil', 'length', 'max'=>20),
			array('incoming_mailbox, fb_app_id', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nama_settings, durasi_slideshow, jumlah_rekomendasi, jumlah_terbaru, nilai_min_telpon_tampil, alamat_email, nama_email, incoming_mailbox, fb_app_id', 'safe', 'on'=>'search'),
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
			'nama_settings' => 'Nama Settings',
			'durasi_slideshow' => 'Durasi Slideshow',
			'jumlah_rekomendasi' => 'Jumlah Rekomendasi',
			'jumlah_terbaru' => 'Jumlah Terbaru',
			'nilai_min_telpon_tampil' => 'Nilai Min Telpon Tampil',
			'alamat_email' => 'Alamat Email',
			'nama_email' => 'Nama Email',
			'incoming_mailbox' => 'Incoming Mailbox',
			'fb_app_id' => 'Fb App',
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

		$criteria->compare('nama_settings',$this->nama_settings,true);
		$criteria->compare('durasi_slideshow',$this->durasi_slideshow);
		$criteria->compare('jumlah_rekomendasi',$this->jumlah_rekomendasi);
		$criteria->compare('jumlah_terbaru',$this->jumlah_terbaru);
		$criteria->compare('nilai_min_telpon_tampil',$this->nilai_min_telpon_tampil,true);
		$criteria->compare('alamat_email',$this->alamat_email,true);
		$criteria->compare('nama_email',$this->nama_email,true);
		$criteria->compare('incoming_mailbox',$this->incoming_mailbox,true);
		$criteria->compare('fb_app_id',$this->fb_app_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}