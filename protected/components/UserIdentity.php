<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	public function authenticate()
	{
            
		$email = strtolower($this->username);
		
		$user=User::model()->find('LOWER(email)=?',array($email));
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(md5($this->password) != $user->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user->id;
			$this->username=$user->email;
			$this->errorCode=self::ERROR_NONE;
                        $this->setState('email', $user->email);
                        $this->setState('first_name', $user->first_name);
                        $this->setState('last_name', $user->last_name);
                        $this->setState('handphone', $user->handphone);
                        $this->setState('roles', $user->access_level);  
		}
			return $this->errorCode==self::ERROR_NONE;
	}

        
	public function getId()
	{
		return $this->_id;
	}
        
}