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
    {!! Form::open(array('url' => 'academic/edu-levels/create','id'=>'eduLevelsm','role'=>'form')) !!}
        <div class="row" style="margin-top: 20px">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Level Name</label>
                    <input type="text" class="form-control" name="level_name">
                </div>
                <div class="form-group">
                    <label>Descriptions</label>
                    <textarea class="form-control" name="level_descriptions"> </textarea>
                </div>
                <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" name="remarks">
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
                        <input  type="hidden" value="{{$school_id}}" name="school_id">
                    </div>
                    <div class="col-sm- pull-right" id="output">

                    </div>

                </div>
            </div>
        </div>

    {!! Form::close() !!}
</div>