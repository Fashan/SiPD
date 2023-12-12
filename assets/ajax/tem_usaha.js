


function delete_data_usaha(idx){
  var id = idx;

  if (confirm('apakah data tempat usaha ingin dihapus?')) {
         $.ajax({
     url: base_url + 'tempatusaha/delete_tem_usaha',
    type: 'post',
    data: 'id=' + id,
    dataType: "json",
    success: function(response){
      if (response.status == 'success') {
      tem_usahaTable.ajax.reload( null, false ); 
      }
    }

  })
  }


}

function add_tem_usaha(){

  $('#form-add_tem_usaha').on('submit', function(e){
    e.preventDefault();

    $.ajax({
      url: base_url + 'tempatusaha/add_tem_usaha',
      type: 'post',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(response){
       $('div.pesan').html(response.message);
       $('div#modal-add_tem_usaha').modal('hide');
       $('#form-add_tem_usaha').each(function(){
          this.reset();
      });
       tem_usahaTable.ajax.reload( null, false ); 
      }
    });
  });
}

function get_data_usaha(idx){
 var id = idx;
 $.ajax({
  url: base_url + 'tempatusaha/get_tem_usaha',
  type: 'post',
  data: 'id=' + id,
  dataType: 'json',
  success: function(response){
    $('#id').val(response.id);
    $('#nama').val(response.nama);
    $('#tempat').val(response.tempat);
    $('#tanggal_lahir').val(response.tanggal_lahir);
    $('#pekerjaan').val(response.pekerjaan);
    $('#agama').val(response.agama);
     $('#usaha').val(response.usaha);
    $('#alamat').val(response.alamat);
    if (response.jenis_kelamin == 'laki-laki') {
    $('#radio1').attr("checked","");
    }else{
    $('#radio2').attr("checked","");
    }
    $('#modal-edit_tem_usaha').modal('show');
  }
 });
}

function edit_tem_usaha(){
  $('#form-edit_tem_usaha').on('submit', function(e){
    e.preventDefault();

    $.ajax({
      url: base_url + 'tempatusaha/edit_tem_usaha',
      type: 'post',
      data: $(this).serialize(),
      dataType: 'json',
      success: function(response){
       $('div.pesan').html(response.message);
       $('div#modal-edit_tem_usaha').modal('hide');
       tem_usahaTable.ajax.reload( null, false ); 
      }
    });
  });
}


function pim_tem_usahaTable(){
  $('#pim_usahatable').DataTable({
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
                },
                {
                    "targets" : 9,
                    "visible" : false,
                }
                ]
            });
}