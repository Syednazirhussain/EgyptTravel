<!DOCTYPE html>
<html lang="en-US">
   <head>
          <meta charset="utf-8">
    </head>
    <body>
    	  <h3>Hi,</h3>
        <h4>You have a new user {{ ucfirst($f_name) }}&nbsp;{{ ucfirst($l_name) }} show an interst in your services here are his/her details</h4>
        <div style="width: 100%">
          <p>
            <span style="width: 20%"><strong> Phone: </strong></span>
            <span style="width: 80%"> {{ $phone }}  </span>
          </p>
          <p>
            <span style="width: 20%"><strong> Email: </strong></span>
            <span style="width: 80%"> {{ $email }}</span>
          </p>
          <p>
            <span style="width: 20%"><strong> message: </strong></span>
            <span style="width: 80%"> <em>{{ $query }}</em> </span>
          </p>
        </div>
    </body>
</html>