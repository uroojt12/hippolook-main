$(function() {
	/*_____ Toggle _____*/
	$(document).on("click", ".toggle, .upperlay", function() {
		$(".toggle").toggleClass("active");
		// $("body").toggleClass("move");
		$("body").toggleClass("flow");
		$("nav").toggleClass("active");
		$(".upperlay").toggleClass("active");
		$("nav > ul > li > .sub").slideUp();
	});
	$(document).on("click", "header.logged .toggle", function() {
		$(".toggle").toggleClass("active");
		$("body").toggleClass("move");
	});
	w = $(window).width();
	if (w <= 991) {
		$(document).on("click", "nav > ul > li.drop > a", function(e) {
			e.preventDefault();
			$(".sub")
				.not(
					$(this)
						.parent()
						.children(".sub")
						.slideToggle()
				)
				.slideUp();
		});
	}
	$(window).on("resize", function() {
		$("nav > ul > li > .sub").removeAttr("style");
	});

	$(document).on("click", ".popBtn[data-store]", function() {
		var vcode = $(this).data("store");
		$("#vidBlk").html('<iframe src="https://www.youtube.com/embed/' + vcode + '?autoplay=1&loop=1&rel=0&wmode=transparent&modestbranding=1" allow="autoplay;" frameborder="0" wmode="Opaque"></iframe>');
	});
	$(document).on("click", ".popBtn[data-video]", function() {
		var vcode = $(this).data("video");
		$("#vidBlk").html('<video controls="" autoplay="" playsinline><source src="' + vcode + '" type="video/mp4"></video>');
	});

	/*_____ Drop Down _____*/
	$(document).on("click", ".dropBtn", function(e) {
		e.stopPropagation();
		if (
			$(this)
				.parents(".dropCnt:first")
				.hasClass("active")
		)
			$(this)
				.parents(".dropCnt:first")
				.find(".dropCnt:first")
				.addClass("active");
		else {
			$(".dropCnt")
				.not(
					$(this)
						.parent()
						.children(".dropCnt")
				)
				.removeClass("active");
			$(this)
				.parents(".dropDown:first")
				.find(".dropCnt:first")
				.toggleClass("active");
		}
	});
	$(document).on("click", ".dropCnt", function(e) {
		e.stopPropagation();
	});
	$(document).on("click", function() {
		$(".dropCnt").removeClass("active");
	});

	/*_____ Popup _____*/
	$(document).on("click", ".popup", function(e) {
		if ($(e.target).closest(".popup ._inner, .popup .inside").length === 0) {
			$(".popup").fadeOut("3000");
			$("body").removeClass("flow");
			$("#vidBlk").html("");
		}
	});
	$(document).on("click", ".crosBtn", function() {
		$(".popup").fadeOut();
		$("body").removeClass("flow");
		$("#vidBlk").html("");
	});
	$(document).keydown(function(e) {
		if (e.keyCode == 27) $(".popup .crosBtn").click();
	});
	
	$(document).on("click", ".popBtn", function() {
		let popUp = $(this).data("popup");
		// console.log(popUp);
		$("body").addClass("flow");
		$(`.popup[data-popup="${popUp}"]`).fadeIn();
	});

	$(document).on("click", ".popBtn[data-store]", function() {
		var vcode = $(this).data("store");
		$("#vidBlk").html(
			'<iframe src="https://www.youtube.com/embed/' +
				vcode +
				'?autoplay=1&loop=1&rel=0&wmode=transparent&modestbranding=1" allow="autoplay;" frameborder="0" wmode="Opaque"></iframe>'
		);
	});

	/*_____ Form Button _____*/
	// $(".nextBtn").click(function() {
	// 	// fieldset
	// 	currStep = $(this).parents("fieldset");
	// 	nextStep = currStep.next("fieldset");
	// 	currStep.hide();
	// 	nextStep.fadeIn();
	// });
	// $(".prevBtn").click(function() {
	// 	// fieldset
	// 	currStep = $(this).parents("fieldset");
	// 	prevStep = currStep.prev("fieldset");
	// 	currStep.hide();
	// 	prevStep.fadeIn();
	// });

	/*_____ FAQ's _____*/
	$(document).on("click", ".faqBlk > h5", function() {
		$(".faqBlk")
			.not(
				$(this)
					.parent()
					.toggleClass("active")
			)
			.removeClass("active");
		$(".faqBlk > .txt")
			.not(
				$(this)
					.parent()
					.children(".txt")
					.slideToggle()
			)
			.slideUp();
	});
	$(".faqLst > .faqBlk:nth-child(1)").addClass("active");

	$(document).on("click", ".txtGrp.pasDv > i.icon-eye", function() {
		$(this).addClass("icon-eye-slash");
		$(this).removeClass("icon-eye");
		$(this)
			.parent()
			.find(".txtBox")
			.attr("type", "text");
	});
	$(document).on("click", ".txtGrp.pasDv > i.icon-eye-slash", function() {
		$(this).addClass("icon-eye");
		$(this).removeClass("icon-eye-slash");
		$(this)
			.parent()
			.find(".txtBox")
			.attr("type", "password");
	});

	/*_____ Upload File _____*/
	var fileType;
	$(document).on("click", ".uploadImg", function() {
		fileType = $(this).data("type");
		$(this)
			.parents("form")
			.find(".uploadFile, .uploadFile1").data('file', fileType)
			.trigger("click");
	});
	$(document).on("change", ".uploadFile, .uploadFile1", function() {
		// alert(imgFile);
		var file = $(this).val();
		let cnfrmPrcrptnField = $(`.uploadImg[data-type="${fileType}"]`).parents('fieldset:first').next('fieldset').find('.cnfrmPrcrptn');

		!empty(file) ? cnfrmPrcrptnField.removeClass('hidden') : cnfrmPrcrptnField.addClass('hidden');
		
		$(`.uploadImg[data-type="${fileType}"]`).html(file);
	});

	$(document).on("focus", ".txtGrp .txtBox:not(select):not(.uploadImg)", function() {
		$(this)
			.parents(".txtGrp:first")
			.find("label:first")
			.addClass("move");
	});

	$(".txtGrp .txtBox:not(select):not(.uploadImg)").each(function(e) {
		if ($(this).val() != "")
			$(this)
				.parents(".txtGrp:first")
				.find("label:first")
				.addClass("move");
	});

	$(document).on("blur", ".txtGrp .txtBox:not(select):not(.uploadImg)", function() {
		if (this.value == "")
			$(this)
				.parents(".txtGrp:first")
				.find("label:first")
				.removeClass("move");
	});
	$(document).on("click", "header .icoBtn > li > button", function() {
		$(this)
			.next(".sub")
			.slideToggle();
	});
	$(document).on("click", "#srchBtn > button", function() {
		$("header .srchBar").toggleClass("active");
	});
	$("main input:not([type='file']):first").focus();
});

$(window).on("load", function() {
	$("img")
		.parent("a:not(.webBtn)")
		.css("display", "block");
	$(".loader")
		.delay(700)
		.fadeOut();
	$("#pageloader")
		.delay(1200)
		.fadeOut("slow");
});
