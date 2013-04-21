public function filters() {
	return array(
			'accessControl', 
			);
}

public function accessRules() {
	return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view', 'create','update', 'admin','delete','getDropDownList'),
				'users'=>array(UserIdentity::ACCOUNTANT, UserIdentity::ADMINISTRATOR),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
}
