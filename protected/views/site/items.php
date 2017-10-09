<?php
	$this->pageTitle = Yii::app()->name;

	$t = '';
	if ($c->id == 1) {
		$t = 'бытовок';
	} elseif ($c->id == 2) {
		$t = 'строительных лесов';
	} elseif ($c->id == 3) {
		$t = 'опалубки';
	}
?>

<section class="bread">
	<div class="container">
	<div class="row">
			<ul class="breadcrumbs">
				<li class="ic_home"><a href="/"></a></li>
				<div class="sprt"></div>
				<li><a href="/items">Комплектующие для <?php echo $t;?></a></li>
				<div class="sprt"></div>
			</ul>
	</div>
	</div>
	</section>
			<div class="clearfl"></div>

<div class="container">

			<div class="title"><h1>Комплектующие для <?php echo $t;?></h1></div>

</div>










<section class="bggray">



<section class="reviewbox questions other">
	<div class="container">

<?php foreach ($items as $i):?>
<div class="boxcomplbox">
<div class="col-sm-4">
<img src="/uploads/items/<?php echo $i->img;?>" alt="" title="" />
</div>

<div class="col-sm-8">
<h3><a href="javascript:void(0)"><?php echo $i->title;?></a></h3>
<p><?php echo $i->descr;?></p>
<p class="infoic"><?php echo $i->comment;?></p>
</div>

</div>

<?php endforeach; ?>

	</div>

</section>


<section class="avantwobox">

<div class="container">

<div class="col-sm-6 lf6">
<?php echo StaticBlock::get('items_text');?>
</div>


<div class="col-sm-6 rl6">
<h2>Применяется при аренде опалубков</h2>
<p>По сути, особенность рекламы консолидирует пак-шот. Диктат потребителя не так уж очевиден. Перераспределение бюджета, вопреки мнению П.Друкера, регулярно </p>	
<p>По сути, особенность рекламы консолидирует пак-шот. Диктат потребителя не так уж очевиден. Перераспределение бюджета, вопреки мнению П.Друкера, регулярно </p>	

<h5>Есть вопросы по аренде? <span>Звоните!</span></h5>

<div class="boxphoneadr">
<div class="phonebx">8 (495) 640-59-79</div>
<div class="adrbx"><a href="#">Отправить заявку</a></div>
</div>


</div>

</div>
</section>


</section><!-- /bggray -->
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