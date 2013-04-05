<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Company','url'=>array('index')),
	array('label'=>'Create Company','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('company-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Companies</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'company-grid',
	'itemsCssClass' => 'table-bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'id',
			'headerHtmlOptions' => array('style' => 'width: 50px'),
		),
		array(
           'class' => 'editable.EditableColumn',
           'name' => 'name',
           'headerHtmlOptions' => array('style' => 'width: 200px'),
           'editable' => array(
                  'url'        => $this->createUrl('Company/update'),
                  'placement'  => 'right',
           ),
        ),
		array(
		'class' => 'editable.EditableColumn',
		'name' => 'currency_iso3',
		'headerHtmlOptions' => array('style' => 'width: 150px'),
		'editable' => array(
				'type'     => 'select',
				'url'      => $this->createUrl('Company/update'),
				'source'   => $this->createUrl('Currency/getDropDownList'),
				'options'  => array(    //custom display
						'display' => 'js: function(value, sourceData) {
                          var selected = $.grep(sourceData, function(o){ return value == o.value; }),
                              colors = {1: "green", 2: "blue", 3: "red", 4: "gray"};
                          $(this).text(selected[0].text).css("color", colors[value]);
                      }'
				)
			)
		),
	),
)); ?>
