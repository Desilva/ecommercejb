<?php

class UnsubscribeNewsletter extends CFormModel
{
        public $email;
        public $password;
        
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('password,email','checkUser')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nama' => 'Nama',
			'email' => 'Email',
		);
	}
        
        public function checkUser($attribute, $params)
        {
            $mail = $this->email;
            $pass = md5($this->password);
//            var_dump($mail);
//            var_dump($pass);
//            die;
            $userCheck = UserUpdate::model()->findByAttributes(array('email'=>$mail,'password'=>$pass));
            
            if($userCheck == '' || $userCheck == null)
            {
                $this->addError('password','Terdapat kesalahan pada email/password');
            }
            else
            {
                $userCheck->password_repeat = $userCheck->password;
                $userCheck->newsletter_status = 0;
                $userCheck->save();
            }
        }


}