@extends('layout_admin.template')
@section('content')

      <div class="table">
        {{ Form::open(array('url' => 'admin/category/save', 'files' => true)) }}
        {{ Form::hidden('id', $category->id) }}
        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Edit Category</th>
          </tr>
          <tr>
            <td><strong>{{ Form::label('cname', 'Category Name') }}</strong></td>
            <td>{{ Form::text('cname', $category->name) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('profile', 'Profile') }}</strong></td>
            <td>{{ Form::textarea('profile', $category->profile) }}</td>
          </tr>
          <tr>
            <td colspan="2">{{ Form::submit('Update Category') }}</td>
          </tr>
        </table>

        {{ Form::close() }}
      </div>

@stop