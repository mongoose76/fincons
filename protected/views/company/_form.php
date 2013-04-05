<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
	<?php echo $form->errorSummary($model); ?>
	</div><!-- row -->

	<div class="row">
	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>500)); ?>
	</div><!-- row -->

	<div class="row">
	<?php echo $form->labelEx($model,'currency_iso3'); ?>
	<?php echo $form->dropDownList($model, 'currency_iso3', GxHtml::listDataEx(Currency::model()->findAllAttributes(null, true))); ?>
	<?php echo $form->error($model,'currency_iso3'); ?>
	</div><!-- row -->

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
