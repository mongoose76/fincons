<?php

Yii::import('application.models._base.BaseCurrency');

class Currency extends BaseCurrency
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}