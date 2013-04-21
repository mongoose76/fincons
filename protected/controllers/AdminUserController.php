<?php

class AdminUserController extends GxController {

public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view', 'create','update', 'admin','delete','getDropDownList'),
				'users'=>array('administrator'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
}

	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'AdminUser'),
		));
	}

	public function actionCreate() {
		$model = new AdminUser;

		$this->performAjaxValidation($model, 'admin-user-form');

		if (isset($_POST['AdminUser'])) {
			$model->setAttributes($_POST['AdminUser']);
			$relatedData = array(
				'companies' => $_POST['AdminUser']['companies'] === '' ? null : $_POST['AdminUser']['companies'],
				);

			if ($model->saveWithRelated($relatedData)) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'AdminUser');

		$this->performAjaxValidation($model, 'admin-user-form');

		if (isset($_POST['AdminUser'])) {
			$model->setAttributes($_POST['AdminUser']);
			$relatedData = array(
				'companies' => $_POST['AdminUser']['companies'] === '' ? null : $_POST['AdminUser']['companies'],
				);

			if ($model->saveWithRelated($relatedData)) {
				foreach (Yii::app()->authManager->getAuthItems(2, $model->username) as $authItem) {
	            	Yii::app()->authManager->revoke($authItem->name, $model->username);
	            }
				Yii::app()->authManager->assign($model->adminUserRole->role, $model->username);
				$this->redirect(array('view', 'id' => $model->id));
				
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'AdminUser')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('AdminUser');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new AdminUser('search');
		$model->unsetAttributes();

		if (isset($_GET['AdminUser']))
			$model->setAttributes($_GET['AdminUser']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}