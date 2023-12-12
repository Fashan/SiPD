<footer class="footer footer-transparent d-print-none">
    <div class="container">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ml-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item bg_font"><p>Shan's Group</p></li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item bg_font">
                        Copyright © 2021
                        &bullet;
                        Build with
                        Bootstrap 4.
                        All rights reserved.
                    </li>
                </ul>
            </div>
        </div>
        <br>
    </div>
</footer>

      <script src="<?= base_url(); ?>assets/plugin/jquery/jquery-3.6.0.js"></script>
    <script src="<?= base_url(); ?>/assets/plugin/popper/popper.min.js"></script>
     <script src="<?= base_url(); ?>/assets/dist/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/dist/navbar/js/jquery.sticky.js"></script>
    <script src="<?= base_url(); ?>assets/dist/navbar/js/main.js"></script>
    <script src="<?= base_url(); ?>assets/ajax/user.js"></script>
	<script src="<?= base_url('assets/ajax/post.js'); ?>"></script>
	<script src="<?= base_url('assets/ajax/setting.js'); ?>"></script>


    <script type="text/javascript">
	var base_url = '<?= base_url();?>';
	var thumbnail_default = '<?= $this->config->item('post_thumbnail_default')?>';
        formvalidupgrade();
        upgrade();
		get_by_category();
		live_search();
		pagination();
		bg();
		terapkan_setting();

		
		

		function bg(){
			$.ajax({
			url: base_url + '/auth/get_data',
			type: 'post',
			dataType: 'json',
			success: function (response) {
				$('.bg').css("background-image","url(" + base_url + "assets/images/bg_img/" + response.background.bg + ")");	
				$('.bg_font').css("color",response.background.color);	
			}
		});
			
		}



		// direct browser to top right away
if (window.location.hash)
    scroll(0,0);
// takes care of some browsers issue
setTimeout(function(){scroll(0,0);},1);

$(function(){
//your current click function
// $('a.nav-link').on('click',function(e){
//     e.preventDefault();
// 	if (window.location.hash == $(this).prop('hash')) {
// 		$('html,body').animate({
// 			scrollTop:$(window.location.hash).offset().top + 'px'
// 		},1000,'swing');		
// 	}else{
// 		location.href = $(this).attr('href');
// 	}

// });

// if we have anchor on the url (calling from other page)
if(window.location.hash){
    // smooth scroll to the anchor id
    $('html,body').animate({
        scrollTop:$(window.location.hash).offset().top + 'px'
        },1000,'swing');
    }
});



    </script>
  </body>
</html>
