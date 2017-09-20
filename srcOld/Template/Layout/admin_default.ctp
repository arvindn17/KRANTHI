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
$this->assign('title', $title);
$cakeDescription = 'Kranthi: ';

?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="HandheldFriendly" content="True" />
        <meta name="MobileOptimized" content="300" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $cakeDescription ?><?= $this->fetch('title') ?></title>
        <?= $this->Html->meta('icon') ?>
        <?php
        echo $this->Html->css(['cake','home','base','daterangepicker','invoice.bootstrap','jquery-ui'])
        ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
        </script>
        <?=
        $this->Html->script(['jQuery-2.1.4.min','moment.min','daterangepicker','jquery-ui.min','custom']); //,
        ?>
    </head>
    <body>
        <!-- Main Header -->
        <?php echo $this->element('admin_header'); ?>

        <div class="container-fluid container-wrapper">
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>  
        </div>
        <!--row-fluid closing  -->

        <div id="ajaxLoader" style="display:none;"></div>
        <!-- REQUIRED JS SCRIPTS -->

        <?php
//        echo $this->Html->script(['bootstrap.min', '/plugins/ckeditor/ckeditor', 'jquery.custom.extend','/plugins/slimScroll/jquery.slimscroll.min.js','/plugins/slimScroll/jquery.slimscrollHorizontal.js',
//            'dropzone', 'easyTree', '/plugins/iCheck/icheck.min', 'script','jquery.dataTables.min','dataTables.bootstrap.min',
//            '/plugins/datepicker/bootstrap-datepicker','custom'],["type"=>"text/javascript"]); //,
        ?>
    </body>
</html>
