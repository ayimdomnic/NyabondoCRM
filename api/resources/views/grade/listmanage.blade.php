{!!HTML::script("assets/libs/jquery-datatables/js/jquery.dataTables.min.js")!!}
{!!HTML::script("assets/libs/jquery-datatables/js/dataTables.bootstrap.js")!!}
{!!HTML::script("assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js")!!}
{!!HTML::script("assets/js/pages/datatables.js")!!}

<form class='form-horizontal' role='form'>
    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>SNO</th>
            <th>Grade name</th>
            <th>Start From</th>
            <th>End</th>
            <th>Descriptions</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Action</th>

        </thead>

        <tfoot>
        <tr>
            <th>SNO</th>
            <th>Grade name</th>
            <th>Start From</th>
            <th>End</th>
            <th>Descriptions</th>
            <th>Remarks</th>
            <th>Status</th>
            <th>Action</th>

        </tfoot>

        <tbody>
        <?php
        /**
         * Created by PhpStorm.
         * User: innocent.christopher
         * Date: 8/19/2015
         * Time: 10:53 AM
         */

        $c=1;
        if(count($elevels) > 0)
        {
            foreach($elevels->grades as $g){

                echo '<tr>
                        <td>'.$c.'</td>
                        <td>'.$g->grade_name.'</td>
                        <td>'.$g->grade_from.'</td>
                        <td>'.$g->grade_to.'</td>
                        <td>'.$g->descriptions.'</td>
                        <td>'.$g->remarks.'</td>
                        <td>'.$g->status.'</td>
                        <td id="{{$sc->id}}" style="align-content: center" >
                                            <div class="col-md-6" id="{{$sc->id}}">
                                                <span> <a href="#" title="Edit" class="editClass "><i class="fa fa-pencil-square-o text-info"></i> edit</a> <span>
                                            </div>
                                            <div class="col-md-6" id="{{$sc->id}}">
                                                 <span><a href="#b" title="Delete" class="deleteClass "><i class="fa fa-trash-o text-danger"></i> delete </a> </span>
                                            </div>
                        </td>
                     </tr>';
                $c++;
            }
        }?>
        </tbody>
    </table>
</form>
