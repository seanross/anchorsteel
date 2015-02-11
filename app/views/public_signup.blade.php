@extends('layout_public.template')
@section('content')


      <div class="center_title_bar">Contact Us</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
          {{ Form::open(array('url' => 'signup')) }}
          <div class="form_row">
          	{{ Form::label('email', 'Email Add') }}
          	{{ Form::text('email') }}
          </div>
          <div class="form_row">
          	{{ Form::label('username', 'Username') }}
          	{{ Form::text('username') }}
          </div>
          <div class="form_row">
          	{{ Form::label('password', 'Password') }}
          	{{ Form::password('password') }}
          </div>
          <div class="form_row">
          	{{ Form::label('firstname', 'First Name') }}
          	{{ Form::text('firstname') }}
          </div>
          <div class="form_row">
          	{{ Form::label('middlename', 'Middle Name') }}
          	{{ Form::text('middlename') }}
          </div>
          <div class="form_row">
          	{{ Form::label('lastname', 'Last Name') }}
          	{{ Form::text('lastname') }}
          </div>
          <div class="form_row">
          	{{ Form::label('address', 'Address') }}
          	{{ Form::text('address') }}
          </div>
          <div class="form_row">
          	{{ Form::label('contactno', 'Contact No.') }}
          	{{ Form::text('contactno') }}
          </div>
          
          
          <div class="form_row">
          	{{ Form::submit('Sign up') }}
          	</div>
          {{ Form::close() }}
          
          </div>
        </div>
      </div>
    
@atop