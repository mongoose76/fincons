<?php
$this->breadcrumbs=array(
	'Reporting Periods'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReportingPeriod','url'=>array('index')),
	array('label'=>'Create ReportingPeriod','url'=>array('create')),
	array('label'=>'Update ReportingPeriod','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ReportingPeriod','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReportingPeriod','url'=>array('admin')),
);
?>

<h1>View ReportingPeriod #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'description',
	),
)); ?>
