<?php
	$this->pageTitle = Yii::app()->name;
?>

<section class="bread">
	<div class="container">
	<div class="row">
			<ul class="breadcrumbs">
				<li class="ic_home"><a href="/"></a></li>
				<div class="sprt"></div>
				<li><a href="/about">О компании</a></li>
				<div class="sprt"></div>
			</ul>
	</div>
	</div>
	</section>
			<div class="clearfl"></div>

<div class="container">
	<div class="row">
			<div class="title"><h1>О компании</h1></div>
	</div>
</div>


<!--<section class="abouthead">

</section>-->


<?php echo StaticBlock::get('about_img');?>


<section class="aboutbox">
	<div class="container">
				<div class="row">
					<?php echo StaticBlock::get('about_text');?>
				</div>
			</div>

</section>

<section class="bggray">

		<section class="chefbox">
		<div class="container">

			<h3>Руководители подразделений</h3>

				<?php $i=0; foreach ($people as $p):?>
				<div class="col-sm-6 boxch <?php if ($i==0):?>fr<?php endif;?>">
					<div class="col-sm-5">
					<div class="imgch"><img src="/uploads/people/<?php echo $p->img;?>"></div>
					</div>
					<div class="col-sm-7">
					<div class="namech"><?php echo $p->name;?></div>
					<div class="statech"><?php echo $p->prof;?></div>
					<div class="phonech"><?php echo $p->phone;?></div>
					<div class="mailch"><a href="mailto:<?php echo $p->email;?>"><?php echo $p->email;?></a></div>
					<?php if (!empty($p->skype)):?>
					<div class="skypech"><?php echo $p->skype;?></div>
					<?php endif; ?>
					</div>
				</div>
				<?php $i++; endforeach; ?>
		</div>
		</section>

		<?php echo $this->renderPartial('/site/_orderform'); ?>

</section><!-- /bggray -->
	<section class="address">
		<div class="address_inner">
			<div class="container">
				<h2><img src="/assets/img/add.png" alt="img">Адреса офисов и складов</h2>
				<div class="row">
					<?php foreach ($addresses as $a):?>
					<div class="col-sm-3">
						<div class="address_fone">
							<h3><?php echo $a->type;?> <br><span><?php echo $a->city;?></span></h3>
							<a class="address_tel" href="tel: <?php echo $a->phone;?>"><img src="/assets/img/add_phone.png" alt="img"><?php echo $a->phone;?></a>
							<p><?php echo $a->addr;?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>