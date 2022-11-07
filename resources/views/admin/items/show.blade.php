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
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#services" aria-controls="services" role="tab"
                                                          data-toggle="tab">Maintains</a></li>

                
            </ul>


            <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="services">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    @lang('quickadmin.qa_add_new')
                </button>

                <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">New Request</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    {!! Form::open(['method' => 'POST', 'files' => true, 'route' => ['admin.service.store']]) !!}
                    <div class="panel-body">
                            
                            <input type="hidden" name="item_id"  class="  form-control"  name="item_id" value="{{ $id}}" required >
                            <input type="hidden" name="email"  class="  form-control" placeholder="Enter room number" name="room_number" value="{{ $supplier->email }}" required >

                         
                            <div class="row">
                                    <div class="col-xs-12 form-group">
                                    {!! Form::label('type', trans('quickadmin.item.fields.type').'', ['class' => 'control-label']) !!}
                                        {!! Form::select('type', array('CLEANING' => 'Cleaning','MECHANICAL' => 'Mechanical','ELECTRICAL' => 'Electrical','PLUMBING' => 'Plumbing'), old('type'), ['class' => 'form-control select2']) !!}
                                        <p class="help-block"></p>
                                       
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('remarks', trans('quickadmin.clean.fields.remarks').'*', ['class' => 'control-label']) !!}
                                    {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('remarks'))
                                        <p class="help-block">
                                            {{ $errors->first('remarks') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-success']) !!}
                        </div> 
                        
                    {!! Form::close() !!}
                    
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                </div>
                </div>
                <table class="table table-bordered table-striped {{ count($services) > 0 ? 'datatable' : '' }}">
                    <thead>
                    <tr>
                        <th>@lang('quickadmin.service.fields.comment')</th>
                        <th>@lang('quickadmin.service.fields.status')</th>
                        <th>@lang('quickadmin.service.fields.type')</th>
                        <th>@lang('quickadmin.service.fields.createdDate')</th>
                     
                    
                        @if( request('show_deleted') == 1 )
                            <th>&nbsp;</th>
                        @else
                            <th>&nbsp;</th>
                        @endif
                    </tr>
                    </thead>

                    <tbody>
                    @if (count($services) > 0)
                        @foreach ($services as $service)
                            <tr data-entry-id="{{ $service->id }}">
                                <td field-key='customer'>{{ $service->comment or '' }}</td>
                                <td field-key='customer'>{{ $service->type or '' }}</td>
                                <td field-key='customer'>{{ $service->status or '' }}</td>
                                <td field-key='customer'>{{ $service->created_at or '' }}</td>
                              
                            
                                @if( request('show_deleted') == 1 )
                                    <td>
                                        @can('booking_delete')
                                            {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'POST',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.bookings.restore', $booking->id])) !!}
                                                                            {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                                                            {!! Form::close() !!}
                                                                        @endcan
                                                                        @can('booking_delete')
                                                                            {!! Form::open(array(
                                            'style' => 'display: inline-block;',
                                            'method' => 'DELETE',
                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                            'route' => ['admin.bookings.perma_del', $booking->id])) !!}
                                                                            {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                                            {!! Form::close() !!}
                                                                        @endcan
                                    </td>
                                @else
                                    <td>
                                        @can('booking_view')
                                            <a href="{{ route('admin.users.show',[$service->id]) }}"
                                            class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                        @endcan
                                    
                                        @can('booking_delete')
                                            {!! Form::open(array(
                                                                                    'style' => 'display: inline-block;',
                                                                                    'method' => 'DELETE',
                                                                                    'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                    'route' => ['admin.clean.destroy', $service->id])) !!}
                                            {!! Form::submit(trans('quickadmin.qa_remove'), array('class' => 'btn btn-xs btn-danger')) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>


</div>


            <p>&nbsp;</p>

            <a href="{{ route('admin.item.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
