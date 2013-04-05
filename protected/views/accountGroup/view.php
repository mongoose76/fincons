<?php
$this->breadcrumbs=array(
	'Account Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AccountGroup','url'=>array('index')),
	array('label'=>'Create AccountGroup','url'=>array('create')),
	array('label'=>'Update AccountGroup','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete AccountGroup','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccountGroup','url'=>array('admin')),
);
?>

<h1>View AccountGroup #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
