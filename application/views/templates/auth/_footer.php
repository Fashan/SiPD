


</div>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-8216c69d01441f36c0ea791ae2d4469f0f8ff5326f00ae2d00e4bb7d20e24edb.js"></script>

<script src="<?= base_url(); ?>assets/plugin/jquery/jquery-3.6.0.js"></script>
  <script src="<?= base_url(); ?>assets/dist/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/ajax/auth.js"></script>


<script id="rendered-js">
/*global $, document, window, setTimeout, navigator, console, location*/
var base_url = '<?= base_url(); ?>';
bg();
		function bg(){
				$.ajax({
				url: base_url + '/auth/get_data',
				type: 'post',
				dataType: 'json',
				success: function (response) {
					$('.bg').css("background-image","url(" + base_url + "assets/images/bg_img/" + response.background.bg + ")");	
				}
			});
		}

$(document).ready(function () {
  'use strict';
  // Detect browser for css purpose
 detectbrowser();

  // Label effect
  labeleffect();

  // Form validation
  formvalidation_login();

  // Form validation
  formvalidation_reg();

  // form switch
formswitch();

 // Form submit
  signup();
 // Form submit
  login();
 


  // Reload page
 reloadpage();

 get_desa();

});
//# sourceURL=pen.js
    </script>

  




 
</body>
</html>
