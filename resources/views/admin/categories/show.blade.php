@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.categories.title')</h3>
  

    


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('quickadmin.categories.fields.name')</th>
                                <td field-key='shortcode'>{{ $category->name }}</td>
                            </tr>
                           
                        </table>
                    </div>
                </div><!-- Nav tabs -->
           
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('country_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.categories.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection