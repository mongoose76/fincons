<?php
$this->breadcrumbs=array(
	'Trial Balances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrialBalance','url'=>array('index')),
	array('label'=>'Manage TrialBalance','url'=>array('admin')),
);
?>

<h1>Create TrialBalance</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>