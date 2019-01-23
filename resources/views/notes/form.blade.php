<div class="form-group {{ $errors->has('note_text') ? 'has-error' : ''}}">
    <label for="note_text" class="control-label">{{ 'Note Text' }}</label>
    <textarea class="form-control" rows="5" name="note_text" type="textarea" id="note_text" >{{ isset($note->note_text) ? $note->note_text : ''}}</textarea>
    {!! $errors->first('note_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('good_id') ? 'has-error' : ''}}">
    <label for="good_id" class="control-label">{{ 'Good Id' }}</label>
    <input class="form-control" name="good_id" type="number" id="good_id" value="{{ isset($note->good_id) ? $note->good_id : ''}}" >
    {!! $errors->first('good_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
