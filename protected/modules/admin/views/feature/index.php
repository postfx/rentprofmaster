<?php
$this->breadcrumbs=array(
	'Features',
);

$this->menu=array(
array('label'=>'Create Feature','url'=>array('create')),
array('label'=>'Manage Feature','url'=>array('admin')),
);
?>

<h1>Features</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
