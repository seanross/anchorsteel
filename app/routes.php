<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//GLOBAL VARIABLES
if(Schema::hasTable('categories')){
	View::share('categorylistmenu', Category::all());
}

if(Schema::hasTable('manufacturers')){
	View::share('manufacturerlistmenu', Manufacturer::all());
}

if(Schema::hasTable('products')){
	View::share('newproduct', Product::where('created_at', '>=', \Carbon\Carbon::now()->subMonth())->get()->random(1));
}

if(Schema::hasTable('products')){
	View::share('featuredproduct', Product::where('featured', true)->get()->random(1));
}

if(Schema::hasTable('products')){
	View::share('newproducts', Product::where('created_at', '>=', \Carbon\Carbon::now()->subMonth())->get());
}

if(Schema::hasTable('products')){
	View::share('featuredproducts', Product::where('featured', true)->get());
}


View::share('cart_quantity', Cart::count());

View::share('cart_total', Cart::total());
//END GLOBAL VARIABLES




Route::get('/', function()
{
	return View::make('home');
});

Route::get('/register', function()
{
	return View::make('signup');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::post('/logincheck', function(){
	if (Auth::attempt(array('username'=>Input::get('username'), 'password'=>Input::get('password')))) {
                Cart::destroy();
		return Redirect::to('/')->with('message', 'You are now logged in!');
	} else {
		return Redirect::to('/login')
			->with('message', 'Your username/password combination was incorrect')
			->withInput();
	}
});

Route::get('/logout', function()
{
	Auth::logout();
        Cart::destroy();
	return Redirect::to('/')
		->with('message', 'You logged out.')
		->withInput();
});


Route::post('/signup', function()
{
	$user = new User();
	$user->email = Input::get('email');
	$user->username = Input::get('username');
	$user->password = Hash::make(Input::get('password'));
	$user->firstname = Input::get('firstname');
	$user->middlename = Input::get('middlename');
	$user->lastname = Input::get('lastname');
	$user->address = Input::get('address');
	$user->contactno = Input::get('contactno');
	$user->save();
	return View::make('thanks')->with('saved', Input::get('email'));
});


Route::get('/admin/user/edit/{id}', function($id){
	$data['role_options'] = DB::table('roles')->orderBy('name', 'asc')->lists('name','id');
	$data['user'] = User::find($id);
	return View::make('admin_user_edit')->with($data);
});

Route::post('/admin/user/update', function()
{
	$u = User::find(Input::get('id'));
	$u->email = Input::get('email');
	$u->firstname = Input::get('firstname');
	$u->middlename = Input::get('middlename');
	$u->lastname = Input::get('lastname');
	$u->address = Input::get('address');
	$u->contactno = Input::get('contactno');
	$u->attachRole(Role::find(Input::get("role")));
	$u->save();

	return View::make('thanks')->with('saved', Input::get('firstname'));
});

Route::get('/admin/user/list', function(){
	return View::make('admin_user_list')->with('users', User::all());
});



Route::get('/admin', function()
{
	return View::make('admin');
});

Route::get('/admin/product/add', function(){
	$data['warehouse_options'] = DB::table('warehouses')->orderBy('name', 'asc')->lists('name','id');
	$data['category_options'] = DB::table('categories')->orderBy('name', 'asc')->lists('name','id');
	$data['manufacturer_options'] = DB::table('manufacturers')->orderBy('name', 'asc')->lists('name','id');
	return View::make('admin_product_add')->with($data);
});

Route::get('/admin/product/edit/{id}', function($id){
	$data['warehouse_options'] = DB::table('warehouses')->orderBy('name', 'asc')->lists('name','id');
	$data['category_options'] = DB::table('categories')->orderBy('name', 'asc')->lists('name','id');
	$data['manufacturer_options'] = DB::table('manufacturers')->orderBy('name', 'asc')->lists('name','id');
	$data['product'] = Product::find($id);
	return View::make('admin_product_edit')->with($data);
});

Route::post('/admin/product/save', function(){
	if(Input::get("id") == null){
		//UPLOAD FILE THEN ADD THE IMAGE OBJECT TO THE PRODUCT
		$file = Input::file('file');
		$filename  = time() . '.' . $file->getClientOriginalExtension();
		$path = public_path('uploads/' . $filename);
		ImageHelper::make($file->getRealPath())->resize(94, 71)->save($path);
		$p = new Product();
	} else {
		$p = Product::find(Input::get("id"));
	}
	$p->name = Input::get('pname');
	$p->price = Input::get('price');
	$p->discount = Input::get('discount');
	$p->stock = Input::get('stock');
	$p->profile = Input::get('profile');
	$p->featured = Input::get('featured');
	$p->manufacturer()->associate(Manufacturer::find(Input::get('manufacturer')));
	$p->category()->associate(Category::find(Input::get('category')));
	$p->warehouse()->associate(Warehouse::find(Input::get('warehouse')));
	$p->save();
	if(Input::get("id") == null){
		$p1 = Product::find($p->id);
		$image = new Image();
		$image->name = 'uploads/' . $filename;
		$image->product()->associate($p1);
		$p1->images()->save($image);
	}
	return View::make('thanks')->with('saved', Input::get('pname'));
});

Route::get('/admin/product/list',function(){
	return View::make('admin_product_list')->with('products', Product::all());
});

Route::get('/product/list',function(){
	return View::make('product_list')->with('products', Product::all());
});

Route::get('/product/list/{id}', function($id){
	return View::make('product_list_by_category')->with('category', Category::find($id) );
});


Route::get('/admin/category/add', function(){
	return View::make('admin_category_add');
});

Route::get('/admin/category/edit/{id}', function($id){
	return View::make('admin_category_edit')->with('category', Category::find($id));
});

Route::post('/admin/category/save', function()
{
	if(Input::get('id') == null){
		$c = new Category();
	} else {
		$c = Category::find(Input::get("id"));
	}
	$c->name = Input::get('cname');
	$c->profile = Input::get('profile');
	$c->save();

	return View::make('thanks')->with('saved', Input::get('cname'));
});

Route::get('/admin/category/list', function(){
	return View::make('admin_category_list')->with('categories', Category::all());
});






Route::get('/admin/warehouse/add', function(){
	return View::make('admin_warehouse_add');
});

Route::get('/admin/warehouse/edit/{id}', function($id){
	return View::make('admin_warehouse_edit')->with('warehouse', Warehouse::find($id));
});

Route::post('/admin/warehouse/save', function()
{
	if(Input::get('id') == null){
		$w = new Warehouse();
	} else {
		$w = Warehouse::find(Input::get('id'));
	}
	$w->name = Input::get('wname');
	$w->address = Input::get('address');
	$w->save();

	return View::make('thanks')->with('saved', Input::get('wname'));
});

Route::get('/admin/warehouse/list',function(){
	return View::make('admin_warehouse_list')->with('warehouses', Warehouse::all());
});





Route::get('/admin/manufacturer/add', function(){
	return View::make('admin_manufacturer_add');
});

Route::get('/admin/manufacturer/edit/{id}', function($id){
	return View::make('admin_manufacturer_edit')->with('manufacturer', Manufacturer::find($id));
});

Route::post('/admin/manufacturer/save', function()
{
	if(Input::get('id') == null){
		$w = new Manufacturer();
	} else {
		$w = Manufacturer::find(Input::get('id'));
	}
	$w->name = Input::get('mname');
	$w->address = Input::get('address');
	$w->contactno = Input::get('contactno');
	$w->contactperson = Input::get('contactperson');
	$w->profile = Input::get('profile');
	$w->imagelink = Input::get('imagelink');
	$w->website = Input::get('website');
	$w->save();

	return View::make('thanks')->with('saved', Input::get('mname'));
});

Route::get('/admin/manufacturer/list', function(){
	return View::make('admin_manufacturer_list')->with('manufacturers', Manufacturer::all());
});



Route::get('/cart/add/{id}', function($id){
   return View::make('cart_add')->with('p', Product::find($id)); 
});

Route::post('/cart/save', function(){
    $p = Product::find(Input::get('id'));
    $discountedPrice = $p->price - ($p->price * ($p->discount/100));
    $quantity = Input::get('quantity');
//    $subTotal = $discountedPrice * $quantity;
    Cart::add($p->id, $p->name, $quantity , $discountedPrice);
   
    return Redirect::to('/cart/list');
});

Route::get('/cart/list', function(){
    return View::make('cart_list')->with('products', Cart::content());
});