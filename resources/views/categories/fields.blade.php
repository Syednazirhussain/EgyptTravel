<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($category))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">

    <div class="col-md-12">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="name" id="title" class="form-control" placeholder="ex. Delux" value="@if(isset($category)){{ $category->name }}@endif">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="code">Code</label>
          <input type="text" name="code" id="code" class="form-control" placeholder="ex. Delux" value="@if(isset($category)){{ $category->code }}@endif">
        </div>
    </div>

    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">@if(isset($category)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add Category @endif</button>
      <a href="{!! route('admin.categories.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>


  </div>
</div>


@section('js')

    <script type="text/javascript">

        // Initialize validator
        $('#category').pxValidate({
            focusInvalid: false,
            rules: {
              'name':{
                alphanumeric: true,
                required: true,
                maxlength: 45,
                minlength: 3
              },
              'code':{
                required: true,
                maxlength: 45,
                minlength: 3
              }
            },
            messages: {
              'name':{
                required: "Please enter title"
              },
              'code':{
                required: "Please enter code"
              }
            }
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
        }, "Please enter alphanumeric characters");


    </script>

@endsection

