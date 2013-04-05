<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'account-local-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'account_group_id'); ?>
		<?php echo $form->dropDownList($model, 'account_group_id', GxHtml::listDataEx(AccountGroup::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'account_group_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'ax_account'); ?>
		<?php echo $form->textField($model, 'ax_account'); ?>
		<?php echo $form->error($model,'ax_account'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 200)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->