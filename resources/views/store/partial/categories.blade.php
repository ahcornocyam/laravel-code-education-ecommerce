<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Categorias</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @forelse( $categories  as $category )
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{ route('category.show',$category->id) }}"> {{ $category->name }}</a>
                        </h4>
                    </div>
                </div>
            @empty
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                           não há categorias
                        </h4>
                    </div>
                </div>
            @endforelse
        </div><!--/category-products-->
    </div>
</div>