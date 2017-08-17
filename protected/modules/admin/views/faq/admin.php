<?php
$this->breadcrumbs=array(
	'Faqs'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Вопрос-ответ</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'faq-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'created',
		'question',
		'answer',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
