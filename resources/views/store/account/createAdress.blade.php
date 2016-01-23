@extends('store.account.index')
  @section('AccountSection')
      <h3>Novo Endereço</h3>
      {!! Form::open(['route'=> 'account.adress.store','method'=> 'post']) !!}
        @include('store.account.form')
        <div class="form-group">
          {!! Form::button('Cadastrar',['type'=>'submit','class'=>'form-control btn btn-success'])!!}
        </div>
      {!! Form::close() !!}
  @stop
