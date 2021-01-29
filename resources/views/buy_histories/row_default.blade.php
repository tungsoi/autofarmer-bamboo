<tr class="row-default">
    <form action="{{ route('admin.buy_histories.storeReq') }}" method="post">
        {{ csrf_field() }}
        <td>
            <input type="text" name="time" class="form-control">
        </td>
        <td>
            <input type="text" name="self_amount" class="form-control">
        </td>
        <td>
            <input type="text" name="self_price" class="form-control">
        </td>
        <td>
            <input type="text" name="self_total" class="form-control readonly-input" readonly value="0">
        </td>
        <td>
            <input type="text" name="sponsor_amount" class="form-control">
        </td>
        <td>
            <input type="text" name="sponsor_price" class="form-control">
        </td>
        <td>
            <input type="text" name="sponsor_total" class="form-control readonly-input" readonly value="0">
        </td>
        <td>
            <input type="text" name="sim_amount" class="form-control">
        </td>
        <td>
            <input type="text" name="sim_price" class="form-control">
        </td>
        <td>
            <input type="text" name="sim_total" class="form-control readonly-input" readonly value="0">
        </td>
        <td>
            <input type="text" name="clone_amount" class="form-control">
        </td>
        <td>
            <input type="text" name="clone_price" class="form-control">
        </td>
        <td>
            <input type="text" name="clone_total" class="form-control readonly-input" readonly value="0">
        </td>
        <td>
            <input type="text" name="total_money" class="form-control readonly-input" readonly value="0">
        </td>
        <td class="tx-center">
            <button type="submit" class="btn btn-xs btn-success">
                <i class="fa fa-check" aria-hidden="true"></i>
            </button>
        </td>
    </form>
</tr>