<?php
$this->breadcrumbs=array(
	'Reporting Periods'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ReportingPeriod','url'=>array('index')),
	array('label'=>'Create ReportingPeriod','url'=>array('create')),
	array('label'=>'View ReportingPeriod','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ReportingPeriod','url'=>array('admin')),
);
?>

<h1>Update ReportingPeriod <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>