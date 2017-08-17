<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'mainfact-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Поля, отмеченные <span class="required">*</span>, обязательны к заполнению.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textAreaGroup($model,'text', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
</div>

<?php $this->endWidget(); ?>
