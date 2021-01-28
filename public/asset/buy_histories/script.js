$( document ).ready(function() {
    console.log( "ready!" );

    anElement = new AutoNumeric('.autonumberic');

    function func_self_total(self_amount, self_price) {
        return self_amount * self_price;
    }

    function func_set_ele_value(selector, value) {
        $(selector).val(value);

        return true;
    }

    function func_set_ele_html(selector, value) {
        console.log(value);
        $(selector).html(value);

        return true;
    }


    $(document).on('keyup', 'input[name="self_amount"]', function () {
        let self_amount = $(this).val();
        let self_price = $('input[name="self_price"]').val();

        let self_total = func_self_total(self_amount, self_price);
        func_set_ele_html('.self_total', self_total);
    });

    $(document).on('keyup', 'input[name="self_price"]', function () {
        let self_price = $(this).val();
        let self_amount = $('input[name="self_amount"]').val();

        let self_total = func_self_total(self_amount, self_price);
        func_set_ele_html('.self_total', self_total);
    });

});