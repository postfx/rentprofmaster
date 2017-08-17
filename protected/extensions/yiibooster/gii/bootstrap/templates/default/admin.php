<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Manage',
);\n";
?>

$this->menu=array(
array('label'=>'Создать','url'=>array('create')),
);

?>

<h1><?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<?php echo "<?php"; ?> $this->widget('booster.widgets.TbGridView',array(
'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
	if (++$count == 7) {
		echo "\t\t/*\n";
	}
	echo "\t\t'" . $column->name . "',\n";
}
if ($count >= 7) {
	echo "\t\t*/\n";
}
?>
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
