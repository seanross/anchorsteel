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
      <h1><img src="{{ asset('images/shoppingcart.png') }}"> CART ITEMS <img src="{{ asset('images/shoppingcart.png') }}"></h1>
      <div id="company" class="clearfix">
        <div>Company Name</div>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
<!--        <div><span>PROJECT</span> Website development</div>-->
        <div><span>CLIENT</span> {{ Auth::user()->firstname ." ". Auth::user()->lastname }}</div>
        <div><span>CLIENT</span> {{ Auth::user()->contactno }}</div>
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
            <th class="desc">Options</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub Total</th>
          </tr>
        </thead>
        <tbody>
             @foreach ($products as $p)
          <tr>
            <td class="service">{{ $p->name }}</td>
            <td class="desc">
                <a href="{{ url('cart/add', $p->id) }}">
                      <img src="{{ asset('images/add-icon.gif') }}" width="16" height="16" alt="" />
                  </a>
                  <a href="{{ url('cart/edit', $p->id) }}">
                      <img src="{{ asset('images/edit-icon.gif') }}" width="16" height="16" alt="" />
                  </a>
                  <a href="{{ url('cart/delete', $p->id) }}">
                      <img src="{{ asset('images/hr.gif') }}" width="16" height="16" alt="" />
                  </a>
            </td>
            <td class="unit">{{ $p->price }}</td>
            <td class="qty">{{ $p->qty }}</td>
            <td class="total">{{ $p->price * $p->qty }}</td>
          </tr>
            @endforeach
          <tr>
            <td colspan="4"></td>
            <td class="total"></td>
          </tr>
          <tr>
            <td colspan="4">TOTAL QUANTITY</td>
            <td class="total">{{Cart::count()}}</td>
          </tr>
           <tr>
            <td colspan="4" class="grand total">TOTAL PRICE</td>
            <td class="grand total">{{Cart::total()}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>