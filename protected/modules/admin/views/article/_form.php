<?php

	Yii::app()->clientScript->registerScript('ckeditor', "
		init_CKEditor('Article_body');
	");

?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<br/>
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>

	<?php if (!$model->isNewRecord): ?>
	<button class="btn btn-primary" type="submit" name="yt2">Обновить</button>
	<?php endif; ?>
</div>
<br/>

<p class="help-block">Поля, отмеченные <span class="required">*</span>, обязательны к заполнению.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'title',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textAreaGroup($model,'anounce', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->textAreaGroup($model,'body', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>


	<hr/>
    <?php if ($model->img): ?>
    <div class="form-group">
		<a href="/uploads/articles/<?php echo $model->img;?>" class="fancybox"><?php echo CHtml::image('/uploads/articles/'.$model->img, "Изображение", array('style'=>'width:100px')); ?></a>
	</div>
	<?php endif; ?>

	<?php echo $form->fileFieldGroup($model, 'img',
		array(
			'wrapperHtmlOptions' => array(
				'class' => 'col-sm-5',
			),
		));
	?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>

	<?php if (!$model->isNewRecord): ?>
	<button class="btn btn-primary" type="submit" name="yt2">Обновить</button>
	<?php endif; ?>
</div>

<?php $this->endWidget(); ?>
