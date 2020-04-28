<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ __('Name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($student->name) ? $student->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your name?</div>
</div>
<div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
    <label for="class" class="control-label">{{ __('Class') }}</label>
    <input class="form-control" name="class" type="text" id="class" value="{{ isset($student->class) ? $student->class : old('class')}}" required>
    {!! $errors->first('class', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your class?</div>
</div>
<div class="form-group {{ $errors->has('roll') ? 'has-error' : ''}}">
    <label for="roll" class="control-label">{{ __('Roll') }}</label>
    <input class="form-control" name="roll" type="text" id="roll" value="{{ isset($student->roll) ? $student->roll : old('roll')}}" required>
    {!! $errors->first('roll', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your roll?</div>
</div>
<div class="form-group {{ $errors->has('id_no') ? 'has-error' : ''}}">
    <label for="id_no" class="control-label">{{ __('Id No') }}</label>
    <input class="form-control" name="id_no" type="text" id="id_no" value="{{ isset($student->id_no) ? $student->id_no : old('id_no')}}" required>
    {!! $errors->first('id_no', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your id_no?</div>
</div>
<div class="form-group {{ $errors->has('blood_group') ? 'has-error' : ''}}">
    <label for="blood_group" class="control-label">{{ __('Blood Group') }}</label>
    <input class="form-control" name="blood_group" type="text" id="blood_group" value="{{ isset($student->blood_group) ? $student->blood_group : old('blood_group')}}" required>
    {!! $errors->first('blood_group', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your blood_group?</div>
</div>
<div class="form-group {{ $errors->has('father') ? 'has-error' : ''}}">
    <label for="father" class="control-label">{{ __('Father') }}</label>
    <input class="form-control" name="father" type="text" id="father" value="{{ isset($student->father) ? $student->father : old('father')}}" required>
    {!! $errors->first('father', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your father?</div>
</div>
<div class="form-group {{ $errors->has('monther') ? 'has-error' : ''}}">
    <label for="monther" class="control-label">{{ __('Monther') }}</label>
    <input class="form-control" name="monther" type="text" id="monther" value="{{ isset($student->monther) ? $student->monther : old('monther')}}" required>
    {!! $errors->first('monther', '<p class="text-danger">:message</p>') !!}
    <div class="invalid-feedback"> What's your monther?</div>
</div>


<div class="form-group">
    <input class="btn btn-primary btn-sm" type="submit" value="{{ $formMode === 'edit' ? __('Update') : __('Create') }}">
</div>
