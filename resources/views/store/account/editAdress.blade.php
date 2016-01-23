@extends('store.account.index')
  @section('AccountSection')
      <h3>Editar Endereço</h3>
      {!! Form::model($endereco, ['route'=> ['account.adress.update',$endereco->id], 'method'=> 'put']) !!}
        @include('store.account.form')
        <div class="form-group">
          {!! Form::button('Editar',['type'=>'submit','class'=>'form-control btn btn-success'])!!}
        </div>
      {!! Form::close() !!}
  @stop
