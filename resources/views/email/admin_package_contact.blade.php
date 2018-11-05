<!DOCTYPE html>
<html lang="en-US">
   <head>
          <meta charset="utf-8">
    </head>
    <body>
        <h3>Dear {{ ucfirst($name) }},</h3>
        <h4>Your have a new user</h4>
        <div style="width: 100%">
          <p>
            <span><strong>Email:</strong> </span><span>{{ $user_email }}</span>
          </p>
          <p>
            <span><strong>Phone:</strong> </span><span>{{ $phone }}</span>
          </p>
        </div>
        <div style="width: 100%">
          <p>
            <span style="width: 20%"><strong> Package: </strong></span>
            <span style="width: 80%"> {{ $package_title }}&nbsp; <em>{{ $price_title }}</em>   </span>
          </p>
          <p>
            <span style="width: 20%"><strong> Accomodation: </strong></span>
            <span style="width: 80%"> {{ $accomodation_name }}&nbsp; {{ $price_label }}&nbsp;with&nbsp;{{$discount}}</span>
          </p>
          <p>
            <span style="width: 20%"><strong> Travelling Date: </strong></span>
            <span style="width: 80%"> <em> <?php  echo date('D d M, Y',strtotime($travelling_dates));  ?> </em> </span>
          </p>
          <p>
            <span style="width: 20%"><strong> Duration: </strong></span>
            <span style="width: 80%"> {{ $day }}&nbsp;days and {{$night}}&nbsp;nights</span>
          </p>
          <p>
            <span style="width: 20%"><strong> Covering Sight: </strong></span>
            <span style="width: 80%"> {{ $covering_sight }}</span>
          </p>
          <p>
            <span style="width: 20%"><strong> Total Amount: </strong></span>
            <span style="width: 80%">{{ $price_amount }}$</span>
          </p>
        </div>
    </body>
</html>