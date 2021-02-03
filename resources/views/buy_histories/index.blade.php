<table class="table table-bordered" id="tbl_buy_histories">
    @include('buy_histories.thead')

    <tbody>
        @include('buy_histories.records', [
            'records'   =>  $records
        ])
    </tbody>
</table>
