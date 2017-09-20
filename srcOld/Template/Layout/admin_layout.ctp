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
        echo $this->Html->css(['daterangepicker','invoice.bootstrap','jquery-ui', 'font-awesome',
            'ionicon.min', 'bootstrap', '../dist/css/AdminLTE.min.css', '../dist/css/skins/_all-skins.min.css']);
        echo 
        $this->Html->script(['jQuery-2.1.4.min','moment.min','daterangepicker',
            'jquery-ui.min', 'custom', '../plugins/jQuery/jquery-2.2.3.min.js', '../bootstrap/js/bootstrap.min.js',
            '../bootstrap/js/bootstrap.min.js', 'plugins/slimScroll/jquery.slimscroll.min.js', '../plugins/slimScroll/jquery.slimscroll.min.js'
            , "../plugins/fastclick/fastclick.js", "../plugins/fastclick/fastclick.js", "../dist/js/app.min.js", "../dist/js/demo.js"]); 
        ?>        
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Main Header -->
        <?php echo $this->element('admin_header'); 
        echo $this->element('admin_leftside_bar'); 
        
        
        ?>

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
