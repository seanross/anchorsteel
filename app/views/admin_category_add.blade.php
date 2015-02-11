@extends('layout_admin.template')
@section('content')

<div class="table">
    {{ Form::open(array('url' => 'admin/category/save', 'files' => true)) }}

    <table class="listing form" cellpadding="0" cellspacing="0">
      <tr>
        <th class="full" colspan="2">Add New Category</th>
      </tr>
      <tr>
        <td><strong>{{ Form::label('cname', 'Category Name') }}</strong></td>
        <td>{{ Form::text('cname') }}</td>
      </tr>
      <tr>
        <td><strong>{{ Form::label('profile', 'Profile') }}</strong></td>
        <td>{{ Form::textarea('profile') }}</td>
      </tr>
      <tr>
        <td colspan="2">{{ Form::submit('Add Category') }}</td>
      </tr>
    </table>

    {{ Form::close() }}
  </div>

@stop