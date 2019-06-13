<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'HEPOINT';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('font-awesome.css') ?>
    <?= $this->Html->css('custom.css') ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?php echo $this->Html->script('jquery') ?>
    <?php echo $this->Html->script('bootstrap') ?>
    <?php echo $this->Html->script('input-maskmoney') ?>

</head>
<body class="nav-sm">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <?= $this->Html->link('<img src="'.$dominio_sistema.'/img/hepoint.png" alt="" width="65px"> <span> Lignus</span>',['controller'=>'Users','action'=>'home'], ['escape' => false,'class'=>'navbar-brand']); ?>
                    </div>
                    <div class="clearfix"></div>
                    </br>
                    
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>CADASTROS</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-users"></i> Usuários <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><?php echo $this->Html->link('Listar',['controller' => 'Users','action' => 'index'],['escape'=>false]); ?></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-clock-o"></i> Horários <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><?php echo $this->Html->link('Listar',['controller' => 'QuadrosHoras','action' => 'index'],['escape'=>false]); ?></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-puzzle-piece"></i> Funcionários <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><?php echo $this->Html->link('Listar',['controller' => 'Funcionarios','action' => 'index'],['escape'=>false]); ?></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-puzzle-piece"></i> Relógio <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><?php echo $this->Html->link('Listar',['controller' => 'Relogios','action' => 'index'],['escape'=>false]); ?></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-puzzle-piece"></i> Apurações <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><?php echo $this->Html->link('Listar',['controller' => 'apuracoesPeriodos','action' => 'index'],['escape'=>false]); ?></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-puzzle-piece"></i> Batidas <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><?php echo $this->Html->link('Listar',['controller' => 'Batidas','action' => 'index'],['escape'=>false]); ?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="top_nav">
              <div class="nav_menu">
                <nav>
                  <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
                  <ul class="nav navbar-nav navbar-right">
                    <li class="">
                      <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $usuarioAtivo["nome"]; ?>
                        <span class=" fa fa-angle-down"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;">Help</a></li>
                        <li><?= $this->Html->link('<i class="fa fa-sign-out pull-right"></i> Sair', ['controller' => 'Users', 'action' => 'logout'],  array('escape' => false)) ?></li>
                      </ul>
                    </li>

                    <li role="presentation" class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-calendar"></i>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>

            <div class="right_col" role="main">
              <?php echo $this->fetch('content') ?>
            </div>
            
            <footer>
              <div class="pull-right">
                HEPOINT
              </div>
              <div class="clearfix"></div>
            </footer>
        </div>
    </div>

    <?php echo $this->Html->script('custom') ?>
</body>
</html>
<script type="text/javascript">
   /* $(document).ready(function () {
       
        var url ='https://api.vitortec.com/currency/quotation/v1.2/';       
        $.get( url, function(data){
        $.each(data.data.currency, function(key, value){
               
           if(value.code == 'USD'){
            var arredondado = value.buying;
            arredondado = parseFloat(arredondado);
            arredondado = arredondado.toFixed(3);
            $("#dolar").val(arredondado);
           }
           if(value.code == 'EUR'){
            arredondado = value.buying;
            arredondado = parseFloat(arredondado);
            arredondado = arredondado.toFixed(3);
            $("#euro").val(arredondado);
           }
           if(value.code == 'ARS'){
            arredondado = value.buying;
            arredondado = parseFloat(arredondado);
            arredondado = arredondado.toFixed(3);
            $("#pesoarg").val(arredondado);
           }
         
        });
           
     
        }).complete(function(){

        }).error(function(){
        
        });

    });*/

  
</script>
