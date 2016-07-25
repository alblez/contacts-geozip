<div class="users form">
<?php echo $this->Form->create(false, array('url' =>['controller' => 'users', 'action' => 'match'])); ?>
	<?php	foreach($agents as $key => $agent): ?>
	<fieldset>
	<?php
		echo $this->Form->hidden('agents.' . $key . '.User.id', ['value' => $agent['User']['id']]);
		echo $this->Form->hidden('agents.' . $key.'.User.code', ['value' => $agent['User']['code']]);
		echo $this->Form->input('agents.' . $key.'.User.name', ['label' => 'Name', 'readonly' => 'readonly', 'value' => $agent['User']['name']]);
		echo $this->Form->input('agents.' . $key.'.User.zipcode', ['label' => 'Zip Code']);
	?>
	</fieldset>
	<?php endforeach; ?>
<?php echo $this->Form->end(__('Match')); ?>
</div>