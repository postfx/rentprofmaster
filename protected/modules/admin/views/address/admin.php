<?php
$this->breadcrumbs=array(
	'Addresses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Адреса</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'address-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'created',
		'type',
		'city',
		'phone',
		'addr',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
