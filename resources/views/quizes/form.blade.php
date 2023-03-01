<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
    <input class="form-control" name="group_id" type="number" id="group_id" value="{{ isset($quize->group_id) ? $quize->group_id : ''}}" >
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quiz') ? 'has-error' : ''}}">
    <label for="quiz" class="control-label">{{ 'Quiz' }}</label>
    <textarea class="form-control" rows="5" name="quiz" type="textarea" id="quiz" >{{ isset($quize->quiz) ? $quize->quiz : ''}}</textarea>
    {!! $errors->first('quiz', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('opsi1') ? 'has-error' : ''}}">
    <label for="opsi1" class="control-label">{{ 'Opsi1' }}</label>
    <input type="radio" name="answer" value="1">
    <textarea class="form-control" rows="5" name="opsi1" type="textarea" id="opsi1" >{{ isset($quize->opsi1) ? $quize->opsi1 : ''}}</textarea>
    {!! $errors->first('opsi1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('opsi2') ? 'has-error' : ''}}">
    <label for="opsi2" class="control-label">{{ 'Opsi2' }}</label>
    <input type="radio" name="answer" value="2">
    <textarea class="form-control" rows="5" name="opsi2" type="textarea" id="opsi2" >{{ isset($quize->opsi2) ? $quize->opsi2 : ''}}</textarea>
    {!! $errors->first('opsi2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('opsi3') ? 'has-error' : ''}}">
    <label for="opsi3" class="control-label">{{ 'Opsi3' }}</label>
    <input type="radio" name="answer" value="3">
    <textarea class="form-control" rows="5" name="opsi3" type="textarea" id="opsi3" >{{ isset($quize->opsi3) ? $quize->opsi3 : ''}}</textarea>
    {!! $errors->first('opsi3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('opsi4') ? 'has-error' : ''}}">
    <label for="opsi4" class="control-label">{{ 'Opsi4' }}</label>
    <input type="radio" name="answer" value="4">
    <textarea class="form-control" rows="5" name="opsi4" type="textarea" id="opsi4" >{{ isset($quize->opsi4) ? $quize->opsi4 : ''}}</textarea>
    {!! $errors->first('opsi4', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="control-label">{{ 'Answer' }}</label>
    <input class="form-control" name="answer" type="number" id="answer" value="{{ isset($quize->answer) ? $quize->answer : ''}}" >
    {!! $errors->first('answer', '<p class="help-block">:message</p>') !!}
</div> --}}


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
