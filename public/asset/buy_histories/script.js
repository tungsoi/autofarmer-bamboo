$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // const element
    const SELF_AMOUNT = 'input[name="self_amount"]';
    const SELF_PRICE = 'input[name="self_price"]';
    const SELF_TOTAL = 'input[name="self_total"]';
    
    const SPONSOR_AMOUNT = 'input[name="sponsor_amount"]';
    const SPONSOR_PRICE = 'input[name="sponsor_price"]';
    const SPONSOR_TOTAL = 'input[name="sponsor_total"]';
    
    const SIM_AMOUNT = 'input[name="sim_amount"]';
    const SIM_PRICE = 'input[name="sim_price"]';
    const SIM_TOTAL = 'input[name="sim_total"]';

    const CLONE_AMOUNT = 'input[name="clone_amount"]';
    const CLONE_PRICE = 'input[name="clone_price"]';
    const CLONE_TOTAL = 'input[name="clone_total"]';

    const TOTAL_MONEY = 'input[name="total_money"]';
    const INPUT_TEXT = 'input[type="text"]';

    const BTN_EDIT = '.btn-edit-history';
    const BTN_DELETE = '.btn-delete-history';

    function handle_amount(x, y, z) {
        formatCurrency(x);
        let rowKey = get_row_key(x);

        func_handle_action_input(
            x.val(), 
            $('tr[data-key="'+rowKey+'"] '+y+'').val(), 
            $('tr[data-key="'+rowKey+'"] '+z+'')
        );
        func_cal_total_money(rowKey);
        
        $.ajax({
            url: '/admin/buy_histories/updateReq',
            type: 'POST',
            data: $("tr[data-key="+rowKey+"]").children('form').serialize(),
            success: function (data) {
                console.log('updated');
            },
            error: function (e) {
                alert('error');
            }
        });
    }
    $(document).on('click', INPUT_TEXT, function () {
        $(INPUT_TEXT).css('background', "white");
        $(SELF_TOTAL).css('background', "#eee");
        $(SPONSOR_TOTAL).css('background', "#eee");
        $(SIM_TOTAL).css('background', "#eee");
        $(CLONE_TOTAL).css('background', "#eee");
        $(TOTAL_MONEY).css('background', "#eee");
        $(this).css('background', "wheat");
    });

    // self action
    $(document).on('keyup', SELF_AMOUNT, function () {
        handle_amount($(this), SELF_PRICE, SELF_TOTAL);
    });

    $(document).on('keyup', SELF_PRICE, function () {
        handle_amount($(this), SELF_AMOUNT, SELF_TOTAL);
    });

    // sponsor action
    $(document).on('keyup', SPONSOR_AMOUNT, function () {
        handle_amount($(this), SPONSOR_PRICE, SPONSOR_TOTAL);
    });

    $(document).on('keyup', SPONSOR_PRICE, function () {
        handle_amount($(this), SPONSOR_AMOUNT, SPONSOR_TOTAL);
    });

    // sim action
    $(document).on('keyup', SIM_AMOUNT, function () {
        handle_amount($(this), SIM_PRICE, SIM_TOTAL);
    });

    $(document).on('keyup', SIM_PRICE, function () {
        handle_amount($(this), SIM_AMOUNT, SIM_TOTAL);
    });

    // clone action
    $(document).on('keyup', CLONE_AMOUNT, function () {
        handle_amount($(this), CLONE_PRICE, CLONE_TOTAL);
    });

    $(document).on('keyup', CLONE_PRICE, function () {
        handle_amount($(this), CLONE_AMOUNT, CLONE_TOTAL);
    });

    // Common support
    function get_row_key(el) {
        return el.closest('tr').data('key');
    }
    function func_handle_action_input(x, y, z) {
        let multiply = func_self_total(
            func_get_ele_int_value(x), 
            func_get_ele_int_value(y)
        );
        func_set_ele_value(z, convertStringToCurrency(multiply));
    }

    function func_cal_total_money(rowKey) {
        let self_total = convertCurrencyToNumber($('tr[data-key="'+rowKey+'"] '+SELF_TOTAL+'').val());
        let sponsor_total = convertCurrencyToNumber($('tr[data-key="'+rowKey+'"] '+SPONSOR_TOTAL+'').val());
        let sim_total = convertCurrencyToNumber($('tr[data-key="'+rowKey+'"] '+SIM_TOTAL+'').val());
        let clone_total = convertCurrencyToNumber($('tr[data-key="'+rowKey+'"] '+CLONE_TOTAL+'').val());

        let total_money = self_total + sponsor_total + sim_total + clone_total;
        func_set_ele_value($('tr[data-key="'+rowKey+'"] '+TOTAL_MONEY+''), convertStringToCurrency(total_money));
    }

    function func_self_total(self_amount, self_price) {
        return self_amount * self_price;
    }

    function func_set_ele_value(selector, value) {
        $(selector).val(value);
        return true;
    }

    function func_get_ele_int_value(value) {
        if (value == "") {
            value = 0;
        } else {
            value = formatNumber(value);
            value = value.replace(/\,/g, '', value);
        }
        return value;
    }

    function convertStringToCurrency(string) {
        string = string.toLocaleString({
            maximumFractionDigits: 0
        });

        return string.replace(/\./g, ',', string);
    }

    function convertCurrencyToNumber(string) {
        string = string.replace(/\,/g, '', string);
        return parseInt(string);
    }

    
    function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }
  
  
    function formatCurrency(input, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.
        
        // get input value
        var input_val = input.val();
        
        // don't validate empty input
        if (input_val === "") { return; }
        
        // original length
        var original_len = input_val.length;
    
        // initial caret position 
        var caret_pos = input.prop("selectionStart");
        
        // check for decimal
        if (input_val.indexOf(".") >= 0) {
    
        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");
    
        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
    
        // add commas to left side of number
        left_side = formatNumber(left_side);
    
        // validate right side
        right_side = formatNumber(right_side);
        
        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }
        
        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);
    
        // join number by .
        input_val = left_side + "." + right_side;
    
        } else {
            // no decimal entered
            // add commas to number
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = input_val;
            
            // final formatting
            if (blur === "blur") {
                input_val += ".00";
            }
        }
        
        // send updated string to input
        input.val(input_val);
    
        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input[0].setSelectionRange(caret_pos, caret_pos);
    }
});