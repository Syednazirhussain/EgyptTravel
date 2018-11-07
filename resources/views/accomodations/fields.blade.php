<input type="hidden" name="_token" value="{{ csrf_token() }}">

@section('css')
<style type="text/css">
  
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

@if(isset($accomodation))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">

    <div class="col-md-12">
        <div class="form-group">
          <label for="name">Title</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="ex. Paramide" value="@if(isset($accomodation)){{ $accomodation->name }}@endif">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="address">Address</label>
          <input type="hidden" id="editAddr" value="@if(isset($accomodation)){{ $accomodation->address }}@endif">
          <textarea type="text" name="address" id="address" class="form-control" placeholder="ex. Banglore Town, Near Awami Markaz" style="height: 90px; width: 577px; resize: none;" ></textarea>
        </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
          <label for="">Gallery</label>
          <input type="file" name="docFiles" class="form-control uploadFiles">
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label for="url_link">Link Url</label>
        <input type="text" name="url_link" id="url_link" class="form-control" placeholder="ex. www.example.com" value="@if(isset($accomodation)){{ $accomodation->url_link }}@endif">
      </div>
    </div>

    <div class="col-md-12">
          <div class="form-group">
              <label for="description">Description</label>
              <input type="hidden" id="editDesc" value="@if(isset($accomodation)){{ $accomodation->description }}@endif">
              <textarea id="description" name="description" required="required"></textarea>
          </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label class="custom_checkbox">Mark as recommended
          @if(isset($accomodation))

            @if($accomodation->recommended == 1)
              <input type="checkbox" id="recommended" data-id="{{ $accomodation->id }}" checked="checked">
            @else
              <input type="checkbox" id="recommended" data-id="{{ $accomodation->id }}">
            @endif

          @else
            <input type="checkbox" id="recommended" data-id="0">
          @endif
          <span class="checkmark"></span>
        </label>
      </div>
    </div>


    <div class="col-md-12">
      <button type="submit" id="send" class="btn btn-primary">@if(isset($accomodation)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add Package @endif</button>
      <a href="{!! route('admin.accomodations.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>


  </div>
</div>


@section('js')

    <script type="text/javascript">

      var editAcc = "{{ isset($accomodation) ? $accomodation->id: 0 }}";

      $('#description').val(  $('#editDesc').val() );
      $('#address').val(  $('#editAddr').val() );


      $("#recommended").change(function() {
          var accomodation_id = $(this).data('id');
          if(this.checked) 
          {
              $.ajax({
                  url: "{{ route('admin.accomodations.recommended',['']) }}/"+accomodation_id,
                  type: "GET"
              }).done(function(response){
                if(response.status == 'fail')
                {
                  $(this).attr('checked', false);
                  alert(response.message);
                }
              });
          }
          else
          {
            $.ajax({
              url: "{{ route('admin.accomodations.release.recommended',['']) }}/"+accomodation_id,
              type: "GET"
            }).done(function(response){
                if(response.status == 'success')
                {
                  alert(response.message);
                }            
            });
          }
      });

      $("#accomodations").submit(function(e) {
            e.preventDefault();

            if( $(this).validate().form() ) {

              if (editAcc == 0) 
              {
                var myform = document.getElementById("accomodations");
                var data = new FormData(myform);
                $.ajax({
                    url: '{{ route("admin.accomodations.store") }}',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST', // For jQuery < 1.9
                    beforeSend: function(){
                        $('#send').prop('disabled', true);
                    },
                    success: function(data){
                        if(data.success == 1)
                        {
                          console.log(data.msg);
                          window.location.href = "{{ route('admin.accomodations.index') }}";
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
                  var myform = document.getElementById("accomodations");
                  var data = new FormData(myform);
                  data.append('id', editAcc);          

                  <?php
                    if (isset($accomodation)) {
                       $updateRoute = route("admin.accomodations.update", [$accomodation->id]);
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
                      },
                      success: function(data){
                        if(data.success == 1)
                        {
                          console.log(data.msg);
                          window.location.href = "{{ route('admin.accomodations.index') }}";
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
      $('#accomodations').pxValidate({
          ignore: ":hidden:not(#description),.note-editable.panel-body",
          focusInvalid: false,
          rules: {
            'name':{
              required: true,
              alphanumeric: true,
              maxlength:40
            },
            'address': {
              required: true,
              maxlength:100
            },
            'url_link': {
              required: true,
              url: true
            },
            'description': {
              required: true
            }
          },
          messages: {
            'name':{
              required: "Please enter title"
            },
            'description': {
              required: "Please enter the content above"
            },
            'address':{
              required: "Please enter address"
            }
          }
      });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
        }, "Please enter alphabets only");

      if(editAcc != 0)
      {
        
        var images = <?php if(isset($imagesFiles)){ echo json_encode($imagesFiles); }  ?>
         
        $('.uploadFiles').fileuploader({
             theme: 'thumbnails',
             enableApi: true,
             addMore: true,
             limit: 4,
             fileMaxSize: 2,
             thumbnails: {
                 box: '<div class="fileuploader-items">' +
                           '<ul class="fileuploader-items-list">' +
                               '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
                           '</ul>' +
                       '</div>',
                 item: '<li class="fileuploader-item">' +
                            '<div class="fileuploader-item-inner">' +
                                '<div class="thumbnail-holder">${image}</div>' +
                                '<div class="actions-holder">' +
                                    '<a class="fileuploader-action fileuploader-action-remove" title="Remove"><i class="remove"></i></a>' +
                                '</div>' +
                                '<div class="progress-holder">${progressBar}</div>' +
                            '</div>' +
                        '</li>',
                 item2: '<li class="fileuploader-item">' +
                            '<div class="fileuploader-item-inner">' +
                                '<div class="thumbnail-holder">${image}</div>' +
                                '<div class="actions-holder">' +
                                    '<a class="fileuploader-action fileuploader-action-remove" title="Remove"><i class="remove"></i></a>' +
                                '</div>' +
                            '</div>' +
                        '</li>',
                 startImageRenderer: true,
                 canvasImage: false,
                 _selectors: {
                     list: '.fileuploader-items-list',
                     item: '.fileuploader-item',
                     start: '.fileuploader-action-start',
                     retry: '.fileuploader-action-retry',
                     remove: '.fileuploader-action-remove'
                 },
                 onItemShow: function(item, listEl) {
                     var plusInput = listEl.find('.fileuploader-thumbnails-input');
                     
                     plusInput.insertAfter(item.html);
                     
                     if(item.format == 'image') {
                         item.html.find('.fileuploader-item-icon').hide();
                     }
                 }
             },
             afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                 var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                     api = $.fileuploader.getInstance(inputEl.get(0));
             
                 plusInput.on('click', function() {
                     api.open();
                 });
             },
              allowDuplicates: false,
              files: images,
              limit: null,
              fileMaxSize:2,
              extensions: ['jpg','gif','png','jpeg','bmp','pdf','txt','docx','doc','odt','rtf'],
             onRemove: function(itemEl, file, id, listEl, boxEl, newInputEl, inputEl){

                 var jsObj = {
                   'image' : itemEl.name,
                   'id'    : editAcc
                 };

                 console.log(jsObj);
                 
                 $.ajax({
                   url : "{{ route('admin.accomodations.image_remove') }}",
                   type : "POST",
                   data : jsObj,
                   dataType : "json",
                   success : function(response){
                     alert(response.msg);
                   }
                 });
             },
         });
      }



   $('input[name="docFiles"]').fileuploader({
         extensions: ['jpg', 'jpeg', 'png', 'gif', 'bmp'],
         changeInput: ' ',
         theme: 'thumbnails',
         enableApi: true,
         addMore: true,
         limit: 4,
         fileMaxSize: 2,
         thumbnails: {
            box: '<div class="fileuploader-items">' +
                         '<ul class="fileuploader-items-list">' +
                        '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner">+</div></li>' +
                         '</ul>' +
                     '</div>',
            item: '<li class="fileuploader-item">' +
                      '<div class="fileuploader-item-inner">' +
                              '<div class="thumbnail-holder">${image}</div>' +
                              '<div class="actions-holder">' +
                                  '<a class="fileuploader-action fileuploader-action-remove" title="Remove"><i class="remove"></i></a>' +
                              '</div>' +
                              '<div class="progress-holder">${progressBar}</div>' +
                          '</div>' +
                      '</li>',
            item2: '<li class="fileuploader-item">' +
                      '<div class="fileuploader-item-inner">' +
                              '<div class="thumbnail-holder">${image}</div>' +
                              '<div class="actions-holder">' +
                                  '<a class="fileuploader-action fileuploader-action-remove" title="Remove"><i class="remove"></i></a>' +
                              '</div>' +
                          '</div>' +
                      '</li>',
            startImageRenderer: true,
            canvasImage: false,
            _selectors: {
               list: '.fileuploader-items-list',
               item: '.fileuploader-item',
               start: '.fileuploader-action-start',
               retry: '.fileuploader-action-retry',
               remove: '.fileuploader-action-remove'
            },
            onItemShow: function(item, listEl) {
               var plusInput = listEl.find('.fileuploader-thumbnails-input');
               
               plusInput.insertAfter(item.html);
               
               if(item.format == 'image') {
                  item.html.find('.fileuploader-item-icon').hide();
               }
            }
         },
         afterRender: function(listEl, parentEl, newInputEl, inputEl) {
            var plusInput = listEl.find('.fileuploader-thumbnails-input'),
               api = $.fileuploader.getInstance(inputEl.get(0));
         
            plusInput.on('click', function() {
               api.open();
            });
         },
    });

    // Initialize Summernote
    $(function() {
      $('#description').summernote({
        height: 200,
        placeholder: 'Type description here..',
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


    </script>

@endsection

