<div class="form-group {{ $errors->has('company_name') ? 'has-error' : ''}}">
    <label for="company_name" class="control-label">{{ 'Company Name' }}</label>
    <input class="form-control" name="company_name" type="text" id="company_name" value="{{ isset($company->company_name) ? $company->company_name : ''}}" >
    {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('company_address') ? 'has-error' : ''}}">
    <label for="company_address" class="control-label">{{ 'Company Address' }}</label>
    <input class="form-control" name="company_address" type="text" id="company_address" value="{{ isset($company->company_address) ? $company->company_address : ''}}" >
    {!! $errors->first('company_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('company_phone') ? 'has-error' : ''}}">
    <label for="company_phone" class="control-label">{{ 'Company Phone' }}</label>
    <input class="form-control" name="company_phone" type="text" id="company_phone" value="{{ isset($company->company_phone) ? $company->company_phone : ''}}" >
    {!! $errors->first('company_phone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Company_address') ? 'has-error' : ''}}">
    <label for="Company_address" class="control-label">{{ 'Company Address' }}</label>
    <input class="form-control" name="Company_address" type="text" id="Company_address" value="{{ isset($company->Company_address) ? $company->Company_address : ''}}" >
    {!! $errors->first('Company_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('company_bulstat') ? 'has-error' : ''}}">
    <label for="company_bulstat" class="control-label">{{ 'Company Bulstat' }}</label>
    <input class="form-control" name="company_bulstat" type="text" id="company_bulstat" value="{{ isset($company->company_bulstat) ? $company->company_bulstat : ''}}" >
    {!! $errors->first('company_bulstat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('company_mol') ? 'has-error' : ''}}">
    <label for="company_mol" class="control-label">{{ 'Company Mol' }}</label>
    <input class="form-control" name="company_mol" type="text" id="company_mol" value="{{ isset($company->company_mol) ? $company->company_mol : ''}}" >
    {!! $errors->first('company_mol', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('customer_id') ? 'has-error' : ''}}">
    <label for="customer_id" class="control-label">{{ 'Customer Id' }}</label>
    <input class="form-control" name="customer_id" type="number" id="customer_id" value="{{ isset($company->customer_id) ? $company->customer_id : ''}}" >
    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
