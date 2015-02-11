@extends('layout_admin.template')
@section('content')

      <div class="top-bar">
        <h1>Warehouse List</h1>
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
            <th>Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Options</th>
          </tr>
          @foreach ($warehouses as $p)
            <tr>
              <td class="style1">{{ $p->name }}</td>
              <td>{{ $p->created_at }}</td>
              <td>{{ $p->updated_at }}</td>
              <td>
                <a href="{{ url('admin/warehouse/edit', $p->id) }}"><img src="{{ asset("images/edit-icon.gif") }}" width="16" height="16" alt="" /></a>
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