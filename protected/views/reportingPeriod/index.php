<?php
$this->breadcrumbs=array(
	'Reporting Periods',
);

$this->menu=array(
	array('label'=>'Create ReportingPeriod','url'=>array('create')),
	array('label'=>'Manage ReportingPeriod','url'=>array('admin')),
);
?>

<h1>Reporting Periods</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
