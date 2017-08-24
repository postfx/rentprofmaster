<?php
	$categories = Category::model()->findAllByAttributes(array(
		'parent_id' => 0,
		'active' => 1,
	));

	$cnt = ceil(count($categories) / 3);

   	$cats1 = array();
   	$cats2 = array();
   	$cats3 = array();

	for ($i = 0; $i < $cnt; $i++) {
		$cats1[] = $categories[$i];
	}

	for ($i = $cnt; $i < $cnt*2; $i++) {
		$cats2[] = $categories[$i];
	}

	for ($i = $cnt*2; $i < count($categories); $i++) {
		$cats3[] = $categories[$i];
	}
?>

<!--<ul class="nav nav-justified" id="menu">
	<li class="dropdown dropdown-full">
		<a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown">
			Аренда
			<span><img src="/assets/img/menu.png" alt="img"></span>
		</a>
		<ul class="dropdown-menu">
			<li>
				<ul class="dropdown_menu_one">
					<?php foreach ($cats1 as $c):?>
					<h4><a href="/<?php echo $c->alias;?>"><?php echo $c->title;?></a></h4>
					<?php
						$childs = Category::model()->findAllByAttributes(array(
							'parent_id' => $c->id,
						));
					?>
					<?php foreach ($childs as $ch):?>
					<li><a href="/<?php echo $c->alias;?>/<?php echo $ch->alias;?>"><?php echo $ch->title;?></a></li>
					<?php endforeach; ?>
					<?php endforeach; ?>
				</li>
			</ul>
			<ul class="dropdown_menu_two">
				<li>
					<?php foreach ($cats2 as $c):?>
					<h4><a href="/<?php echo $c->alias;?>"><?php echo $c->title;?></a></h4>
					<?php
						$childs = Category::model()->findAllByAttributes(array(
							'parent_id' => $c->id,
						));
					?>
					<?php foreach ($childs as $ch):?>
					<li><a href="/<?php echo $c->alias;?>/<?php echo $ch->alias;?>"><?php echo $ch->title;?></a></li>
					<?php endforeach; ?>
					<?php endforeach; ?>
				</li>
			</ul>
			<ul class="dropdown_menu_three">
				<li>
					<?php foreach ($cats3 as $c):?>
					<h4><a href="/<?php echo $c->alias;?>"><?php echo $c->title;?></a></h4>
					<?php
						$childs = Category::model()->findAllByAttributes(array(
							'parent_id' => $c->id,
						));
					?>
					<?php foreach ($childs as $ch):?>
					<li><a href="/<?php echo $c->alias;?>/<?php echo $ch->alias;?>"><?php echo $ch->title;?></a></li>
					<?php endforeach; ?>
					<?php endforeach; ?>
				</li>
			</ul>
		</ul>
	</li> 
	<li><a href="/pay">Цены</a></li>
	<li><a href="/delivery">Доставка</a></li>
	<li class="dropdown">
		<a id="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown">
			О компании
		</a>
		<ul class="dropdown-menu dropdown_two">
			<li><a href="/about">О компании </a></li>
			<li><a href="/reviews">Отзывы </a></li>
			<li><a href="/faq">Ответы на вопросы</a></li>
			<li><a href="/contacts">Контакты</a></li>
			<li><a href="/articles">Статьи</a></li>
		</ul>
	</li>
	<li><a href="/contacts">Контакты</a></li>
</ul>-->

<?php echo StaticBlock::get('menu'); ?>