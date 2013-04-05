<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->iso3,
);

$this->menu=array(
	array('label'=>'List Currency','url'=>array('index')),
	array('label'=>'Create Currency','url'=>array('create')),
	array('label'=>'Update Currency','url'=>array('update','id'=>$model->iso3)),
	array('label'=>'Delete Currency','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->iso3),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Currency','url'=>array('admin')),
);
?>

<h1>View Currency #<?php echo $model->iso3; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'iso3',
	),
)); ?>
