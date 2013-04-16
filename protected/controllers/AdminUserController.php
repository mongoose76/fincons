<?php

class AdminUserController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'AdminUser'),
		));
	}

	public function actionCreate() {
		$model = new AdminUser;


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


		if (isset($_POST['AdminUser'])) {
			$model->setAttributes($_POST['AdminUser']);
			$relatedData = array(
				'companies' => $_POST['AdminUser']['companies'] === '' ? null : $_POST['AdminUser']['companies'],
				);

			if ($model->saveWithRelated($relatedData)) {
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