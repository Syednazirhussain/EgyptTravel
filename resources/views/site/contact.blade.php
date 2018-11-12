@extends('site.default')

@section('css')

<style type="text/css">
	.header-bg-10{
		background-image: url("{{ asset("/site/assets/images/4.jpg") }}");
	}
    


    .social_link a{
        color: #898989;
        font-size: 13px;
    }
    .social_link a:hover{
        color: #fec107;
    }

</style>

@endsection

@section('logo')
<a class="navbar-brand" href="{{ route('public.site') }}">
    @if($webSetting[0]->logo != null)
        <img class="img-resposive" style="margin-top: -30px; min-height: 50px; max-height: 100px; min-width: 120px; max-width: 180px" src="{{ asset('storage/setting/'.$webSetting[0]->logo ) }}" title="{{ $webSetting[0]->title}}" />
    @else
        <img class="img-resposive" style="margin-top: -30px; min-height: 50px; max-height: 100px; min-width: 120px; max-width: 180px" src="{{ asset('storage/packages/default.png') }}" title="{{ $webSetting[0]->title}}"/>
    @endif
</a>
@endsection


@section('content')


<!-- page header -->
<section class="header header-bg-10">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1>Contact</h1>
                        <div class="ui breadcrumb">
                            <a href="{{ route('public.site') }}" class="section">Home</a>
                            <div class="divider"> / </div>
                            <div class="active section">Contact</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- contact -->
<section class="contact-inner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="contact_map">
                       <p>

                       </p>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="contact-form">
                    @if (session()->has('msg.success'))
                        @include('layouts.success_msg')
                    @endif
                    <form action="{{ route('site.contact') }}" method="POST" id="contact_us">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h2>Let's Talk!</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="f_name">First Name</label>
                                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter your First Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="l_name">Last Name</label>
                                    <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter Your Last Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <textarea class="form-control" id="message" name="message" placeholder="Your Comment" rows="5"></textarea>
                        </div>
                        <button class="thm-btn" type="submit">Submit</button>
                        <!-- <a href="#" class="thm-btn">Submit</a> -->
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-details">
                    <h2>Contact Details</h2>
                    <div class="contact-content">
                        @foreach($pages as $page)
                            @if($page->code == 'contact')
                                <?php echo htmlspecialchars_decode($page->description,ENT_NOQUOTES); ?> 
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection



@section('js')

<script type="text/javascript">
        
        // Initialize validator
        $('#contact_us').pxValidate({
            focusInvalid: false,
            rules: {
              'f_name':{
                alphanumeric: true,
                required: true,
                maxlength: 45,
                minlength: 3
              },
              'l_name':{
                alphanumeric: true,
                required: true,
                maxlength: 45,
                minlength: 3
              },
              'email': {
                required: true,
                email: true
              },
              'phone': {
                required: true,
                number: true,
                minlength:11,
                maxlength:15
              },
              'message': {
                required: true
              }
            },
            messages: {
              'f_name':{
                required: "Please enter your first name"
              },
              'l_name': {
                required: "Please enter your last name"
              },
              'email': {
                required: "Please enter your email"
              },
              'phone': {
                required: "Please enter your phone"
              },
              'message': {
                required: "Please enter your message"
              }
            }
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
        }, "Please enter alphabets only");


</script>

@endsection