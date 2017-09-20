    <div class="login-box">
      <div class="login-logo">
          <?= $this->Html->link($this->Html->image("logo.png",['alt'=>'logo']),"/admin",['escape' => false]); ?>
          <p style="font-size: 18px; letter-spacing: 2px; font-weight: 600;">KRANTHI</p>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?= $this->Flash->render() ?>
        <?= $this->Form->create() ?>
          <div class="form-group has-feedback">
            <?= $this->Form->input('email',['placeholder'=>'Email', 'required'=>'required', 'label'=>false,'class'=>'form-control']) ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <?= $this->Form->input('password',['placeholder'=>'Password', 'required'=>'required', 'label'=>false, 'class'=>'form-control']) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!--<div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>--><!-- /.col -->
            <div class="col-xs-4 col-xs-offset-8">
              <?= $this->Form->button(__('Sign In'),['class'=>'btn btn-primary btn-block btn-flat']) ?>
            </div><!-- /.col -->
          </div>
        <?= $this->Form->end() ?>

        <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div> --><!-- /.social-auth-links -->

     <!--    <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->