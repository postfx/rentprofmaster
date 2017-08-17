<?php
$this->breadcrumbs=array(
	'Mainsections',
);

$this->menu=array(
array('label'=>'Create Mainsection','url'=>array('create')),
array('label'=>'Manage Mainsection','url'=>array('admin')),
);
?>

<h1>Mainsections</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
