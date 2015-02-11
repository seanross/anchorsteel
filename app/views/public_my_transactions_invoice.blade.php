<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Anchor Steel</title>
    <style>
        .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('qw.jpg') }}">
      </div>
      <h1><img src="{{ asset('images/shoppingcart.png') }}"> ORDER STATUS : {{ $transaction->status }} <img src="{{ asset('images/shoppingcart.png') }}"></h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
<!--        <div><span>PROJECT</span> Website development</div>-->
        <div><span>CLIENT</span> {{ Auth::user()->firstname ." ". Auth::user()->lastname }}</div>
        <div><span>CONTACT</span> {{ Auth::user()->contactno }}</div>
        <div><span>ADDRESS</span> {{ Auth::user()->address }}</div>
        <div><span>EMAIL</span> <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></div>
        <div><span>DATE</span>{{ Auth::user()->created_at }}</div>
<!--        <div><span>DUE DATE</span> September 17, 2015</div>-->
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
          </tr>
        </thead>
        <tbody>
             @foreach ($transaction->orders as $order)
          <tr>
            <td class="service">{{ $order->product->name }}</td>
            <td class="unit">{{ $order->price }}</td>
            <td class="qty">{{ $order->quantity }}</td>
            <td class="total">{{ $order->price}}</td>
          </tr>
            @endforeach
          <tr>
            <td colspan="3"></td>
            <td class="total"></td>
          </tr>
          <tr>
            <td colspan="3">TOTAL QUANTITY</td>
            <td class="total">{{ $transaction->orders->sum('quantity') }}</td>
          </tr>
           <tr>
            <td colspan="3" class="grand total">TOTAL PRICE</td>
            <td class="grand total">{{ $transaction->orders->sum('price') }}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
          
          <h1> <a href="{{ url('/my/transactions/cancel') }}">Cancel this order</a></h1>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>