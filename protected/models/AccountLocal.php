<?php

Yii::import('application.models._base.BaseAccountLocal');

class AccountLocal extends BaseAccountLocal
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public static function label($n = 1) {
		return Yii::t('app', 'Local Account|Local Accounts', $n);
	}
	
	public function rules() {
		
		$rules = array(
					array('name', 'unique')
				);
		
		return array_merge ($rules, parent::rules());
	}
}