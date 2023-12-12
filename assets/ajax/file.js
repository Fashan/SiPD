function upload_file() {

	var file_data = $('#fileToUpload').prop('files')[0];
	var form_data = new FormData();
	form_data.append("file", file_data);
	form_data.append("user_desa_id", user_desa_id);
	$.ajax({
		url: base_url + 'file/upload',
		type: 'post',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (response) {
			$('div.pesan').html(response.message);
			$('div#modal-upload_file').modal('hide');
			$('#fileToUpload').val('');
			fileTable.ajax.reload(null, false);
		}
	});
}

function delete_file(idx) {
	var id = idx;
	if (confirm('apakah file ingin di hapus?')) {
		$.ajax({
			url: base_url + 'file/delete',
			type: 'post',
			dataType: 'json',
			data: 'id=' + id,
			success: function (response) {
				$('div.pesan').html(response.message);
				if (response.status == 'success') {
					fileTable.ajax.reload(null, false);

				}
			}
		});
	}

}

function download_file(id) {
	link = base_url + 'file/download/' + id;
	location.href = link;
	$.delay(1000);
}
