<div class="users form">
	<?= $this->Flash->render('auth') ?>
	<?= $this->Form->create() ?>
	    <fieldset>
	        <legend><?= __('Por favor informe seu usuário e senha') ?></legend>
	        <?= $this->Form->input('username',['label'=>'Login' , 'placeholder'=>'usuário','style'=>'text-align:center']) ?>
	        <?= $this->Form->input('password',['placeholder'=>'senha','label'=>'Senha', 'type'=>'password', 'style'=>'text-align:center']) ?>
	    </fieldset>
	<?= $this->Form->button(__('Login')); ?>
	<?= $this->Form->end() ?>
</div>