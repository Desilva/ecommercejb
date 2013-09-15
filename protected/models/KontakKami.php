<?php

class KontakKami extends CFormModel
{
        public $nama;
        public $perusahaan;
        public $email;
        public $phone;
        public $fax;
        public $subject;
        public $comment;
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, phone, subject, comment', 'required'),
                        array('phone','numerical','integerOnly'=>true),
                        array('email','email'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nama' => 'Nama',
			'perusahaan' => 'Perusahaan',
			'email' => 'Email',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'subject' => 'Subject',
			'comment' => 'Comment',
		);
	}


}