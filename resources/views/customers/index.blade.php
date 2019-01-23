@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            {{--@include('admin.sidebar')--}}
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Customers</div>
                    <div class="card-body">
                        <a href="{{ url('/customers/create') }}" class="btn btn-success btn-sm" title="Add New customer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <customers-list></customers-list>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    td {
        font-size: 18px;
    }
    th {
        font-size: 18px;
    }
</style>
