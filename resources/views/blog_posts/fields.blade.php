<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($blogCategory))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">

    <div class="col-md-6">
        <div class="form-group">
          <label for="name">Title</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="ex. Delux" value="@if(isset($blogCategory)){{ $blogCategory->name }}@endif">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="hidden" id="editDesc" value="@if(isset($famousPlace)){{ $famousPlace->description }}@endif">
            <textarea id="description" name="description" required="required"></textarea>
        </div>
    </div>

    <div class="col-md-6">
      


      <div class="form-group">
        <label for="blog_category_id">Blog Category</label>
        <select type="text" name="blog_category_id" id="blog_category_id" class="form-control" value="@if(isset($user)){{ $user->user_status_id }}@endif">
          @if(isset($blogCategorys))
            @foreach($blogCategorys as $blogCategory)
              @if($blogCategory->name == 'Publish')
                <option value="{{ $blogCategory->id }}" selected="selected">{{ $blogCategory->name }}</option>
              @else
                <option value="{{ $blogCategory->id }}">{{ $blogCategory->name }}</option>
              @endif
            @endforeach
          @endif
        </select>
      </div>

      <div class="form-group">
        <label for="languages">Tags</label>
        <input type="text" id="languages" name="languages" value="@if(isset($companyHrOtherInfo)){{ $companyHrOtherInfo->languages }}@endif" class="form-control languages" data-role="tagsinput" />
        <div class="errorTxt"></div>
      </div>
  
    </div>

    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">@if(isset($blogCategory)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add Category @endif</button>
      <a href="{!! route('admin.blogPosts.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>

  </div>
</div>


@section('js')

    <script type="text/javascript">

        $('#blogpost').pxValidate({
            focusInvalid: false,
            rules: {
              'name':{
                alphanumeric: true,
                required: true,
                maxlength: 45,
                minlength: 3
              }
            },
            messages: {
              'name':{
                required: "Please enter title"
              }
            }
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
        }, "Please enter alphanumeric characters");

      $('#description').val(  $('#editDesc').val() );

             // Initialize Summernote
      $(function() {
        $('#description').summernote({
          height: 200,
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

      $('#languages').tagsinput({
            maxTags: 10
      });
      

      // Initialize Select2
      $(function() {
        $('#blog_category_id').select2({
          placeholder: 'Select value',
        });
      });

    </script>

@endsection

