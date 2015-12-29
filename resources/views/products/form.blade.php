<div class="mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		{!! Form::text('name',null,[
			'class' => 'mdl-textfield__input',
			'id'		=> 'name'
			]) !!}
		{!! Form::label('name','Nome:',[
			'class' => 'mdl-textfield__label'
			])!!}
	</div>
</div>
<div class="mdl-cell--12-col">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		{!! Form::textarea('description',null,[
			'class' => 'mdl-textfield__input',
			'id'		=> 'description'
			]) !!}
			{!! Form::label('description','Descrição:',[
				'class' => 'mdl-textfield__label'
				])!!}
	</div>
</div>
<div class="mdl-cell--3-col">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		{!! Form::number('price',null,[
			'class' => 'mdl-textfield__input',
			'id'		=> 'price',
			'min' 	=> '0'
			]) !!}
			{!! Form::label('price','Preço:',[
				'class' => 'mdl-textfield__label'
				])!!}
	</div>
</div>
<div class="mdl-grid">
	<div class="mdl-cell--6-col">
		<div class="">
			{!! Form::label('featured','Em destaque:')!!}
	    {!! Form::checkbox('featured',true) !!}
		</div>
	</div>
	<div class="mdl-cell--6-col">
		<div class="">
			{!! Form::label('recommend','Recomendado:')!!}
    	{!! Form::checkbox('recommend',true) !!}
		</div>
	</div>
</div>
