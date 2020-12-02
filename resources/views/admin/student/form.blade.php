<div class="d-flex align-items-center justify-content-center">
    <div class="d-flex flex-column">



<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($student->name) ? $student->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your name?</div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ __('Address') }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($student->address) ? $student->address : old('address')}}" required>
    {!! $errors->first('address', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your address?</div>
</div>

      
        <div class="form-group">
            <input class="btn btn-primary btn-sm oneTimeSubmit" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Save') }}">
        </div>
    </div>
  </div>

