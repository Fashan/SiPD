function delete_penduduk(idx) {
	var id = idx;

	if (confirm('apakah data penduduk ingin dihapus?')) {
		$.ajax({
			url: base_url + 'penduduk/delete_penduduk',
			type: 'post',
			data: 'id=' + id,
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					pendudukTable.ajax.reload(null, false);
				}
			}

		})
	}


}

function add_penduduk() {

	$('#form-addpenduduk').on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			url: base_url + 'penduduk/add_penduduk',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				$('div.pesan').html(response.message);
				$('div#modal-addpenduduk').modal('hide');
				$('#form-addpenduduk').each(function () {
					this.reset();
				});
				pendudukTable.ajax.reload(null, false);
			}
		});
	});
}

function get_penduduk(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'penduduk/get_penduduk',
		type: 'post',
		data: 'id=' + id,
		dataType: 'json',
		success: function (response) {
			$('#id').val(response.id);
			$('#nomor_kk').val(response.nomor_kk);
			$('#nik').val(response.nik);
			$('#nama').val(response.nama);
			$('#tempat').val(response.tempat);
			$('#tanggal_lahir').val(response.tanggal_lahir);
			$('#alamat').val(response.alamat);
			$('#kewarganegaraan').val(response.kewarganegaraan);
			$('#status_perkawinan').val(response.status_perkawinan);
			$('#agama').val(response.agama);
			$('#golongan_darah').val(response.golongan_darah);
			$('#pendidikan_terakhir').val(response.pendidikan_terakhir);
			$('#pekerjaan').val(response.pekerjaan);
			$('#Kebutuhan_khusus').val(response.kebutuhan_khusus);
			$('#nama_ayah').val(response.nama_ayah);
			$('#nama_ibu').val(response.nama_ibu);
			if (response.jenis_kelamin == 'laki-laki') {
				$('#radio1').attr("checked", "");
			} else {
				$('#radio2').attr("checked", "");
			}
			$('#modal-editpenduduk').modal('show');
		}
	});
}

function edit_penduduk() {
	$('#form-editpenduduk').on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			url: base_url + 'penduduk/edit_penduduk',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				$('div.pesan').html(response.message);
				$('div#modal-editpenduduk').modal('hide');
				pendudukTable.ajax.reload(null, false);
			}
		});
	});
}

function pim_pendudukTable() {
	$('#pim_penduduktable').DataTable({
		"responsive": true,
		"processing": true,
		"serverSide": true,
		ajax: {
			url: base_url + 'penduduk/get_ajax',
			type: 'POST'
		},
		columnDefs: [

			{
				"targets": 4,
				"sortable": false,
			},
			{
				"targets": 5,
				"sortable": false,
			},
			{
				"targets": 6,
				"sortable": false,
			},

			{
				"targets": 17,
				"sortable": false,
				"visible": false
			}
		]
	});
}
