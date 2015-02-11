@extends('layout_admin.template')
@section('content')

      <div class="table">
        {{ Form::open(array('url' => 'admin/product/save')) }}

        {{ Form::hidden("id", $product->id) }}

        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Edit Product</th>
          </tr>
          <tr>
            <td width="172"><strong>Preview</strong></td>
            <td><img src="{{ asset($product->images->random(1)->name) }}" height="91" width="91" /></td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('pname', 'Product Name') }}</strong></td>
            <td>{{ Form::text('pname', $product->name) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('price', 'Price') }}</strong></td>
            <td>{{ Form::text('price', $product->price) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('discount', 'Discount') }}</strong></td>
            <td>{{ Form::text('discount', $product->discount) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('stock', 'Stock/s') }}</strong></td>
            <td>{{ Form::text('stock', $product->stock) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('category', 'Category') }}</strong></td>
            <td>{{ Form::select('category', $category_options , $product->category->id) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('manufacturer', 'Manufacturer') }}</strong></td>
            <td>{{ Form::select('manufacturer', $manufacturer_options , $product->manufacturer->id) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('warehouse', 'Warehouse') }}</strong></td>
            <td>{{ Form::select('warehouse', $warehouse_options , $product->warehouse->id) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('profile', 'Profile') }}</strong></td>
            <td>{{ Form::textarea('profile', $product->profile) }}</td>
          </tr>
          <tr>
            <td><strong>Is Featured   ?</strong></td>
            <td>{{ Form::label('featured', 'Yes') }}
              {{ Form::radio('featured', 1) }}
              {{ Form::label('featured', 'No') }}
              {{ Form::radio('featured', 0, true) }}</td>
          </tr>
          <tr>
            <td colspan="2">{{ Form::submit('Update Product Product') }}</td>
          </tr>
        </table>

        {{ Form::close() }}
      </div>


@stop