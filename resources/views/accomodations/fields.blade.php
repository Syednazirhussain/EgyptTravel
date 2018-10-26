<input type="hidden" name="_token" value="{{ csrf_token() }}">

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

