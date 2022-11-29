@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    @can('user_management_access')


    

    <div class="main-content">
    <div class="header bg-gradient-primary pb-5 pt-5 pt-md-5">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Assets</h5>
                      <span class="h2 font-weight-bold mb-0">{{count($items)}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="item" class="text-success mr-2"><i class="fa fa-arrow-up"></i> Click Here</a>
              
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Employees</h5>
                      <span class="h2 font-weight-bold mb-0">{{count($user)}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="users" class="text-success mr-2"><i class="fa fa-arrow-up"></i> Click Here</a>
              
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Bookings </h5>
                      <span class="h2 font-weight-bold mb-0">{{count($lastMonthBookings)}} (Past 30 Days)</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="bookings" class="text-success mr-2"><i class="fa fa-arrow-up"></i> Click Here</a>
              
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">SMS Balance</h5>
                      <span class="h2 font-weight-bold mb-0">{{$availableSmsBaLANCE}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="https://app.notify.lk/dashboard" class="text-success mr-2"><i class="fa fa-arrow-up"></i> Click Here</a>
              
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
  </div>
  <div class="main-content">
    <div class="header bg-gradient-primary pb-5 ">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Today Service List ({{count($cleansBy_list)}})</h5>


                      <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="pill" href="#home">Property</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="pill" href="#menu1">Item</a>
                        </li>
                        
                      </ul>
                      <div class="tab-content">
                        <div id="home" class="tab-pane active"><br>
                         
                          <table class="table table-bordered table-striped {{ count($cleansBy_list) > 0 ? 'datatable' : '' }}">
                            <thead>
                            <tr>
                                <th>@lang('quickadmin.clean.fields.employee')</th>
                                <th>@lang('quickadmin.clean.fields.date')</th>
                                <th>@lang('quickadmin.clean.fields.type')</th>
                                <th>@lang('quickadmin.clean.fields.remarks')</th>
                                <th>@lang('quickadmin.clean.fields.assigned_at')</th>
                              
                              
                            </tr>
                            </thead>

                            <tbody>
                            @if (count($cleansBy_list) > 0)
                            @foreach ($cleansBy_list as $cleansBy)
                                @if($cleansBy->type =='CLEAN')
                                    <tr data-entry-id="{{ $cleansBy->id }}">
                                        <td field-key='customer'>{{ $cleansBy->name or '' }}</td>
                                        <td field-key='customer'>{{ $cleansBy->date or '' }}</td>
                                        <td field-key='customer'>{{ $cleansBy->type or '' }}</td>
                                        <td field-key='customer'>{{ $cleansBy->remarks or '' }}</td>
                                        <td field-key='customer'>{{ $cleansBy->created_at or '' }}</td>
                                      
                                      
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
                        <div id="menu1" class=" tab-pane fade"><br>
                        <table class="table table-bordered table-striped {{ count($services) > 0 ? 'datatable' : '' }}">
                    <thead>
                    <tr>
                        <th>@lang('quickadmin.service.fields.comment')</th>
                        
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
                                            <a href="{{ route('admin.item.show',[$service->item_id]) }}"
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


                      
                      
                    </div>
                   
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="item" class="text-success mr-2"><i class="fa fa-arrow-up"></i> Click Here</a>
              
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Last Month Bookings</h5>
                      <span class="h2 font-weight-bold mb-0">{{count($lastMonthBookings)}}</span>
                      
                        <figure class="highcharts-figure">
                          <div id="container"></div>
                          
                        </figure>

                        <script>
                          Highcharts.chart('container', {

                            title: {
                              text: 'Bookings'
                            },

                            subtitle: {
                              text: 'Bookings bEtween last 30 days'
                            },

                            yAxis: {
                              title: {
                                text: 'Number of Bookings'
                              }
                            },

                            xAxis: {
                              accessibility: {
                                rangeDescription: 'Range: 2010 to 2020'
                              }
                            },

                            legend: {
                              layout: 'vertical',
                              align: 'right',
                              verticalAlign: 'middle'
                            },

                            plotOptions: {
                              series: {
                                label: {
                                  connectorAllowed: false
                                },
                                pointStart: 2010
                              }
                            },

                            series: [{
                              name: 'Bookings',
                              data: {{$bookings}}
                            }],

                            responsive: {
                              rules: [{
                                condition: {
                                  maxWidth: 500
                                },
                                chartOptions: {
                                  legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                  }
                                }
                              }]
                            }

                            });
                          </script>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <a href="users" class="text-success mr-2"><i class="fa fa-arrow-up"></i> Click Here</a>
              
                  </p>
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
  </div>
    

    
    @endcan
@endsection
