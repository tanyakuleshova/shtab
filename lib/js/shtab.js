$(function () {
	var s, a, e, o = $(".lang-switcher__selector"),
		t = $(".lang-switcher__languages");
	o.click(function () {
		o.toggleClass("lang-switcher__selector--active"), t.toggleClass("lang-switcher__languages--active")
	}), t.click(function (n) {
		e = $(n.target), e.is("a") && (s = o.text(), a = e.text(), o.text(a), e.text(s), o.removeClass("lang-switcher__selector--active"), t.removeClass("lang-switcher__languages--active"))
	});
	var r = $("#news");
	var d = $("#newsInvestigation");
	d.length > 0 && d.cslide();
	var l = $(".tabs__link");
	l.length > 0 && l.click(function () {
		var s = $(this).attr("data-tab");
		l.removeClass("tabs__link--current"), $(".tabs__item").removeClass("tabs__item--current"), $(this).addClass("tabs__link--current"), $("#" + s).addClass("tabs__item--current")
	}), $(".tab__add-file").length > 0 && $(".tab__add-file").click(function (s) {
		s.preventDefault(), $("#add-file").trigger("click")
	}), $(document).on("click", ".load-more-js:not(.loading)", function () {
		var s = $(this),
			a = s.data("page"),
			e = a + 1,
			o = s.data("url"),
			t = s.data("current"),
			n = s.data("posttype");
		s.addClass("loading").slideUp(320), $.ajax({
			url: o,
			type: "post",
			data: {
				page: a,
				current: t,
				posttype: n,
				action: "shtab_load_more"
			},
			error: function (s) {
				console.log(s)
			},
			success: function (a) {
				s.data("page", e), $(".newsContainer").length > 0 ? $(".newsContainer").append(a) : $(".investigationContainer").length > 0 && $(".investigationContainer").append(a), setTimeout(function () {
					s.removeClass("loading").slideDown(320)
				}, 500)
			}
		})
	}), $(document).on("submit", "#shtabSupportForm", function (s) {
		s.preventDefault();
		var a = $("#shtabSupportForm");
		a.find(".js-show-feedback").removeClass("js-show-feedback");
		var e = a.find("#shtabSum").val(),
			o = a.find("#shtabName").val(),
			t = a.find("#shtabEmail").val(),
			n = a.data("url");
		return "" === e && "" === o && "" === t ? (a.find("#shtabSum").addClass("has-error"), a.find("#shtabName").addClass("has-error"), a.find("#shtabEmail").addClass("has-error"), void a.find(".js-form-error").addClass("js-show-feedback")) : (a.find("#shtabSum").removeClass("has-error"), a.find("#shtabName").removeClass("has-error"), a.find("#shtabEmail").removeClass("has-error"), a.find(".js-form-error").removeClass("js-show-feedback"), a.find("input, button").attr("disabled", "disabled"), a.find(".js-form-submission").addClass("js-show-feedback"), void $.ajax({
			url: n,
			type: "post",
			data: {
				sum: e,
				name: o,
				email: t,
				action: "shtab_save_support_form"
			},
			error: function (s) {
				console.log("Error with: Support form submission. ", s), a.find(".js-form-submission").removeClass("js-show-feedback"), a.find(".js-form-error").addClass("js-show-feedback"), a.find("input, button").removeAttr("disabled")
			},
			success: function (s) {
				0 == s ? (console.log("Unable to save your message. Please try again later."), a.find(".js-form-submission").removeClass("js-show-feedback"), a.find(".js-form-error").addClass("js-show-feedback"), a.find("input, button").removeAttr("disabled")) : (console.log("Message saved, id = ", s), a.find(".js-form-submission").removeClass("js-show-feedback"), a.find(".js-form-success").addClass("js-show-feedback"), a.find("input, button").removeAttr("disabled"), a.find("input").val(""))
			}
		}))
	// }), $(document).on("submit", "#shtabJoinForm", function (s) {
	// 	s.preventDefault();
	// 	var a = $("#shtabJoinForm");
	// 	a.find(".js-show-feedback").removeClass("js-show-feedback");
	// 	var e = a.find("#shtabName").val(),
	// 		o = a.find("#shtabRegion").val(),
	// 		t = a.find("#shtabPhone").val(),
	// 		n = a.find("input[name=shtab_rbHelpType]:checked").val(),
	// 		i = a.find("#shtabEmail").val(),
	// 		r = a.find("#shtabSocial").val(),
	// 		d = a.find("#shtabMisc").val(),
	// 		l = a.find("#shtabChkAgree").val(),
	// 		f = a.data("url");
	// 	a.find("input, button, radio").attr("disabled", "disabled"), a.find(".js-form-submission").addClass("js-show-feedback"), $.ajax({
	// 		url: f,
	// 		type: "post",
	// 		data: {
	// 			name: e,
	// 			region: o,
	// 			phone: t,
	// 			helpType: n,
	// 			email: i,
	// 			social: r,
	// 			misc: d,
	// 			agree: l,
	// 			action: "shtab_save_join_form"
	// 		},
	// 		error: function (s) {
	// 			console.log("Error with: Support form submission. ", s), a.find(".js-form-submission").removeClass("js-show-feedback"), a.find(".js-form-error").addClass("js-show-feedback"), a.find("input, button, radio").removeAttr("disabled")
	// 		},
	// 		success: function (s) {
	// 			0 == s ? (console.log("Unable to save your message. Please try again later."), a.find(".js-form-submission").removeClass("js-show-feedback"), a.find(".js-form-error").addClass("js-show-feedback"), a.find("input, button, radio").removeAttr("disabled")) : (console.log("Message saved, id = ", s), a.find(".js-form-submission").removeClass("js-show-feedback"), a.find(".js-form-success").addClass("js-show-feedback"), a.find("input, button, radio").removeAttr("disabled"), a.find("input").val(""))
	// 		}
	// 	})
	}), 
	// $(document).on("submit", "#shtabCorruptForm", function (s) {
	// 	s.preventDefault();
	// 	var a = $("#shtabCorruptForm");
	// 	a.find(".js-show-feedback").removeClass("js-show-feedback");
	// 	var e = a.find("#shtabName").val(),
	// 		o = a.find("#shtabRegion").val(),
	// 		t = a.find("#shtabPhone").val(),
	// 		n = a.find("#shtabSituation").val(),
	// 		i = a.find("#shtabEmail").val(),
	// 		arguments = a.find("#shtabArguments").val(),
	// 		r = a.find("#shtabCorruptName").val(),
	// 		d = a.find("#chkGuarantee").val(),
	// 		l = a.data("url");
	// 	a.find("input, button, checkbox").attr("disabled", "disabled"), a.find(".js-form-submission").addClass("js-show-feedback"), $.ajax({
	// 		url: l,
	// 		type: "post",
	// 		data: {
	// 			name: e,
	// 			region: o,
	// 			phone: t,
	// 			situation: n,
	// 			email: i,
	// 			arguments: arguments,
	// 			corruptName: r,
	// 			guarantee: d,
	// 			action: "shtab_save_corrupt_form"
	// 		},
	// 		error: function (s) {
	// 			console.log("Error with: Support form submission. ", s), a.find(".js-form-submission").removeClass("js-show-feedback"), a.find(".js-form-error").addClass("js-show-feedback"), a.find("input, button, checkbox").removeAttr("disabled")
	// 		},
	// 		success: function (s) {
	// 			0 == s ? (console.log("Unable to save your message. Please try again later."), a.find(".js-form-submission").removeClass("js-show-feedback"), a.find(".js-form-error").addClass("js-show-feedback"), a.find("input, button, checkbox").removeAttr("disabled")) : (console.log("Message saved, id = ", s), a.find(".js-form-submission").removeClass("js-show-feedback"), a.find(".js-form-success").addClass("js-show-feedback"), a.find("input, button, checkbox").removeAttr("disabled"), a.find("input").val(""))
	// 		}
	// 	})
	// }),
		searchButton=$(".btn-search"),
		searchBox=$(".search-box"),
		header = $(".header")
		searchButton.click(function(){searchBox.toggleClass("search-box--is-shown"), header.toggleClass("overflow-visible"),
		$(this).toggleClass("btn-search--is-close")});
});
