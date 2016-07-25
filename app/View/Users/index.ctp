<div class="users form">
<?php echo $this->Form->create(false, array('url' =>['controller' => 'user', 'action' => 'match'], 'type' => 'get')); ?>
	<?php	foreach($agents as $key => $agent): ?>
	<fieldset>
	<?php
		echo $this->Form->hidden('id', ['value' => $agent['User']['id']]);
		echo $this->Form->hidden('code', ['value' => $agent['User']['code']]);
		echo $this->Form->input('name', ['label' => 'Name', 'readonly' => 'readonly', 'value' => $agent['User']['name']]);
		echo $this->Form->input('zipcode', ['label' => 'Zip Code']);
	?>
	</fieldset>
	<?php endforeach; ?>
	<?php echo $this->Form->hidden('contacts', ['value' => $contacts]); ?>
<?php echo $this->Form->end(__('Match')); ?>
</div>