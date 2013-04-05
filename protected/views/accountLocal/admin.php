<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('account-local-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'account-local-grid',
    'itemsCssClass' => 'table-bordered',
    'dataProvider' => $model->search(),
	'filter'=>$model,
    'columns'=>array(
        array(
           'class' => 'editable.EditableColumn',
           'name' => 'ax_account',
           'headerHtmlOptions' => array('style' => 'width: 100px'),
           'editable' => array(
                  'url'        => $this->createUrl('AccountLocal/update'),
                  'placement'  => 'right',
           ),
        ),
		array(
           'class' => 'editable.EditableColumn',
           'name' => 'name',
           'headerHtmlOptions' => array('style' => 'width: 100px'),
           'editable' => array(
                  'url'        => $this->createUrl('AccountLocal/update'),
                  'placement'  => 'right',
           ),
        ),
		array(
		'class' => 'editable.EditableColumn',
		'name' => 'account_group_id',
		'headerHtmlOptions' => array('style' => 'width: 150px'),
		'editable' => array(
				'type'     => 'select',
				'url'      => $this->createUrl('AccountLocal/update'),
				'source'   => $this->createUrl('AccountGroup/getDropDownList'),
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
));
?>