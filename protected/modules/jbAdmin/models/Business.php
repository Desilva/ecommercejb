<?php

/**
 * This is the model class for table "Business".
 *
 * The followings are the available columns in table 'Business':
 * @property integer $id
 * @property integer $id_category
 * @property integer $id_user
 * @property integer $id_industri
 * @property integer $id_sub_industri
 * @property integer $id_provinsi
 * @property integer $id_kota
 * @property string $nama
 * @property string $deskripsi
 * @property integer $kepemilikan
 * @property integer $tahun_didirikan
 * @property string $alamat
 * @property integer $jumlah_karyawan
 * @property integer $penjualan
 * @property integer $hpp
 * @property integer $laba_bersih_tahun
 * @property integer $total_aset
 * @property integer $marjin_laba_bersih
 * @property integer $laba_bersih_aset
 * @property integer $harga_penawaran_penjualan
 * @property integer $harga_penawaran_laba_bersih
 * @property integer $harga_penawaran_aset
 * @property integer $harga_min
 * @property integer $harga_max
 * @property string $alasan_jual_bisnis
 * @property string $franchise_alasan_kerjasama
 * @property string $franchise_persyaratan
 * @property string $franchise_menu
 * @property string $franchise_dukungan_franchisor
 * @property string $dokumen
 * @property string $image
 * @property string $status_approval
 * @property string $tanggal_approval
 * @property string $alasan_penolakan
 * @property integer $jumlah_click
 * @property integer $tampilkanKontak
 * @property integer $status_rekomendasi
 * 
 * The followings are the available model relations:
 * @property MBusinessCategory $idCategory
 * @property MIndustri $idIndustri
 * @property MSubIndustri $idSubIndustri
 * @property MProvinsi $idProvinsi
 * @property MCity $idKota
 * @property Email[] $emails
 */
class Business extends CActiveRecord
{
        public $alasan_jual_lainnya;
        public $dropDownAlasanJual;
        public $textAreaAlasanJual;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Business the static model class
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
		return 'business';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_category, id_user, id_industri, id_sub_industri, id_provinsi, id_kota, nama, kepemilikan, harga_min, harga_max', 'required'),
			array('id_category, id_user, id_industri, id_sub_industri, id_provinsi, id_kota, kepemilikan, tahun_didirikan, jumlah_karyawan, penjualan, hpp, laba_bersih_tahun, total_aset, marjin_laba_bersih, laba_bersih_aset, harga_penawaran_penjualan, harga_penawaran_laba_bersih, harga_penawaran_aset, harga_min, harga_max, jumlah_click', 'numerical', 'integerOnly'=>true),
			array('nama, deskripsi, alamat, alasan_jual_bisnis, franchise_alasan_kerjasama, franchise_persyaratan, franchise_menu, franchise_dukungan_franchisor, dokumen, image', 'length', 'max'=>500),
			array('status_approval', 'length', 'max'=>50),
                        array('harga_max','compare','compareAttribute'=>'harga_min','operator'=>'>'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_category, id_user, id_industri, id_sub_industri, id_provinsi, id_kota, nama, deskripsi, kepemilikan, tahun_didirikan, alamat, jumlah_karyawan, penjualan, hpp, laba_bersih_tahun, total_aset, marjin_laba_bersih, laba_bersih_aset, harga_penawaran_penjualan, harga_penawaran_laba_bersih, harga_penawaran_aset, harga_min, harga_max, alasan_jual_bisnis, franchise_alasan_kerjasama, franchise_persyaratan, franchise_menu, franchise_dukungan_franchisor, dokumen, image, status_approval, jumlah_click', 'safe', 'on'=>'search'),
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
			'idCategory' => array(self::BELONGS_TO, 'BusinessCategory', 'id_category'),
			'idIndustri' => array(self::BELONGS_TO, 'Industri', 'id_industri'),
			'idSubIndustri' => array(self::BELONGS_TO, 'SubIndustri', 'id_sub_industri'),
			'idProvinsi' => array(self::BELONGS_TO, 'Provinsi', 'id_provinsi'),
			'idKota' => array(self::BELONGS_TO, 'City', 'id_kota'),
			'emails' => array(self::HAS_MANY, 'Email', 'id_business'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_category' => 'Jenis',
			'id_user' => 'User',
			'id_industri' => 'Industri',
			'id_sub_industri' => 'Sub Industri',
			'id_provinsi' => 'Provinsi',
			'id_kota' => 'Kota',
			'nama' => 'Nama Bisnis',
			'deskripsi' => 'Deskripsi',
			'kepemilikan' => 'Kepemilikan',
			'tahun_didirikan' => 'Tahun Didirikan',
			'alamat' => 'Alamat',
			'jumlah_karyawan' => 'Jumlah Karyawan',
			'penjualan' => 'Penjualan/Omzet',
			'hpp' => 'HPP/tahun',
			'laba_bersih_tahun' => 'Laba Bersih/tahun',
			'total_aset' => 'Total Aset',
			'marjin_laba_bersih' => 'Marjin Laba Bersih',
			'laba_bersih_aset' => 'Laba Bersih/Aset',
			'harga_penawaran_penjualan' => 'Harga Penawaran/Penjualan',
			'harga_penawaran_laba_bersih' => 'Harga Penawaran/Laba Bersih',
			'harga_penawaran_aset' => 'Harga Penawaran/Aset',
			'harga_min' => 'Harga Min',
			'harga_max' => 'Harga Max',
			'alasan_jual_bisnis' => 'Alasan Jual Bisnis',
			'franchise_alasan_kerjasama' => 'Alasan Kerjasama',
			'franchise_persyaratan' => 'Persyaratan',
			'franchise_menu' => 'Menu',
			'franchise_dukungan_franchisor' => 'Dukungan Franchisor',
			'dokumen' => 'Dokumen',
			'image' => 'Image',
			'status_approval' => 'Status Approval',
                        'tanggal_approval' => 'Tanggal Approval',
                        'alasan_penolakan' => 'Alasan Penolakan',
			'jumlah_click' => 'Jumlah Click',
                        'alasan_jual_lainnya'=> 'Lainnya',
                        'tampilkanKontak'=>'Kontak Ditampilkan',
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
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('id_industri',$this->id_industri);
		$criteria->compare('id_sub_industri',$this->id_sub_industri);
		$criteria->compare('id_provinsi',$this->id_provinsi);
		$criteria->compare('id_kota',$this->id_kota);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('kepemilikan',$this->kepemilikan);
		$criteria->compare('tahun_didirikan',$this->tahun_didirikan);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('jumlah_karyawan',$this->jumlah_karyawan);
		$criteria->compare('penjualan',$this->penjualan);
		$criteria->compare('hpp',$this->hpp);
		$criteria->compare('laba_bersih_tahun',$this->laba_bersih_tahun);
		$criteria->compare('total_aset',$this->total_aset);
		$criteria->compare('marjin_laba_bersih',$this->marjin_laba_bersih);
		$criteria->compare('laba_bersih_aset',$this->laba_bersih_aset);
		$criteria->compare('harga_penawaran_penjualan',$this->harga_penawaran_penjualan);
		$criteria->compare('harga_penawaran_laba_bersih',$this->harga_penawaran_laba_bersih);
		$criteria->compare('harga_penawaran_aset',$this->harga_penawaran_aset);
		$criteria->compare('harga_min',$this->harga_min);
		$criteria->compare('harga_max',$this->harga_max);
		$criteria->compare('alasan_jual_bisnis',$this->alasan_jual_bisnis,true);
		$criteria->compare('franchise_alasan_kerjasama',$this->franchise_alasan_kerjasama,true);
		$criteria->compare('franchise_persyaratan',$this->franchise_persyaratan,true);
		$criteria->compare('franchise_menu',$this->franchise_menu,true);
		$criteria->compare('franchise_dukungan_franchisor',$this->franchise_dukungan_franchisor,true);
		$criteria->compare('dokumen',$this->dokumen,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status_approval',$this->status_approval,true);
		$criteria->compare('jumlah_click',$this->jumlah_click);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}