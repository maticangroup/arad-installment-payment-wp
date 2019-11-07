<div class="container page" id="page-personal-info">
    <div class="row ">
        <div class="col-md-12 page-content-no-flx">
            <h1>اطلاعات شخصی</h1>
            <p>
                لطفا اطلاعات شخصی خود را در این قسمت وارد کنید.
            </p>
            <div class="form-row " data-form="personal-info" data-name="اطلاعات شخصی">
                <div class="form-group col-md-2">
                    <label>نام</label>
                    <input type="text" class="form-control" data-name="نام" data-required="true" name="name"
                           autofocus>
                </div>
                <div class="form-group col-md-2">
                    <label>نام خانوادگی</label>
                    <input type="text" class="form-control" data-name="نام خانوادگی" data-required="true"
                           name="family">
                </div>
                <div class="form-group col-md-2">
                    <label>نام پدر</label>
                    <input type="text" class="form-control" data-name="نام پدر" name="father-name" data-required="true">
                </div>
                <div class="form-group col-md-2">
                    <label>سال تولد</label>
                    <input type="number" class="form-control" data-name="سال تولد" name="birth-year"
                           data-required="true" placeholder="۱۳۶۴">
                </div>
                <div class="form-group col-md-2">
                    <label>ماه تولد</label>
                    <select class="form-control" data-name="ماه تولد" name="birth-month">
                        <option value="فروردین">فروردین</option>
                        <option value="اردیبهشت">اردیبهشت</option>
                        <option value="خرداد">خرداد</option>
                        <option value="تیر">تیر</option>
                        <option value="مرداد">مرداد</option>
                        <option value="شهریور">شهریور</option>
                        <option value="مهر">مهر</option>
                        <option value="آبان">آبان</option>
                        <option value="آذر">آذر</option>
                        <option value="دی">دی</option>
                        <option value="بهمن">بهمن</option>
                        <option value="اسفند">اسفند</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>روز تولد</label>
                    <input type="number" class="form-control" data-name="روز تولد" name="birth-day"
                           data-required="true" placeholder="۲۵">
                </div>
                <div class="form-group col-md-2">
                    <label>جنسیت</label>
                    <select class="form-control" data-name="جنسیت" name="gender" data-required="true">
                        <option value="مرد">مرد</option>
                        <option value="زن">زن</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>وضعیت تاهل</label>
                    <select class="form-control" data-name="وضعیت تاهل" name="marital-status">
                        <option value="مجرد">مجرد</option>
                        <option value="متاهل">متاهل</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>کد ملی</label>
                    <input type="text" class="form-control" name="national-code" data-name="کد ملی"
                           data-required="true">
                </div>
                <div class="form-group col-md-2">
                    <label>شماره شناسنامه</label>
                    <input type="text" class="form-control" name="identity-code" data-name="شماره شناسنامه"
                           data-required="true">
                </div>
                <div class="form-group col-md-4">
                    <label>ایمیل</label>
                    <input pattern="[^ @]*@[^ @]*" type="text" class="form-control" name="email" data-name="ایمیل" data-required="true">
                </div>
            </div>
        </div>
    </div>
</div>