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
    <div class="col-md-6">
      <div class="col-sm-12  form-group">
          <label for="user_full_name">Name</label>
          <input type="text" name="name" id="user_full_name" placeholder="ex. John Doe" class="form-control" value="@if(isset($user)){{ $user->name }}@endif">
      </div>
      <div class="col-sm-12 form-group">
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control" placeholder="ex. 03xxxxxxxxx" value="@if(isset($user)){{ $user->mobile }}@endif">
      </div>

      @if(Auth::user()->user_role_code == 'admin')
        @if( isset($user) )
          @if($user->user_role_code == 'admin')
            <div class="col-sm-12 form-group">
              <label for="user_role_codes">User Status</label>
              <select type="text" name="user_status_id" id="user_status_id" class="form-control" disabled>
                  @foreach($userStatus as $status)
                      @if($user->status_code == $status->status_code)
                          <option  value="{{ $status->status_code }}" <?php echo "selected"; ?> >{{ $status->name }}</option>
                      @else
                          <option  value="{{ $status->status_code }}">{{ $status->name }}</option>
                      @endif
                  @endforeach
              </select>
            </div>        
          @else
            <div class="col-sm-12 form-group">
              <label for="user_role_codes">User Status</label>
              <select type="text" name="user_status_id" id="user_status_id" class="form-control" value="@if(isset($user)){{ $user->user_status_id }}@endif">
                  @foreach($userStatus as $status)
                      @if($user->status_code == $status->status_code)
                          <option  value="{{ $status->status_code }}" <?php echo "selected"; ?> >{{ $status->name }}</option>
                      @else
                          <option  value="{{ $status->status_code }}">{{ $status->name }}</option>
                      @endif
                  @endforeach
              </select>
            </div>
          @endif
        @else
          <div class="col-sm-12 form-group">
            <label for="user_role_codes">User Status</label>
            <select type="text" name="user_status_id" id="user_status_id" class="form-control" value="@if(isset($user)){{ $user->user_status_id }}@endif">
                @foreach($userStatus as $status)
                    <option  value="{{ $status->status_code }}">{{ $status->name }}</option>
                @endforeach
            </select>
          </div>
        @endif
      @endif


    </div>
    <div class="col-md-6">
      <div class="form-group">
        <div class="pull-right fileinput fileinput-new" id="fileinput" data-provides="fileinput">
          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                @if (isset($user))
                  @if($user->pic != null)
                    <input type="hidden" name="profile_image" id="logo-hidden" value="{{ $user->pic }}">
                    <img src="{{ asset('storage/users/'.$user->pic ) }}" data-src="{{ asset('storage/users/'.$user->pic) }}" alt="{{ $user->name}}" />
                  @else
                    <img src="{{ asset('storage/users/default.png') }}" alt="{{ $user->name}}"/>
                  @endif
                @else
                    <img src="{{ asset('storage/users/default.png') }}" alt="user"/>
                @endif
          </div>
          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
          <div>
            <span class="btn btn-default btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
            <input type="file" name="pic"></span>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-12">
    
    @if(Auth::user()->user_role_code == 'admin')

      @if(isset($user))
        @if($user->user_role_code == 'admin')
            <div class="col-md-6">
              <div class="col-sm-12 form-group">
                  <label for="user_role_codes">User Role</label>
                  <select type="text" name="role" id="user_role_codes" class="form-control" disabled>
                      @foreach($user_role as $role)
                          @if($user->user_role_code == $role->code)
                              <option value="{{ $role->code }}" selected="selected">{{ $role->name }}</option>
                          @else
                              <option value="{{ $role->code }}">{{ $role->name }}</option>
                          @endif
                      @endforeach
                  </select>
              </div>
            </div>
        @else 
            <div class="col-md-6">
              <div class="col-sm-12 form-group">
                  <label for="user_role_codes">User Role</label>
                  <select type="text" name="role" id="user_role_codes" class="form-control">
                      @foreach($user_role as $role)
                          @if($user->user_role_code == $role->code)
                              <option value="{{ $role->code }}" selected="selected">{{ $role->name }}</option>
                          @else
                              <option value="{{ $role->code }}">{{ $role->name }}</option>
                          @endif
                      @endforeach
                  </select>
              </div>
            </div>
        @endif
      @else
        <div class="col-md-6">
          <div class="col-sm-12 form-group">
              <label for="user_role_codes">User Role</label>
              <select type="text" name="role" id="user_role_codes" class="form-control">
                  @foreach($user_role as $role)
                    <option value="{{ $role->code }}">{{ $role->name }}</option>
                  @endforeach
              </select>
          </div>
        </div>
      @endif
    @endif

  </div>

  <div class="col-sm-12 col-md-12">
    <div class="col-md-12">
      <div class="col-sm-12  form-group">
          <label for="user_email">Email</label>
          <input type="email" name="email" id="user_email" placeholder="john@example.com" class="form-control" value="@if(isset($user)){{ $user->email }}@endif">
          <input type="hidden" id="compareEmail" value="@if(isset($user)){{ $user->email }}@endif">
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-sm-12  form-group">
          <label for="password">Password</label>
          @if(isset($user))
              <input type="password" name="updatePassword" class="form-control" id="password">
              <label class="text-danger">if you don't want to update password than leave it blank.</label>
          @else
              <input type="password" name="password" placeholder="xxxxxxxx" id="password" class="form-control">
          @endif
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-sm-12">
          <button type="submit" id="send" class="btn btn-primary">@if(isset($user)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add User @endif</button>
          <a href="{!! route('admin.users.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
          <span id="loader">
            <i class="fa fa-spinner fa-3x fa-spin"></i>
          </span>
      </div>
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

        var editUser = "{{ isset($user) ? $user->id: 0 }}";

        $('#userForm').pxValidate({
            focusInvalid: false,
            rules: {
                'name': {
                    alphanumeric: true,
                    required: true,
                    maxlength: 45,
                    minlength: 3
                },
                'email': {
                    required: true,
                    email: true,
                    remote : {
                    param : {
                        url  : "{{ route('admin.users.verifyEmail') }}",
                        type : "POST",
                        dataType : "json",
                        data : {
                            email : function(){
                                return $('#user_email').val();
                            }
                        },
                        dataFilter : function(response){
                            return checkField(response);
                        }
                    },
                    depends : function(element){
                        return ( $(element).val() != $('#compareEmail').val() );
                    }
                    }
                },
                'user_role_code': {
                    required: true
                },
                'phone': {
                    required: true,
                    digits: true,
                    maxlength: 15
                },
                'password' : {
                    required : true,
                    minlength: 6,
                    maxlength: 20
                }
            },
            messages : {
                'email' : {
                    required : "Please enter email",
                    remote : "email already exists"
                },
                'name' : {
                  required: "Please enter name"
                },
                'password': {
                  required: "please enter password"
                },
                'phone':{
                  required:"please enter phone",
                  maxlength: "Please enter phone no not more than 15 characters"
                }
            }
        });
        
        $('#loader').css("visibility", "hidden");
        
        $("#userForm").submit(function(e) {
            e.preventDefault();

            if( $(this).validate().form() ) {

              if (editUser == 0) 
              {

                var myform = document.getElementById("userForm");
                var data = new FormData(myform);

                $.ajax({
                    url: '{{ route("admin.users.store") }}',
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
                          window.location.href = "{{ route('admin.users.index') }}";
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
                  var myform = document.getElementById("userForm");
                  var data = new FormData(myform);
                  data.append('id', editUser);

                  // var data = $( this ).serializeArray();

                  console.log(data);                 

                  <?php
                    if (isset($user)) {
                       $updateRoute = route("admin.users.update", [$user->id]);
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
                          window.location.href = "{{ route('admin.users.index') }}";
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

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
        }, "Please enter alphabets only");



        checkField = function(response) {
          switch ($.parseJSON(response).code) {
              case 200:
                  return "true"; // <-- the quotes are important!
              case 401:
                  //alert("Sorry, our system has detected that an account with this email address already exists.");
                  break;
              case 404:
                  console.log('missing code');
                  break;
              default:
                  alert("An undefined error occurred");
                  break;
          }
          return false;
        };


        // Initialize Select2
        $(function() {
          $('#user_role_codes').select2({
            placeholder: 'Select value',
          });
        });

                // Initialize Select2
        $(function() {
          $('#post_category_id').select2({
            placeholder: 'Select value',
          });
        });

    </script>


@endsection

