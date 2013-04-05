<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Company','url'=>array('admin')),
	array('label'=>'Create Company','url'=>array('create')),
);
?>

<h1>View Company #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'currency_iso3',
	),
)); ?>
