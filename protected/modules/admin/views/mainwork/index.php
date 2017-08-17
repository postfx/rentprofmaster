<?php
$this->breadcrumbs=array(
	'Mainworks',
);

$this->menu=array(
array('label'=>'Create Mainwork','url'=>array('create')),
array('label'=>'Manage Mainwork','url'=>array('admin')),
);
?>

<h1>Mainworks</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
