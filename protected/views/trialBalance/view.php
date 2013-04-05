<?php
$this->breadcrumbs=array(
	'Trial Balances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TrialBalance','url'=>array('index')),
	array('label'=>'Create TrialBalance','url'=>array('create')),
	array('label'=>'Update TrialBalance','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete TrialBalance','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrialBalance','url'=>array('admin')),
);
?>

<h1>View TrialBalance #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'account_local_id',
		'amount',
		'reporting_period_id',
	),
)); ?>
