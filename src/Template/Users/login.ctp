<div class="container">
    <div class="container-fluid">
        <div class="card card-container center">
            <?php echo $this->Html->image('hepoint.png', ['width'=>'200px', 'class'=>'logoLogin']); ?>
            <p id="profile-name" class="tituloLogin">Acessar o sistema</p>
            <?= $this->Form->create('form', ['class'=>'formLogin']) ?>
                <?= $this->Form->input('username',['class'=>'form-control', 'placeholder'=>'Informe o nome de usuário','label'=>false,'style'=>'text-align:center']) ?>        
                <?= $this->Form->input('password',['class'=>'form-control', 'placeholder'=>'Informe a senha do usuário','label'=>false, 'type'=>'password', 'style'=>'text-align:center']); ?>
                <?= $this->Form->button('Entrar',['class'=>'btn btn-block btn-primary btn-signin']) ?>
            <?= $this->Form->end(); ?>
            <div class="separator">
                    <div> 
                        <center>HEPOINT</center>  
                    </div>
            </div>
        </div>
    </div>
</div>

