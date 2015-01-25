<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="{{ asset("admin.css") }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main">
    <div id="header">
        <a href="#" class="logo"><img src="{{ asset("as.jpg") }}" width="450" height="65" alt="" /></a>
        <ul id="top-navigation">
            <li><a href="#" class="active">Homepage</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Statistics</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Contents</a></li>
        </ul>
    </div>
    <div id="middle">
        <div id="left-column">
            <h3>Category</h3>
            <ul class="nav">
                <li><a href="{{ asset('admin/category/list') }}">List</a></li>
                <li><a href="{{ asset('admin/category/add') }}">Add</a></li>
            </ul>
            <h3>Warehouse</h3>
            <ul class="nav">
                <li><a href="{{ asset('admin/warehouse/list') }}">List</a></li>
                <li><a href="{{ asset('admin/warehouse/add') }}">Add</a></li>
            </ul>
            <h3>Manufacturer</h3>
            <ul class="nav">
                <li><a href="{{ asset('admin/manufacturer/list') }}">List</a></li>
                <li><a href="{{ asset('admin/manufacturer/add') }}">Add</a></li>
            </ul>
            <h3>Products</h3>
            <ul class="nav">
                <li><a href="{{ asset('admin/product/list') }}">List</a></li>
                <li><a href="{{ asset('admin/product/add') }}">Add</a></li>
            </ul>


            <a href="#" class="link">Link here</a>
            <a href="#" class="link">Link here</a>
        </div>
        <div id="center-column">
            <div class="top-bar">
                <h1>Products List</h1>
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
                        <th>Username</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Created</th>

                        <th>Updated</th>
                        <th>Options</th>
                    </tr>
                    @foreach ($users as $p)
                    <tr>
                        <td class="style1">{{ $p->username }}</td>
                        <td>{{ $p->email }}</td>
                        <td>
                            @foreach($p->roles as $r)
                                {{ $r->name }}
                            @endforeach
                        </td>
                        <td>{{$p->firstname}}</td>
                        <td>{{$p->lastname}}</td>
                        <td>{{$p->created_at}}</td>
                        <td>{{$p->updated_at}}</td>
                        <td>
                            <a href="{{ url('admin/product/edit', $p->id) }}"><img src="{{ asset("images/edit-icon.gif") }}" width="16" height="16" alt="" /></a>
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

        </div>
        <div id="right-column">
            <strong class="h">Quick Info</strong>
            <div class="box">This is your admin home page. It will give you access to all things within the back end system that you will need to facilitate a smooth operation.</div>
        </div>
    </div>
    <div id="footer"><p>Developed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010.</p></div>
</div>
</body>
</html>