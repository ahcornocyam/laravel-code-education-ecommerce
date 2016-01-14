<div class="row">
	<div class="form-group">
		{!! Form::label('category','Categoria:',['class'=>'form-label']) !!}
		{!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('name','Nome:',['class'=>'form-label'])!!}
		{!! Form::text('name',null,['length'=> '80','class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('description','Descrição:',['class'=>'form-label'])!!}
		{!! Form::textarea('description',null,[
				'rows' 	=> '5',
				'class' => 'form-control'
				]) !!}
	</div>
	<div class="form-group col-md-1">
		{!! Form::label('price','Preço:',['class'=>'form-label'])!!}
		{!! Form::number('price',null,[
				'min' 	=> '0',
				'class' => 'form-control'
				]) !!}
	</div>
</div>

<div class="row">
	<div class="form-group col-md-6">
		{!! Form::checkbox('featured',1,isset($product) && $product->featured == 1 ? true : false,[
					'id' 	=> 'featured',
					'class' => 'form-control'
					]) !!}
		{!! Form::label('featured','Em destaque:',['class'=>'form-label'])!!}
	</div>
	<div class="form-group col-md-6">
	    	{!! Form::checkbox('recommend',1,isset($product) && $product->recommend == 1 ? true : false,[
					'id' =>"recommend",
					'class' =>'form-control'
					]) !!}
				{!! Form::label('recommend','Recomendado:',['class'=>'form-label'])!!}
	</div>
</div>