@extends('layouts.app')

@section('content')
    @can('simple_user_access')

    @foreach ($cleans_list as $clean_room)
                   
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">{{ $clean_room->room_number }} </div>

                                <div class="panel-body">
                                <p> Date : {{ $clean_room->date }} </p>
                                <p> Created At : {{ $clean_room->created_at }} </p>
                                    <hr>
                                    <p> {{ $clean_room->remarks }} </p>
                                    @if($clean_room->status =='PENDING')         
                                        <a  href="room_clean_done/{{ $clean_room->id }} " type="button" class="btn btn-success">Completed</a>        
                                     @else
                                            <td> DONE </td>        
                                        @endif
                                        

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
    
    @endcan
@endsection
