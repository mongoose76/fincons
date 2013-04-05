<?php
$this->breadcrumbs=array(
	'Trial Balance'=>array('admin'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('trial-balance-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Trial Balance</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'trial-balance-grid',
	'itemsCssClass' => 'table-bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'account_local_id',
		array(
           'class' => 'editable.EditableColumn',
           'name' => 'amount',
           'headerHtmlOptions' => array('style' => 'width: 100px'),
           'editable' => array(
                  'url'        => $this->createUrl('TrialBalance/update'),
                  'placement'  => 'right',
           ),
        ),
		'reporting_period_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>