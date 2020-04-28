<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($teacher->name) ? $teacher->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your name?</div>
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ __('Address') }}</label>
    <textarea class="form-control" rows="5" name="address" type="textarea" id="address" required>{{ isset($teacher->address) ? $teacher->address : ''}}</textarea>
    {!! $errors->first('address', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your address?</div>
</div>
<div class="form-group {{ $errors->has('phone_no') ? 'has-error' : ''}}">
    <label for="phone_no" class="control-label">{{ __('Phone No') }}</label>
    <input class="form-control" name="phone_no" type="number" id="phone_no" value="{{ isset($teacher->phone_no) ? $teacher->phone_no : old('phone_no')}}" required>
    {!! $errors->first('phone_no', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your phone_no?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Create') }}">
</div>
