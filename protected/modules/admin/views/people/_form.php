<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'people-form',
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

	<?php echo $form->textFieldGroup($model,'name',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textFieldGroup($model,'prof',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textFieldGroup($model,'phone',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textFieldGroup($model,'skype',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<hr/>
    <?php if ($model->img): ?>
    <div class="form-group">
		<a href="/uploads/people/<?php echo $model->img;?>" class="fancybox"><?php echo CHtml::image('/uploads/people/'.$model->img, "Изображение", array('style'=>'width:70px')); ?></a>
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
