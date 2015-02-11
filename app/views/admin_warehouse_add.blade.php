@extends('layout_admin.template')
@section('content')

      <div class="table">
        {{ Form::open(array('url' => 'admin/warehouse/save', 'files' => true)) }}

        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Add New Warehouse</th>
          </tr>
          <tr>
            <td><strong>{{ Form::label('wname', 'Warehouse Name') }}</strong></td>
            <td>{{ Form::text('wname') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('address', 'Address') }}</strong></td>
            <td>{{ Form::textarea('address') }}</td>
          </tr>
          <tr>
            <td colspan="2">{{ Form::submit('Add Warehouse') }}</td>
          </tr>
        </table>

        {{ Form::close() }}
      </div>


@stop