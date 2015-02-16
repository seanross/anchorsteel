<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reports</title>
    <style>
        /* roScripts
Table Design by Mihalcea Romeo
www.roscripts.com
----------------------------------------------- */

table {
		border-collapse:collapse;
		background:#EFF4FB url(http://www.roscripts.com/images/teaser.gif) repeat-x;
		border-left:1px solid #686868;
		border-right:1px solid #686868;
		font:0.8em/145% 'Trebuchet MS',helvetica,arial,verdana;
		color: #333;
}

td, th {
		padding:5px;
}

caption {
		padding: 0 0 .5em 0;
		text-align: left;
		font-size: 1.4em;
		font-weight: bold;
		text-transform: uppercase;
		color: #333;
		background: transparent;
}

/* =links
----------------------------------------------- */

table a {
		color:#950000;
		text-decoration:none;
}

table a:link {}

table a:visited {
		font-weight:normal;
		color:#666;
		text-decoration: line-through;
}

table a:hover {
		border-bottom: 1px dashed #bbb;
}

/* =head =foot
----------------------------------------------- */

thead th, tfoot th, tfoot td {
		background:#333 url(http://www.roscripts.com/images/llsh.gif) repeat-x;
		color:#fff
}

tfoot td {
		text-align:right
}

/* =body
----------------------------------------------- */

tbody th, tbody td {
		border-bottom: dotted 1px #333;
}

tbody th {
		white-space: nowrap;
}

tbody th a {
		color:#333;
}

.odd {}

tbody tr:hover {
		background:#fafafa
}

    </style>
  </head>
  <body>
    
    @foreach($transactions as $transaction)
    <header class="clearfix">
      <div id="project">
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
             @foreach ($transaction->orders as $p)
          <tr>
            <td class="service">{{ $p->name }}</td>
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
            <td class="total">{{$transaction->getTotalQuantity()}}</td>
          </tr>
           <tr>
            <td colspan="4" class="grand total">TOTAL PRICE</td>
            <td class="grand total">{{ $transaction->getGrandTotal() }}</td>
          </tr>
        </tbody>
      </table>
    </main>
    @endforeach
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
      Wait for our team to call you for purchase instructions once you have send the order request.
    </footer>
  </body>
</html>