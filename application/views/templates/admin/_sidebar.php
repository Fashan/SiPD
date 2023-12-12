 <aside class="sidebar">
      <div class="toggle">
				<div class=" btn btn-light">
				<a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
				</div>
       
      </div>
      <div class="side-inner">
        <?php if (userdata()): ?>
        <div class="profile">
          <?php if (userdata()->avatar): ?>
          <img src="<?= base_url('assets/images/users/'.userdata()->avatar); ?>" alt="Image" class="img-fluid">
            <?php else: ?>
              <img src="<?= base_url('assets/images/users/'.$this->config->item('user_avatar_default')); ?>" alt="Image" class="img-fluid">
          <?php endif ?>
          <h3 class="name"><?= userdata()->username; ?></h3>
          <span class="country"><?= userdata()->role; ?></span>
        </div>

        
        <div class="nav-menu">
          <?php if (userdata()->role == 'admin'): ?>      
          <ul>
            <li><a href="<?= base_url('configuration/account'); ?>"><i class="fad fa-address-card mr-3"></i>Profile</a></li>
            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
							<span class="fal fa-database mr-3"></span>Data Daerah
              </a>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="<?= base_url('penduduk'); ?>">Data Penduduk</a></li>
                    <li><a href="<?= base_url('tempatusaha'); ?>">Data Tempat Usaha</a></li>
                    <li><a href="<?= base_url('tempatwisata'); ?>">Data Tempat Wisata</a></li>
                  </ul>
                </div>
              </div>
            </li>

            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
							<span class="fal fa-newspaper mr-3"></span>Post
              </a>
              <div id="collapsetwo" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="<?= base_url(); ?>post">Posts</a></li>
                    <li><a href="<?= base_url('category/index'); ?>">Category</a></li>
                    <li><a href="<?= base_url('post/list'); ?>">View</a></li>
                    <li><a href="<?= base_url('comment'); ?>">Comment</a></li>
                  </ul>
                </div>
              </div>
            </li>
           
            <li><a href="<?= base_url('file'); ?>"><i class="fal fa-file-pdf mr-3"></i>File</a></li>
            <li><a href="<?= base_url('user'); ?>"><i class="far fa-users mr-3"></i>Users</a></li>
						<li><a href="<?= base_url(); ?>saran"><span class="far fa-envelope-open mr-3"></span>Saran</a></li>
						<li><a href="<?= base_url(); ?>configuration"><i class="far fa-cogs mr-3"></i></span>Setting</a></li>
            <li><a href="<?= base_url(); ?>/auth/signout"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
          </ul>
           <?php endif ?>
           <?php if (userdata()->role=='pimpinan'): ?>
               <ul>
                 <li><a href="<?= base_url('configuration/account'); ?>"><span><i class="fad fa-address-card mr-3"></i></span>Profile</a></li>
            <li class="accordion">
              <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsible">
                <span class="fal fa-database mr-3"></span>Data Daerah
              </a>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                <div>
                  <ul>
                    <li><a href="<?= base_url('penduduk/pimpinan_index'); ?>">Data Penduduk</a></li>
                    <li><a href="<?= base_url('tempatusaha/pimpinan_index'); ?>">Data Tempat Usaha</a></li>
                    <li><a href="<?= base_url('tempatwisata/pimpinan_index'); ?>">Data Tempat Wisata</a></li>
                  </ul>
                </div>
              </div>
            </li>
						<li><a href="<?= base_url('file/pimpinan_index'); ?>"><i class="fal fa-file-pdf mr-3"></i>File</a></li>
            <li><a href="<?= base_url(); ?>post/list"><span class="fal fa-newspaper mr-3"></span>Post</a></li>
            <li><a href="<?= base_url(); ?>/auth/signout"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
          </ul>
             <?php endif ?>  
          <?php endif ?>

				<?php if (userdata()->role == 'member') : ?>
					<ul>
                 <li><a href="<?= base_url('configuration/account'); ?>"><i class="fad fa-address-card mr-3"></i>Profile</a></li>

           
            <li><a href="<?= base_url(); ?>post/list"><span class="fal fa-newspaper mr-3"></span>Post</a></li>
            <li><a href="<?= base_url(); ?>/auth/signout"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
          </ul>
				<?php endif ?>
        </div>
      </div>
    </aside>
