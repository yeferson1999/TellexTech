@extends('layout')
 
@section('content')

 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Listado de productos
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i>Inicio</li>
            <li class="active">Listado de productos</li>
          </ol>
        </section>

@include('products.fragment.info')
 <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de productos</h3>
                </div><!-- /.box-header -->
                <a href="{{  route('products.create')  }}" class="btn btn-primary"> crear productos</a><br>
<div class="box-header">
	@include('products.fragment.aside')
</div>
<table id="example2" class="table table-bordered table-hover">
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
				</div>
			</div>
		</div>
	</section>

@endsection