<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); ?>

<?php $this->endWidget(); ?>

<?php
$this->breadcrumbs=array(
	'Home'=>array('index'),
);
?>

<h3>Please use the menu on top of the page to move forward</h3>