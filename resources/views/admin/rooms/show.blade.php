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
                            <th>@lang('quickadmin.rooms.fields.room-number')</th>
                            <td field-key='room_number'>{{ $room->room_number }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.rooms.fields.floor')</th>
                            <td field-key='floor'>{{ $room->floor }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.rooms.fields.description')</th>
                            <td field-key='description'>{!! $room->description !!}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                <img src="http://localhost:8000/storage/{{$room->image}}" alt="Image" style="border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 350px;">
                </div>
                
            </div><!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active"><a href="#bookings" aria-controls="bookings" role="tab"
                                                          data-toggle="tab">Bookings</a></li>
                <li role="presentation" class=""><a href="#cleaning" aria-controls="cleaning" role="tab"
                                                          data-toggle="tab">Cleaning</a></li>
                                            
                <li role="presentation" class=""><a href="#items" aria-controls="items" role="tab"
                                                          data-toggle="tab">items</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane active" id="bookings">
                    <table class="table table-bordered table-striped {{ count($bookings) > 0 ? 'datatable' : '' }}">
                        <thead>
                        <tr>
                            <th>@lang('quickadmin.bookings.fields.customer')</th>
                            <th>@lang('quickadmin.bookings.fields.room')</th>
                            <th>@lang('quickadmin.bookings.fields.time-from')</th>
                            <th>@lang('quickadmin.bookings.fields.time-to')</th>
                            <th>@lang('quickadmin.bookings.fields.additional-information')</th>
                            @if( request('show_deleted') == 1 )
                                <th>&nbsp;</th>
                            @else
                                <th>&nbsp;</th>
                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @if (count($bookings) > 0)
                            @foreach ($bookings as $booking)
                                <tr data-entry-id="{{ $booking->id }}">
                                    <td field-key='customer'>{{ $booking->customer->first_name or '' }}</td>
                                    <td field-key='room'>{{ $booking->room->room_number or '' }}</td>
                                    <td field-key='time_from'>{{ $booking->time_from }}</td>
                                    <td field-key='time_to'>{{ $booking->time_to }}</td>
                                    <td field-key='additional_information'>{!! $booking->additional_information !!}</td>
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
                                                <a href="{{ route('admin.bookings.show',[$booking->id]) }}"
                                                   class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                            @endcan
                                            @can('booking_edit')
                                                <a href="{{ route('admin.bookings.edit',[$booking->id]) }}"
                                                   class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                            @endcan
                                            @can('booking_delete')
                                                {!! Form::open(array(
                                                                                        'style' => 'display: inline-block;',
                                                                                        'method' => 'DELETE',
                                                                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                        'route' => ['admin.bookings.destroy', $booking->id])) !!}
                                                {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
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

                <div role="tabpanel" class="tab-pane inactive" id="cleaning">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        @lang('quickadmin.qa_add_new')
                    </button>

                    <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                        {!! Form::open(['method' => 'POST', 'files' => true, 'route' => ['admin.clean.store']]) !!}
                        <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        {!! Form::label('date', trans('quickadmin.clean.fields.date').'*', ['class' => 'control-label']) !!}
                                        {!! Form::date('date', old('date'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('date'))
                                            <p class="help-block">
                                                {{ $errors->first('date') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" name="room_id"  class="  form-control" placeholder="Enter room number" name="room_number" value="{{ $id}}" required >
                                
                                
                            
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        {!! Form::label('user_id', trans('quickadmin.clean.fields.employee').'', ['class' => 'control-label']) !!}
                                        {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2']) !!}
                                        <p class="help-block"></p>
                                        @if($errors->has('user_id'))
                                            <p class="help-block">
                                                {{ $errors->first('user_id') }}
                                            </p>
                                        @endif
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
                    <table class="table table-bordered table-striped {{ count($cleansBy_list) > 0 ? 'datatable' : '' }}">
                        <thead>
                        <tr>
                            <th>@lang('quickadmin.clean.fields.employee')</th>
                            <th>@lang('quickadmin.clean.fields.date')</th>
                            <th>@lang('quickadmin.clean.fields.remarks')</th>
                            <th>@lang('quickadmin.clean.fields.assigned_at')</th>
                           
                            @if( request('show_deleted') == 1 )
                                <th>&nbsp;</th>
                            @else
                                <th>&nbsp;</th>
                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @if (count($cleansBy_list) > 0)
                        @foreach ($cleansBy_list as $cleansBy)
                                <tr data-entry-id="{{ $cleansBy->id }}">
                                    <td field-key='customer'>{{ $cleansBy->name or '' }}</td>
                                    <td field-key='customer'>{{ $cleansBy->date or '' }}</td>
                                    <td field-key='customer'>{{ $cleansBy->remarks or '' }}</td>
                                    <td field-key='customer'>{{ $cleansBy->created_at or '' }}</td>
                                   
                                    @if( request('show_deleted') == 1 )
                                        <td>
                                            @can('booking_delete')
                                                {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'POST',
                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                'route' => ['admin.bookings.restore', $cleansBy->id])) !!}
                                                                                {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                                                                {!! Form::close() !!}
                                                                            @endcan
                                                                            @can('booking_delete')
                                                                                {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                'route' => ['admin.bookings.perma_del', $cleansBy->id])) !!}
                                                                                {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                                                {!! Form::close() !!}
                                                                            @endcan
                                        </td>
                                    @else
                                        <td>
                                            @can('booking_view')
                                                <a href="{{ route('admin.users.show',[$cleansBy->user_id]) }}"
                                                   class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                            @endcan
                                          
                                            @can('booking_delete')
                                                {!! Form::open(array(
                                                                                        'style' => 'display: inline-block;',
                                                                                        'method' => 'DELETE',
                                                                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                        'route' => ['admin.clean.destroy', $cleansBy->id])) !!}
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

                <div role="tabpanel" class="tab-pane inactive" id="items">
                      
                    <table class="table table-bordered table-striped {{ count($bookings) > 0 ? 'datatable' : '' }}">
                        <thead>
                        <tr>
                            <th>@lang('quickadmin.item.fields.serialNo')</th>
                            <th>@lang('quickadmin.item.fields.name')</th>
                            <th>@lang('quickadmin.item.fields.brand')</th>
                            <th>@lang('quickadmin.item.fields.model')</th>
                            <th>@lang('quickadmin.item.fields.description')</th>
                           
                            @if( request('show_deleted') == 1 )
                                <th>&nbsp;</th>
                            @else
                                <th>&nbsp;</th>
                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @if (count($items) > 0)
                            @foreach ($items as $item)
                                <tr data-entry-id="{{ $item->id }}">
                                    <td field-key='customer'>{{ $item->serialNo or '' }}</td>
                                    <td field-key='customer'>{{ $item->name or '' }}</td>
                                    <td field-key='customer'>{{ $item->brand or '' }}</td>
                                    <td field-key='customer'>{{ $item->model or '' }}</td>
                                    <td field-key='customer'>{{ $item->description or '' }}</td>
                                   
                                    @if( request('show_deleted') == 1 )
                                        <td>
                                            @can('booking_delete')
                                                {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'POST',
                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                'route' => ['admin.bookings.restore', $item->id])) !!}
                                                                                {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                                                                {!! Form::close() !!}
                                                                            @endcan
                                                                            @can('booking_delete')
                                                                                {!! Form::open(array(
                                                'style' => 'display: inline-block;',
                                                'method' => 'DELETE',
                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                'route' => ['admin.bookings.perma_del', $item->id])) !!}
                                                                                {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                                                {!! Form::close() !!}
                                                                            @endcan
                                        </td>
                                    @else
                                        <td>
                                            @can('booking_view')
                                                <a href="{{ route('admin.item.show',[$item->id]) }}"
                                                   class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                            @endcan
                                          
                                            @can('booking_delete')
                                                {!! Form::open(array(
                                                                                        'style' => 'display: inline-block;',
                                                                                        'method' => 'DELETE',
                                                                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                        'route' => ['admin.item.destroy', $item->id])) !!}
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

            <a href="{{ route('admin.rooms.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
