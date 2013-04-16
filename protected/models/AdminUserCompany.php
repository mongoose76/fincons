<?php

Yii::import('application.models._base.BaseAdminUserCompany');

class AdminUserCompany extends BaseAdminUserCompany
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}