<?php

Yii::import('application.models._base.BaseAdminUserRole');

class AdminUserRole extends BaseAdminUserRole
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}