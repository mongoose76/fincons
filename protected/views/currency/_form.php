<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'currency-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'iso3'); ?>
		<?php echo $form->textField($model, 'iso3', array('maxlength' => 3)); ?>
		<?php echo $form->error($model,'iso3'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('companies')); ?></label>
		<?php echo $form->checkBoxList($model, 'companies', GxHtml::encodeEx(GxHtml::listDataEx(Company::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->