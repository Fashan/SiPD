
  <div class="container">
   <section id="formHolder">

      <div class="row">

         <!-- Brand Box -->
         <div class="col-sm-6 brand">
            <!-- <a href="#" class="logo">Logo <span>.</span></a> -->

            <div class="heading">
               <h2>SIPD</h2>
               <p>Sistem Informasi Profile Daerah</p>
            </div>

            <div class="success-msg">
               <p>Hebat! Anda adalah salah satu dari member kami sekarang</p>
               <a href="<?= base_url(); ?>post/list" class="profile">Your Profile</a>
            </div>
         </div>

         <!-- Form Box -->
         <div class="col-sm-6 form">
            <!-- Login Form -->
            <div class="login form-peice">
               <form class="login-form" action="<?= base_url(); ?>auth/login" method="post">
                  <div class="form-group message">
                     <?= $this->session->flashdata('msg'); ?>
                  </div>
                  <div class="form-group">
                     <label for="username">Username</label>
                     <input type="text" name="username" id="loginname" class="loginname">
                      <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="loginPassword">Password</label>
                     <input type="password" name="password" id="loginpassword" class="loginpassword">
                     <span class="error"></span>
                  </div>

                  <div class="CTA">
                     <input type="submit" value="Login">
                     <a href="#" class="switch">saya baru</a>
                  </div>
               </form>
            </div><!-- End Login Form -->


            <!-- Signup Form -->
            <div class="signup form-peice switched">
               <form class="signup-form" action="<?= base_url(); ?>auth/signup" method="post">
					<div class="form-group">
						<select class="form-control desa" id="exampleFormControlSelect1" name="desa_id">

						</select>
                     <span class="error"></span>
                  </div>
                  <div class="form-group">
                     <label for="name">Username</label>
                     <input type="text" name="username" id="name" class="name">
                     <span class="error"></span>
                  </div>


						<div class="form-group">
                     <label for="email">Email Adderss</label>
                     <input type="email" name="email" id="email" class="email">
                     <span class="error"></span>
                  </div>
						
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" class="pass">
                     <span class="error"></span>
                  </div>

                  <div class="form-group">
                     <label for="passwordCon">Confirm Password</label>
                     <input type="password" name="password2" id="passwordCon" class="passConfirm">
                     <span class="error"></span>
                  </div>

						<br>
						

                  <div class="CTA">
                     <input type="submit" value="Signup Now" id="submit">
                     <a href="#" class="switch active">sudah memiliki akun</a>
                  </div>
               </form>
            </div><!-- End Signup Form -->
         </div>
      </div>

   </section>

