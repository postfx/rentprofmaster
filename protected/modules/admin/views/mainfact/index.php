<?php
$this->breadcrumbs=array(
	'Mainfacts',
);

$this->menu=array(
array('label'=>'Create Mainfact','url'=>array('create')),
array('label'=>'Manage Mainfact','url'=>array('admin')),
);
?>

<h1>Mainfacts</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
