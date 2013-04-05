<?php
$this->breadcrumbs=array(
	'Account Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccountGroup','url'=>array('index')),
	array('label'=>'Create AccountGroup','url'=>array('create')),
	array('label'=>'View AccountGroup','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage AccountGroup','url'=>array('admin')),
);
?>

<h1>Update AccountGroup <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>