<?php
$this->breadcrumbs=array(
	'Trial Balances'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrialBalance','url'=>array('index')),
	array('label'=>'Create TrialBalance','url'=>array('create')),
	array('label'=>'View TrialBalance','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TrialBalance','url'=>array('admin')),
);
?>

<h1>Update TrialBalance <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>