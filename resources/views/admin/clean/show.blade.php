@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.item.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.item.fields.serialNo')</th>
                            <td field-key='room_number'>{{ $item->serialNo }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.item.fields.name')</th>
                            <td field-key='floor'>{{ $item->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.item.fields.model')</th>
                            <td field-key='floor'>{{ $item->model }}</td>
                        </tr> 
                        <tr>
                            <th>@lang('quickadmin.item.fields.brand')</th>
                            <td field-key='floor'>{{ $item->brand }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.item.fields.room')</th>
                            <td field-key='floor'>{{ $room->room_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.item.fields.supplier')</th>
                            <td field-key='description'>{!! $supplier->name !!}</td>
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
