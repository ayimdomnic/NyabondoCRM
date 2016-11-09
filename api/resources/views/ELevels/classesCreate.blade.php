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
    {!! Form::open(array('url' => 'academic/classes/create','id'=>'eLevelClasses','role'=>'form')) !!}
        <div class="row" style="margin-top: 20px">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Education Level</label>
                    <select name="level_id" class="form-control" id="level_id">
                            <option value="{{$el->id}}" selected="selected">{{$el->level_name}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Class Name</label>
                    <input type="text" class="form-control" name="class_name">
                </div>
                <div class="form-group">
                    <label>Descriptions</label>
                    <textarea class="form-control" name="class_descriptions"> </textarea>
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

                    <div class="col-sm-4 col-sm-offset-4">
                        <input type="submit" name="btnSubmit" value="Save" class="btn btn-blue-3 btn-block">

                    </div>
                    <div class="col-sm-4 pull-right" id="output">

                    </div>

                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 20px; height: 200px; overflow: scroll;">
          <div class="col-sm-12" id="eLevellistLevelsm">
              <table id="datatables-4" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                  <tr>
                      <th>SNO</th>
                      <th>Class name</th>
                      <th>Descriptions</th>
                      <th>Remarks</th>
                      <th>Status</th>

                  </thead>

                  <tfoot>
                  <tr>
                      <th>SNO</th>
                      <th>Class name</th>
                      <th>Descriptions</th>
                      <th>Remarks</th>
                      <th>Status</th>

                  </tfoot>

                  <tbody>
                  <?php $c=1;?>
                  @if(count($el) >0 )
                      @foreach($el->classes as $sc)
                          <tr>
                              <td>{{$c}}</td>
                              <td>{{$sc->class_name}}</td>
                              <td><?php echo $sc->class_descriptions; ?></td>
                              <td>{{$sc->remarks}}</td>
                              <td>{{$sc->status}}</td>
                          </tr>
                          <?php $c++;;?>
                      @endforeach
                      @endif
                  </tbody>
              </table>
          </div>
        </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-2 pull-right">
            <a href="#" data-dismiss="modal" class="btn btn-danger btn-block"> <i class="fa-o"></i>Close</a>
        </div>
    </div>

    {!! Form::close() !!}
</div>