@extends('layout_public.template')
@section('content')

      <div class="center_title_bar">Contact Us</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <div class="contact_form">
          {{ Form::open(array('url'=>'logincheck', 'class'=>'form-signin')) }}
                <h2 class="form-signin-heading">Please Login</h2>

                 <div class="form_row">
                {{ Form::label('username', 'Username') }}
                {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Username')) }}
                 </div>
                 <div class="form_row">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
                 </div>

                {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
            {{ Form::close() }}
          </div>
        </div>
      </div>


      
@stop