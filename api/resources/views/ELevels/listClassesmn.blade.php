
    <?php $c=1;?>
    @if(count($el) >0 )
        @foreach($el->classes as $sc)
            <tr>
                <td>{{$c}}</td>
                <td>{{$sc->class_name}}</td>
                <td><?php echo $sc->class_descriptions; ?></td>
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
    @endif
    <?php $c=1;?>
