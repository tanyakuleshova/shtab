function make_pay(){
    if (($("#price").val() == '') || (!/^\d+$/.test($('#price').val()))){ 
        $("#price").css('border-color','red'); 
    } else
        $.get(`/shtab.php-academy.org/join_us/liqpay_form/`, 
        {
            price: $('#price').val(), 
        },
            onAjaxSuccess 
        );

    function onAjaxSuccess(data)
    {
        $("#form_responce").html(data); 
        $("#form_responce form").submit() 
    }
}
