<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($page))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">

  <div class="col-md-12">
        <div class="form-group">
            <input type="hidden" id="editDesc" value="@if(isset($page)){{ $page->description }}@endif">
            <textarea id="description" name="description" required="required"></textarea>
        </div>
  </div>

    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">@if(isset($page)) <i class="fa fa-refresh"></i>  Update @endif</button>
      <a href="{!! route('admin.dashboard') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>


  </div>
</div>


@section('js')

    <script type="text/javascript">

        $('#description').val(  $('#editDesc').val() );


        // Initialize Summernote
        $(function() {
          $('#description').summernote({
            height: 300,
            toolbar: [
              ['parastyle', ['style']],
              ['fontstyle', ['fontname', 'fontsize']],
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['font', ['strikethrough', 'superscript', 'subscript']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['height', ['height']],
              ['insert', ['picture', 'link', 'video', 'table', 'hr']],
              ['history', ['undo', 'redo']],
              ['misc', ['codeview', 'fullscreen']],
              ['help', ['help']]
            ],
            focus: true,
            disableResizeEditor: true
          });
        });


    </script>

@endsection

