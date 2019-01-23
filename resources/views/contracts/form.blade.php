<div class="form-group {{ $errors->has('documentType') ? 'has-error' : ''}}">
    <label for="documentType" class="control-label">{{ 'Documenttype' }}</label>
    <select name="documentType" class="form-control" id="documentType" >
    @foreach (json_decode('{"ppp":"\u041f\u0440\u0438\u0435\u043c\u043e-\u043f\u0440\u0435\u0434\u0430\u0432\u0430\u0442\u0435\u043b\u0435\u043d \u043f\u0440\u043e\u0442\u043e\u043a\u043e\u043b","contract":"\u0414\u043e\u0433\u043e\u0432\u043e\u0440","aneks":"\u0410\u043d\u0435\u043a\u0441"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($contract->documentType) && $contract->documentType == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('documentType', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('customer_id') ? 'has-error' : ''}}">
    <label for="customer_id" class="control-label" {{ isset($customer_id) ? 'hidden' : '' }}>{{ 'Customer Id' }}</label>
    <input class="form-control" name="customer_id" type="number" id="customer_id"
           value="{{ isset($contract->customer_id) ? $contract->customer_id : !isset($customer_id) ? '' : $customer_id }}"
           {{ isset($customer_id) ? 'hidden' : '' }}
    >
    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('documentDate') ? 'has-error' : ''}}">
    <label for="documentDate" class="control-label">{{ 'Documentdate' }}</label>
    <input class="form-control" name="documentDate" type="date" id="documentDate" value="{{ isset($contract->documentDate) ? $contract->documentDate : ''}}" >
    {!! $errors->first('documentDate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('documentPath') ? 'has-error' : ''}}">
    <label for="documentPath" class="control-label">{{ 'Documentpath' }}</label>
    <input class="form-control" name="documentPath" type="file" id="documentPath"
           value="{{ isset($contract->documentPath) ? $contract->documentPath : ''}}" >
    {!! $errors->first('documentPath', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
