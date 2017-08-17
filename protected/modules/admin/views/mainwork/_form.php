<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'mainwork-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<p class="help-block">Поля, отмеченные <span class="required">*</span>, обязательны к заполнению.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'title',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textAreaGroup($model,'descr', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->textFieldGroup($model,'url',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<hr/>
    <?php if ($model->img): ?>
    <div class="form-group">
		<a href="/uploads/mainworks/hor/<?php echo $model->img;?>" class="fancybox"><?php echo CHtml::image('/uploads/mainworks/hor/'.$model->img, "Изображение", array('style'=>'width:100px')); ?></a>
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
</div>

<?php $this->endWidget(); ?>
