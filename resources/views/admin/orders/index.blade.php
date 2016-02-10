@extends('layouts.app')
  @section('content')
    <article>
      <header>
        <h1>Pedidos</h1>
      </header>
      <section>
        <table class="table table-hover" width="100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome do Cliente</th>
              <th>total</th>
              <th>Status</th>
              <th>Data</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              @forelse ($orders as $order)
                <tr style="cursor:pointer" data-id="{{$order->id}}">
                  <td>{{$order->id}}</td>
                  <td>{{ $order->user->name}}</td>
                  <td>R$:{{ number_format($order->total , 2, ',','.')}}</td>
                  <td>{{ $order->status }}</td>
                  <td>{{ $order->created_at->format('d/m/Y')}}</td>
                  <td></td>
                </tr>
              @empty
                <tr>
                  <td colspan="4">Não ha pedidos</td>
                </tr>
              @endforelse
          </tbody>
        </table>
        <div class="text-center">
          {{ $orders->render() }}
        </div>
      </section>
    </article>
@stop
