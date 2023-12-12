function delete_data_wisata(idx) {
	var id = idx;

	if (confirm('apakah data tempat wisata ingin dihapus?')) {
		$.ajax({
			url: base_url + 'tempatwisata/delete_tem_wisata',
			type: 'post',
			data: 'id=' + id,
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					tem_wisataTable.ajax.reload(null, false);
				}
			}

		})
	}


}

function add_tem_wisata() {

	$('#form-add_tem_wisata').on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			url: base_url + 'tempatwisata/add_tem_wisata',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				$('div.pesan').html(response.message);
				$('div#modal-add_tem_wisata').modal('hide');
				$('#form-add_tem_wisata').each(function () {
					this.reset();
				});
				tem_wisataTable.ajax.reload(null, false);
			}
		});
	});
}

function get_data_wisata(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'tempatwisata/get_tem_wisata',
		type: 'post',
		data: 'id=' + id,
		dataType: 'json',
		success: function (response) {
			console.log(response);
			$('#id').val(response.id);
			$('#nama_wisata').val(response.nama_wisata);
			$('#lokasi').val(response.lokasi);
			$('#kota').val(response.kota);
			$('#kecamatan').val(response.kecamatan);
			$('#modal-edit_tem_wisata').modal('show');
		}
	});
}

function edit_tem_wisata() {
	$('#form-edit_tem_wisata').on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			url: base_url + 'tempatwisata/edit_tem_wisata',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				$('div.pesan').html(response.message);
				$('div#modal-edit_tem_wisata').modal('hide');
				tem_wisataTable.ajax.reload(null, false);
			}
		});
	});
}

function pim_tem_wisataTable() {
	$('#pim_wisatatable').DataTable({
		"responsive": true,
		"processing": true,
		"serverSide": true,
		ajax: {
			url: base_url + 'tempatwisata/get_ajax',
			type: 'POST'
		},
		columnDefs: [{
			"targets": 5,
			"sortable": false,
			"visible": false
		}, ]
	});

}
