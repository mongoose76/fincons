<?php
$this->breadcrumbs=array(
	'Currencies'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Currency','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('currency-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Currencies</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'currency-grid',
	'itemsCssClass' => 'table-bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
           'class' => 'editable.EditableColumn',
           'name' => 'iso3',
           'headerHtmlOptions' => array('style' => 'width: 100px'),
           'editable' => array(
                  'url'        => $this->createUrl('Currency/update'),
                  'placement'  => 'right',
           ),
        ),
	),
)); ?>