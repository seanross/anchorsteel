@extends('layout_admin.template')
@section('content')

      <div class="table">

        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" colspan="2">Transaction Details</th>
          </tr>
          <tr>
            <td width="172"><strong>Status</strong></td>
            <td>{{ $transaction->status }} </td>
          </tr>
          <tr>
            <td width="172"><strong>Received By</strong></td>
            <td>{{ $transaction->received_by }} </td>
          </tr>
          <tr>
            <td width="172"><strong>Customer Name</strong></td>
            <td>{{ $transaction->user->getFullName() }} </td>
          </tr>
          <tr>
            <td width="172"><strong>Customer Contact Number</strong></td>
            <td>{{ $transaction->user->contactno }} </td>
          </tr>
          <tr>
            <td width="172"><strong>Customer Address</strong></td>
            <td>{{ $transaction->user->address }} </td>
          </tr>
          <tr>
            <td width="172"><strong>Date Ordered</strong></td>
            <td>{{ $transaction->created_at }} -> {{ Carbon::createFromTimeStamp(strtotime($transaction->created_at))->diffForHumans() }} </td>
          </tr>
        </table>

      </div>

    <div class="table">

        <table class="listing form" cellpadding="0" cellspacing="0">
          <tr>
            <th class="full" >Item Name</th>
            <th class="full" >Stock</th>
            <th class="full" >Quantity</th>
            <th class="full" >Price</th>
            <th class="full" >SubTotal</th>
          </tr>
          
          @foreach($transaction->orders as $order)
          <tr>
            <td>{{ $order->product->name }}</td>
             <td >{{ $order->product->stock }}</td>
             <td>{{ $order->quantity }}</td>
             <td>{{ $order->price }}</td>
             <td><strong>{{ $order->getSubTotal()  }}</strong></td>
          </tr>
          @endforeach
          
          <tr>
              <td  colspan="5"></td>
          </tr>
          <tr>
              <td  colspan="3"></td>
              <td>Number of Items</td>
              <td><strong>{{ $transaction->getTotalQuantity() }}</strong></td>
          </tr>
          <tr>
              <td  colspan="3"></td>
              <td>GRAND TOTAL</td>
              <td><strong>{{ $transaction->getGrandTotal() }}</strong></td>
          </tr
          <tr>
              <td  colspan="2"><strong>Options</strong></td>
              <td><a href="#" >Pending</a></td>
              <td> <a href="#" class="buttons">Complete Transaction</a></td>
              <td><a href="#" >For Shipping</a></td>
          </tr>
        </table>

      </div>
    
@stop