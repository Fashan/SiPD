function bg() {
	$.ajax({
		url: base_url + '/configuration/get_data',
		type: 'post',
		dataType: 'json',
		success: function (response) {
			$('.bg').css("background-image", "url(" + base_url + "assets/images/bg_img/" + response.background.bg + ")");
			$('.bg_font').css("color", response.background.color);
		}
	});
}

function bg1() {
	$.ajax({
		url: base_url + '/configuration/change_background',
		type: 'post',
		data: 'bg=floor-tile.png&color=black',
		dataType: 'json',
		success: function (response) {
			bg();
		}
	});


}

function bg2() {
	$.ajax({
		url: base_url + '/configuration/change_background',
		type: 'post',
		data: 'bg=full-bloom.png&color=black',
		dataType: 'json',
		success: function (response) {
			bg();
		}
	});


}

function bg3() {
	$.ajax({
		url: base_url + '/configuration/change_background',
		type: 'post',
		data: 'bg=morocco-blue.png&color=black',
		dataType: 'json',
		success: function (response) {
			bg();
		}
	});

}

function bg4() {
	$.ajax({
		url: base_url + '/configuration/change_background',
		type: 'post',
		data: 'bg=morocco.png&color=black',
		dataType: 'json',
		success: function (response) {
			bg();
		}
	});

}

function bg5() {
	$.ajax({
		url: base_url + '/configuration/change_background',
		type: 'post',
		data: 'bg=oriental-tiles.png&color=white',
		dataType: 'json',
		success: function (response) {
			bg();
		}
	});

}

function bg6() {
	$.ajax({
		url: base_url + '/configuration/change_background',
		type: 'post',
		data: 'bg=sakura.png&color=black',
		dataType: 'json',
		success: function (response) {
			bg();
		}
	});

}

function bg7() {
	$.ajax({
		url: base_url + '/configuration/change_background',
		type: 'post',
		data: 'bg=wheat.png&color=white',
		dataType: 'json',
		success: function (response) {
			bg();
		}
	});

}

function get_setting() {
	$.ajax({
		url: base_url + '/configuration/get_data',
		type: 'post',
		dataType: 'json',
		success: function (response) {
			$('input.title_setting').val(response.title_hero);
			$('input.email_setting').val(response.email_public);
			$('input.wa_setting').val(response.wa);
			$('input.fb_setting').val(response.link_fb);
			$('input.ig_setting').val(response.link_ig);
			$('input.twiter_setting').val(response.link_twiter);
			$('.nama_gambar').text(response.gambar_hero);
			$('img.gambar_hero').attr("src",""+base_url+"assets/images/hero_img/"+response.gambar_hero+"");
		}
	});

}

function public_setting() {
	$('input.title_setting').keyup(function () {
		$.ajax({
			url: base_url + '/configuration/title_public',
			type: 'post',
			data: 'title_hero=' + $('input.title_setting').val(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
			}
		});
	});
	$('input.email_setting').keyup(function () {
		$.ajax({
			url: base_url + '/configuration/email_public',
			type: 'post',
			data: 'email=' + $('input.email_setting').val(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
			}
		});
	});

	$('input.wa_setting').keyup(function () {
		$.ajax({
			url: base_url + '/configuration/wa_public',
			type: 'post',
			data: 'wa=' + $('input.wa_setting').val(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
			}
		});
	});

	$('input.fb_setting').keyup(function () {
		$.ajax({
			url: base_url + '/configuration/fb_public',
			type: 'post',
			data: 'fb=' + $('input.fb_setting').val(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
			}
		});
	});

	$('input.ig_setting').keyup(function () {
		$.ajax({
			url: base_url + '/configuration/ig_public',
			type: 'post',
			data: 'ig=' + $('input.ig_setting').val(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
			}
		});
	});

	$('input.twiter_setting').keyup(function () {
		$.ajax({
			url: base_url + '/configuration/twiter_public',
			type: 'post',
			data: 'twiter=' + $('input.twiter_setting').val(),
			dataType: 'json',
			success: function (response) {
				console.log(response);
			}
		});
	});

	$('input#uploadhero').change(function () {
	var file_data = $('#uploadhero').prop('files')[0];
	var form_data = new FormData();
	form_data.append("gambar_hero", file_data);
	$.ajax({
		url: base_url + 'configuration/ubah_hero',
		type: 'post',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		success: function (response) {
			$('.nama_gambar').text(response);
			$('img.gambar_hero').attr("src",""+base_url+"assets/images/hero_img/"+response+"");
		}
	});
	});
}

function terapkan_setting() {
	$.ajax({
		url: base_url + '/auth/get_data',
		type: 'post',
		dataType: 'json',
		success: function (response) {
			$('.show_title').text(response.title_hero);
			$('.show_email').text(response.email_public);
			$('.show_wa').text(response.wa);
			$(".show_ig").attr("href", response.link_ig)
			$('.show_twiter').attr("href", response.link_twiter)
			$('.show_fb').attr("href", response.link_fb)
			$('.hero').css("background-image", "url(" + base_url + "assets/images/hero_img/" + response.gambar_hero+ ")");
		}
	});
}

