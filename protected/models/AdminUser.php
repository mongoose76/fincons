<?php

Yii::import('application.models._base.BaseAdminUser');

class AdminUser extends BaseAdminUser
{
	private $salt = "_tzoncu_5649";
	public $password_unhashed = null;
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public static function label($n = 1) {
		return Yii::t('app', 'User|Users', $n);
	}
	
	public function validatePassword($password)
	{
		return $this->hashPassword($password)===$this->password;
	}

	public function hashPassword($password)
	{
		return md5($this->salt.$password);
	}

	public function beforeValidate()
	{
		if (parent::beforeValidate())
		{
			if (strlen($this->password_unhashed) > 0)
			{
				$this->password = $this->hashPassword($this->password_unhashed);
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	public function rules() {
	
		$rules = array(
					array('password_unhashed', 'length', 'min'=>4),
					array('password_unhashed', 'required', 'on'=>'create'),
		);

		return array_merge ($rules, parent::rules());
	}
	
	public function attributeLabels() {
		$attributeLabels = array(
			'password_unhashed' => Yii::t('app', 'Password'),
		);
		return array_merge ($attributeLabels, parent::attributeLabels());
	}
}