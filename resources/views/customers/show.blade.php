@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('admin.sidebar')

            <customer-show :customerid="{{ $customer->id }}">
            </customer-show>
            {{--<div class="col-md-9">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header">--}}
                    {{--<h3>{{ $customer->firstname }} {{ $customer->lastname }}</h3>--}}
                        {{--<p class="card-subtitle">{{ $customer->city }}</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}

                        {{----}}
                        {{--<a href="{{ url('/customers') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>--}}
                        {{--<a href="{{ url('/customers/' . $customer->id . '/edit') }}" title="Edit customer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>--}}

                        {{--<form method="POST" action="{{ url('customers' . '/' . $customer->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                            {{--{{ method_field('DELETE') }}--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<button type="submit" class="btn btn-danger btn-sm" title="Delete customer" onclick="return confirm(&quote;Confirm delete?&quote;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                        {{--</form>--}}
                        {{--<br/>--}}
                        {{--<br>--}}
                             {{--<goods :customerid="{{ $customer->id }}"></goods>--}}
                        {{--<br>--}}
                        {{--<br>--}}
                            {{--<docs :customerid="{{ $customer->id }}"></docs>--}}
                        {{--<br>--}}
                        {{--<br>--}}
                            {{--<company-partial :customerid="{{ $customer->id }}"></company-partial>--}}
                        {{--<b-tabs>--}}
                            {{--<b-tab>--}}
                                {{--fwef--}}
                            {{--</b-tab>--}}
                            {{--<b-tab>--}}
                                {{--wef--}}
                            {{--</b-tab>--}}
                        {{--</b-tabs>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

    </div>
@endsection
<style>
    th  {
        font-size: 18px;
    }
    td {
        font-size: 18px;
    }
</style>
