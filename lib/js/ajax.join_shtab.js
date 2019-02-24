$(document).ready(function () {
	$("#shtabJoinForm").on("submit", function (e) {
		e.preventDefault();
		var isValid = false;
		var joinFormElems = document.querySelectorAll('#shtabJoinForm .joinForm');
		joinFormElems.forEach(function (el) {
			if (el.value === '') {
				el.style.border = '1px solid red';
			} else if (!$("#shtabJoinForm [name='joinForm_Agree']").is(':checked')) {
				$("#shtabJoinForm .checkbox__label").css("color", "red");
			} else {
				isValid = true;
			}
		});

		if(isValid){
			var data = $(this).serialize();
			$.ajax({

				type: "POST",
				url: "join_us",
				data: data,

				success: function (data) {
					$(".response_msg_joinForm").text(data).slideDown().fadeOut(3000);
					$("#shtabJoinForm").find("input[type=text], input[type=email]").val("");
					$("#shtabJoinForm .checkbox .checkbox__input:checked").prop('checked', false);
				}

			});
		}

	});
	$("#shtabJoinForm input").blur(function () {
		var checkValue = $(this).val();
		
		if (checkValue != '') {
			$(this).css("border", "1px solid #eeeeee");
			$("#shtabJoinForm .checkbox__label").css("color", "black");
		}
	});
	
});
	

	
