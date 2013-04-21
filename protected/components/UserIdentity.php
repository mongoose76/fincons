<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{   
    
	const ADMINISTRATOR = 'administrator';
	const ACCOUNTANT = 'accountant';

	public $role;
	
    private $_id;
    
    const ERROR_USER_DISABLED = 200;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$username=strtolower($this->username);
        $user=AdminUser::model()->find('LOWER(username)=?',array($username));
		
        if($user===null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } else if($user->is_active != 1) {
        	$this->errorCode=self::ERROR_USER_DISABLED;
        } else if(!$user->validatePassword($this->password)) {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id=$user->username;
            $this->setState('name', $user->username);
            //$this->setState('id_company', $user->id_company);
            
            foreach ( Yii::app()->authManager->getRoles($this->_id) as $role=>$obj) {
            	$this->role .= $role;
            }
            $this->setState('role', $this->role);
            
           	$this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode==self::ERROR_NONE;
	}
    
    public function getId()
    {
    	return $this->_id;
    }
}