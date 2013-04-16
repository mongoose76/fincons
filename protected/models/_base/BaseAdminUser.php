<?php

/**
 * This is the model base class for the table "admin_user".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "AdminUser".
 *
 * Columns in table "admin_user" available as properties of the model,
 * followed by relations of table "admin_user" available as properties of the model.
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $is_active
 *
 * @property Company[] $companies
 */
abstract class BaseAdminUser extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'admin_user';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'AdminUser|AdminUsers', $n);
	}

	public static function representingColumn() {
		return 'username';
	}

	public function rules() {
		return array(
			array('username, password, email', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('username, password, email', 'length', 'max'=>128),
			array('is_active', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, username, password, email, is_active', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'companies' => array(self::MANY_MANY, 'Company', 'admin_user_company(admin_user_id, company_id)'),
		);
	}

	public function pivotModels() {
		return array(
			'companies' => 'AdminUserCompany',
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'email' => Yii::t('app', 'Email'),
			'is_active' => Yii::t('app', 'Is Active'),
			'companies' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('is_active', $this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}