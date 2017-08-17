<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Преимущества на главной</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'feature-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'created',
		'text',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
