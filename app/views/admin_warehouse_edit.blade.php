@extends('layout_admin.template')
@section('content')

      <div class="table">
        {{ Form::open(array('url' => 'admin/warehouse/save', 'files' => true)) }}
        {{ Form::hidden('id', $warehouse->id) }}
        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Edit Warehouse</th>
          </tr>
          <tr>
            <td><strong>{{ Form::label('wname', 'Warehouse Name') }}</strong></td>
            <td>{{ Form::text('wname', $warehouse->name) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('address', 'Address') }}</strong></td>
            <td>{{ Form::textarea('address', $warehouse->address) }}</td>
          </tr>
          <tr>
            <td colspan="2">{{ Form::submit('Update Warehouse') }}</td>
          </tr>
        </table>

        {{ Form::close() }}
      </div>


@stop