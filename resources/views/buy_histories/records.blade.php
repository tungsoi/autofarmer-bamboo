@if (isset($records) && $records->count() > 0)
@foreach ($records as $row)
    <tr data-key="{{ $row->id }}">
        <td>
            <input type="text" data-name="time" class="form-control readonly-input tx-center" readonly value="{{ $row->time }}">
        </td>
        <td>
            <input type="text" data-name="self_amount" class="form-control readonly-input" readonly value="{{ number_format($row->self_amount) }}">
        </td>
        <td>
            <input type="text" data-name="self_price" class="form-control readonly-input" readonly value="{{ number_format($row->self_price) }}">
        </td>
        <td>
            <input type="text" data-name="self_total" class="form-control readonly-input" readonly value="{{ number_format($row->self_total) }}">
        </td>
        <td>
            <input type="text" data-name="sponsor_amount" class="form-control readonly-input" readonly value="{{ number_format($row->sponsor_amount) }}">
        </td>
        <td>
            <input type="text" data-name="sponsor_price" class="form-control readonly-input" readonly value="{{ number_format($row->sponsor_price) }}">
        </td>
        <td>
            <input type="text" data-name="sponsor_total" class="form-control readonly-input" readonly value="{{ number_format($row->sponsor_total) }}">
        </td>
        <td>
            <input type="text" data-name="sim_amount" class="form-control readonly-input" readonly value="{{ number_format($row->sim_amount) }}">
        </td>
        <td>
            <input type="text" data-name="sim_price" class="form-control readonly-input" readonly value="{{ number_format($row->sim_price) }}">
        </td>
        <td>
            <input type="text" data-name="sim_total" class="form-control readonly-input" readonly value="{{ number_format($row->sim_total) }}">
        </td>
        <td>
            <input type="text" data-name="clone_amount" class="form-control readonly-input" readonly value="{{ number_format($row->clone_amount) }}">
        </td>
        <td>
            <input type="text" data-name="clone_price" class="form-control readonly-input" readonly value="{{ number_format($row->clone_price) }}">
        </td>
        <td>
            <input type="text" data-name="clone_total" class="form-control readonly-input" readonly value="{{ number_format($row->clone_total) }}">
        </td>
        <td>
            <input type="text" data-name="total_money" class="form-control readonly-input" readonly value="{{ number_format($row->total_money) }}">
        </td>
        <td class="tx-center">
            
        </td>
    </tr>
@endforeach
@endif