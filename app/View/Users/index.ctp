<div class="users form">
<?php echo $this->Form->create('Agent', array('type' => 'get')); ?>
	<?php	foreach($agents as $key => $value): ?>
	<fieldset>
	<?php
		echo $this->Form->hidden('id', ['value' => $value['User']['id']]);
		echo $this->Form->hidden('code', ['value' => $value['User']['code']]);
		echo $this->Form->input('name', ['label' => 'Name', 'readonly' => 'readonly', 'value' => $value['User']['name']]);
		echo $this->Form->input('zipcode', ['label' => 'Zip Code']);
	?>
	</fieldset>
	<?php endforeach; ?>
<?php echo $this->Form->end(__('Match')); ?>
</div>