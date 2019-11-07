let form_two = $(".file_upload_two");
form_two.submit(function (e) {
    $('.btn_two').html("در حال بارگذاری....");
    e.preventDefault();
    let data = new FormData();
    data.append('action', 'file-two-form');
    if ($('#upload-file-2').length > 0) {
        data.append('file', $('#upload-file-2').prop('files')[0]);
    }
    data.append("session", $session);
    $.ajax({
        dataType: 'json',
        data: data,
        contentType: false,
        processData: false,
        type: 'POST',
        url: _info.templateUrl + 'theme/Router.php',
        cache: false,
        success: function (response) {
            if (response.success == true) {
                $('.btn_two').removeClass('btn-warning');
                $('.btn_two').addClass('btn-success');
                $('.btn_two').html("با موفقیت ارسال شد.");
            } else {
                $('.btn_two').removeClass('btn-success');
                $('.btn_two').addClass('btn-warning');
                $('.btn_two').html(response.message);
            }
        },
        error: function (e) {
            $(".fail").html("Sorry there is something wrong we are working on it :(");
        }
    })
});