<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php 
$is_administrator = Yii::app()->user->checkAccess(UserIdentity::ADMINISTRATOR);
$is_accountant = Yii::app()->user->checkAccess(UserIdentity::ACCOUNTANT);
?>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
            	array('label'=>'Trial Balance', 'url'=>array('/TrialBalance/admin'), 'visible'=>$is_accountant),
            	array('label'=>'Local Accounts', 'url'=>array('/AccountLocal/admin'), 'visible'=>$is_accountant),
            	array('label'=>'Group Accounts', 'url'=>array('/AccountGroup/admin'), 'visible'=>$is_administrator),
            	array('label'=>'Companies', 'url'=>array('/Company/admin'), 'visible'=>$is_administrator),
            	array('label'=>'Currencies', 'url'=>array('/Currency/admin'), 'visible'=>$is_administrator),
            	array('label'=>'Reporting Period', 'url'=>array('/ReportingPeriod/admin'), 'visible'=>$is_administrator),
            	array('label'=>'Admin Accounts', 'url'=>array('/AdminUser/admin'), 'visible'=>$is_administrator),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        ),
    ),
)); ?>

<div style="display: block; position: absolute; margin-left:auto; margin-right:0px; z-index: 10000">
<?php 
if (!Yii::app()->user->isGuest) {
	$company = new Company();
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
		'id'=>'company-selection-form',
		'enableAjaxValidation'=>false,
	));

	$user = AdminUser::model()->findByAttributes(array('username'=>Yii::app()->user->id));
	echo $form->dropDownList($company, 'id', GxHtml::listDataEx($user->companies));

	$this->endWidget();
}
?>
</div>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Paraschiv Doru.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
