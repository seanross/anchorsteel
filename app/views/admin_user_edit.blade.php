@extends('layout_admin.template')
@section('content')

            <div class="table">
                {{ Form::open(array('url' => 'admin/user/update', 'files' => true)) }}

                {{Form::hidden("id", $user->id)}}

                <table class="listing form" cellpadding="0" cellspacing="0">
                    <tr>
                        <th class="full" colspan="2">Edit User Details</th>
                    </tr>
                    <tr>
                        <td><strong>{{ Form::label('email', 'Email Add') }}</strong></td>
                        <td>{{ Form::text('email', $user->email) }} 
                            @if ($errors->has('email')) 
                            {{ $errors->first('email') }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Username : </strong></td>
                        <td>{{$user['username']}}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ Form::label('firstname', 'First Name') }}</strong></td>
                        <td>{{ Form::text('firstname', $user->firstname) }}
                               @if ($errors->has('firstname')) 
                            {{ $errors->first('firstname') }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>{{ Form::label('middlename', 'Middle Name') }}</strong></td>
                        <td>{{ Form::text('middlename', $user->middlename) }}</td>
                    </tr>
                    <tr>
                        <td><strong>{{ Form::label('lastname', 'Last Name') }}</strong></td>
                        <td>{{ Form::text('lastname', $user->lastname) }}
                               @if ($errors->has('lastname')) 
                            {{ $errors->first('lastname') }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>{{ Form::label('address', 'Address') }}</strong></td>
                        <td>{{ Form::text('address', $user->address) }}
                               @if ($errors->has('address')) 
                            {{ $errors->first('address') }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>{{ Form::label('contactno', 'Contact No.') }}</strong></td>
                        <td>{{ Form::text('contactno', $user->contactno) }}
                               @if ($errors->has('contactno')) 
                            {{ $errors->first('contactno') }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>{{ Form::label('role', 'Assigned Role') }}</strong></td>
                        <td>{{ Form::select('role', $role_options , Input::old('role')) }}</td>
                    </tr>

                    <tr>
                        <td colspan="2">{{ Form::submit('Update User Details') }}</td>
                    </tr>
                </table>

                {{ Form::close() }}
            </div>


@stop