@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.rooms.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.supplier.fields.supplier-number')</th>
                            <td field-key='room_number'>{{ $supplier->id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.supplier.fields.name')</th>
                            <td field-key='floor'>{{ $supplier->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.supplier.fields.name')</th>
                            <td field-key='floor'>{{ $supplier->name }}</td>
                        </tr> 
                        <tr>
                            <th>@lang('quickadmin.supplier.fields.address')</th>
                            <td field-key='floor'>{{ $supplier->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.supplier.fields.contactNo')</th>
                            <td field-key='floor'>{{ $supplier->contactNo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.supplier.fields.email')</th>
                            <td field-key='description'>{!! $supplier->email !!}</td>
                        </tr>
                    </table>
                </div>
               
                
            </div><!-- Nav tabs -->
           

            <!-- Tab panes -->
           

            <p>&nbsp;</p>

            <a href="{{ route('admin.supplier.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
