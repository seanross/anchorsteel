@extends('layout_admin.template')
@section('content')

      <div class="top-bar">
        <h1>Transactions List</h1>
      </div>
      <div class="select-bar">
        <label>
          <input type="text" name="textfield" />
        </label>
        <label>
          <input type="submit" name="Submit" value="Search" />
        </label>
      </div>
      <div class="table">
        <table class="listing" cellpadding="0" cellspacing="0">
          <tr>
            <th>Order Date</th>
            <th>Status</th>
            <th>Received by</th>
            <th>Customer</th>
            <th>Items</th>
            <th>Grand Total</th>
            <th>Options</th>
          </tr>
          @foreach ($transactions as $t)
            <tr>
              <td class="style1">{{ Carbon::createFromTimeStamp(strtotime($t->created_at))->diffForHumans() }} -> {{ $t->created_at }}</td>
              <td>{{ $t->status }}</td>
              <td>{{ $t->received_by }}</td>
              <td>{{ $t->user->username }}</td>
              <td>{{ $t->orders()->sum('quantity') }}</td>
              <td>{{ $t->orders()->sum('price') }}</td>
              <td>
                <a href="{{ url('admin/transaction/receive', $t->id) }}"><img src="{{ asset("images/edit-icon.gif") }}" width="16" height="16" alt="" /></a>
                <a href="#"><img src="{{ asset("images/hr.gif") }}" width="16" height="16" alt="" /></a>
              </td>
            </tr>
          @endforeach
        </table>
        <div class="select">
          <strong>Other Pages: </strong>
          <select>
            <option>1</option>
          </select>
        </div>
      </div>


@stop