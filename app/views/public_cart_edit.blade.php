@extends('layout_public.template')
@section('content')

            <div class="center_title_bar">Edit Product Quantity</div>
            <div class="prod_box_big">
                <div class="center_prod_box_big">

                    <div class="product_img_big">
                        <!--                    <a href="javascript:popImage('','')" title="header=[Zoom] body=[&nbsp;] fade=[on]">
                                                <img src="images/p3.jpg" alt="" border="0" />
                                            </a>-->
                        <div class="thumbs">
                            @foreach($p->images as $i)
                            <a href="#" title="header=[Thumb1] body=[&nbsp;] fade=[on]">
                                <img src="{{ asset($i->name) }}" alt="{{ $p->name }}" border="0" />
                            </a>
                            @endforeach
                        </div>
                        <div>
                            {{ Form::open(array('url' => 'cart/save')) }}
                            {{ Form::hidden('forUpdate', true) }}
                            {{ Form::hidden('id', $p->id) }}
                            {{ Form::hidden('rowId', $rowId) }}
                            Quantity : {{ Form::text('quantity') }}  <br/>
                            {{ Form::submit('Update to Cart', array('class' => 'prod_buy')) }}
                            {{ Form::close() }}
                        </div>
                    </div>

                    <div class="details_big_box">
                        <div class="product_title_big">{{ $p->name }}</div>
                        <div class="specifications"> Available: <span class="blue">{{ $p->stock }} In stock</span><br />
                            Category :<span class="blue"> {{ $p->category->name }}</span><br />
                            Manufacturer: <span class="blue"> {{ $p->manufacturer->name }}</span><br />
                            Description :<span class="blue"> {{ $p->profile }} </span><br />
                        </div>
                        <div class="prod_price_big">
                            <span class="reduce">{{ $p->price }} PHP</span>
                            <span class="price">{{ $p->price - ($p->price * ($p->discount/100)) }} PHP</span>
                        </div>
                        
                    </div>
                </div>
            </div>
       
            
@stop