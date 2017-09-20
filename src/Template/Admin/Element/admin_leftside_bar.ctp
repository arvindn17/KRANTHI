<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$this->request->webroot?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= isset($user_name) ? $user_name : "";?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?=$this->request->webroot.'admin/index'?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            
          <ul class="treeview-menu">
            <?php
            if(!empty($userSessionDetails)){
                if(in_array('manage_admin',$userSessionDetails['Backend']['admin_capabilities'])){
                    ?>
                    <li><?php echo $this->Html->link(__('Manage Admin'), ["controller" => "AdminUsers", "action" => "index"]) ?></li>
                    <?php
                }
                if(in_array('manage_role',$userSessionDetails['Backend']['admin_capabilities'])){
                    ?>
                    <li><?php echo $this->Html->link(__('Manage Role'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
                    <?php
                }
                if(in_array('manage_admin_role_capabilities',$userSessionDetails['Backend']['admin_capabilities'])){
                    ?>
                    <li>
                        <?=$this->Html->link(__('Manage Admin Roles and Capabilities'),['controller'=>'RoleAdminCapabilities','action'=>'index'])?>
                    </li>
                    <?php
                }
                if(in_array('manage_invoice',$userSessionDetails['Backend']['admin_capabilities'])){
                    ?>
                    <li><?php echo $this->Html->link(__('Manage Invoice'), ['controller' => 'InvoiceDatas', 'action' => 'index']) ?></li>
                    <?php
                }
                if(in_array('manage_annexure',$userSessionDetails['Backend']['admin_capabilities'])){
                    ?>
                    <li><?php echo $this->Html->link(__('Generate Annexure'), ['controller' => 'InvoiceDatas', 'action' => 'annexure']) ?></li>
                    <?php
                }
            }
            ?>
          </ul>
        </li>        
      </ul>
    </section>
</aside>