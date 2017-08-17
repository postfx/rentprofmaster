<?php
	$this->pageTitle = Yii::app()->name;
?>

<section id="section" class="section section-choose-valentine section-error">
	<div class="container">
		<div class="row">
			<?php if ($code == 404):?>
			<h2>Здесь <span>ничего нет</span></h2>

			<div class="wrapper-too">

				<div class="text">
					<p>Перейти на <a href="/" class="main_page">главную страницу</a></p>
				</div>
			</div>

			<?php else :?>
			<h2>Ошибка <span><?php echo $code; ?></span></h2>
			<?php echo $message; ?>
			<?php endif; ?>
		</div>
	</div>
</section>