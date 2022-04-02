//reload image captch in contact-us page
$('#reload').click(function () {
    $.ajax({
        type: 'GET',
        url: 'reload-captcha',
        success: function (data) {
            $(".captcha span").html(data.captcha);
        }
   });
});





