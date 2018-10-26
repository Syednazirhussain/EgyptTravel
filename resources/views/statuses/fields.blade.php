<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_code', 'Status Code:') !!}
    {!! Form::text('status_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('statuses.index') !!}" class="btn btn-default">Cancel</a>
</div>
