{!!HTML::script("assets/libs/jquery-datatables/js/jquery.dataTables.min.js")!!}
{!!HTML::script("assets/libs/jquery-datatables/js/dataTables.bootstrap.js")!!}
{!!HTML::script("assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js")!!}
{!!HTML::script("assets/js/pages/datatables.js")!!}

<form class='form-horizontal' role='form'>
    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>SNO</th>
            <th>Exam Code</th>
            <th>Exam Name</th>
            <th>Descriptions</th>
            <th>Status</th>
            <th>Action</th>
        </thead>

        <tfoot>
        <tr>
            <th>SNO</th>
            <th>Exam Code</th>
            <th>Exam Name</th>
            <th>Descriptions</th>
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
        if(count($el) > 0)
        {
            foreach($el->exams as $ex){

                echo '<tr>
                        <td>'.$c.'</td>
                        <td>'.$ex->ExamCode.'</td>
                        <td>'.$ex->Exam_Name.'</td>
                        <td>'.$ex->Exam_Description.'</td>
                        <td>'.$ex->status.'</td>
                        <td id='.$ex->id.' style="align-content: center" >
                          <span id='.$ex->id.'>
                            <a href="#" title="Edit" class="editExam "><i class="fa fa-pencil-square-o text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
                          </span>
                          <span id='.$ex->id.'>
                             <a href="#b" title="Delete" class="deleteExam "><i class="fa fa-trash-o text-danger"></i> delete </a>
                           </span>
                </td>
                     </tr>';
                $c++;
            }
        }?>
        </tbody>
    </table>
</form>
