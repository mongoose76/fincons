<?php
$this->breadcrumbs=array(
	'Trial Balances',
);

$this->menu=array(
	array('label'=>'Create TrialBalance','url'=>array('create')),
	array('label'=>'Manage TrialBalance','url'=>array('admin')),
);
?>

<h1>Trial Balances</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
