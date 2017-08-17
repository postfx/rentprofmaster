<?php
$this->breadcrumbs=array(
	'Catalogs'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1>Товары</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'catalog-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'created',
		'title',
		array(
			'name'=>'active',
			'type'=>'html',
            'value'=> '$data->active ? "да" : "нет"',
		),
		'alias',
		array(
			'name'=>'category_id',
			'type'=>'html',
            'value'=>'$data->category->title',
		),
		array(
			'name'=>'img',
			'type'=>'html',
            'value'=>'$data->img ? CHtml::link(
                CHtml::image(Yii::app()->request->baseUrl."/uploads/catalog/".$data->img, "", array("style" => "width: 100px")),
                array(Yii::app()->request->baseUrl."/uploads/catalog/".$data->img),
                array("class" => "fancybox")) : ""',
		),
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
