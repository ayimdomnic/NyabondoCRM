{!!HTML::script("assets/libs/jquery-datatables/js/jquery.dataTables.min.js")!!}
{!!HTML::script("assets/libs/jquery-datatables/js/dataTables.bootstrap.js")!!}
{!!HTML::script("assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js")!!}
{!!HTML::script("assets/js/pages/datatables.js")!!}

<form class='form-horizontal' role='form'>
    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>SNO</th>
            <th>Class name</th>
            <th>Descriptions</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Class streams</th>

        </thead>

        <tfoot>
        <tr>
            <th>SNO</th>
            <th>Class name</th>
            <th>Descriptions</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Class streams</th>

        </tfoot>

        <tbody >
        <?php $c=1;?>
        @if(count($el) >0 )
            @foreach($el->classes as $sc)
                <tr>
                    <td>{{$c}}</td>
                    <td>{{$sc->class_name}}</td>
                    <td><?php echo $sc->class_descriptions; ?></td>
                    <td>{{$sc->remarks}}</td>
                    <td>{{$sc->status}}</td>
                    <td id="{{$sc->id}}"><a class="addClassStreams" href="#">Add/View/Update</a></td>
                </tr>
                <?php $c++;;?>
            @endforeach
        @endif
        </tbody>
    </table>
</form>

