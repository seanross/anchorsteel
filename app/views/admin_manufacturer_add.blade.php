@extends('layout_admin.template')
@section('content')

      <div class="table">
        {{ Form::open(array('url' => 'admin/manufacturer/save', 'files' => true)) }}

        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Add New Manufacturer</th>
          </tr>
          <tr>
            <td><strong>{{ Form::label('mname', 'Manufacturer Name') }}</strong></td>
            <td>{{ Form::text('mname') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('address', 'Address') }}</strong></td>
            <td>{{ Form::text('address') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('contactno', 'Contact #') }}</strong></td>
            <td>{{ Form::text('contactno') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('contactperson', 'Contact Person') }}</strong></td>
            <td>{{ Form::text('contactperson') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('profile', 'Profile') }}</strong></td>
            <td>{{ Form::textarea('profile') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('imagelink', 'Image Link') }}</strong></td>
            <td>{{ Form::text('imagelink') }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('website', 'Website') }}</strong></td>
            <td>{{ Form::text('website') }}</td>
          </tr>
          <tr>
            <td colspan="2">{{ Form::submit('Add Manufacturer') }}</td>
          </tr>
        </table>

        {{ Form::close() }}
      </div>
    

@stop