<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
            <?= $this->Form->create() ?>
                <div>
                    <center><?php echo $this->Html->image('hepoint.png', ['width'=>'200px']); ?></center>
                </div>
                <br>
                <div>
                    <h1>HEPOINT</h1>
                </div>                
                <div>
                    <?= $this->Form->input('username',['class'=>'form-control', 'placeholder'=>'Informe o nome de usuário','label'=>false,'style'=>'text-align:center']) ?>
                </div>
                <div>
                    <?= $this->Form->input('password',['class'=>'form-control', 'placeholder'=>'Informe a senha do usuário','label'=>'Senha', 'type'=>'password', 'style'=>'text-align:center']); ?>
                </div>
                <div class="clearfix"></div>
                <div>
                    <?= $this->Form->button('Entrar',['class'=>'btn btn-block btn-primary']) ?>
                </div>
                <div class="separator">
                    <div> 
                        <center>HEPOINT</center>  
                    </div>
                </div>
            <?= $this->Form->end(); ?>
        </section>
    </div>
</div>
