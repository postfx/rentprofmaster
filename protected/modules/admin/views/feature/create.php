<?php
$this->breadcrumbs=array(
	'Features'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Список','url'=>array('admin')),
);
?>

<h1>Создать</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>