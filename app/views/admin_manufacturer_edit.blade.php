@extends('layout_admin.template')
@section('content')

      <div class="table">
        {{ Form::open(array('url' => 'admin/manufacturer/save', 'files' => true)) }}

        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Edit Manufacturer</th>
          </tr>
          <tr>
            <td><strong>{{ Form::label('mname', 'Manufacturer Name') }}</strong></td>
            <td>{{ Form::text('mname' , $manufacturer->name) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('address', 'Address') }}</strong></td>
            <td>{{ Form::text('address',   $manufacturer->address) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('contactno', 'Contact #') }}</strong></td>
            <td>{{ Form::text('contactno',  $manufacturer->contactno) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('contactperson', 'Contact Person') }}</strong></td>
            <td>{{ Form::text('contactperson',  $manufacturer->contactperson) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('profile', 'Profile') }}</strong></td>
            <td>{{ Form::textarea('profile',  $manufacturer->profile) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('imagelink', 'Image Link') }}</strong></td>
            <td>{{ Form::text('imagelink',  $manufacturer->imagelink) }}</td>
          </tr>
          <tr>
            <td><strong>{{ Form::label('website', 'Website') }}</strong></td>
            <td>{{ Form::text('website',  $manufacturer->website) }}</td>
          </tr>
          <tr>
            <td colspan="2">{{ Form::submit('Update Manufacturer') }}</td>
          </tr>
        </table>

        {{ Form::close() }}
      </div>

@stop