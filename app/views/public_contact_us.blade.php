@extends('layout_public.template')
@section('content')

<div class="center_title_bar">Products</div>
<div class="prod_box_big"> 
    {{ Form:: open(array('url' => 'contact_us')) }} <!--contact_request is a router from Route class-->

        <ul class="errors">
            @foreach($errors->all('<li>:message</li>') as $message)
            {{ $message }}
            @endforeach
        </ul>

        {{ Form:: label ('fullname', 'Full Name*' )}}
        {{ Form:: text ('fullname', '' )}}
        
        {{ Form:: label ('phone_number', 'Phone Number' )}}
        {{ Form:: text ('phone_number', '', array('placeholder' => '0280021xx')) }}

        {{ Form:: label ('email', 'E-mail Address*') }}
        {{ Form:: email ('email', '', array('placeholder' => 'me@example.com')) }}

        {{ Form:: label ('subject', 'Subject') }}
        {{ Form:: select ('subject', array(
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4'), '1' ) }}

        {{ Form:: label ('message', 'Message*' )}}
        {{ Form:: textarea ('message', '')}}

        {{ Form::reset('Clear', array('class' => 'you css class for button')) }}
        {{ Form::submit('Send', array('class' => 'you css class for button')) }}

    {{ Form:: close() }}

</div>

@stop