@extends('layout')
@section('content')

					<section class="box special">
<h2>Listado de productos</h2>

	<a href="{{  route('products.create')  }}" class="button primary"> crear productos</a><br>
					<p>holaaaaaaaaaaaaaaaaaaaa  a</p>	

					@include('products.fragment.info')

<div class="col-sm-4">
	@include('products.fragment.aside')
</div>
<table>
	<thead>
		<tr>
			<th>id</th>
			<th>Nombre del producto</th>
			<th colspan="3">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $product)
		<tr>
			<td>{{ $product->id }}</td>
			<td>{{ $product->name }}</td>
			<td>
		<a href="{{ route('products.show', $product->id) }}"> ver</a>
			</td>
			<td><a href="{{ route('products.edit', $product->id) }}"> editar</a></td>

			<td><form action="{{ route('products.destroy', $product->id) }}" method="POST">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="DELETE">
				<button>eliminar</button>
			</form></td>
		</tr>
		@endforeach
	</tbody>
	 
</table>
{!! $products->render() !!}					
						
					</section>

@endsection