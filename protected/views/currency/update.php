<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->iso3=>array('view','id'=>$model->iso3),
	'Update',
);

$this->menu=array(
	array('label'=>'List Currency','url'=>array('index')),
	array('label'=>'Create Currency','url'=>array('create')),
	array('label'=>'View Currency','url'=>array('view','id'=>$model->iso3)),
	array('label'=>'Manage Currency','url'=>array('admin')),
);
?>

<h1>Update Currency <?php echo $model->iso3; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>