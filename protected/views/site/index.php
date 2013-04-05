<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Select an item from the menu to move forward.</p>

Your current IP address is <?php echo Yii::app()->request->userHostAddress ?>