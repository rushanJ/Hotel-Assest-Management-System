@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.bookings.title')</h3>
  

    <ul class="nav nav-tabs" role="tablist">

                
<li role="presentation" class=""><a href="#cleaning" aria-controls="cleaning" role="tab"
                                        data-toggle="tab">Cleaning</a></li>

<li role="presentation" class=""><a href="#mechanical" aria-controls="mechanical" role="tab"
                                        data-toggle="tab">Mechanical</a></li>

<li role="presentation" class=""><a href="#electrical" aria-controls="electrical" role="tab"
                                        data-toggle="tab">Electrical</a></li>

<li role="presentation" class=""><a href="#plumbing" aria-controls="plumbing" role="tab"
                                        data-toggle="tab">Plumbing</a></li>
                            

</ul>


<div class="tab-content">


<div role="tabpanel" class="tab-pane inactive" id="cleaning">
     

    
    <table class="table table-bordered table-striped {{ count($cleansBy_list) > 0 ? 'datatable' : '' }}">
        <thead>
        <tr>
            <th>@lang('quickadmin.clean.fields.employee')</th>
            <th>@lang('quickadmin.clean.fields.date')</th>
            <th>@lang('quickadmin.clean.fields.type')</th>
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
            @if($cleansBy->type =='CLEAN')
                <tr data-entry-id="{{ $cleansBy->id }}">
                    <td field-key='customer'>{{ $cleansBy->name or '' }}</td>
                    <td field-key='customer'>{{ $cleansBy->date or '' }}</td>
                    <td field-key='customer'>{{ $cleansBy->is_regular or '' }}</td>
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
                @endif
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

<div role="tabpanel" class="tab-pane inactive" id="mechanical">
       

   
    <table class="table table-bordered table-striped {{ count($cleansBy_list) > 0 ? 'datatable' : '' }}">
        <thead>
        <tr>
            <th>@lang('quickadmin.clean.fields.employee')</th>
            <th>@lang('quickadmin.clean.fields.date')</th>
            <th>@lang('quickadmin.clean.fields.type')</th>
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
             @if($cleansBy->type =='MECHANICAL')    
                <tr data-entry-id="{{ $cleansBy->id }}">
                    <td field-key='customer'>{{ $cleansBy->name or '' }}</td>
                    <td field-key='customer'>{{ $cleansBy->date or '' }}</td>
                    <td field-key='customer'>{{ $cleansBy->is_regular or '' }}</td>
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
                @endif
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>


<div role="tabpanel" class="tab-pane inactive" id="electrical">
       

   
    <table class="table table-bordered table-striped {{ count($cleansBy_list) > 0 ? 'datatable' : '' }}">
        <thead>
        <tr>
            <th>@lang('quickadmin.clean.fields.employee')</th>
            <th>@lang('quickadmin.clean.fields.date')</th>
            <th>@lang('quickadmin.clean.fields.type')</th>
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
             @if($cleansBy->type =='ELECTICAL')                       
                <tr data-entry-id="{{ $cleansBy->id }}">
                    <td field-key='customer'>{{ $cleansBy->name or '' }}</td>
                    <td field-key='customer'>{{ $cleansBy->date or '' }}</td>  
                    <td field-key='type'>{{ $cleansBy->is_regular or '' }}</td>
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
                @endif
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

<div role="tabpanel" class="tab-pane inactive" id="plumbing">
        

  
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
            @if($cleansBy->type =='PLUMBING') 
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
                @endif
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
</div>


  
@stop

@section('javascript') 
    <script>
        @can('booking_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.bookings.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection