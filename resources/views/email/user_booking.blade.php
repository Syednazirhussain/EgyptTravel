<!DOCTYPE html>
<html lang="en-US">
   <head>
          <meta charset="utf-8">
    </head>
    <body>
    	  <h3>Dear {{ ucfirst($name) }},</h3>
        <h4>Your booking has been recorded we'll contact you soon</h4>
        <div style="width: 100%">
          <p>
            <span style="width: 20%"><strong> Package: </strong></span>
            <span style="width: 80%"> {{ $package }}  </span>
          </p>
          <p>
            <span style="width: 20%"><strong> Hotel: </strong></span>
            <span style="width: 80%"> {{ $hotel }}</span>
          </p>
          <p>
            <span style="width: 20%"><strong> Duration: </strong></span>
            <span style="width: 80%"> <em>{{ $duration }}</em> </span>
          </p>
          <p>
            <span style="width: 20%"><strong> Room Type: </strong></span>
            <span style="width: 80%"> {{ $room_type }}</span>
          </p>
          <p>
            <span style="width: 20%"><strong> Additional Info: </strong></span>
            <span style="width: 80%"> {{ $additional_info }} </span>
          </p>
        </div>
    </body>
</html>