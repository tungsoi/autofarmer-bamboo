<table class="table table-bordered">
    @include('buy_histories.thead')

    <tbody>
        @include('buy_histories.records', [
            'records'   =>  $records
        ])
        @include('buy_histories.row_default')
    </tbody>
</table>
