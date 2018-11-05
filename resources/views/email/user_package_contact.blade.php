<!DOCTYPE html>
<html lang="en-US">
   <head>
          <meta charset="utf-8">
    </head>
    <body>
        <h3>Egypt Travels</h3>
        <h4>You show an interst in {{ $package_title }} package</h4>
        <div style="width: 100%">
          <p>
            <span style="width: 20%"><strong> Package: </strong></span>
            <span style="width: 80%"> {{ $package_title }}<br>{{ $price_title }}  </span>
          </p>
          <p>
            <span style="width: 20%"><strong> Accomodation: </strong></span>
            <span style="width: 80%"> {{ $accomodation_name }}</span>
          </p>
          <p>
            <span style="width: 20%"><strong> Travelling Date: </strong></span>
            <span style="width: 80%"> <em>  <?php  echo date('D d M, Y',strtotime($travelling_dates));  ?> </em> </span>
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
            <span style="width: 80%">{{ $price_label }}&nbsp;&nbsp;{{ $price_amount }}$ with {{$discount}} </span>
          </p>
        </div>
    </body>
</html>