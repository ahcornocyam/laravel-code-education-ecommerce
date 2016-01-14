<div class="form-group">
		{!! Form::label('name','Nome:',['class'=>'form-label'])!!}
		{!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::label('description','Descrição:',['class'=>'form-label'])!!}
		{!! Form::textarea('description',null,[
			'class' => 'form-control'
		]) !!}
</div>
