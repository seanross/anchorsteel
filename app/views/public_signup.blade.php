@extends('layout_public.template')

@section('styles')
    {{ HTML::style(CaptchaUrls::LayoutStylesheetUrl()) }}
@show

@section('content')


      <div class="center_title_bar">Registration Form</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
          {{ Form::open(array('url' => 'signup')) }}
          <div class="form_row">
          	{{ Form::label('email', 'Email Add', array('class' => 'contact')) }}
          	{{ Form::text('email', Input::old('email'), array(
                        'class' => 'contact_input'
                    )) }}
                 @if ($errors->has('email')) 
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p> 
                 @endif
          </div>
          <div class="form_row">
          	{{ Form::label('username', 'Username', array('class' => 'contact')) }}
          	{{ Form::text('username', Input::old('username'), array(
                        'class' => 'contact_input'
                    )) }}
                @if ($errors->has('username')) 
                    <p class="help-block">
                        {{ $errors->first('username') }}
                    </p> 
                 @endif
          </div>
<!--          <div class="form_row">
          	{{ Form::label('password', 'Password', array('class' => 'contact')) }}
          	{{ Form::password('password', '', array(
                        'class' => 'contact_input'
                    )) }}
                @if ($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p> 
                 @endif
          </div>-->
            <div class="form_row">
              <label class="contact"><strong>Password:</strong></label>
              <input type="password" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Confirm Password:</strong></label>
              <input type="password" class="contact_input" />
            </div>
          <div class="form_row">
          	{{ Form::label('firstname', 'First Name', array('class' => 'contact')) }}
          	{{ Form::text('firstname', Input::old('firstname'), array(
                        'class' => 'contact_input'
                    )) }}
          </div>
          <div class="form_row">
          	{{ Form::label('middlename', 'Middle Name', array('class' => 'contact')) }}
          	{{ Form::text('middlename', Input::old('name'), array(
                        'class' => 'contact_input'
                    )) }}
          </div>
          <div class="form_row">
          	{{ Form::label('lastname', 'Last Name', array('class' => 'contact')) }}
          	{{ Form::text('lastname', Input::old('name'), array(
                        'class' => 'contact_input'
                    )) }}
          </div>
          <div class="form_row">
          	{{ Form::label('address', 'Address', array('class' => 'contact')) }}
          	{{ Form::text('address', Input::old('name'), array(
                        'class' => 'contact_input'
                    )) }}
          </div>
          <div class="form_row">
          	{{ Form::label('contactno', 'Contact No.', array('class' => 'contact')) }}
          	{{ Form::text('contactno', Input::old('name'), array(
                        'class' => 'contact_input'
                    )) }}
          </div>
          
          <div class="form_row">
                {{ $captchaHtml }}
                {{ Form::text('CaptchaCode') }}
                 @if (Session::has('captchaValidationStatus'))
                    {{ Session::get('captchaValidationStatus') }}
                @endif
          </div>
          <div class="form_row">
          	{{ Form::submit('Sign up') }}
          	</div>
          {{ Form::close() }}
          
          </div>
        </div>
      </div>
    
@stop