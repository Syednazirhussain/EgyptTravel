<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($booking))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">

    <div class="col-md-12">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="ex. John Doe" value="@if(isset($booking)){{ $booking->name }}@endif">
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" id="email" class="form-control" placeholder="ex. user@example.com" value="@if(isset($booking)){{ $booking->email }}@endif">
        </div>
    </div>

  </div>

  <div class="col-sm-12 col-md-12">

    <div class="col-md-12">
      <div class="form-group">
        <label for="package_id">Package</label>
        <select type="text" name="package_id" id="package_id" class="form-control" value="@if(isset($booking)){{ $booking->package_id }}@endif">
            @if(isset($packages))

              @if(isset($booking))

                @foreach($packages as $package)
                    @if($booking->package_id == $package->id)
                        <option  value="{{ $package->id }}" <?php echo "selected"; ?> >{{ $package->title }}</option>
                    @else
                        <option  value="{{ $package->id }}">{{ $package->title }}</option>
                    @endif
                @endforeach

              @else

                @foreach($packages as $package)
                  <option  value="{{ $package->id }}">{{ $package->title }}</option>
                @endforeach

              @endif
            @endif
        </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="hotel_id">Hotel</label>
        <select type="text" name="hotel_id" id="hotel_id" class="form-control" value="@if(isset($booking)){{ $booking->hotel_id }}@endif">
            @if(isset($hotels))
              @if(isset($booking))
                @foreach($hotels as $hotel)
                    @if($booking->hotel_id == $hotel->id)
                        <option  value="{{ $hotel->id }}" <?php echo "selected"; ?> >{{ $hotel->name }}</option>
                    @else
                        <option  value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                    @endif
                @endforeach
              @else
                @foreach($hotels as $hotel)
                  <option  value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                @endforeach
              @endif
            @endif
        </select>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label for="room_code">Rooms</label>
        <select type="text" name="room_code" id="room_code" class="form-control" value="@if(isset($booking)){{ $booking->room_code }}@endif">
            @if(isset($rooms))

              @if(isset($booking))

                @foreach($rooms as $room)
                    @if($booking->room_code == $room->code)
                        <option  value="{{ $room->code }}" <?php echo "selected"; ?> >{{ $room->name }}</option>
                    @else
                        <option  value="{{ $room->code }}">{{ $room->name }}</option>
                    @endif
                @endforeach

              @else

                @foreach($rooms as $room)
                  <option  value="{{ $room->code }}">{{ $room->name }}</option>
                @endforeach

              @endif
            @endif
        </select>
      </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
          <label for="start_date">Start Date</label>
          <input type="text" name="start_date" id="start_date" class="form-control" value="@if(isset($booking)){{ $booking->start_date }}@endif">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
          <label for="end_date">End Date</label>
          <input type="text" name="end_date" id="end_date" class="form-control" value="@if(isset($booking)){{ $booking->end_date }}@endif">
        </div>
    </div>

  </div>



  <div class="col-sm-12 col-md-12">

    <div class="col-md-12">
        <div class="form-group">
          <label for="additional_info">Addittional Information</label>
          <textarea type="text" name="additional_info" id="additional_info" class="form-control" style="height: 90px; width: 577px; resize: none;" >@if(isset($booking)){{ $booking->additional_info }}@endif</textarea>
        </div>
    </div>

    <div class="col-md-12">
      <button type="submit" class="btn btn-primary">@if(isset($booking)) <i class="fa fa-refresh"></i>  Update @else <i class="fa fa-plus"></i>  Add Booking @endif</button>
      <a href="{!! route('admin.bookings.index') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>

  </div>
</div>


@section('js')

    <script type="text/javascript">

        // Initialize validator
        $('#booking').pxValidate({
            focusInvalid: false,
            rules: {
              'name':{
                alphanumeric: true,
                required: true,
                maxlength: 45,
                minlength: 3
              },
              'email':{
                required: true,
                email: true
              },
              'start_date': {
                  required: true,
              },
              'end_date': {
                  required: true,
                  greaterThan: "#start_date" 
              },
              'hotel_id':{
                required: true
              },
              'room_code':{
                required: true
              },
              'package_id':{
                required: true
              },
              'additional_info':{
                required: true
              }
            },
            messages: {
              'name':{
                required: "Please enter name"
              },
              'email': {
                required: "Please enter email"
              },
              'additional_info': {
                required: "Please enter additional information"
              },
              'end_date' : {
                greaterThan: "Must be greater than start date"
              }
            }
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
        }, "Please enter alphabets only");

        $.validator.addMethod("greaterThan", function(value, element, params) {
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date($(params).val());
            }
            return isNaN(value) && isNaN($(params).val()) || (Number(value) > Number($(params).val())); 
        },'Must be greater than {0}.');

      // Initialize Select2
      $(function() {
        $('#package_id').select2({
          placeholder: 'Select value',
        });
      });

      // Initialize Select2
      $(function() {
        $('#hotel_id').select2({
          placeholder: 'Select value',
        });
      });

      // Initialize Select2
      $(function() {
        $('#room_code').select2({
          placeholder: 'Select value',
        });
      });

      $('#start_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            startDate : moment(),
            locale: {
                format: 'YYYY-MM-DD'
            }
      });

      $('#end_date').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            startDate : moment().add('months',1),
            locale: {
                format: 'YYYY-MM-DD'
            }
      });



    </script>

@endsection

