<?php

$type = $model->isNewRecord ? 1 : $model->type;

Yii::app()->clientScript->registerScript('ckeditor', "
init_CKEditor('data2');

function switchInputs(val)
{
	if (val == 1)
	{
		$('#data1').parent().hide();
		$('#data2').parent().show();
	}
	else
	{
		$('#data2').parent().hide();
		$('#data1').parent().show();
	}
}

$('input[name=\"StaticBlock[type]\"]').change(function(){
	var val = $(this).val();
	switchInputs(val);
});

switchInputs(".$type.");

");

?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'static-block-form',
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

<p class="help-block">Поля, помеченные <span class="required">*</span>, обязательны к заполнению.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'title',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textFieldGroup($model,'altname',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->radioButtonListGroup(
			$model,
			'type',
			array(
				'widgetOptions' => array(
					'data' => array(
						'Обычный текст',
						'WYSYWYG',
					),
				),
			)
		); ?>

	<?php echo $form->textAreaGroup($model,'data_stripped', array('widgetOptions'=>array('htmlOptions'=>array('id'=>'data1', 'rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->textAreaGroup($model,'data', array('widgetOptions'=>array('htmlOptions'=>array('id'=>'data2', 'rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

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
