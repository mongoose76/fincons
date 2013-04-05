<?php

/**
 * This is the model base class for the table "currency".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Currency".
 *
 * Columns in table "currency" available as properties of the model,
 * followed by relations of table "currency" available as properties of the model.
 *
 * @property string $iso3
 *
 * @property Company[] $companies
 */
abstract class BaseCurrency extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'currency';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Currency|Currencies', $n);
	}

	public static function representingColumn() {
		return 'iso3';
	}

	public function rules() {
		return array(
			array('iso3', 'required'),
			array('iso3', 'length', 'max'=>3),
			array('iso3', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'companies' => array(self::HAS_MANY, 'Company', 'currency_iso3'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'iso3' => Yii::t('app', 'Iso3'),
			'companies' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('iso3', $this->iso3, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}