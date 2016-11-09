{!!HTML::script("assets/js/tinymce/tinymce.min.js")!!}
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists   charmap   anchor",
            "insertdatetime  contextmenu paste"
        ],
        toolbar: " undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
    });
</script>

{!!HTML::script("assets/libs/bootstrap-validator/js/bootstrapValidator.min.js")!!}
{!!HTML::script("assets/js/pages/form-validation.js")!!}

<div class="container">
    {!! Form::open(array('url' => 'academic/exams/create','id'=>'examsCreate','role'=>'form')) !!}
    <div class="row" style="margin-top: 20px">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Education Level</label>
                <select name="level_id" class="form-control" id="level_id">
                    <option value="">----</option>
                    @foreach($elevels as $el)
                        <option value="{{$el->id}}">{{$el->level_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Exam Code</label>
                <input type="text" class="form-control" name="ExamCode">
            </div>
            <div class="form-group">
                <label>Exam Name</label>
                <input type="text" class="form-control" name="Exam_Name">
            </div>
            <div class="form-group">
                <label>Descriptions</label>
                <textarea class="form-control" name="Exam_Description"> </textarea>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" id="status" class="form-control">
                    <option selected="selected" value="">----</option>
                    <option>Enabled</option>
                    <option>Disabled</option>
                </select>
            </div>
            <div class="form-group">
                <div class="col-md-2 pull-right">
                    <a href="#" data-dismiss="modal" class="btn btn-danger btn-block"> <i class="fa-o"></i>Close</a>
                </div>
                <div class="col-sm-2 pull-right">
                    <input type="submit" name="btnSubmit" value="Save" class="btn btn-blue-3 btn-block">

                </div>
                <div class="col-sm- pull-right" id="output">

                </div>

            </div>
        </div>
    </div>

    {!! Form::close() !!}
</div>