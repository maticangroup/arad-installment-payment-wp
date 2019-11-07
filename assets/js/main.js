let form = $(".file_upload_one");
form.submit(function (e) {
    $('.btn_one').html("در حال بارگذاری....");
    e.preventDefault();
    let data = new FormData();
    data.append('action', 'file-one-form');
    if ($('#upload-file-1').length > 0) {
        data.append('file', $('#upload-file-1').prop('files')[0]);
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
                $('.btn_one').removeClass('btn-warning');
                $('.btn_one').addClass('btn-success');
                $('.btn_one').html("با موفقیت ارسال شد.");
            } else {
                $('.btn_one').removeClass('btn-success');
                $('.btn_one').addClass('btn-warning');
                $('.btn_one').html(response.message);
            }
        },
        error: function (e) {
            $(".fail").html("Sorry there is something wrong we are working on it :(");
        }
    })
});