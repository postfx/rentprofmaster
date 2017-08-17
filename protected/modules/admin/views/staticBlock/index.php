<?php
$this->breadcrumbs=array(
	'Static Blocks',
);

$this->menu=array(
array('label'=>'Create StaticBlock','url'=>array('create')),
array('label'=>'Manage StaticBlock','url'=>array('admin')),
);
?>

<h1>Static Blocks</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
