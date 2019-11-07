function renderItem($item, $value) {
    $('[data-item=' + $item + ']').html($value);
}

function log($param) {
    console.log($param);
}

function renderResult() {

    //just to disable other items when total price is empty
    let totalPrice = getVal('#calc-factor-price');
    log("Total Price: " + totalPrice);

    let paymentCount = getVal('#calc-installment-count');
    log("Payment count: " + paymentCount);

    let prepayment = getVal('#calc-prepayment');
    log("Prepayment: " + prepayment);

    let paymentIntervalCount = getVal('#calc-installment-interval');
    log("Payment interval count: " + paymentIntervalCount);

    let prepaymentPercent = (prepayment / totalPrice).toFixed(2) * 100;
    log("prePayment percent: " + prepaymentPercent);

    let loan = totalPrice - prepayment;
    log("Loan: " + loan);

    let x = 2 + (paymentCount * 1.8);

    log("(paymentCount * 1.8): " + (paymentCount * 1.8));
    log("X: " + x);

    let basicInterest = (loan * x) / 100;
    log("Basic interest: " + basicInterest);

    let baseInterestRate = 90;
    log("Base interest rate: " + baseInterestRate);

    let finalInterestRate = baseInterestRate;
    log("Final interest rate: " + finalInterestRate);

    // Start New Features
    let chequeCount = Math.ceil(paymentCount / paymentIntervalCount);
    let wage = (totalPrice * 6) / 100;
    let creditWage = 78000;
    let arrivalChequeWage = (chequeCount * 1000);
    let z = (parseFloat(paymentCount) + 1);
    let interestRate = (z * 2.3) / 100;
    let loanInterest = (parseFloat(loan) + parseFloat(wage) + parseFloat(creditWage) + parseFloat(arrivalChequeWage)) * interestRate;
    let totalPayInterest = (parseFloat(wage) + parseFloat(creditWage) + parseFloat(arrivalChequeWage) + parseFloat(loanInterest));
    let totalChequePrice = (parseFloat(loan) + parseFloat(totalPayInterest));
    let perChequePrice = (totalChequePrice / chequeCount);
    // End New Features

    if (paymentCount <= 12) {

        finalInterestRate = finalInterestRate / 1000;

    } else {

        let countDiffer = paymentCount - 12;
        log("Count differ: " + countDiffer);

        let differInterestRate = countDiffer * 5;
        log("Differ interest rate: " + differInterestRate);

        finalInterestRate = (differInterestRate + baseInterestRate) / 1000;
        log("Final interest rate: " + finalInterestRate);

    }

    let zn = (totalPrice) * finalInterestRate;
    log("Zn: " + zn);

    let interest = basicInterest + zn + 50000;
    log("Interest: " + interest);

    let monthlyPayment = (loan + interest) / paymentCount;
    log("Monthly payment: " + monthlyPayment);

    let paymentInterval = monthlyPayment * paymentIntervalCount;
    log("Payment interval: " + paymentInterval);

    renderItem('prePayment', function () {
        return divide_number(prepayment);
    });
    renderItem('prePaymentPercent', function () {
        return prepaymentPercent.toFixed(2);
    });
    renderItem('installmentLoan', function () {
        return divide_number(loan.toString());
    });
    renderItem('installmentPayment', function () {
        return divide_number(parseInt(monthlyPayment).toString());
    });
    renderItem('monthCount', function () {
        return paymentCount;
    });
    renderItem('eachMonthPayment', function () {
        // return divide_number(paymentInterval.toFixed(0).toString());
        return divide_number(perChequePrice.toFixed(0).toString());
    });
    renderItem('paymentIntervalCount', function () {
        return paymentIntervalCount;
    });
    renderItem('extraPayment', function () {
        // return divide_number(interest.toFixed(0).toString());
        return divide_number(totalPayInterest.toFixed(0).toString());
    });
    $('[name="factor-price"]').val(function () {
        return divide_number(totalPrice.toString());
    });
    $('[name="pre-payment-price"]').val(function () {
        return divide_number(prepayment.toString());
    });
    $('[name="installments-count"]').val(function () {
        return divide_number(paymentCount.toString());
    });

}

function calculations() {

    bind_value($('#calc-factor-price'), $('[data-item="totalPrice"]'), function () {
        if ($('#calc-factor-price').val() !== '') {
            $('#calc-prepayment').prop('disabled', false);
            $('#calc-installment-count').prop('disabled', false);
            $('#calc-installment-interval').prop('disabled', false);

        } else {
            $('#calc-prepayment').prop('disabled', true);
            $('#calc-installment-count').prop('disabled', true);
            $('#calc-installment-interval').prop('disabled', true);
        }

        $('#calc-prepayment').val(function () {

            let total_price = getVal("#calc-factor-price");

            let prepayment = total_price * 0.25;

            let prepaymentOutPut = Math.ceil(prepayment);

            return divide_number(prepaymentOutPut.toString());

        });
        renderResult();
        return divide_number(getVal('#calc-factor-price'));

    });
    $('#calc-prepayment').on('input', function () {
        renderResult();
    });
    $('#calc-installment-count').on('change', function () {
        renderResult();
    });
    $('#calc-installment-interval').on('change', function () {
        renderResult();
    });

}

function update_interval($items) {

    let outPut = "";
    $items.forEach(function (k, v) {
        outPut += "<option value='" + k + "'>" + k + "</option>";
    });
    $("#calc-installment-interval").html(outPut);
}

$(document).ready(function () {

    $('[name="factor-price"]').on('input', function () {
        let totalVal = getVal(this);
        $(this).val(function () {
            return divide_number(totalVal.toString());
        });
    });
    $('[name="pre-payment-price"]').on('input', function () {
        let totalVal = getVal(this);
        $(this).val(function () {
            return divide_number(totalVal.toString());
        });
    });
    $('[name="salary"]').on('input', function () {
        let totalVal = getVal(this);
        $(this).val(function () {
            return divide_number(totalVal.toString());
        });
    });


    $('#calc-installment-count').on('change', function () {

        let val = $(this).val();
        // alert(val);
        if (val == 3) {
            // alert("hello");
            update_interval([1, 3]);
        }
        if (val == 4) {
            update_interval([1, 2]);
        }
        if (val == 5) {
            update_interval([1]);
        }
        if (val == 6) {
            update_interval([1, 2, 3]);
        }
        if (val == 7) {
            update_interval([1]);
        }
        if (val == 8) {
            update_interval([1, 2]);
        }
        if (val == 9) {
            update_interval([1, 3]);
        }
        if (val == 10) {
            update_interval([1, 2]);
        }
        if (val == 11) {
            update_interval([1]);
        }
        if (val == 12) {
            // update_interval([1, 2, 3, 6]);
            update_interval([1, 2, 3]);
        }
        if (val == 13) {
            update_interval([1]);
        }
        if (val == 14) {
            update_interval([1, 2]);
        }
        if (val == 15) {
            update_interval([1, 3]);
        }
        if (val == 16) {
            update_interval([1, 2]);
        }
        if (val == 17) {
            update_interval([1]);
        }
        if (val == 18) {
            // update_interval([1, 2, 3, 6]);
            update_interval([1, 2, 3]);
        }
        if (val == 19) {
            update_interval([1]);
        }
        if (val == 20) {
            update_interval([1, 2]);
        }
        if (val == 21) {
            update_interval([1, 3]);
        }
        if (val == 22) {
            update_interval([1, 2]);
        }
        if (val == 23) {
            update_interval([1]);
        }
        if (val == 24) {
            update_interval([1, 2, 3]);
        }

    });
    $('input').on('input', function () {
        if ($(this).val() === ' ') {
            $(this).val('');
        }
    });
    $('#intro-calc-opener').on('click touch', function () {
        $('.calculator-button').trigger('click');
    });
    activate_page();
    refresh_arrows();
    arrows();
    open_calculator();
    arrows_effect();
    submit_info();
    digits_divider();
    calculations();
});

function getVal($input) {
    return $($input).val().replace(/،/g, '');
}

//calculator
$(document).ready(function () {

    $('#calc-prepayment').on('input', function () {
        if ($(this).val() !== '') {
            let totalPayment = getVal("#calc-factor-price");
            // console.log("This val: " + parseInt(getVal(this)));
            // console.log("Total to 25 val: " + Math.ceil(totalPayment * 0.25));

            if ((parseInt(getVal(this)) < Math.ceil(totalPayment * 0.25))
                || (parseInt(getVal(this)) === Math.ceil(totalPayment * 0.25))) {
                $('#calc-prepayment-alert').html('مبلغ پیش پرداخت کمتر از ۲۵ درصد کل شده است.');
                $('#calc-prepayment-alert').addClass('text-muted');
            } else {
                $('#calc-prepayment-alert').html('پیش پرداخت حداقل ۲۵ درصد مبلغ فاکتور می باشد.');
                $('#calc-prepayment-alert').removeClass('text-muted');
            }

            $('#calc-installment-count').prop('disabled', false);
            $('#calc-installment-interval').prop('disabled', false);
        } else {
            $('#calc-installment-count').prop('disabled', true);
            $('#calc-installment-interval').prop('disabled', true);

        }
    });

});

function error_popup($errors) {
    $('.error-messages .error-list').html('');
    $errors.forEach(function (k, v) {
        $('.error-messages .error-list').append('<li>' + k + '</li>');
    });
    $('.error-messages').removeClass('d-none');
    setTimeout(function () {
        $('.error-messages').addClass('d-none');
        $('.error-messages .error-list').html('');
    }, 4000);

}

function current_page() {

    let current_page = $('.page:visible').attr('id');
    return current_page;
}

function open_calculator() {
    $('.calculator-button').on('click touch', function (e) {
        e.preventDefault();
        let windowWidth = $(document).width();
        if (windowWidth < 768) {
            $(this).toggleClass('open',);
            $('.calculator').toggleClass('open',);
        } else {
            $(this).toggleClass('open', 500);
            $('.calculator').toggleClass('open', 500);
        }

    });
}

function arrows_effect() {
    $('.page-arrow').on('mouseover', function () {
        $(this).addClass('hover', 500);
    });
    $('.page-arrow').on('mouseleave', function () {
        $(this).removeClass('hover', 500);
    });
}

function digits_divider() {
    $('input').on('input', function () {
        if ($(this).attr('id') === 'calc-factor-price') {
            let currentVal = $(this).val().replace(/،/g, '');
            $(this).val(divide_number(currentVal));
        }
        if ($(this).attr('id') === 'calc-prepayment') {
            let currentVal = $(this).val().replace(/،/g, '');
            $(this).val(divide_number(currentVal));
        }
    });
}

function activate_page() {
//TODO: this active section should be read from localstorage so when user has reloaded the page the current section would be saved.
    $('.page').first().addClass('page-active');
    // $('#page-upload-info').first().addClass('page-active');
}

function validate_current_form() {

    let form = $('.page [data-form]:visible');
    let required_inputs = [];
    if (true) {
        form.find('input').each(function () {
            if ($(this).data('required') === true) {
                if ($(this).val() === '') {
                    required_inputs.push($(this).data('name') + " الزامی است.");


                } else if ($(this).attr('name') === 'email') {
                    let input_value = $(this).val();
                    if (!(input_value.indexOf('@') > -1)) {
                        required_inputs.push($(this).data('name') + " نادرست وارد شده است.");
                    }
                } else if ($(this).attr('name') === 'birth-day') {
                    if ($(this).val() > 31 || $(this).val() < 1) {
                        required_inputs.push($(this).data('name') + " نادرست وارد شده است.");
                    }
                } else if ($(this).attr('name') === 'birth-year') {
                    if ($(this).val() > 1397 || $(this).val() < 1300) {
                        required_inputs.push($(this).data('name') + " نادرست وارد شده است.");
                    }
                } else if ($(this).attr('name') === 'national-code') {
                    if (!($.isNumeric($(this).val()))) {
                        required_inputs.push($(this).data('name') + " نادرست وارد شده است.");
                    } else if ($(this).val().length > 10 || $(this).val().length < 10) {
                        required_inputs.push($(this).data('name') + " نادرست وارد شده است.");
                    }
                } else if ($(this).attr('name') === 'national-code') {
                    if (!($.isNumeric($(this).val()))) {
                        required_inputs.push($(this).data('name') + " نادرست وارد شده است.");
                    } else if ($(this).val().length > 10 || $(this).val().length < 10) {
                        required_inputs.push($(this).data('name') + " نادرست وارد شده است.");
                    }
                }
            }
        });
    }

    if (required_inputs.length > 0) {
        error_popup(required_inputs);

    } else {
        return true;
    }
}

function refresh_arrows() {


    let active_page = $('.page.page-active');

    $('.page-arrow').show();

    if (active_page.next().next().length === 0) {

        $('.next.page-arrow').hide();

    } else {

        $('.next.page-arrow').show();
    }

    if (active_page.prev().length === 0) {

        $('.prev.page-arrow').hide();
    } else {

        $('.prev.page-arrow').show();
    }
}

function update_arrow_labels() {
    if (current_page() === 'page-intro') {
        $('.page-arrow.next span').html("ورود به سامانه");
    } else if (current_page() === 'page-purchase-info') {
        if (!$('.calculator-button').hasClass('open')) {
            if ($(document).width() < 768) {
                //do nothing
            } else {
                $('.calculator-button').trigger('click');
            }
        }
    } else if (current_page() === 'page-check') {
        $('.page-arrow.next span').html("بله");
    } else {
        $('.page-arrow.next span').html("تایید");
    }
}

function arrows() {
    update_arrow_labels();
    $('.next.page-arrow').on('click touch', function () {

        let active_page = $('.page.page-active');
        if (!active_page.next().hasClass('page-arrows')) {
            if (validate_current_form()) {
                $('.page').removeClass('page-active');
                active_page.next().addClass('page-active');
            }
        } else {
            alert("there is no page");
        }

        update_arrow_labels();
        refresh_arrows();
    });

    $('.prev.page-arrow').on('click touch', function () {

        let active_page = $('.page.page-active');
        if (!active_page.prev().hasClass('page-arrows')) {
            // if (validate_current_form()) {
            $('.page').removeClass('page-active');
            active_page.prev().addClass('page-active');
            // }
        } else {
            alert("there is no page");
        }
        update_arrow_labels();
        refresh_arrows();
    });
}


function bind_value($input = null, $element, $value = null) {
    $input.on('input', function () {
        let input = $input.val();
        if ($value !== null) {
            $element.html($value);
        } else {
            $element.html(input);
        }
    });
}


function submit_info() {
    $('#submit-form').on('click touch', function () {
        let forms = $('[data-form]');
        let server_json = [];
        forms.each(function (k, v) {
            let form_name = $(v).data('name');
            let form_inputs = $(v).find('input, textarea');
            let json_single_item = {'form_name': form_name};

            let input_values_array = [];
            form_inputs.each(function (k, v) {
                let input_name = $(v).data('name');
                let input_value = $(v).val();
                let input_slug = $(v).attr('name');
                let input_pair = [input_name, input_value, input_slug];
                input_values_array.push(input_pair);
            });
            json_single_item.inputs = input_values_array;
            server_json.push(json_single_item);
        });
        // console.log(server_json);

        let data = {};
        data.action = 'payment-form';
        data.inputs = server_json;
        data.session = $session;
        $.ajax({
            data: data,
            type: 'POST',
            url: _info.templateUrl + 'theme/Router.php',
            cache: false,
            success: function (response) {
                $('#submit-form').html(response.message);
                $('#submit-form').prop('disabled', true);
            },
            error: function (e) {

            }
        });
    });
}

function divide_number($rawNumber) {

    let $dividedReversedNumber = [];
    let arrayedNumber = $rawNumber.split('');
    let ReversedArrayNumber = arrayedNumber.reverse();

    for (let $i = 1; $i <= ReversedArrayNumber.length; $i++) {
        $dividedReversedNumber.push(ReversedArrayNumber[$i - 1]);
        if ($i % 3 === 0) {
            $dividedReversedNumber.push('،');
        }
    }
    let correctArray = $dividedReversedNumber.reverse();
    let outPut = correctArray.toString();
    correctArray.forEach(function () {
        outPut = outPut.replace(',', '');
    });

    if (outPut.charAt(0) === '،') {
        outPut = outPut.substr(1);
    }

    return outPut;
}

