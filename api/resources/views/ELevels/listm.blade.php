<form class='form-horizontal' role='form'>
    <table id="datatables-4" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>SNO</th>
            <th>Level name</th>
            <th>Descriptions</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Classes</th>
            <th>Action</th>
        </thead>

        <tfoot>
        <tr>
            <th>SNO</th>
            <th>Level name</th>
            <th>Descriptions</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Classes</th>
            <th>Action</th>
        </tfoot>

        <tbody>
        <?php $c=1;?>
        @foreach($elevels as $sc)
            <tr>
                <td>{{$c}}</td>
                <td>{{$sc->level_name}}</td>
                <td><?php echo $sc->level_descriptions;?></td>
                <td>{{$sc->remarks}}</td>
                <td>{{$sc->status}}</td>
                <td  id="{{$sc->level_name}}" style="align-content: center"> <div class="col-md-12" id="{{$sc->id}}">
                        <a href="#" title="Add Streams" class="adduser "><i class="fa fa-users text-success"></i> View</a>&nbsp;&nbsp;&nbsp;
                    </div></td>
                <td id="{{$sc->id}}" style="align-content: center" >
                    <div class="col-md-6" id="{{$sc->id}}">
                        <a href="#" title="Edit" class="editClass "><i class="fa fa-pencil-square-o text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                    </div>
                    <div class="col-md-6" id="{{$sc->id}}">
                        <a href="#b" title="Delete" class="deleteClass "><i class="fa fa-trash-o text-danger"></i> delete </a>
                    </div>
                </td>
            </tr>
            <?php $c++;;?>
        @endforeach
        </tbody>
    </table>
</form>