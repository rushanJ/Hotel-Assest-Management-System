@extends('layouts.app')

@section('content')
    @can('simple_user_access')

    @foreach ($cleans_list as $clean_room)
                   
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default" style="width:200%">
                                <div class="panel-heading">{{ $clean_room->room_number }} </div>

                                    <div class="panel-body">
                                    <p> Date : {{ $clean_room->date }} </p>
                                    <p> Created At : {{ $clean_room->created_at }} </p>
                                        <hr>
                                        <p> {{ $clean_room->remarks }} </p>
                                        @if($clean_room->status =='PENDING')       
                                        <button type="button" onclick="setID({{ $clean_room->id }})" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                                        Completed
                                        </button>  
                                            <!-- <a  href="room_clean_done/{{ $clean_room->id }} " type="button" class="btn btn-success">Completed</a>         -->
                                        @else
                                                <td> DONE </td>        
                                        @endif

                                    
                                     

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            
                                <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Complete</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                <form method="get" action="room_clean_done">
 
 
                        <div class="panel-body">
                            
                            <input type="hidden" id="id"  class="  form-control"  name="id"  required >

                         
                      
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
                            <div class="row">
                                <div class="col-xs-12 form-group">
                                    {!! Form::label('missingItems', trans('quickadmin.clean.fields.missingItems').'*', ['class' => 'control-label']) !!}
                                    {!! Form::textarea('missingItems', old('missingItems'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('missingItems'))
                                        <p class="help-block">
                                            {{ $errors->first('missingItems') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-success']) !!}
                        </div> 
                        
                        </form>
                    
                                
                                </div>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                
                            </div>
                            </div>
                 </div>

                 <script>
                    function setID(id){
                        document.getElementById("id").value=id;
                    }
                </script>

                    
                    @endforeach
    
    @endcan
@endsection
