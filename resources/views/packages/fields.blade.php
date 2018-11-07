@section('css')

<style type="text/css">
    .fileinput .thumbnail>img {
        width: 150px;
        height: 150px;
    }
    /* The container */
    .custom_checkbox {
            display: block;
      position: relative;
      padding-left: 27px;
      margin-bottom: 12px;
      cursor: pointer;
      font-size: 13px;
      font-weight: 500;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .custom_checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 1px;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .custom_checkbox:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .custom_checkbox input:checked ~ .checkmark {
        background-color: #49c000;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .custom_checkbox input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .custom_checkbox .checkmark:after {
      left: 6px;
      top: 2px;
      width: 6px;
      height: 12px;
      border: solid white;
      border-width: 0 2px 2px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }
</style>

@endsection

<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($package))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">
    <div class="col-md-6">

      <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control" value="@if(isset($package)){{ $package->title }}@endif">
      </div>

      <div class="form-group">
        <label for="category_id">Category</label>
        <select type="text" name="category_id" id="category_id" class="form-control" value="@if(isset($package)){{ $package->category_id }}@endif">
            @if(isset($categorys))

              @if(isset($package))

                @foreach($categorys as $category)
                    @if($package->category_id == $category->id)
                        <option  value="{{ $category->id }}" <?php echo "selected"; ?> >{{ $category->name }}</option>
                    @else
                        <option  value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach

              @else

                @foreach($categorys as $category)
                  <option  value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

              @endif
            @endif
        </select>
      </div>

      <div class="form-group">
        <label for="accommodation_id">Accommodation</label>
        <select type="text" name="accommodation_id" id="accommodation_id" class="form-control" value="@if(isset($package)){{ $package->accomodation_id }}@endif">
            @if(isset($accommodations))

              @if(isset($package))

                @foreach($accommodations as $accommodation)
                    @if($package->accomodation_id == $accommodation->id)
                        <option  value="{{ $accommodation->id }}" <?php echo "selected"; ?> >{{ $accommodation->name }}</option>
                    @else
                        <option  value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                    @endif
                @endforeach

              @else

                @foreach($accommodations as $accommodation)
                  <option  value="{{ $accommodation->id }}">{{ $accommodation->name }}</option>
                @endforeach

              @endif
            @endif
        </select>
      </div>

    </div>
    <div class="col-md-6">
      <div class="form-group">
        <div class="pull-right fileinput fileinput-new" id="fileinput" data-provides="fileinput">
          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                @if (isset($package))
                  @if($package->feature_image != null)
                    <input type="hidden" name="image" id="logo-hidden" value="{{ $package->feature_image }}">
                    <img src="{{ asset('storage/packages/'.$package->feature_image ) }}" data-src="{{ asset('storage/packages/'.$package->feature_image) }}" alt="{{ $package->title}}" />
                  @else
                    <img src="{{ asset('storage/packages/default.png') }}" alt="{{ $package->title}}"/>
                  @endif
                @else
                    <img src="{{ asset('storage/packages/default.png') }}" alt="user"/>
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
  </div>

  <div class="col-sm-12 col-md-12">

    <div class="col-md-6">
      <div class="form-group">
          <label for="days">Number Of Days</label>
          <input type="text" name="days" id="days" class="form-control" placeholder="ex. 3" value="@if(isset($package)){{ $package->day }}@endif">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="night">Number Of Nights</label>
          <input type="text" name="night" id="night" class="form-control" placeholder="ex. 3" value="@if(isset($package)){{ $package->night }}@endif">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="price_id">Price</label>
        <select type="text" name="price_id" id="price_id" class="form-control" value="@if(isset($user)){{ $user->user_status_id }}@endif">
            @if(isset($prices))

              @if(isset($package))

                @foreach($prices as $price)
                    @if($package->price_id == $price->id)
                        <option  value="{{ $price->id }}" <?php echo "selected"; ?> >{{ $price->title }}&nbsp;-&nbsp;{{ $price->price }}</option>
                    @else
                        <option  value="{{ $price->id }}">{{ $price->title }}&nbsp;-&nbsp;{{ $price->price }}</option>
                    @endif
                @endforeach

              @else

                @foreach($prices as $price)
                  <option  value="{{ $price->id }}">{{ $price->title }}&nbsp;-&nbsp;{{ $price->price }}</option>
                @endforeach

              @endif
            @endif
        </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="discount">Discount</label>
          <input type="text" name="discount" id="discount" class="form-control" placeholder="ex. 10.5" value="@if(isset($package)){{ $package->discount }}@endif">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="covering_sight">Covering Sight</label>
          <input type="text" name="covering_sight" id="covering_sight" class="form-control" placeholder="ex. Cairo" value="@if(isset($package)){{ $package->covering_sight }}@endif">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
         <label for="travelling_date">Travelling Date</label>
         <input type="text" name="travelling_date" class="form-control" id="travelling_date" value="@if(isset($package)){{ $package->traveling_date }} @endif">
      </div>
    </div>


  </div>

  <div class="col-sm-12 col-md-12">

    <div class="col-md-12">
        <div class="form-group">
            <label for="description">Description</label>
            <input type="hidden" id="editDesc" value="@if(isset($package)){{ $package->description }}@endif">
            <textarea id="description" name="description" required="required"></textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="important_notes">Important Notes</label>
            <input type="hidden" id="editNotes" value="@if(isset($package)){{ $package->important_notes }}@endif">
            <textarea id="important_notes" name="important_notes" required="required"></textarea>
        </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label class="custom_checkbox">Mark as popular
          @if(isset($package))

            @if($package->popular == 1)
              <input type="checkbox" id="popular" data-id="{{ $package->id }}" checked="checked">
            @else
              <input type="checkbox" id="popular" data-id="{{ $package->id }}">
            @endif

          @else
            <input type="checkbox" id="popular" data-id="0">
          @endif
          <span class="checkmark"></span>
        </label>
      </div>
    </div>

    <div class="col-md-12">
      <button type="submit" id="send" class="btn btn-primary">@if(isset($package)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add Package @endif</button>
      <a href="{!! route('admin.packages.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
      <span id="loader">
        <i class="fa fa-spinner fa-3x fa-spin"></i>
      </span>
    </div>
  </div>
</div>


@section('js')

    <script type="text/javascript">

      $("#popular").change(function() {
          var packages_id = $(this).data('id');
          if(this.checked) 
          {
              $.ajax({
                  url: "{{ route('admin.packages.popular',['']) }}/"+packages_id,
                  type: "GET"
              }).done(function(response){
                if(response.status == 'fail')
                {
                  $(this).prop('checked', false);
                }
                alert(response.message);
              });
          }
          else
          {
            $.ajax({
              url: "{{ route('admin.packages.release.popular',['']) }}/"+packages_id,
              type: "GET"
            }).done(function(response){
                alert(response.message);  
            });
          }
      });

      //https://github.com/jasny/bootstrap/issues/334#issuecomment-383005685
      $('.fileinput').on("change.bs.fileinput", function (e) {
      var file = $(e.delegateTarget, $("form")).find('input[type=file]')[0].files[0];

          var fileExtension = file.name.split(".");
          fileExtension = fileExtension[fileExtension.length - 1].toLowerCase();

          var arrayExtensions = ["jpg", "jpeg", "png"];

          if (arrayExtensions.lastIndexOf(fileExtension) == -1) {
              alert('Only Images can be uploaded');
          }
          else {
              if (file["size"] >= 4194304 && (fileExtension == "jpg" || fileExtension == "jpeg" || fileExtension == "png")) {
                  alert('Max 2 MB of file size can be uploaded.');                 
                  $(this).fileinput('clear');
              }
          }  
      });

      $('#loader').css("visibility", "hidden");

      var editPackage = "{{ isset($package) ? $package->id: 0 }}";

      console.log(editPackage);

      $('#description').val(  $('#editDesc').val() );
      $('#important_notes').val(  $('#editNotes').val() );

        $("#package").submit(function(e) {
            e.preventDefault();

            if( $(this).validate().form() ) {

              if (editPackage == 0) 
              {
                var myform = document.getElementById("package");
                var data = new FormData(myform);
                $.ajax({
                    url: '{{ route("admin.packages.store") }}',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST', // For jQuery < 1.9
                    beforeSend: function(){
                        $('#send').prop('disabled', true);
                        $('#loader').css("visibility", "visible");
                    },
                    success: function(data){
                        if(data.success == 1)
                        {
                          console.log(data.msg);
                          window.location.href = "{{ route('admin.packages.index') }}";
                        }
                        else
                        {
                          console.log(data.msg);
                        }
                    },
                    error: function(xhr,status,error)  {

                    }
                });
              }
              else
              {
                  var myform = document.getElementById("package");
                  var data = new FormData(myform);
                  data.append('id', editPackage);          

                  <?php
                    if (isset($package)) {
                       $updateRoute = route("admin.packages.update", [$package->id]);
                    } else {
                      $updateRoute = '';
                    }
                  ?>

                  var route = '{{ $updateRoute }}';

                  $.ajax({
                      url: '{{ $updateRoute }}',
                      data: data,
                      cache: false,
                      contentType: false,
                      processData: false,
                      type: 'POST', // For jQuery < 1.9
                      beforeSend: function(){
                          $('#send').prop('disabled', true);
                          $('#loader').css("visibility", "visible");
                      },
                      success: function(data){
                        if(data.success == 1)
                        {
                          console.log(data.msg);
                          window.location.href = "{{ route('admin.packages.index') }}";
                        }
                        else
                        {
                          console.log(data.msg);
                        }
                      },
                      error: function(xhr,status,error)  {

                      }

                  });
              }
            } else {
                console.log("does not validate");
            }
        });


        // Initialize validator
        $('#package').pxValidate({
            ignore: ":hidden:not(#description),.note-editable.panel-body",
            focusInvalid: false,
            rules: {
              'description': {
                required: true
              },
              'important_notes': {
                required: true
              },
              'title':{
                alphanumeric: true,
                required: true,
                maxlength: 45,
                minlength: 3
              },
              'category_id': {
                required: true
              },
              'accommodation_id': {
                required: true
              },
              'days': {
                required: true,
                digits: true
              },
              'night': {
                required: true,
                digits: true
              },
              'travelling_date': {
                required: true
              },
              'discount': {
                required: true,
                number: true
              },
              'price': {
                required: true
              },
              'covering_sight': {
                required: true
              }
            },
            messages: {
              'description': {
                required: "Please enter the content above"
              },
              'important_notes': {
                required: "Please enter the content above"
              },
              'title':{
                required: "Please enter title"
              },
              'days': {
                required: "Please enter days"
              },
              'night': {
                required: "Please enter nights"
              },
              'discount': {
                required: "Please enter discount",
                number: "Please enter number only"
              },
              'price': {
                required: "Please enter price",
                number: "Please enter number only"
              },
              'covering_sight': {
                required: "Please enter covering sight"
              },
              'category_id': {
                required: "Please select category"
              },
              'accommodation_id': {
                required: "Please select accommodation"
              },
            }
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
        }, "Please enter alphanumeric characters");

                // Initialize Summernote
        $(function() {
          $('#important_notes').summernote({
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
            disableResizeEditor: true
          });
        });

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
            disableResizeEditor: true
          });
        });

        // Initialize Select2
        $(function() {
          $('#category_id').select2({
            placeholder: 'Select value',
          });
        });

        // Initialize Select2
        $(function() {
          $('#accommodation_id').select2({
            placeholder: 'Select value',
          });
        });

        // Initialize Select2
        $(function() {
          $('#price_id').select2({
            placeholder: 'Select value',
          });
        });


       $('#travelling_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'YYYY-MM-DD'
            }
       });

    </script>

@endsection

