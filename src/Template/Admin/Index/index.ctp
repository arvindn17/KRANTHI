<div class="quick_action_dashboard">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="content_header">
           <div id="breadcrumb" style="margin-left: 17px;"> 
               <a href="<?=$this->request->webroot.'admin/index'?>" class="tip-bottom" data-original-title="Go to Home">
                   <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard 
               </a>
           </div>
        </div>
       <div class="quick_action">
          <ul>
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
                if(in_array('manage_admin_capabilities',$userSessionDetails['Backend']['admin_capabilities'])){
                    ?>
                    <li><?php echo $this->Html->link(__('Manage Admin Capabilities'), ['controller' => 'AdminCapabilities', 'action' => 'index']) ?></li>
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
                    <li><?php echo $this->Html->link(__('Manage Invoice'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
                    <?php
                }
                if(in_array('manage_annexure',$userSessionDetails['Backend']['admin_capabilities'])){
                    ?>
                    <li><?php echo $this->Html->link(__('Manage Annexure'), ['controller' => 'Invoices', 'action' => 'index']) ?></li>
                    <?php
                }
            }
            ?>
          </ul>
       </div>
      </div>
    </div>
 </div>
</div>
