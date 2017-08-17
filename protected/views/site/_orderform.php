<section class="form multi-line_form">
<div class="container">
	<form action="#">
				<div class="titleform">
				<div class="h2">Форма заказа</div>
				<span>Напишите нам и с вами свяжется наш менеджер</span>
				</div>
		<div class="flex">
			<div class="flex">
				<div class="flex3">
					<div class="input-group">
						<input type="text" class="form-control" id="name" required placeholder=" " />
						<label for="name">Ваше имя <span class="required">*</span></label>
					</div>						
				</div>
				<div class="flex3">
					<div class="input-group">
						<input type="text" class="form-control" id="phone" 
									 pattern="\+7 \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}" 
									 title="Формат: +7 (XXX) XXX-XX-XX"  placeholder=" " />
						<label for="phone">Телефон <span class="required">*</span></label>
					</div>						
				</div>
				<div class="flex3">
					<div class="input-group">
						<input type="text" class="form-control" id="name" required placeholder=" " />
						<label for="name">Электронная почта <span class="required">*</span></label>
					</div>						
				</div>
			</div><!-- /flex -->
			<div class="flex flex-stretch">
				<div class="flex6">
					<textarea class="form-control" placeholder="Вопросы и дополнения"></textarea>
				</div>
			</div><!-- /flex -->
			<div class="col-sm-4">
							<button class="send-btn" name="ok">Отправить заявку</button>
			</div>
			<div class="col-sm-6">
			<div class="flex confidpol">
				<input type="checkbox" class="checkbox" id="politica" />
				<label for="politica">Согласен с политикой конфедециальности</label>						
			</div>
			</div>

		</div><!-- /multi-line_form -->

	</form>
	</div>
</section>