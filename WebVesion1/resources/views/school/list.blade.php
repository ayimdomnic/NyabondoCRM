<form class='form-horizontal' role='form'>
    <table id="datatables-2" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>SNO</th>
            <th>School Code</th>
            <th>Name of the School</th>
            <th>Registration Number</th>
            <th>ownership</th>
            <th>owner</th>
            <th>Postal Address</th>
            <th>Users</th>
        </tr>
        </thead>

        <tfoot>
        <tr>
            <th>SNO</th>
            <th>School Code</th>
            <th>Name of the School</th>
            <th>Registration Number</th>
            <th>ownership</th>
            <th>owner</th>
            <th>Postal Address</th>
            <th>Users</th>
        </tr>
        </tfoot>

        <tbody>
        <?php $c=1;?>
        @foreach($school as $sc)
            <tr>
                <td>{{$c}}</td>
                <td>{{$sc->school_code}}</td>
                <td>{{$sc->school_name}}</td>
                <td>{{$sc->registration_no}}</td>
                <td>{{$sc->ownership_type}}</td>
                <td>{{$sc->owner}}</td>
                <td>{{$sc->postal_address}}</td>
                <td id="{{$sc->id}}" ></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</form>
<script>
    $("#datatables-2 tfoot th").each( function ( i ) {
        var select = $('<select class="form-control input-sm"><option value=""></option></select>')
                .appendTo( $(this).empty() )
                .on( 'change', function () {
                    table.column( i )
                            .search( '^'+$(this).val()+'$', true, false )
                            .draw();
                } );

        table.column( i ).data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
        } );
    } );
</script>
