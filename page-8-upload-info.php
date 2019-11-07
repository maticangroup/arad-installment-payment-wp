<div class="container page" id="page-upload-info">
    <div class="row ">
        <div class="col-md-12 page-content-no-flx">
            <h1>آپلود فایل ها</h1>
            <p>
                لطفا لیست کالاهایی را که قصد دارید سفارش دهید را به همراه مبلغ کل سفارش، مبلغ پیش پرداخت و تعداد
                اقساط را در این قسمت وارد کنید.
            </p>
            <div class="form-row" data-form="upload-info" data-name="آپلود فایل ها">

                <div class="form-group col-md-4">
                    <form action="post" enctype="multipart/form-data" class="file_upload_one">
                        <label>گواهی کسر از حقوق</label>
                        <input type="file" class="form-control-file" id="upload-file-1" name="pic-one"
                               data-name="گواهی کسر از حقوق" data-required="true">
                        <button class="btn_one btn btn-success mt-3">
                            ارسال مدرک
                        </button>
                    </form>
                </div>


                <div class="form-group col-md-4">
                    <form action="post" enctype="multipart/form-data" class="file_upload_two">
                        <label>فیش حقوقی</label>
                        <input type="file" class="form-control-file" id="upload-file-2" name="pic-two"
                               data-name="فیش حقوقی" data-required="true">
                        <button class="btn btn-success btn_two mt-3">
                            ارسال مدرک
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>