<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'address-form',
	'enableAjaxValidation'=>false,
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

	<?php echo $form->textFieldGroup($model,'type',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textFieldGroup($model,'city',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textFieldGroup($model,'phone',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textFieldGroup($model,'addr',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

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
