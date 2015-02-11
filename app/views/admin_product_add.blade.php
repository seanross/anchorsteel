@extends('layout_admin.template')
@section('content')

      <div class="table">
        {{ Form::open(array('url' => 'admin/product/save', 'files' => true)) }}

        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Add New Product</th>
          </tr>
          <tr>
            <td width="172"><strong>{{ Form::label('file','Upload image',array('id'=>'','class'=>'')) }}</strong></td>
            <td>{{ Form::file('file','',array('id'=>'','class'=>'')) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('pname', 'Product Name') }}</strong></td>
            <td>{{ Form::text('pname') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('price', 'Price') }}</strong></td>
            <td>{{ Form::text('price') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('discount', 'Discount') }}</strong></td>
            <td>{{ Form::text('discount') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('stock', 'Stock/s') }}</strong></td>
            <td>{{ Form::text('stock') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('category', 'Category') }}</strong></td>
            <td>{{ Form::select('category', $category_options , Input::old('category')) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('manufacturer', 'Manufacturer') }}</strong></td>
            <td>{{ Form::select('manufacturer', $manufacturer_options , Input::old('manufacturer')) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('warehouse', 'Warehouse') }}</strong></td>
            <td>{{ Form::select('warehouse', $warehouse_options , Input::old('warehouse')) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('profile', 'Profile') }}</strong></td>
            <td>{{ Form::textarea('profile') }}</td>
          </tr>
          <tr>
            <td><strong>Is Featured   ?</strong></td>
            <td>{{ Form::label('featured', 'Yes') }}
              {{ Form::radio('featured', 1) }}
              {{ Form::label('featured', 'No') }}
              {{ Form::radio('featured', 0, true) }}</td>
          </tr>
          <tr>
            <td colspan="2">{{ Form::submit('Add Product') }}</td>
          </tr>
        </table>

        {{ Form::close() }}
      </div>


@stop