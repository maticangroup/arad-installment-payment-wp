<a href="#" class="calculator-button">
    محاسبه گر اقساط
</a>
<div class="calculator">
    <h3>
        فرم محاسبه اقساط
    </h3>
    <p>
        با این فرم به سادگی میزان مبلغ اقساط خود را محاسبه کنید .
    </p>
    <div class="form-row text-right">
        <div class="form-group col-md-12 col-xs-6">
            <label>مبلغ فاکتور</label>
            <input type="text" class="form-control" data-required="true" id="calc-factor-price"
                   placeholder="مبلغ به تومان">
        </div>
        <div class="form-group col-md-12 col-xs-6">
            <label>پیش پرداخت</label>
            <input disabled="disabled" type="text" class="form-control" data-required="true" id="calc-prepayment"
                   placeholder="به صورت پیش فرض ۲۵ درصد">
            <small class="form-text  text-white" id="calc-prepayment-alert">پیش پرداخت حداقل ۲۵ درصد مبلغ فاکتور می
                باشد.
            </small>
        </div>
        <div class="form-group col-md-6">
            <label>تعداد اقساط</label>
            <select disabled="disabled" class="form-control" id="calc-installment-count">
                <option value="3">۳</option>
                <option value="4">۴</option>
                <option value="5">۵</option>
                <option value="6">۶</option>
                <option value="7">۷</option>
                <option value="8">۸</option>
                <option value="9">۹</option>
                <option value="10">۱۰</option>
                <option value="11">۱۱</option>
                <option value="12">۱۲</option>
                <option value="13">۱۳</option>
                <option value="14">۱۴</option>
                <option value="15">۱۵</option>
                <option value="16">۱۶</option>
                <option value="17">۱۷</option>
                <option value="18">۱۸</option>
                <option value="19">۱۹</option>
                <option value="20">۲۰</option>
                <option value="21">۲۱</option>
                <option value="22">۲۲</option>
                <option value="23">۲۳</option>
                <option value="24">۲۴</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label>فاصله هر پرداخت</label>
            <select disabled="disabled" class="form-control" id="calc-installment-interval">
                <option value="1">۱</option>
            </select>
        </div>
    </div>
    <div class="invoice">
        <div class="invoice-row">
            <div class="key">مبلغ کل</div>
            <div class="value" data-item="totalPrice">-</div>
        </div>
        <div class="invoice-row">
            <div class="key">پیش پرداخت</div>
            <div class="value" data-item="prePayment">-</div>
        </div>
        <div class="invoice-row">
            <div class="key">درصد پیش پرداخت</div>
            <div class="value" data-item="prePaymentPercent">-</div>
        </div>
        <div class="invoice-row">
            <div class="key">وام پرداختی</div>
            <div class="value" data-item="installmentLoan">-</div>
        </div>
        <div class="invoice-row">
            <div class="key">مبلغ هر قسط</div>
            <div class="value" data-item="installmentPayment">-</div>
        </div>
        <div class="invoice-row">
            <div class="key">تعداد ماه</div>
            <div class="value" data-item="monthCount">-</div>
        </div>
        <div class="invoice-row">
            <div class="key">فاصله پرداخت</div>
            <div class="value" data-item="paymentIntervalCount">-</div>
        </div>
        <div class="invoice-row">
            <div class="key">میزان هر پرداخت</div>
            <div class="value" data-item="eachMonthPayment">-</div>
        </div>
        <div class="invoice-row">
            <div class="key">مازاد پرداختی</div>
            <div class="value" data-item="extraPayment">-</div>
        </div>
    </div>
</div>