<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($price))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">

    <div class="col-md-12">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="ex. Deluxe package" value="@if(isset($price)){{ $price->title }}@endif">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="label">Label</label>
          <input type="text" name="label" id="label" class="form-control" placeholder="ex. Per person double room" value="@if(isset($price)){{ $price->label }}@endif">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="price">Price</label>
          <input type="text" name="price" id="price" class="form-control" placeholder="ex. 500.00" value="@if(isset($price)){{ $price->price }}@endif">
        </div>
    </div>

    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">@if(isset($price)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add Package @endif</button>
      <a href="{!! route('admin.prices.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>


  </div>
</div>


@section('js')

    <script type="text/javascript">

        // Initialize validator
        $('#price').pxValidate({
            focusInvalid: false,
            rules: {
              'title':{
                alphanumeric: true,
                required: true,
                maxlength: 45,
                minlength: 3
              },
              'label':{
                alphanumeric: true,
                required: true,
                maxlength: 45,
                minlength: 3
              },
              'price': {
                required: true,
                number: true
              }
            },
            messages: {
              'title':{
                required: "Please enter title"
              },
              'label': {
                required: "Please enter label"
              },
              'price': {
                required: "Please enter price"
              }
            }
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
        }, "Please enter alphabets only");


    </script>

@endsection

