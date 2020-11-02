<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($test1->name) ? $test1->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your name?</div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ __('Email') }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($test1->email) ? $test1->email : old('email')}}" required>
    {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your email?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
</div>
