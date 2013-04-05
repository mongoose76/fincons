<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('account_group_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->accountGroup)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('ax_account')); ?>:
	<?php echo GxHtml::encode($data->ax_account); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::encode($data->name); ?>
	<br />

</div>