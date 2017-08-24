<section class="calc">
	<div class="container">
		<div class="calc__left">
			<div class="calc__title">
				<img src="/img/calc-ico.png" alt="calc">
				<span>Калькулятор аренды <br>и доставки</span>
			</div>
			<div class="calc__range">
				<b class="sm">Высота, м</b>
				<div class="wrap-range">
					<input type="text" class="range">
				</div>
			</div>
			<div class="calc__range">
				<b class="sm">Длина, м</b>
				<div class="wrap-range">
					<input type="text" class="range">
				</div>
			</div>

			<div class="calc__range">
				<b class="sm wdt">Кол-во лестничных подьемов</b>
				<div class="wrap-smlinp">
					<input type="text" class="smlinp" placeholder="0"> 
				</div>
			</div>

		<div class="calc__range">
				<b class="sm wdt">Кол-во ярусов с настилами</b>
				<div class="wrap-smlinp">
					<input type="text" class="smlinp"  placeholder="0">
				</div>
			</div>


			<div class="calc__line">
				<div class="calc__radio">
					<input type="radio" id="r1" class="radio" name="zalog" value="1"><label for="r1">С залогом</label>
				</div>
				<div class="calc__radio">
					<input type="radio" id="r2" class="radio" checked="" name="zalog" value="0"><label for="r2">Без залога</label>
				</div>
			</div>
			<div class="calc__line">
				<div class="calc__radio">
					<input type="radio" id="r3" class="radio" checked="" name="delivery" value="1"><label for="r3">С доставкой</label>
				</div>
				<div class="calc__radio">
					<input type="radio" id="r4" class="radio" name="delivery" value="0"><label for="r4">Без доставки</label>
				</div>
			</div>
			<ul class="tabs-list"> 
				<li class="tabs-list__item tabs-list__item_active"><button type="button" data-content="content1">Все новости</button></li> 
				<li class="tabs-list__item"><button type="button" data-content="content2">Новости проекта</button></li>
			</ul> 
			<div class="tabs__content tabs__content_active" id="content1">
				<div class="calc__select">
					<select name="delivery" id="delivery">
						<option value="1">Выбор способа доставки</option>
						<option value="1">1</option>
						<option value="1">2</option>
					</select>
				</div>
				<div class="calc__select">
					<select name="city" id="city">
						<option value="1">Населеный пункт доставки</option>
						<option value="1">1</option>
						<option value="1">2</option>
					</select>
				</div>
			</div>
			<div class="tabs__content" id="content2">
				
				<div class="calc__select">
					<select name="delivery" id="delivery">
						<option value="1">Выбор способа доставки</option>
						<option value="1">1</option>
						<option value="1">2</option>
					</select>
				</div>
				<div class="calc__select">
					<select name="city" id="city">
						<option value="1">Населеный пункт доставки</option>
						<option value="1">1</option>
						<option value="1">2</option>
					</select>
				</div>
			</div>
		</div>
		<div class="calc__right">


			<div class="calc__cost fullcost">
			<p>Стоимость аренды  лесов в месяц без доставки)</p>
						<b>20 250 <span>рублей</span></b>
			</div>

			<div class="calc__cost fullcost">
			<p>Срок аренды лесов за 1 м2 без доставки)</p>
						<b>500 <span>рублей</span></b>
			</div>


			<div class="calc__cost fullcost">
			<p>Стоимость доставки</p>
						<b>5 500 <span>рублей</span></b>
			</div>




			<div class="calc__buy">
				<button>Заказать</button>
			</div>
			<div class="calc__bonus bonus">
				<div class="bonus__text">
					<img src="/img/star.png" alt="ico">
					<span>Скидки <br>и особые <br>условия</span>
				</div>
				<div class="bonus__info">
					<p>При аренде на длительный <br>срок или при заказе <br>большого обьема</p>
					<p>Узнайте у специалиста <a href="mailto:info@pgm.ru">info@pgm.ru</a></p>
				</div>
			</div>
		</div>
	</div>
</section>