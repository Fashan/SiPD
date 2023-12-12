
    <script src="<?= base_url(); ?>assets/plugin/jquery/jquery-3.6.0.js"></script>


     <!-- Popper.JS -->
    <script src="<?= base_url(); ?>/assets/plugin/popper/popper.min.js"></script>

        <!-- Bootstrap JS -->
    <script src="<?= base_url(); ?>/assets/dist/bootstrap/js/bootstrap.min.js"></script>

    <script src="<?= base_url(); ?>/assets/dist/sidebar/js/main.js"></script>

    <script src="<?= base_url('assets/plugin/datatable/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugin/datatable/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugin/datatable/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugin/datatable/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('assets/ajax/user.js'); ?>"></script>
    <script src="<?= base_url('assets/ajax/penduduk.js'); ?>"></script>
    <script src="<?= base_url('assets/ajax/tem_usaha.js'); ?>"></script>
    <script src="<?= base_url('assets/ajax/tem_wisata.js'); ?>"></script>
    <script src="<?= base_url('assets/ajax/file.js'); ?>"></script>
    <script src="<?= base_url('assets/ajax/post.js'); ?>"></script>
    <script src="<?= base_url('assets/ajax/setting.js'); ?>"></script>
	<script src="<?= base_url('assets/dist/datepicker/js/bootstrap-datepicker.js'); ?>"></script>
    
  
    <script src="<?= base_url('assets/dist/summernote/summernote-bs4.min.js'); ?>"></script>
   

    <script type="text/javascript">
        var base_url = '<?= base_url(); ?>';
        var user_desa_id = '<?= userdata()->desa_id; ?>';
        var userTable = $('#usertable').DataTable({
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                  ajax: {
                 url: base_url +'user/get_ajax',
                 type: 'POST'
                },
                columnDefs : [
             
                 {
                    "targets" : 5,
                    "sortable" : false,

                }
                ]
            });

          var pendudukTable = $('#penduduktable').DataTable({
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                  ajax: {
                 url: base_url +'penduduk/get_ajax',
                 type: 'POST'
                },
                columnDefs : [
             
                {
                    "targets" : 4,
                    "sortable" : false,
                },
                {
                    "targets" : 5,
                    "sortable" : false,
                },
                 {
                    "targets" : 6,
                    "sortable" : false,
                }
                ]
            });

            var tem_usahaTable = $('#usahatable').DataTable({
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                  ajax: {
                 url: base_url +'tempatusaha/get_ajax',
                 type: 'POST'
                },
                columnDefs : [
             
                {
                    "targets" : 4,
                    "sortable" : false,
                },
               
                 {
                    "targets" : 8,
                    "sortable" : false,
                }
                ]
            });

  var tem_wisataTable = $('#wisatatable').DataTable({
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                  ajax: {
                 url: base_url +'tempatwisata/get_ajax',
                 type: 'POST'
                },
                columnDefs : [
               {
                    "targets" : 5,
                    "sortable" : false,
                },
                ]
            });

   var postTable = $('#posttable').DataTable({
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                  ajax: {
                 url: base_url +'post/get_ajax',
                 type: 'POST'
                },
                columnDefs : [
               {
                    "targets" : 5,
                    "sortable" : false,
                },
                ]
            });

			var categoryTable = $('#categorytable').DataTable({
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                  ajax: {
                 url: base_url +'category/get_ajax',
                 type: 'POST'
                },
                columnDefs : [
               {
                    "targets" : 3,
                    "sortable" : false,
                },
                ]
            });

			var commentTable = $('#commenttable').DataTable({
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                  ajax: {
                 url: base_url +'comment/get_ajax',
                 type: 'POST'
                },
                columnDefs : [
               {
                    "targets" : 3,
                    "sortable" : false,
                },
                ]
            });

			var fileTable = $('#filetable').DataTable({
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                  ajax: {
                 url: base_url +'file/get_ajax',
                 type: 'POST'
                },
                columnDefs : [
               {
                    "targets" : 3,
                    "sortable" : false,
                },
				{
                    "targets" : 4,
                    "visible" : false,
                },
                ]
            });
			var pim_fileTable = $('#pim_filetable').DataTable({
                "responsive" : true,
                "processing": true,
                "serverSide": true,
                  ajax: {
                 url: base_url +'file/get_ajax',
                 type: 'POST'
                },
                columnDefs : [
               {
                    "targets" : 3,
                    visible: false,
                },
				{
                    "targets" : 4,
                    "sortable" : false,
                },
                ]
            });
            
           
  $("#summernote").summernote({
            height: "200px",
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['misc', ['fullscreen', 'codeview', 'help']],
            ],
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });
        var images = [];
            var i = 0;
        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?= base_url('dashboard/upload_image') ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $("#summernote").summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {
                    src: src
                },
                type: "POST",
                url: "<?= base_url('dashboard/delete_image') ?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }


pim_tem_usahaTable();
pim_pendudukTable();
pim_tem_wisataTable();

$('input[name=tanggal_lahir]').datepicker({
format: 'yyyy-mm-dd',
autoclose: true,
clearBtn: true,
disableTouchKeyboard: true
});

$('input[name=post_date]').datepicker({
format: 'yyyy-mm-dd',
autoclose: true,
clearBtn: true,
disableTouchKeyboard: true
});


        //tambah data
        adduser();
        add_penduduk();
        add_tem_usaha();
        add_tem_wisata();

        //edit data
        edituser();
        edit_penduduk();
        edit_tem_usaha();
        edit_tem_wisata();
		bg();
		get_setting();
		public_setting();
		get_desa();
		
		
// javascript kategory
$(document).ready(function() {

        $('body').on('click', '.btn-edit', function() {
            let id = $(this).data('id'),
                name = $(this).data('name'),
                desc = $(this).data('desc');

            $('#form-title').text('Edit Category - ID#' + id);
            $('[name=category_id]').val(id);
            $('#category_name').val(name).select();
            $('#category_desc').val(desc);

            document.querySelector('#form-title').scrollIntoView({
                behavior: 'smooth'
            });
        });

        $('body').on('click', '#btn-cancel', function() {
            $('#form-title').text('New Category');
            $('[name=category_id]').val('');
            $('#category_name').val('').select();
            $('#category_desc').val('');
        });
    });
		


	$('#post_thumbnail').on('change',function(){
	var filename = $('#post_thumbnail').val().replace(/C:\\fakepath\\/i, '');
	$('#filename').text(filename);
});
	$('#avatar').on('change',function(){
	var filename = $('#avatar').val().replace(/C:\\fakepath\\/i, '');
	$('#filename').text(filename);
});

$('#avatar').on('change',function(){
	var filename = $('#avatar').val().replace(/C:\\fakepath\\/i, '');
	$('#filename').text(filename);
});

$('#fileToUpload').on('change',function(){
	var filename = $('#fileToUpload').val().replace(/C:\\fakepath\\/i, '');
	$('#filename').text(filename);
});

$('#closefile').on('click',function(){
	$('#fileToUpload').val('');
	$('#filename').text('Choose file');
});


    </script>

  </body>
</html>
