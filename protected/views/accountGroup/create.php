<?php
$this->breadcrumbs=array(
	'Account Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AccountGroup','url'=>array('admin')),
);
?>

<h1>Create AccountGroup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>