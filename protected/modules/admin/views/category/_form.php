<?php

	Yii::app()->clientScript->registerScript('ckeditor', "
		init_CKEditor('Category_anounce');
		init_CKEditor('Category_descr');
		init_CKEditor('Category_data1');
	");

?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'category-form',
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

	<?php echo $form->checkBoxGroup($model,'active',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'title',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textFieldGroup($model,'alias',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>256)))); ?>

	<?php echo $form->textAreaGroup($model,'anounce', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->textAreaGroup($model,'data1', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->textAreaGroup($model,'descr', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php

	if (!$model->isNewRecord)

	echo $form->dropDownListGroup(
			$model,
			'parent_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'data' => array('0'=>'Нет') + CHtml::listData(Category::model()->findAll('id <> '.$model->id),'id','title'),
					'htmlOptions' => array(),
				)
			)
		);

	else

	echo $form->dropDownListGroup(
			$model,
			'parent_id',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'data' => array('0'=>'Нет') + CHtml::listData(Category::model()->findAll(),'id','title'),
					'htmlOptions' => array(),
				)
			)
		);
		
	?>

	<?php
		echo $form->dropDownListGroup(
			$model,
			'calc_type',
			array(
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-5',
				),
				'widgetOptions' => array(
					'data' => array('1'=>'1', '2'=>'2', '3'=>'3'),
					'htmlOptions' => array(),
				)
			)
		);
	?>


	<hr/>
    <?php if ($model->img): ?>
    <div class="form-group">
		<a href="/uploads/categories/<?php echo $model->img;?>" class="fancybox"><?php echo CHtml::image('/uploads/categories/'.$model->img, "Изображение", array('style'=>'width:100px')); ?></a>
	</div>
	<?php endif; ?>

	<?php echo $form->fileFieldGroup($model, 'img',
		array(
			'wrapperHtmlOptions' => array(
				'class' => 'col-sm-5',
			),
		));
	?>



	<div class="form-group">
	<?php echo $form->labelEx($model, 'reviews'); ?>

	<?php $this->widget('booster.widgets.TbSelect2',array(
		'asDropDownList' => true,
		'model'=>$model,
		'attribute'=>'reviews',
		'options'  => array(
			'placeholder' => $model->getAttributeLabel('reviews'),
			'tokenSeparators' => array(',', ' '),
			'width'=>'100%',
			'allowClear'=>true,
		),

		'data'=> CHtml::listData(Review::model()->findAll(),'id','text'),
		'htmlOptions'=>array(
			'multiple'=>'multiple',
		),
	));
	?>
	</div>



	<div class="form-group">
	<?php echo $form->labelEx($model, 'faqs'); ?>

	<?php $this->widget('booster.widgets.TbSelect2',array(
		'asDropDownList' => true,
		'model'=>$model,
		'attribute'=>'faqs',
		'options'  => array(
			'placeholder' => $model->getAttributeLabel('faqs'),
			'tokenSeparators' => array(',', ' '),
			'width'=>'100%',
			'allowClear'=>true,
		),

		'data'=> CHtml::listData(Faq::model()->findAll(),'id','question'),
		'htmlOptions'=>array(
			'multiple'=>'multiple',
		),
	));
	?>
	</div>

	<hr/>




	<div class="form-group">
	<?php echo $form->labelEx($model, 'files'); ?>

	<?php $this->widget('booster.widgets.TbSelect2',array(
		'asDropDownList' => true,
		'model'=>$model,
		'attribute'=>'files',
		'options'  => array(
			'placeholder' => $model->getAttributeLabel('files'),
			'tokenSeparators' => array(',', ' '),
			'width'=>'100%',
			'allowClear'=>true,
		),

		'data'=> CHtml::listData(File::model()->findAll(),'id','title'),
		'htmlOptions'=>array(
			'multiple'=>'multiple',
		),
	));
	?>
	</div>

	<hr/>



	<div class="form-group">
		<?php echo $form->labelEx($model, 'images'); ?>
		<ul class="images-list">
			<?php foreach ($model->images as $img): ?>
				<li>
					<?= CHtml::link(CHtml::image($img->getUrlOriginal(), $img->path, array('width'=>100)), $img->getUrlOriginal(), array("class"=>"fancybox", "rel"=>"fancybox")); ?>
					<?= CHtml::link(CHtml::encode('Удалить'), array('image/delete', 'id' => $img->id), array('class' => 'js-delete-photo')); ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<label for="BlogItem_images">Добавить:</label>

		<?php $this->widget('CMultiFileUpload', array(
				'name' => 'images',
				'accept' => 'jpeg|jpg|gif|png',
				'duplicate' => 'Дублирующиеся фото',
				'denied' => 'Только изображения',
				'htmlOptions' => array('multiple' => 'multiple'),
			    'max'=>10,
			)); ?>
		<?php echo $form->error($model, 'images'); ?>
	</div>


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

