

<div class="row">
	<div class="input-field col l4">		
		{!! Form::select('category_id',$categories,null) !!}
		{!! Form::label('category','Categoria:') !!}
	</div>
</div>
<div class="col l12">
	<div class="input-field">
		{!! Form::label('name','Nome:')!!}
		{!! Form::text('name',null,['length'=> '80']) !!}
	</div>
</div>
<div class="col l12">
	<div class="input-field">
		{!! Form::label('description','Descrição:')!!}
		{!! Form::textarea('description',null,[
			'rows' 	=> '5',
			'class' => 'materialize-textarea'
			]) !!}
	</div>
</div>
<div class="col l4">
	<div class="input-field">
		{!! Form::label('price','Preço:')!!}
		{!! Form::number('price',null,[
			'min' 	=> '0'
			]) !!}
	</div>
</div>
<div class="row">
	<div class="col l6">
	    {!! Form::checkbox('featured',1,isset($product) && $product->featured == 1 ? true : false,[
				'id' =>'featured'
				]) !!}
			{!! Form::label('featured','Em destaque:')!!}
	</div>
	<div class="col l6">
    	{!! Form::checkbox('recommend',1,isset($product) && $product->recommend == 1 ? true : false,[
				'id' =>"recommend",
				'class' =>'grey-text'
				]) !!}
			{!! Form::label('recommend','Recomendado:')!!}
	</div>
</div>
