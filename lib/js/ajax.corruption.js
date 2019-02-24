$(document).ready(function () {

	$("#shtabCorruptForm").on("submit", function (e) {
		e.preventDefault();
		var file_data = $('#sortpicture').prop('files')[0];
		var data = new FormData();
		data.append('file', file_data);

		var isValid = false;
		var corruptionFormElems = document.querySelectorAll('#shtabCorruptForm .corruptForm');
		corruptionFormElems.forEach(function (el) {
			if (el.value === '') {
				el.style.border = '1px solid red';
			} else if (!$("#shtabCorruptForm [name='shtab_guarantee']").is(':checked')) {
				$("#shtabCorruptForm .checkbox__label").css("color", "red");
			} else {
				isValid = true;
			}
		});

		if (isValid) {
			// var data = $(this).serialize();
			$.ajax({
				type: 'POST',
				data: data,
				cache: false,
				processData: false,
				contentType: false,
				url: "join_us",

				// success: function (data) {
				success: function (respond, textStatus, jqXHR) {
					// Если все ОК
					if (typeof respond.error === 'undefined') {
						alert(respond);
					}
					else {
						console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error);
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.log('ОШИБКИ AJAX запроса: ' + textStatus);
				}

			});


			$(".response_msg_corruptionForm").text(data).slideDown();
			$("#shtabCorruptForm").find("input[type=text], input[type=email]").val("");
			$("#shtabCorruptForm .checkbox .checkbox__input:checked").prop('checked', false);

		}
	});


		$("#shtabCorruptForm input").blur(function () {
			var checkValue = $(this).val();

			if (checkValue != '') {
				$(this).css("border", "1px solid #eeeeee");
				$("#shtabCorruptForm .checkbox__label").css("color", "black");
			}
		});

	});



