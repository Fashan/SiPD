   

    <!-- top navbar -->
    <div class="site-navbar-wrap">
      <div class="site-navbar-top">
        <div class="container py-3">
          <div class="row align-items-center">
            <div class="col-6">
              <div class="d-flex mr-auto">
                <a href="#" class="d-flex align-items-center mr-4">
                  <span class="icon-envelope mr-2"></span>
                  <span class="d-none d-md-inline-block show_email"></span>
                </a>
                <a href="#" class="d-flex align-items-center mr-auto">
                  <span class="icon-phone mr-2"></span>
                  <span class="d-none d-md-inline-block show_wa"></span>
                </a>
              </div>
            </div>
            <div class="col-6 text-right">
              <div class="mr-auto">
                <a href="#" class="p-2 pl-0 show_twiter"><span class="icon-twitter">twitter</span></a>
                <a href="#" class="p-2 pl-0 show_fb"><span class="icon-facebook"></span></a>
                <a href="#" class="p-2 pl-0 show_ig"><span class="icon-instagram"></span></a>
              </div>
              
            </div>
          </div>
        </div>
      </div>









<!-- navbar -->
      <div class="site-navbar site-navbar-target js-sticky-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-2">
              <h1 class="my-0 site-logo"><a href="<?= base_url('post/list'); ?>">SIPD</a></h1>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu main-menu js-clone-nav d-none d-lg-block">
										<?php if (userdata()): ?>
											<li class="active"><a href="<?= base_url('post/list'); ?>" class="nav-link">Home</a></li>
											<li class="has-children">
												<a href="#" class="nav-link">User</a>
												<ul class="dropdown arrow-top">
													<?php if (userdata()->role =='admin' ): ?>
														<li><a href="<?= base_url('dashboard'); ?>" class="nav-link" >Dashboard</a></li>
														<?php else: ?>
															<?php if (userdata()->role == 'pimpinan'): ?>
																<li><a href="#" class="nav-link" onclick="modaluser()">Upgrade</a></li>
																<li><a href="<?= base_url('dashboard'); ?>" class="nav-link" >Dashboard</a></li>
																<?php else: ?>
																	<li><a href="#" class="nav-link" onclick="modaluser()">Upgrade</a></li>
																	<?php endif ?>
																	<?php endif ?>
												<li><a href="<?= base_url('configuration/account'); ?>" class="nav-link">profile</a></li>
                        <li><a href="<?= base_url(); ?>auth/signout" class="nav-link">sign out</a></li>
												<!--  <li class="has-children">
													<a href="#">More Links</a>
                          <ul class="dropdown">
														<li><a href="#">Menu One</a></li>
                            <li><a href="#">Menu Two</a></li>
                            <li><a href="#">Menu Three</a></li>
                          </ul>
                        </li> -->
                      </ul>
										
											<li><a href="<?= base_url('saran/forum#forum_saran'); ?>" class="nav-link">Saran</a></li>
                    </li>
                  <?php else: ?>
										<li class="active"><a href="<?= base_url('post/list'); ?>" class="nav-link">Home</a></li>
										<li><a href="<?= base_url('auth'); ?>" class="nav-link">Login</a></li>
										<li><a href="<?= base_url('saran/forum#forum_saran'); ?>" class="nav-link">Saran</a></li>
                     <?php endif ?>
                    <!-- <li><a href="#classes-section" class="nav-link">Classes</a></li>
                    <li><a href="#about-section" class="nav-link">About</a></li>
                    <li><a href="#events-section" class="nav-link">Events</a></li>
                    <li><a href="#gallery-section" class="nav-link">Gallery</a></li>
                    <li><a href="#contact-section" class="nav-link">Contact</a></li> -->
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>




<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="upgradeuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upgrade User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('user/upgradeuser'); ?>" method='post' class='upgrade-form'>
          <div class="form-group">
          <label for="validationCustom04">Password Upgrade</label>
      <input type="password" class="form-control passupgrade" name="password" placeholder="Password">
      <div class="messageup invalid-feedback">
        
      </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upgrade</button>
        </form>
      </div>
    </div>
  </div>
</div>

