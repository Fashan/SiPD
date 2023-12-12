function live_search() {
	$('#search').keyup(function () {
		$.ajax({
			url: base_url + 'post/live_search',
			type: 'get',
			dataType: 'json',
			data: 'search=' + $('#search').val(),
			success: function (post) {

				if (post.length) {
					var listpost = '';
					for (let i = 0; i < post.length; i++) {
						listpost += '<li class="card">';
						if (post[i].post_thumbnail) {
							listpost += ' <a href="' + base_url + 'post/view/' + post[i].post_slug + '">';
							listpost += '<img src="' + base_url + 'assets/images/posts/' + post[i].post_thumbnail + '" alt="">';
							listpost += ' </a>';
						} else {
							listpost += ' <a href="' + base_url + 'post/view/' + post[i].post_slug + '">';
							listpost += '<img src="' + base_url + 'assets/images/posts/' + thumbnail_default + '" alt="">';
							listpost += ' </a>';
						}
						listpost += '<h3><a href="">' + post[i].post_title + '</a></h3>';
						listpost += '<p>' + post[i].post_date + '</p>';
						listpost += ' </li>';
					}
					$('#tampil_post').html(listpost);
					$('#post_kosong').html('');
				} else {

					post_kosong = '<div class="row justify-content-center align-items-center" style="height: 50vh;" id="post_kosong">';
					post_kosong += '<div class="col-md-6 text-center">';
					post_kosong += '<div class="alert alert-warning">Post not found. <br> <a href="' + base_url + '" class="badge bg-danger">Show All</a></div>';
					post_kosong += '</div>';
					post_kosong += '</div>';
					$('#tampil_post').html('');
					$('#post_kosong').html(post_kosong);
				}
			}


		});
	});

}





function get_post() {
	$.ajax({
		url: base_url + 'post/get_post',
		type: 'get',
		dataType: 'json',
		data: '',
		success: function (post) {
			var listpost = '';
			for (let i = 0; i < post.length; i++) {
				listpost += '<li class="card">';
				if (post[i].post_thumbnail) {
					listpost += ' <a href="' + base_url + 'post/view/' + post[i].post_slug + '">';
					listpost += '<img src="' + base_url + 'assets/images/posts/' + post[i].post_thumbnail + '" alt="">';
					listpost += ' </a>';
				} else {
					listpost += ' <a href="' + base_url + 'post/view/' + post[i].post_slug + '">';
					listpost += '<img src="' + base_url + 'assets/images/posts/' + thumbnail_default + '" alt="">';
					listpost += ' </a>';
				}
				listpost += '<h3><a href="">' + post[i].post_title + '</a></h3>';
				listpost += '<p>' + post[i].post_date + '</p>';
				listpost += ' </li>';
			}
			$('#tampil_post').html(listpost);
		}


	});
}


function get_by_category() {

	$('#category').on('change', function () {
		if ($(this).val()) {
			$.ajax({
				url: base_url + 'post/get_by_category',
				type: 'get',
				dataType: 'json',
				data: 'category_id=' + $(this).val(),
				success: function (post) {
					var listpost = '';
					var page_title = '';
					for (let i = 0; i < post.length; i++) {
						listpost += '<li class="card">';
						if (post[i].post_thumbnail) {
							listpost += ' <a href="' + base_url + 'post/view/' + post[i].post_slug + '">';
							listpost += '<img src="' + base_url + 'assets/images/posts/' + post[i].post_thumbnail + '" alt="">';
							listpost += ' </a>';
						} else {
							listpost += ' <a href="' + base_url + 'post/view/' + post[i].post_slug + '">';
							listpost += '<img src="' + base_url + 'assets/images/posts/' + thumbnail_default + '" alt="">';
							listpost += ' </a>';
						}
						listpost += '<h3><a href="">' + post[i].post_title + '</a></h3>';
						listpost += '<p>' + post[i].post_date + '</p>';
						listpost += ' </li>';
					}
					$('#tampil_post').html(listpost);
					$('.page-title').text('Category: ' + post[0].category_name);

				}
			});
		} else {
			get_post();
			$('.page-title').text('All Post');
		}
	});

}

function pagination() {


	$('#pagination').on('click', 'a', function (e) {
		e.preventDefault();
		var pageno = $(this).attr('data-ci-pagination-page');
		loadPagination(pageno);
	});


	loadPagination(0);

	function loadPagination(pagno) {
		$.ajax({
			url: base_url + '/post/loadRecord/' + pagno,
			type: 'get',
			dataType: 'json',
			success: function (response) {
				$('#pagination').html(response.pagination);
				createCard(response.result);
			}
		});
	}
}

function createCard(post) {
	var listpost = '';
	for (let i = 0; i < post.length; i++) {
		listpost += '<li class="card">';
		if (post[i].post_thumbnail) {
			listpost += ' <a href="' + base_url + 'post/view/' + post[i].post_slug + '">';
			listpost += '<img src="' + base_url + 'assets/images/posts/' + post[i].post_thumbnail + '" alt="">';
			listpost += ' </a>';
		} else {
			listpost += ' <a href="' + base_url + 'post/view/' + post[i].post_slug + '">';
			listpost += '<img src="' + base_url + 'assets/images/posts/' + thumbnail_default + '" alt="">';
			listpost += ' </a>';
		}
		listpost += '<h3><a href="">' + post[i].post_title + '</a></h3>';
		listpost += '<p>' + post[i].post_date + '</p>';
		listpost += ' </li>';
	}
	$('#tampil_post').html(listpost);
}


function create_post() {

}
