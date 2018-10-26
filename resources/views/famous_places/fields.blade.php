@section('css')

<style type="text/css">
    .fileinput .thumbnail>img {
        width: 150px;
        height: 150px;
    }
</style>

@endsection

<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($user))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">

    <div class="col-md-6 m-t-4">
      <div class="col-sm-12 form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control" value="@if(isset($famousPlace)){{ $famousPlace->title }}@endif">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">

        <div class="pull-right fileinput fileinput-new" id="fileinput" data-provides="fileinput">
          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                @if (isset($famousPlace))
                  @if($famousPlace->image != null)
                    <input type="hidden" name="image" id="logo-hidden" value="{{ $famousPlace->image }}">
                    <img src="{{ asset('storage/famous_places/'.$famousPlace->image ) }}" data-src="{{ asset('storage/famous_places/'.$famousPlace->image) }}" alt="{{ $famousPlace->title}}" />
                  @else
                    <img src="{{ asset('storage/famous_places/default.png') }}" alt="{{ $famousPlace->title}}"/>
                  @endif
                @else
                    <img src="{{ asset('storage/famous_places/default.png') }}" alt="user"/>
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

	<div class="col-md-12">
        <div class="form-group">
            <input type="hidden" id="editDesc" value="@if(isset($famousPlace)){{ $famousPlace->description }}@endif">
            <textarea id="description" name="description" required="required"></textarea>
        </div>
	</div>

    <div class="col-md-12">
      <button type="submit" id="send" class="btn btn-primary">@if(isset($famousPlace)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add Famous Place @endif</button>
      <a href="{!! route('admin.famousPlaces.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
      <span id="loader">
        <i class="fa fa-spinner fa-3x fa-spin"></i>
      </span>
    </div>
  </div>
</div>


@section('js')

    <script type="text/javascript">

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

      var editFamous = "{{ isset($famousPlace) ? $famousPlace->id: 0 }}";

      $('#description').val(  $('#editDesc').val() );

      $("#famous_places").submit(function(e) {
          e.preventDefault();

          if( $(this).validate().form() ) {

            if (editFamous == 0) 
            {
              var myform = document.getElementById("famous_places");
              var data = new FormData(myform);
              $.ajax({
                  url: '{{ route("admin.famousPlaces.store") }}',
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
                        window.location.href = "{{ route('admin.famousPlaces.index') }}";
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
                var myform = document.getElementById("famous_places");
                var data = new FormData(myform);
                data.append('id', editFamous);          

                <?php
                  if (isset($famousPlace)) {
                     $updateRoute = route("admin.famousPlaces.update", [$famousPlace->id]);
                  } else {
                    $updateRoute = '';
                  }
                ?>

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
                        window.location.href = "{{ route('admin.famousPlaces.index') }}";
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
	    $('#famous_places').pxValidate({
	        ignore: ":hidden:not(#description),.note-editable.panel-body",
	        focusInvalid: false,
	        rules: {
	          'description': {
	            required: true
	          },
	          'title':{
	          	required: true,
              minlength:5,
              maxlength:30
	          }
	        },
	        messages: {
	          'description': {
	            required: "Please enter the content above"
	          },
	          'title':{
	          	required: "Please enter title"
	          }
	        }
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
	        focus: true,
    		disableResizeEditor: true
	      });
	    });


    </script>

@endsection

