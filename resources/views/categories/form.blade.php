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
