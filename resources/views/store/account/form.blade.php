<div class="row">
  <div class="form-group">
    {!! Form::label('nome','Nome para o Endereço:',['class'=>'form-label'])!!}
    {!! Form::text('nome',null,['maxlength'=> '80','class'=>'form-control']) !!}
  </div>
    <div class="form-group">
      <label for="estado">Estado</label>
      <select class="form-control" name="estado" id="estados">
      </select>
    </div>
    <div class="form-group">
      <label for="cidade">Cidades</label>
      <select class="form-control" name="cidade" id="cidades"></select>
    </div>
    <div class="form-group">
  		{!! Form::label('rua','Rua:',['class'=>'form-label'])!!}
  		{!! Form::text('rua',null,['maxlength'=> '80','class'=>'form-control']) !!}
  	</div>
    <div class="form-group">
      {!! Form::label('numero','numero:',['class'=>'form-label'])!!}
      {!! Form::text('numero',null,['maxlength'=> '5','class'=>'form-control']) !!}
    </div>
    <div class="form-group">
  		{!! Form::label('bairro','Bairro:',['class'=>'form-label'])!!}
  		{!! Form::text('bairro',null,['maxlength'=> '80','class'=>'form-control']) !!}
  	</div>
    <div class="form-group">
  		{!! Form::label('cep','CEP:',['class'=>'form-label'])!!}
  		{!! Form::text('cep',null,['maxlength'=> '14','class'=>'form-control']) !!}
  	</div>

</div>
