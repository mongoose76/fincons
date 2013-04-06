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

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'trial-balance-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Select reporting period</p>

	<?php echo $form->dropDownList($model, 'reporting_period_id', GxHtml::listDataEx(ReportingPeriod::model()->findAllAttributes(null, true))); ?>

	<div class="help-block">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Select',
		)); ?>
	</div>

<?php $this->endWidget(); ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'trial-balance-grid',
	'itemsCssClass' => 'table-bordered',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'ax_account',
			'headerHtmlOptions' => array('style' => 'width: 100px'),
		),
		'name',
		array(
           'class' => 'editable.EditableColumn',
           'name' => 'trialBalances.amount',
           'headerHtmlOptions' => array('style' => 'width: 100px'),
           'editable' => array(
                  'url'        => $this->createUrl('TrialBalance/update'),
                  'placement'  => 'right',
           ),
        ),
		'trialBalances.reporting_period_id'
	),
)); ?>