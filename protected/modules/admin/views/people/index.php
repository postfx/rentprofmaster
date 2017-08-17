<?php
$this->breadcrumbs=array(
	'Peoples',
);

$this->menu=array(
array('label'=>'Create People','url'=>array('create')),
array('label'=>'Manage People','url'=>array('admin')),
);
?>

<h1>Peoples</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
