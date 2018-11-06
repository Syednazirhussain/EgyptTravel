<!DOCTYPE html>
<html lang="en-US">
   <head>
          <meta charset="utf-8">
    </head>
    <body>
    	  <h3>Dear {{ ucfirst($f_name) }}&nbsp; {{ ucfirst($l_name) }},</h3>
        <h4>We were recieve your message and contact details. We will contact you soon.</h4>
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
            <span style="width: 20%"><strong> Your message: </strong></span>
            <span style="width: 80%"> <em>{{ $query }}</em> </span>
          </p>
        </div>
    </body>
</html>