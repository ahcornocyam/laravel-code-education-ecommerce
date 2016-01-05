@extends('store.store')
	@section('categories')
		@include('store.partial.categories')
	@stop
	@section('content')
    	<div class="col-sm-9 padding-right">
            @include('store.partial.featured',['products'=>$pFeatured])

            @include('store.partial.recommend',['products'=>$pRecommend])
        </div>
	@stop