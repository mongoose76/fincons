<?php
$this->breadcrumbs=array(
	'Account Groups'=>array('admin'),
	'Manage',
);

$this->menu=array(
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

<h2><?php echo GxHtml::encode($model->label(2)); ?></h2>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'account-group-grid',
    'itemsCssClass' => 'table-bordered',
    'dataProvider' => $model->search(),
	'filter'=>$model,
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