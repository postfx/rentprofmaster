<?php
	$this->pageTitle = Yii::app()->name;
?>

<section class="bread">
	<div class="container">
	<div class="row">
			<ul class="breadcrumbs">
				<li class="ic_home"><a href="/"></a></li>
				<div class="sprt"></div>
				<li><a href="/contacts">Контакты</a></li>
				<div class="sprt"></div>
			</ul>
	</div>
	</div>
</section>

<div class="clearfl"></div>
<div class="container">
    <div class="row">
		<div class="title">
        	<h1>Контакты</h1>
        </div>
    </div>
</div>


<section class="aboutbox">
	<div class="container">
		<?php echo StaticBlock::get('contacts_text');?>
	</div>
</section>

<section class="maptabs">
	<?php echo StaticBlock::get('yandex_maps'); ?>
</section>

<?php echo $this->renderPartial('/site/_orderform', array('dlc'=>'bg-grey')); ?>

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