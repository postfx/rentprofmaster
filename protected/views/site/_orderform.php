<section class="form multi-line_form <?php echo $dlc;?>">
	<div class="container">
		<?php $form = $this->beginWidget('CActiveForm', array(
	        'enableAjaxValidation' => true,
	        'clientOptions' => array(
	           	'validateOnSubmit' => true,
	           	'afterValidate'=>'js:function(form, data, hasError){
					if (!hasError) {
						return true;
					}
				}',
			),
			'action' => Yii::app()->createUrl('site/form'),
			'id'=>'order-form',
		)); ?>
			<div class="titleform">
				<div class="h2">Форма заказа</div>
				<span>Напишите нам и с вами свяжется наш менеджер</span>
			</div>
			<div class="flex">
				<div class="flex">
					<div class="flex3">
						<div class="input-group">
							<?php echo $form->textField($this->form, 'name', array('placeholder' => ' ', 'class'=>'form-control')); ?>
							<label for="Form_name">Ваше имя <span class="required">*</span></label>
							<?php echo $form->error($this->form, 'name');?>
						</div>						
					</div>
					<div class="flex3">
						<div class="input-group">
							<?php echo $form->textField($this->form, 'phone', array('placeholder' => ' ', 'class'=>'form-control', 'title'=>'Формат: +XXXXXXXXXXX')); ?>
							<label for="Form_phone">Телефон <span class="required">*</span></label>
							<?php echo $form->error($this->form, 'phone');?>
						</div>						
					</div>
					<div class="flex3">
						<div class="input-group">
							<?php echo $form->textField($this->form, 'email', array('placeholder' => ' ', 'class'=>'form-control')); ?>
							<label for="Form_email">Электронная почта </label>
							<?php echo $form->error($this->form, 'email');?>
						</div>						
					</div>
				</div>
				<div class="flex flex-stretch">
					<div class="flex6">
						<?php echo $form->textArea($this->form, 'text', array('placeholder' => 'Вопросы и дополнения', 'class'=>'form-control')); ?>
					</div>
				</div>
				<div class="col-sm-5">
					<button class="send-btn" name="ok">Отправить заявку</button>
				</div>
				<div class="col-sm-7">
					<div class="flex confidpol">
						<?php echo $form->checkBox($this->form, 'agree', array('class'=>'checkbox')); ?>
						<label for="Form_agree">Согласен с политикой конфедециальности</label>
						<?php echo $form->error($this->form, 'agree');?>
					</div>
				</div>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</section>