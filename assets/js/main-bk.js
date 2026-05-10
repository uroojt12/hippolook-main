$(function() {
    /*_____ Toggle _____*/
    $(document).on('click', '.toggle', function() {
        $('.toggle').toggleClass('active');
        $('nav').toggleClass('move');
        $('body').toggleClass('move');
        $('header').toggleClass('move');
        $('.upperlay').toggleClass('active');
    });
    $(document).on('click', '.upperlay', function() {
        $('.toggle').removeClass('active');
        $('nav').removeClass('move');
        $('body').removeClass('move');
        $('header').removeClass('move');
        $('.upperlay').removeClass('active');
    });


    /*_____ Upload File _____*/

    $(document).on('click', '.uploadAtt', function(){
        $('.chatAtt').trigger('click');
    })
    var imgFile;
    $(document).on('click', '#uploadDp', function(){
        $(this).parents('form').find('#prof_PicUpdate').trigger('click').data('file',$(this).attr('data-image-src'));
        imgFile = $(this);
    });
    $(document).on('click', '.uploadImg', function(){
        $(this).parents('form').find('.uploadFile, .sitterImg').trigger('click').data('file',$(this).attr('data-image-src'));
        // $('#uploadFile').trigger('click');
        imgFile = $(this);
        // $('#uploadFile').data('file',$(this).attr('data-image-src'));
    });
    $(document).on('click', '.uploadmlImg', function(){
        $(this).parents('form').find('#uploadFiles').trigger('click').data('file',$(this).attr('data-image-src'));
        imgFile = $(this);
    });

    $(document).on('change', '.uploadFile', function(){
        // alert(imgFile);
        var file = $(this).val();
        // imgFile.html(file);
        $('.imgSelect').removeClass('hidden').html(file);
    });

    $(document).on('change', '#uploadFiles', function(){
        var file = $(this).val();
        $('.imgSelect').removeClass('hidden').html(file);
    });

    $(document).on('change', '.sitterImg', function(){
        var file = $(this).val();
        imgFile.html(file);
    });

    $(document).on('change', '.multiFiles', function(){
        var file = parseInt(this.files.length);
        file=file>0? file+" file selected" :'Choose Images';
        $(this).prev('span').html(file);
    });
/*
    var imgFile;
    $(document).on('click', '.uploadImg', function() {
        imgFile = $(this).attr('data-image-src');
        $(this).parents('form').find('.uploadFile').trigger('click');
    });
    $(document).on('change', '.uploadFile', function() {
        // alert(imgFile);
        var file = $(this).val();
        $('.uploadImg').html(file);
    });
*/

    /*_____ Drop Down _____*/
    $(document).on('click', '.dropBtn', function(e) {
        e.stopPropagation();
        var $this = $(this).parent().children('.dropCnt');
        $('.dropCnt').not($this).removeClass('active');
        var $parent = $(this).parent('.dropDown');
        $parent.children('.dropCnt').toggleClass('active');
    });
    $(document).on('click', '.dropCnt', function(e) {
        e.stopPropagation();
    });
    $(document).on('click', function() {
        $('.dropCnt').removeClass('active');
    });


    /*_____ Form Button _____*/
    /*$('.nextBtn').click(function() {
        // fieldset
        currStep = $(this).parents('fieldset');
        nextStep = currStep.next('fieldset');
        currStep.hide();
        nextStep.fadeIn();
    });
    $('.prevBtn').click(function() {
        // fieldset
        currStep = $(this).parents('fieldset');
        prevStep = currStep.prev('fieldset');
        currStep.hide();
        prevStep.fadeIn();
    });*/


    /*_____ Popup _____*/
    $(document).on('click', '.popup', function(e) {
        if ($(e.target).closest('.popup ._inner, .popup .inside').length === 0) {
            $('.popup').fadeOut('3000');
            $('body').removeClass('flow');
            $('.popup .videoBlk').html('');
            $('#loadVideo').html('');
        }
    });
    $(document).on('click', '.crosBtn', function() {
        $('.popup').fadeOut();
        $('body').removeClass('flow');
        $('.popup .videoBlk').html('');
        $('#loadVideo').html('');
    });
    $(document).keydown(function(e) {
        if (e.keyCode == 27) $('.crosBtn').click();
    });
    $(document).on('click', '.popBtn', function() {
        var popUp = $(this).data('popup');
        $('body').addClass('flow');
        $('.popup[data-popup= ' + popUp + ']').fadeIn();
    });
    $(document).on('click', '#videos .popBtn[data-popup="videos"]', function() {
        $('#loadVideo').load('watch.php');
    });

    var vid = $('video');
    $(document).on('click', '.play', function() {
        $(this).parents('.vidBlk').children(vid).trigger('play');
        $(this).removeClass('play').addClass('pause');
    });
    $(document).on('click', '.pause', function() {
        $(this).parents('.vidBlk').children(vid).trigger('pause');
        $(this).removeClass('pause').addClass('play');
    });


    /*$(document).on('click', '#payMthd a[data-pay-method]', function() {
        method = $(this).data('pay-method');
        $('#payMthd a[data-pay-method]').removeClass('active');
        $(this).addClass('active');
        $('div[data-pay-method]').hide();
        $('div[data-pay-method=' + method +']').fadeIn();
    });

    $(document).on('click', '#contact a[data-contact]', function() {
        method = $(this).data('contact');
        $('#contact a[data-contact]').removeClass('active');
        $(this).addClass('active');
        $('div[data-contact]').hide();
        $('div[data-contact=' + method +']').fadeIn();
    });*/

    $(".phoneLst > li > input").keyup(function(e){
        // (e.target.value.charAt(e.target.selectionStart - 1).charCodeAt())
        if ((e.keyCode>47 && e.keyCode<58) || (!e.shiftKey && e.keyCode>=95 && e.keyCode<=105))
            $(this).parent().next().children().focus();
        if (e.keyCode===8)
            $(this).parent().prev().children().focus();
    });

    

    $('.switchBtn input').after('<em></em>');

    $(document).on('click', '.pasDv > i.icon-eye', function(){
        $(this).addClass('icon-eye-slash');
        $(this).removeClass('icon-eye');
        $(this).parent().find('.txtBox').attr('type', 'text');
    });
    $(document).on('click', '.pasDv > i.icon-eye-slash', function(){
        $(this).addClass('icon-eye');
        $(this).removeClass('icon-eye-slash');
        $(this).parent().find('.txtBox').attr('type', 'password');
    });

});


$(window).on('load', function() {
    $('img').parent('a').css('display', 'block');
    $('.loader').delay(700).fadeOut();
    $('#pageloader').delay(1200).fadeOut('slow');
    
    
    // f_h = $('footer').height();
    // $('body').css('padding-bottom', f_h);
    // console.log(f_h);

});


// $(window).on('resize', function() {
//     f_h = $('footer').height();
//     $('body').css('padding-bottom', f_h);
//     console.log(f_h);

// });
