<?php

Yii::import('application.models._base.BaseAccountGroup');

class AccountGroup extends BaseAccountGroup
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public static function label($n = 1) {
		return Yii::t('app', 'Group Account|Group Accounts', $n);
	}
	
	public function rules() {
	
		$rules = array(
				array('name', 'unique')
		);
	
		return array_merge ($rules, parent::rules());
	}
}