<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
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

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('custom.min.css') ?>
    <?= $this->Html->css('nprogress.css') ?>
    <?= $this->Html->css('green.css') ?>
    <?= $this->Html->css('bootstrap-progressbar-3.3.4.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?php echo $this->Html->script('jquery') ?>
    <?php echo $this->Html->script('bootstrap') ?>
    <?php echo $this->Html->script('input-maskmoney') ?>
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href= "<?php echo $dominio_sistema; ?>" class="site_title"><i class="fa fa-plane"></i> <span>HEPOINT!</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>CADASTROS</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-users"></i> Usuários <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><?php echo $this->Html->link('<i class="fa-users"></i> Listar',['controller' => 'Users'],['escape'=>false]); ?></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-clock-o"></i> Horários <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><?php echo $this->Html->link('<i class="fa-users"></i> Listar',['controller' => 'QuadrosHoras'],['escape'=>false]); ?></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-puzzle-piece"></i> Funcionários <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      <li><?php echo $this->Html->link('<i class="fa-users"></i> Listar',['controller' => 'Funcionarios'],['escape'=>false]); ?></li>
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
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="right_col" role="main">
                <?php echo $this->fetch('content') ?>
            </div>
            <footer>
                <div class="pull-right">
                    Projeto Ponto Eletrônico 2019
                </div>
                <div class="clearfix"></div>
            </footer>
        </div>
    </div>
    <?php echo $this->Html->script('custom') ?>
</body>
</html>