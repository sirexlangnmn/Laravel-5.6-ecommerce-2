
//  From L5.5 and Ajax Tutorial - Advanced CRUD example Search, Sort, Paginate
//  I decide to make a separated js file 
//	because the search field in the FrontPostController and JavascriptOneController
//	are connected in this JS tutorial.




$(document).on('click', 'a.page-link', function (event) {
	event.preventDefault();
	ajaxLoad($(this).attr('href'));
});



// ------------------------------------- 
//  related to create|store|edit|update 
// -------------------------------------
$(document).on('submit', 'form#frm', function (event) {
	event.preventDefault();
	var form = $(this);
	var data = new FormData($(this)[0]);
	var url = form.attr("action");

	$.ajax({
		type: form.attr('method'),
		url: url,
		data: data,
		cache: false,
		contentType: false,
		processData: false,

		success: function (data) {
			$('.is-invalid').removeClass('is-invalid');

			if (data.fail) {
				for (control in data.errors) {
					$('#' + control).addClass('is-invalid');
					$('#error-' + control).html(data.errors[control]);
				}
			} else {
				ajaxLoad(data.redirect_url);
			}
		},

		error: function (xhr, textStatus, errorThrown) {
			alert("Error: " + errorThrown);
		}
	});
	return false;
});


// ------------------------ 
//  related to search 
// ------------------------
function ajaxLoad(filename, content) {
	content = typeof content !== 'undefined' ? content : 'content';
	$('.loading').show();

	$.ajax({
		type: "GET",
		url: filename,
		contentType: false,

		success: function (data) {
			$("#" + content).html(data);
			$('.loading').hide();
		},

		error: function (xhr, status, error) {
			alert(xhr.responseText);
		}
	});
}




function ajaxDelete(filename, token, content) {
	content = typeof content !== 'undefined' ? content : 'content';
	$('.loading').show();

	$.ajax({
		type: 'POST',
		data: { _method: 'DELETE', _token: token },
		url: filename,

		success: function (data) {
			$("#" + content).html(data);
			$('.loading').hide();
		},
		error: function (xhr, status, error) {
			alert(xhr.responseText);
		}
	});
}
