<?php
$this->breadcrumbs=array(
	'Reporting Periods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ReportingPeriod','url'=>array('index')),
	array('label'=>'Manage ReportingPeriod','url'=>array('admin')),
);
?>

<h1>Create ReportingPeriod</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>