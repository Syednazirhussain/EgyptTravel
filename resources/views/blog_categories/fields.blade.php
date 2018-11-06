<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($blogCategory))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">

    <div class="col-md-6 m-t-4">
      <div class="form-group">
        <label for="name">Title</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="ex. Delux" value="@if(isset($blogCategory)){{ $blogCategory->name }}@endif">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <div class="pull-right fileinput fileinput-new" id="fileinput" data-provides="fileinput">
          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                @if (isset($blogCategory))
                  @if($blogCategory->image != null)
                    <input type="hidden" name="image" id="logo-hidden" value="{{ $blogCategory->image }}">
                    <img src="{{ asset('storage/place_category/'.$blogCategory->image ) }}" data-src="{{ asset('storage/place_category/'.$blogCategory->image) }}" alt="{{ $blogCategory->title}}" />
                  @else
                    <img src="{{ asset('storage/place_category/default.png') }}" alt="{{ $blogCategory->title}}"/>
                  @endif
                @else
                    <img src="{{ asset('storage/place_category/default.png') }}" alt="user"/>
                @endif
          </div>
          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
          <div>
            <span class="btn btn-default btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
            <input type="file" name="image"></span>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">@if(isset($blogCategory)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add Category @endif</button>
      <a href="{!! route('admin.blogCategories.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>

  </div>
</div>


@section('js')

    <script type="text/javascript">

        $('#blogcategory').pxValidate({
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


    </script>

@endsection

