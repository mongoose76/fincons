<?php
$this->breadcrumbs=array(
	'Account Groups',
);

$this->menu=array(
	array('label'=>'Create AccountGroup','url'=>array('create')),
	array('label'=>'Manage AccountGroup','url'=>array('admin')),
);
?>

<h1>Account Groups</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
