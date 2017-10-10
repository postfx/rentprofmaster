<?php
	$this->pageTitle = Yii::app()->name;
?>


<section class="billboard">
	<div class="billboard_inner">
		<div class="container-fluid">
			<div class="row row-flex">

				<?php $i = 1; foreach ($mainsections as $m):?>
				<div class="col-sm-4">
					<div class="billboard-item">
						<img src="/uploads/mainsections/<?php echo $m->img;?>" alt="image description">
						<div class="billboard-info">
							<a href="<?php echo $m->url;?>"><h2><?php echo $m->title;?></h2></a>
							<p><?php echo $m->descr;?></p>
						</div>
						<div class="block-btn">
							<span class="price"><?php echo $m->price;?></span>
							<a href="javascript:void(0)" class="btn" data-toggle="modal" data-target=".modal-form">Заказать</a>
						</div>
					</div>
				</div>
				<?php $i++; endforeach; ?>
			</div>
		</div>
	</div>
</section>

<!--<section class="billboard">
		<div class="billboard_inner">
			<div class="container-fluid">
				<div class="row">
					<?php $i = 1; foreach ($mainsections as $m):?>
					<div class="col-sm-4">
						<div class="order_<?php if ($i == 1):?>one<?php elseif ($i == 2):?>two<?php else:?>three<?php endif; ?>" style="background-image: url('/uploads/mainsections/<?php echo $m->img;?>');">
							<h2><?php echo $m->title;?></h2>
							<p><?php echo $m->descr;?></p>
							<ul>
								<li><?php echo $m->price;?><a href="<?php echo $m->url;?>">Заказать</a></li>
							</ul>
						</div>
					</div>
					<?php $i++; endforeach; ?>
				</div>
			</div>
		</div>
	</section>-->

	<section class="info">
		<div class="info_inner">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<img src="/assets/img/info.png" alt="img">
						<h3>Быстрый <br> заказ </h3>
						<p>Приступая к выбору бытовки, необходимо учитывать климатические условия района</p>
					</div>	
					<div class="col-sm-3">
						<img src="/assets/img/info1.png" alt="img">
						<h3>Есть в <br> наличии</h3>
						<p>Приступая к выбору бытовки, необходимо учитывать климатические условия района</p>
					</div>	
					<div class="col-sm-3">
						<img src="/assets/img/info2.png" alt="img">
						<h3>Бесплатный расчет</h3>
						<p>Приступая к выбору бытовки, необходимо учитывать климатические условия района</p>
					</div>	
					<div class="col-sm-3">
						<img src="/assets/img/info3.png" alt="img">
						<h3>Консультации специалистов</h3>
						<p>Приступая к выбору бытовки, необходимо учитывать климатические условия района</p>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<section class="security">
		<div class="security_inner">
			<div class="container">
				<h2>О надежности работы с нами <br>лучше всего <span>говорят цифры</span></h2>
				<div class="row">
					<div class="col-md-3 col-sm-6">
						<div class="color_one">
							<span>5</span>
							<hr>
							<img src="/assets/img/hr.png" alt="img">
							<p>Компания на рынке <br>более 5 лет</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="color_two">
							<span>200</span>
							<hr>
							<img src="/assets/img/hr2.png" alt="img">
							<p>Более 200 клиентов <br>с которыми работаем</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="color_one">
							<span>12</span>
							<hr>
							<img src="/assets/img/hr.png" alt="img">
							<p>Филиалов <br>в Санкт-Петербурге <br>и Москве</p>
						</div>
					</div>
					<div class="col-md-3 col-sm-6">
						<div class="color_two">
							<span>5</span>
							<hr>
							<img src="/assets/img/hr2.png" alt="img">
							<p>Большие складские <br>мощности</p>
						</div>
					</div>
				</div>
				<div class="security_plus">
					<h3>Еще несколько фактов:</h3>
					<ul class="security-list">
						<?php foreach ($mainfacts1 as $m):?>
						<li>
							<img src="/assets/img/plus.png" alt="img">
							<div class="security-text">
								<p><?php echo $m->text;?></p>
							</div>
						</li>
						<?php endforeach; ?>
						<?php foreach ($mainfacts2 as $m):?>
						<li>
							<img src="/assets/img/plus.png" alt="img">
							<div class="security-text">
								<p><?php echo $m->text;?></p>
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="company">
		<div class="company_inner">
			<hr>
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<h2>О компании</h2>
						<?php echo StaticBlock::get('main_descr');?>
						<br/><br/>
						<a href="#"><img src="/assets/img/com.png" alt="img">Подробнее</a>
					</div>	
					<div class="col-sm-5">
						<img src="/assets/img/company.jpg" alt="img">
					</div>	
				</div>
			</div>
		</div>
	</section>
	<section class="done">
		<div class="done_inner">
			<div class="container">
				<h2>Выполненые работы</h2>
				<div class="row">
					<?php foreach ($mainworks as $m):?>
					<div class="col-sm-4 ">
						<div class="block_inner">
							<img src="/uploads/mainworks/hor/<?php echo $m->img;?>" alt="img">
							<div class="block_none">
								<h3><?php echo $m->title;?></h3>
								<p><?php echo $m->descr;?></p>
								<a href="<?php echo $m->url;?>">Заказать</a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<section class="advantages">
		<div class="advantages_inner">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="advantages_one">
							<h2>Почему выбирают нас?</h2>
							<ul>
								<li><span><img src="/assets/img/adv.png" alt="img"></span><p>Все оборудование <br>есть на складе</p></li>
								<li><span><img src="/assets/img/adv1.png" alt="img"></span><p>Доставка в день <br>заключения договора</p></li>
								<li><span><img src="/assets/img/adv2.png" alt="img"></span><p>Скидки на БУ <br>оборудование</p></li>
								<li><span><img src="/assets/img/adv3.png" alt="img"></span><p>Низкие <br>цены</p></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="advantages_two">
							<h2>Наши преимущества</h2>
							<p><?php echo StaticBlock::get('main_features');?></p>
							<ul>
								<?php foreach ($features as $f):?>
								<li><span></span><p><?php echo $f->text;?></p></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="phone">
		<div class="phone_inner">
			<div class="container">
				<div class="img-tel"><img src="/assets/img/phone.png" alt="phone"></div>
				<div class="inner-text">
					<?php echo StaticBlock::get('footer_phones');?>
				</div>
				<div class="link-box">
					<a class="button_phone" href="#" data-toggle="modal" data-target=".modal-form">Заказать расчет аренды</a>
				</div>
			</div>
		</div>
	</section>
	<section class="address">
		<div class="address_inner">
			<div class="container">
				<span class="address-title"><img src="/assets/img/add.png" alt="img">Адреса офисов и складов</span>
				<div class="row">
					<?php foreach ($addresses as $a):?>
					<div class="col-sm-3">
						<div class="address_fone">
							<span class="premises"><?php echo $a->type;?> <br><span class="city"><?php echo $a->city;?></span></span>
							<a class="address_tel" href="tel: <?php echo $a->phone;?>"><img src="/assets/img/add_phone.png" alt="img"><?php echo $a->phone;?></a>
							<p><?php echo $a->addr;?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>