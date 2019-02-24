$(document).ready(function () {
	$("#contact-form").on("submit", function (e) {
		e.preventDefault();
		if ($("#contact-form [name='subscribe_email']").val() === ''
			&& $("#contact-form [name='subscribe_name']").val() === '') {
			$("#contact-form [name='subscribe_email']").css("border", "1px solid red");
			$("#contact-form [name='subscribe_name']").css("border", "1px solid red");
		}
		else if ($("#contact-form [name='subscribe_name']").val() === '') {
			$("#contact-form [name='subscribe_name']").css("border", "1px solid red");
		}
		else if ($("#contact-form [name='subscribe_email']").val() === '') {
			$("#contact-form [name='subscribe_email']").css("border", "1px solid red");
		}
		else {
			$("#loading-img").css("display", "block");
			var sendData = $(this).serialize();
			$.ajax({

				type: "POST",
				url: "join_us",
				data: sendData,

				success: function (data) {
					$(".response_msg_subscribeForm").html(data);
					$(".response_msg_subscribeForm").slideDown().fadeOut(3000);
					$("#contact-form").find("input[type=text], input[type=email]").val("");
				}

			});
		}
	});

	$("#contact-form input").blur(function () {
		var checkValue = $(this).val();
		if (checkValue != '') {
			$(this).css("border", "1px solid #eeeeee");
		}
	});
});