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

        <tbody>
        <?php $c=1;?>
        @foreach($classes as $sc)
            <tr>
                <td>{{$c}}</td>
                <td>{{$sc->class_name}}</td>
                <td><?php echo $sc->class_descriptions; ?></td>
                <td>{{$sc->remarks}}</td>
                <td>{{$sc->status}}</td>
                <td  id="{{$sc->level_name}}" style="align-content: center"> <div class="col-md-12" id="{{$sc->id}}">
                        <a href="#" title="Add Streams" class="adduser "><i class="fa fa-users text-success"></i> View</a>&nbsp;&nbsp;&nbsp;
                    </div></td>

            </tr>
            <?php $c++;;?>
        @endforeach
        </tbody>
    </table>
</form>