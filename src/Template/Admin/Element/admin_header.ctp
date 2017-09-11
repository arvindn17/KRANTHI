<header style="background-color: #fff;">
    <div class="container-fluid">
        <section class="header-wrapper">
            <div class="row header-wrapper">
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 logoContainer">
                    <div class="brand">
                        <a class="navbar-brand" href="<?= Cake\Routing\Router::url(["controller" => "Index", "action" => "index"]) ?>">KRANTHI</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            if (isset($user_name)) {
                                ?>
                                <li><a href="#"><i class="fa fa-key"></i> <?= $user_name; ?></a></li>
                                <li><?= $this->Html->link('Logout', ['controller' => 'admin-users', 'action' => 'logout', 'prefix'=>'admin']); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
        </section>
    </div>
</header>
