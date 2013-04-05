<?php
$this->breadcrumbs=array(
	'Account Groups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AccountGroup','url'=>array('index')),
	array('label'=>'Create AccountGroup','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('account-group-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

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

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'account-group-grid',
    'itemsCssClass' => 'table-bordered',
    'dataProvider' => $model->search(),
    'columns'=>array(
        array(
           'name' => 'id',
		   'headerHtmlOptions' => array('style' => 'width: 50px'),
        ),
        
        array(
           'class' => 'editable.EditableColumn',
           'name' => 'name',
           'headerHtmlOptions' => array('style' => 'width: 500px'),
           'editable' => array(
                  'url'        => $this->createUrl('AccountGroup/update'),
                  'placement'  => 'right',
              )
        ),   
    ),
)); 
?>