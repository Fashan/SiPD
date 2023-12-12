function modaluser() {
	$('body').removeClass('offcanvas-menu');
	$('#upgradeuser').modal('show');
}

//form validate upgrade
function formvalidupgrade() {
	$("input").blur(function () {
		if ($(this).hasClass('passupgrade')) {
			if ($(this).val().length === 0) {
				$(this).removeClass('is-valid');
				$(this).addClass('is-invalid');
				$('div.messageup').text('kolom Password wajib diisi');
			} else {
				$(this).removeClass('is-invalid');
				$(this).addClass('is-valid');
			}
		}

	});

}


//ajax upgradeuser
function upgrade() {

	$(".upgrade-form").on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			url: $(this).attr('action'),
			type: 'post',
			dataType: 'json',
			data: $(this).serialize(),
			success: function (response) {
				if (response.status == 'success') {
					alert(response.message.password);
					if (confirm('ingin merefresh halaman?')) {
						location.reload();
					} else {
						$('#upgradeuser').modal('toggle');
					}
				} else {
					if (response.message.password_salah) {
						alert(response.message.password_salah);
					}

					if (response.message.password) {
						$('input.passupgrade').addClass('is-invalid');
						$('div.messageup').text(response.message.password);
					}

				}


			}
		});
	});
}

function deleteuser(idx) {
	var id = idx;

	if (confirm('apakah data user ingin dihapus?')) {
		$.ajax({
			url: base_url + 'user/deleteuser',
			type: 'post',
			data: 'id=' + id,
			dataType: "json",
			success: function (response) {
				if (response.status == 'success') {
					userTable.ajax.reload(null, false);
				}
			}

		})
	}


}

function adduser() {
	$('#form-adduser').on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			url: base_url + 'user/adduser',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				$('div.pesan').html(response.message);
				$('div#modal-adduser').modal('hide');
				$('#form-adduser').each(function () {
					this.reset();
				});
				userTable.ajax.reload(null, false);
			}
		});
	});
}

function getuser(idx) {
	var id = idx;
	$.ajax({
		url: base_url + 'user/getuser',
		type: 'post',
		data: 'id=' + id,
		dataType: 'json',
		success: function (response) {
			$('#username').val(response.username);
			$('#user_id').val(response.user_id);
			$('#email').val(response.email);
			$('#role-menu').val(response.role);
			$('#modal-edituser').modal('show');
		}
	});
}

function edituser() {
	$('#form-edituser').on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			url: base_url + 'user/edituser',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function (response) {
				$('div.pesan').html(response.message);
				$('div#modal-edituser').modal('hide');
				userTable.ajax.reload(null, false);
			}
		});
	});
}

//menampilkan data desa
function get_desa() {
	$.ajax({
		url: base_url + 'auth/get_desa',
		type: 'post',
		dataType: 'json',
		data: $(this).serialize(),
		success: function (desa) {
			var option_desa = '<option value ="">pilih desa...</option>';
			for (let i = 0; i < desa.length; i++) {
				if (desa[i].desa_id == user_desa_id) {
					option_desa += '<option value = "' + desa[i].desa_id + '" selected>' + desa[i].desa_nama + '</option>';
				} else {
					option_desa += '<option value = "' + desa[i].desa_id + '">' + desa[i].desa_nama + '</option>';
				}

			}
			$('select.desa').html(option_desa);
		}
	});
}
