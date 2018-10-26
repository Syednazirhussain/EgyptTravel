@section('css')

<style type="text/css">
    .fileinput .thumbnail>img {
        width: 150px;
        height: 150px;
    }
</style>

@endsection

<input type="hidden" name="_token" value="{{ csrf_token() }}">

@if(isset($webSetting))
    <input name="_method" type="hidden" value="PATCH">
@endif

<div class="row">

  <div class="col-sm-12 col-md-12">
    <div class="col-md-6">

      <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control" value="@if(isset($webSetting)){{ $webSetting->title }}@endif" placeholder="ex. Complete Guide To Egypt Travel & Tour">
      </div>

      <div class="form-group">
          <label for="sub_title">Sub Title</label>
          <input type="text" name="sub_title" id="sub_title" class="form-control" value="@if(isset($webSetting)){{ $webSetting->sub_title }}@endif" placeholder="ex. A Great story awaits you!">
      </div>

    </div>
    <div class="col-md-6">
      <div class="form-group">
        <div class="pull-right fileinput fileinput-new" id="fileinput" data-provides="fileinput">
          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                @if (isset($webSetting))
                  @if($webSetting->logo != null)
                    <input type="hidden" name="image" id="logo-hidden" value="{{ $webSetting->logo }}">
                    <img src="{{ asset('storage/setting/'.$webSetting->logo ) }}" data-src="{{ asset('storage/setting/'.$webSetting->logo) }}" alt="{{ $webSetting->title}}" />
                  @else
                    <img src="{{ asset('storage/packages/default.png') }}" alt="{{ $webSetting->title}}"/>
                  @endif
                @else
                    <img src="{{ asset('storage/packages/default.png') }}" alt="user"/>
                @endif
          </div>
          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
          <div>
            <span class="btn btn-default btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
            <input type="file" name="image"></span>
            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-12">
    <div class="col-md-6">
      <div class="form-group">
          <label for="facebook_link">Facebook link</label>
          <input type="text" name="facebook_link" id="facebook_link" class="form-control" value="@if(isset($webSetting)){{ $webSetting->facebook_link }}@endif" placeholder="ex. www.facebook.com/">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
          <label for="twitter_link">Twitter Link</label>
          <input type="text" name="twitter_link" id="twitter_link" class="form-control" value="@if(isset($webSetting)){{ $webSetting->twitter_link }}@endif" placeholder="ex. www.twitter.com">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
          <label for="instagram_link">Instagram Link</label>
          <input type="text" name="instagram_link" id="instagram_link" class="form-control" value="@if(isset($webSetting)){{ $webSetting->instagram_link }}@endif" placeholder="ex. www.instagram.com">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
          <label for="google_plus_link">Google+ link</label>
          <input type="text" name="google_plus_link" id="google_plus_link" class="form-control" value="@if(isset($webSetting)){{ $webSetting->google_plus_link }}@endif" placeholder="ex. www.google+.com/">
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-12">
    <div class="col-md-12 form-group">
        <label for="footer_text">Footer Text</label>
        <input type="text" name="footer_text" id="footer_text" class="form-control" value="@if(isset($webSetting)){{ $webSetting->footer_text }}@endif">
    </div>
    <div class="col-md-12">
      <button type="submit" id="send" class="btn btn-primary">@if(isset($webSetting)) <i class="fa fa-refresh"></i>  Update @endif</button>
      <a href="{!! route('admin.dashboard') !!}" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
    </div>
  </div>


</div>


@section('js')

    <script type="text/javascript">

        // Initialize validator
        $('#setting').pxValidate({
            focusInvalid: false,
            rules: {
              'title': {
                required: true
              },
              'sub_title': {
                required: true
              },
              'footer_text':{
                required: true
              },
              'facebook_link': {
                required: true,
                url: true
              },
              'twitter_link': {
                required: true,
                url: true
              },
              'instagram_link': {
                required: true,
                url: true
              },
              'google_plus_link': {
                required: true,
                url: true
              }
            },
            messages: {
              'title': {
                required: "Please enter website title"
              },
              'sub_title': {
                required: "Please enter website sub-title"
              },
              'footer_text': {
                required: "Please enter website footer"
              },
              'facebook_link': {
                required: "Please enter facebook url"
              },
              'twitter_link': {
                required: "Please enter twitter url"
              },
              'instagram_link': {
                required: "Please enter instagram url"
              },
              'google_plus_link': {
                required: "Please enter google+ url"
              }
            }
        });

    </script>

@endsection

