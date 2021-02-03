@if (isset($records) && $records->count() > 0)
@foreach ($records as $key => $row)
    <tr data-key="{{ $row->id }}">
        <form action="{{ route('admin.buy_histories.updateReq') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $row->id }}">
            <td>
                <input type="text" name="time" class="form-control" value="{{ $row->time }}">
            </td>
            <td>
                <input type="text" name="self_amount" class="form-control" value="{{ number_format($row->self_amount) }}">
            </td>
            <td>
                <input type="text" name="self_price" class="form-control" value="{{ number_format($row->self_price) }}">
            </td>
            <td>
                <input type="text" name="self_total" class="form-control" value="{{ number_format($row->self_total) }}" readonly>
            </td>
            <td>
                <input type="text" name="sponsor_amount" class="form-control" value="{{ number_format($row->sponsor_amount) }}">
            </td>
            <td>
                <input type="text" name="sponsor_price" class="form-control" value="{{ number_format($row->sponsor_price) }}">
            </td>
            <td>
                <input type="text" name="sponsor_total" class="form-control" value="{{ number_format($row->sponsor_total) }}" readonly>
            </td>
            <td>
                <input type="text" name="sim_amount" class="form-control" value="{{ number_format($row->sim_amount) }}">
            </td>
            <td>
                <input type="text" name="sim_price" class="form-control" value="{{ number_format($row->sim_price) }}">
            </td>
            <td>
                <input type="text" name="sim_total" class="form-control" value="{{ number_format($row->sim_total) }}" readonly>
            </td>
            <td>
                <input type="text" name="clone_amount" class="form-control" value="{{ number_format($row->clone_amount) }}">
            </td>
            <td>
                <input type="text" name="clone_price" class="form-control" value="{{ number_format($row->clone_price) }}">
            </td>
            <td>
                <input type="text" name="clone_total" class="form-control" value="{{ number_format($row->clone_total) }}" readonly>
            </td>
            <td>
                <input type="text" name="total_money" class="form-control" value="{{ number_format($row->total_money) }}" readonly>
            </td>
        </form>
    </tr>
@endforeach
@endif