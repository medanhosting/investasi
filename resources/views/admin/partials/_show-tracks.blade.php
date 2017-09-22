@if(!empty($collect->rajaongkir->result))
    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Date</th>
            <th>Delivery Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($collect->rajaongkir->result->manifest as $manifest)
            <tr>
                <td>{{ $manifest->manifest_date }}</td>
                <td>{{ $manifest->manifest_description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="text-center">
        <p>Invalid waybill or not yet registered</p>
    </div>
@endif