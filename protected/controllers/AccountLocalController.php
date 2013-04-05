<?php

class AccountLocalController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'AccountLocal'),
		));
	}

	public function actionCreate() {
		$model = new AccountLocal;


		if (isset($_POST['AccountLocal'])) {
			$model->setAttributes($_POST['AccountLocal']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate() {
		$es = new EditableSaver('AccountLocal');
    	$es->update();
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'AccountLocal')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('AccountLocal');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new AccountLocal('search');
		$model->unsetAttributes();

		if (isset($_GET['AccountLocal']))
			$model->setAttributes($_GET['AccountLocal']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionGetGroupAccountList()
	{
		echo CJSON::encode(CHtml::listData(AccountGroup::model()->findAll(), 'id', 'name'));
	}
}