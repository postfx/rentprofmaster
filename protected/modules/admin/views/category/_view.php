<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anounce')); ?>:</b>
	<?php echo CHtml::encode($data->anounce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data1')); ?>:</b>
	<?php echo CHtml::encode($data->data1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data2')); ?>:</b>
	<?php echo CHtml::encode($data->data2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data3')); ?>:</b>
	<?php echo CHtml::encode($data->data3); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descr')); ?>:</b>
	<?php echo CHtml::encode($data->descr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	*/ ?>

</div>