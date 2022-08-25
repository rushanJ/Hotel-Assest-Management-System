@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.item.title')</h3>
    {!! Form::open(['method' => 'POST', 'files' => true, 'route' => ['admin.item.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('serialNo', trans('quickadmin.item.fields.serialNo').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('serialNo', old('serialNo'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('serialNo'))
                        <p class="help-block">
                            {{ $errors->first('serialNo') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('quickadmin.item.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('brand', trans('quickadmin.item.fields.brand').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('brand', old('brand'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('brand'))
                        <p class="help-block">
                            {{ $errors->first('brand') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('model', trans('quickadmin.item.fields.model').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('model', old('model'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('model'))
                        <p class="help-block">
                            {{ $errors->first('model') }}
                        </p>
                    @endif
                </div>
            </div>

            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('supplierId', trans('quickadmin.item.fields.supplier').'', ['class' => 'control-label']) !!}
                    {!! Form::select('supplierId', $suppliers, old('supplierId'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('supplierId'))
                        <p class="help-block">
                            {{ $errors->first('supplierId') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('roomId	', trans('quickadmin.item.fields.room').'', ['class' => 'control-label']) !!}
                    {!! Form::select('roomId', $rooms, old('roomId'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('roomId'))
                        <p class="help-block">
                            {{ $errors->first('roomId') }}
                        </p>
                    @endif
                </div>
            </div>

           
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.item.fields.description').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

