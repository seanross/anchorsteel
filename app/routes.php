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
	return View::make('public_home');
});

Route::get('/register', function()
{
    $captchaConfig = array(
      'CaptchaId' => 'SignUpCaptcha', // an unique Id for the Captcha instance
      'UserInputId' => 'CaptchaCode' // the Id of the Captcha code input textbox
    );
    $captcha = BotDetectCaptcha\LaravelCaptcha\BotDetectLaravelCaptcha::GetCaptchaInstance($captchaConfig);
    return View::make('public_signup')->with('captchaHtml', $captcha->Html());
    
});

Route::get('/login', function()
{
	return View::make('public_login');
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


Route::post('/signup', function(){
    // validate the user-entered Captcha code when the form is submitted
    $code = Input::get('CaptchaCode');
    $captchaConfig = array(
        'CaptchaId' => 'SignUpCaptcha', // an unique Id for the Captcha instance
        'UserInputId' => 'CaptchaCode' // the Id of the Captcha code input textbox
      );
    $captcha = BotDetectCaptcha\LaravelCaptcha\BotDetectLaravelCaptcha::GetCaptchaInstance($captchaConfig);

    $isHuman = $captcha->Validate($code);

    $rules = array(
            'username'         => 'required|unique:users',
            'email'            => 'required|email',
            'password'         => 'required',
            'password_confirm' => 'required|same:password',
            'address'          => 'required',
            'contactno'        => 'required',
            'firstname'        => 'required',
            'lastname'         => 'required'
        );

      $validator  = Validator::make(Input::all(), $rules);

      $message = '';
      $captchaValidationStatus = '';

      if ($isHuman && $validator->fails()) {
        // TODO: send email
        $message = 'You successfully registered!';
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
        // reset Captcha status after each sent email, since we don't want the user to
          // be able to send an unlimited number of emails after solving the Captcha once
        
        $captcha->Reset();
      } else {
        if ($isHuman) {
          $captchaValidationStatus = 'Wrong code. Try again please.';
        } else {
          $message = 'An error occurred while sending.';
        }
      }

      return Redirect::to('/register')
                              ->withInput()
                              ->withErrors($validator)
                              ->with('captchaValidationStatus', $captchaValidationStatus)
                              ->with('message', $message);
    
});


Route::get('/admin/home', array('before' => 'adminOnly', function(){
   return View::make('admin_home');
}));


Route::get('/admin/user/edit/{id}',  array('before' => 'adminOnly', function($id){
	$data['role_options'] = DB::table('roles')->orderBy('name', 'asc')->lists('name','id');
	$data['user'] = User::find($id);
	return View::make('admin_user_edit')->with($data);
}));

Route::post('/admin/user/update',  array('before' => 'adminOnly', function(){
    $rules = array(
//            'username'         => 'required|unique:users',
        'email'            => 'required|email',
        'password'         => 'required',
        'password_confirm' => 'required|same:password',
        'address'          => 'required',
        'contactno'        => 'required',
        'firstname'        => 'required',
        'lastname'         => 'required'
    );

    $validator  = Validator::make(Input::all(), $rules);
    $message = '';
      
    if ($validator->fails()) {
        $u = User::find(Input::get('id'));
        $u->email = Input::get('email');
        $u->firstname = Input::get('firstname');
        $u->middlename = Input::get('middlename');
        $u->lastname = Input::get('lastname');
        $u->address = Input::get('address');
        $u->contactno = Input::get('contactno');
        $u->roles()->detach(); //need to para madelete ung mga current na relationship
        $u->attachRole(Role::find(Input::get("role"))); // then attach para malagyan
        $u->save();
        $message = 'Successfully updated user.';
      }
        return Redirect::to('/admin/user/edit/'. $u->id)
                              ->withInput()
                              ->withErrors($validator)
                              ->with('message', $message);
}));

Route::get('/admin/user/list',  array('before' => 'adminOnly', function(){
	return View::make('admin_user_list')->with('users', User::all());
}));




Route::get('/admin/product/add',  array('before' => 'adminOnly', function(){
	$data['warehouse_options'] = DB::table('warehouses')->orderBy('name', 'asc')->lists('name','id');
	$data['category_options'] = DB::table('categories')->orderBy('name', 'asc')->lists('name','id');
	$data['manufacturer_options'] = DB::table('manufacturers')->orderBy('name', 'asc')->lists('name','id');
	return View::make('admin_product_add')->with($data);
}));

Route::get('/admin/product/edit/{id}',  array('before' => 'adminOnly',  function($id){
	$data['warehouse_options'] = DB::table('warehouses')->orderBy('name', 'asc')->lists('name','id');
	$data['category_options'] = DB::table('categories')->orderBy('name', 'asc')->lists('name','id');
	$data['manufacturer_options'] = DB::table('manufacturers')->orderBy('name', 'asc')->lists('name','id');
	$data['product'] = Product::find($id);
	return View::make('admin_product_edit')->with($data);
}));

Route::post('/admin/product/save',  array('before' => 'adminOnly', function(){
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
	return  Redirect::to('/admin/product/list');
}));

Route::get('/admin/product/list',  array('before' => 'adminOnly', function(){
	return View::make('admin_product_list')->with('products', Product::all());
}));

Route::get('/admin/category/add',  array('before' => 'adminOnly', function(){
	return View::make('admin_category_add');
}));

Route::get('/admin/category/edit/{id}',  array('before' => 'adminOnly',  function($id){
	return View::make('admin_category_edit')->with('category', Category::find($id));
}));

Route::post('/admin/category/save',  array('before' => 'adminOnly', function()
{
	if(Input::get('id') == null){
		$c = new Category();
	} else {
		$c = Category::find(Input::get("id"));
	}
	$c->name = Input::get('cname');
	$c->profile = Input::get('profile');
	$c->save();

	return  Redirect::to('/admin/category/list');
}));

Route::get('/admin/category/list',  array('before' => 'adminOnly',  function(){
	return View::make('admin_category_list')->with('categories', Category::all());
}));






Route::get('/admin/warehouse/add',  array('before' => 'adminOnly', function(){
	return View::make('admin_warehouse_add');
}));

Route::get('/admin/warehouse/edit/{id}',  array('before' => 'adminOnly', function($id){
	return View::make('admin_warehouse_edit')->with('warehouse', Warehouse::find($id));
}));

Route::post('/admin/warehouse/save',  array('before' => 'adminOnly', function()
{
	if(Input::get('id') == null){
		$w = new Warehouse();
	} else {
		$w = Warehouse::find(Input::get('id'));
	}
	$w->name = Input::get('wname');
	$w->address = Input::get('address');
	$w->save();

	return  Redirect::to('/admin/warehouse/list');
}));

Route::get('/admin/warehouse/list', array('before' => 'adminOnly', function(){
	return View::make('admin_warehouse_list')->with('warehouses', Warehouse::all());
}));





Route::get('/admin/manufacturer/add', array('before' => 'adminOnly',  function(){
	return View::make('admin_manufacturer_add');
}));

Route::get('/admin/manufacturer/edit/{id}', array('before' => 'adminOnly',  function($id){
	return View::make('admin_manufacturer_edit')->with('manufacturer', Manufacturer::find($id));
}));

Route::post('/admin/manufacturer/save',  array('before' => 'adminOnly', function()
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

	return  Redirect::to('/admin/manufacturer/list');
}));

Route::get('/admin/manufacturer/list',  array('before' => 'adminOnly',  function(){
	return View::make('admin_manufacturer_list')->with('manufacturers', Manufacturer::all());
}));



Route::get('/admin/transaction/list/{where}', array('before' => 'adminOnly',  function($where){
    $transactions =  Transaction::orderBy('created_at', 'DESC')->get();
    if($where == 'pending' || $where == 'received' || $where == 'shipping' || $where == 'completed' || $where == 'cancelled'){
        $transactions =  Transaction::where('status', '=', $where)->orderBy('created_at', 'DESC')->get();
     
    } 
    return View::make('admin_transaction_list')->with('transactions', $transactions);
}));

Route::get('/admin/transaction/receive/{id}', array('before' => 'adminOnly',  function($id){
    $transaction = Transaction::find($id);
    $transaction->status = 'received';
    $transaction->received_by = Auth::user()->username;
    $transaction->save();
    return View::make('admin_invoice')->with('transaction', $transaction);
}));

Route::get('/admin/transaction/pdf/{id}', array('before' => 'adminOnly',  function($id){
    $data['transaction'] = Transaction::find($id);
    $pdf = PDF::loadView('admin_invoice', $data);
    return $pdf->stream("Report.pdf");
}));

Route::get('/admin/transactions/pdf/{where}', array('before' => 'adminOnly',  function($where){
    $data['transactions'] =  Transaction::orderBy('created_at', 'DESC')->get();
    if($where == 'pending' || $where == 'received' || $where == 'shipping' || $where == 'completed' || $where == 'cancelled'){
         $data['transactions'] =  Transaction::where('status', '=', $where)->orderBy('created_at', 'DESC')->get();
    } 
    $pdf = PDF::loadView('admin_invoice', $data);
    return $pdf->stream("Report.pdf");
}));


Route::get('/product/list',function(){
	return View::make('public_product_list')->with('products', Product::all());
});

Route::get('/product/list/{id}', function($id){
	return View::make('public_product_list_by_category')->with('category', Category::find($id) );
});

Route::get('/product/view/{id}',function($id){
	return View::make('public_product_view')->with('p', Product::find($id));
});

Route::post('/product/search', function(){
    $q = Input::get('search_prod');
    $searchTerms = explode(' ', $q);
    $query = DB::table('products');
    foreach($searchTerms as $term){
        $query->where('name', 'LIKE', '%'. $term .'%');
    }
return View::make('public_product_search')->with('products', $query->get());
});


Route::get('/cart/add/{id}', array('before' => 'buyerOnly',  function($id){
   return View::make('public_cart_add')->with('p', Product::find($id)); 
}));

Route::get('/cart/edit/{id}/{rowId}', array('before' => 'buyerOnly',  function($id, $rowId){
    $data['rowId'] = $rowId;
    $data['p'] = Product::find($id);
   return View::make('public_cart_edit')->with($data); 
}));

Route::post('/cart/save',  array('before' => 'buyerOnly',  function(){
    $p = Product::find(Input::get('id'));
    $discountedPrice = $p->price - ($p->price * ($p->discount/100));
    $quantity = Input::get('quantity');
    
    if(Input::get('forUpdate')){
        Cart::update(Input::get('rowId'), $quantity);
    } else {
         Cart::add($p->id, $p->name, $quantity , $discountedPrice);
    }
  
    return Redirect::to('/cart/list');
}));

Route::get('/cart/delete/{rowId}', array('before' => 'buyerOnly',   function($rowId){
    Cart::remove($rowId);
    return Redirect::to('/cart/list');
}));

Route::get('/cart/list', array('before' => 'buyerOnly',   function(){
    return View::make('public_cart_list')->with('products', Cart::content());
}));

Route::get('/cart/clear', array('before' => 'buyerOnly',  function(){
    Cart::destroy();
    return Redirect::to('/cart/list');
}));

Route::get('/cart/invoice/preview', array('before' => 'buyerOnly', function(){
    return View::make('public_invoice')->with('products', Cart::content());
}));

Route::get('/cart/finalize', array('before' => 'buyerOnly', function(){
    $user = User::find(Auth::id());
    $transaction = new Transaction();
    $transaction->status = "pending";
    $transaction->user()->associate($user);            
    $user->transactions()->save($transaction);
    
    foreach(Cart::content() as $item){
        $product = Product::find($item->id);
        $order = new Order();
        $order->quantity = $item->qty;
        $order->price = $item->price;
        $order->product()->associate($product);
        $order->transaction()->associate($transaction);
        $order->save();
        $product->stock = $product->stock - $item->qty;
        $product->orders()->save($order);
        $product->save();   //SAVE AGAIN TO UPDATE THE STOCK
    }
   Cart::destroy();
    return Redirect::to('/cart/list');
}));

Route::get('/my/transactions/view/{id}', array('before' => 'buyerOnly', function($id){
   return View::make('public_my_transactions_invoice')->with('transaction', Transaction::find($id));
}));

Route::get('/my/transactions/list', array('before' => 'buyerOnly', function(){
    $transactions = Transaction::where('user_id', Auth::id())->get(); 
    return View::make('public_my_transactions_list')->with('transactions', $transactions);
}));

Route::get('/contact_us', function(){
    return View::make('public_contact_us');
});

Route::post('/contact_us', function(){

    //Get all the data and store it inside Store Variable
    $data = Input::all();

    //Validation rules
    $rules = array (
        'fullname' => 'required',
        'phone_number'=>'numeric|min:8',
        'email' => 'required|email',
        'message' => 'required|min:25'
    );

    //Validate data
    $validator  = Validator::make ($data, $rules);

    //If everything is correct than run passes.
    if ($validator -> passes()){

        //Send email using Laravel send function
        Mail::send('emails.contact_us', $data, function($message) use ($data)
        {
//email 'From' field: Get users email add and name
            $message->from($data['email'] , $data['fullname']);
//email 'To' field: change this to emails that you want to be notified.                    
$message->to('email_ni_sean@yahoo.com', 'Anchor Steel')->cc('email.ni.sean@gmail.com')->subject('Contact request');

        });

        return View::make('public_contact_us');  
    }else{
//return contact form with errors
        return Redirect::to('/contact_us')->withErrors($validator);
    }      
});