<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Account;
use App\Order;
use App\Product_order;
use App\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\resetPass;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
  //
  public function __construct()
  {
  
    $this->middleware(function ($request, $next) {
      if (session()->has('page_current')) {
        session()->forget('page_current');
      }
      return $next($request);
    });
  }
  public function register(Request $request)
  {
      $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
            $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
            $meta_title = "Thiết bị điện tử chất lượng cao";
    $url_canonical = $request->url();
    return view('client.account.register', compact('meta_desc', 'meta_keywords', 'url_canonical','meta_title'));
  }
  public function login(Request $request)
  {
       $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
            $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
            $meta_title = "Thiết bị điện tử chất lượng cao";
    $url_canonical = $request->url();
    return view('client.account.login', compact('meta_desc', 'meta_keywords', 'url_canonical','meta_title'));
  }
  public function store(Request $request)
  {
    $request->validate(
      [
        'fullname' => ['required', 'string', 'max:200'],
        'username' => ['required', 'string', 'regex:/^[A-Za-z0-9_\.]{6,32}$/'],
        'email' => ['required', 'string', 'email' , 'unique:account'],
        'password' => ['required', 'string', 'regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/', 'confirmed'],
        'phone_number' => ['required', 'string'],
        'gender' => 'required' 
      ],
      [
        'required' => ":attribute không được để trống",
        'max' => ":attribute có độ dài tối đa :max ký tự",
        'string' => ':attribute phải ở dạng chuỗi kí tự',
        'confirmed' => "Xác nhận mật khẩu không thành công",
        'regex' => ':attribute không đúng định dạng',
        'unique' => 'Username đã tồn tại trên hệ thống'
      ],
      [
        'fullname' => 'Họ và tên',
        'username' => 'Tên người dùng',
        'password' => "Mật khẩu",
        'phone_number' => 'Số điện thoại',
        'gender' => 'Giới tính'
      ]
    );
    Account::create([
      'fullname' => $request->input('fullname'),
      'username' => $request->input('username'),
      'email' => $request->input('email'),
      'password' => md5($request->input('password')),
      'phone_number' => $request->input('phone_number'),
      'gender' => $request->input('gender')
    ]);
    return redirect()->route('account_login');
  }
  public function checkLogin(Request $request)
  {
    $request->validate(
      [
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string', 'regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/'],
      ],
      [
        'required' => ":attribute không được để trống",
        'regex' => ':attribute không đúng định dạng'
      ],
      [
        'password' => "Mật khẩu",
      ]
    );
    $email = $request->input('email');
    $password = md5($request->input('password'));
    $user = Account::where([
      ['email', $email],
      ['password', $password]
    ])->get();
    if ($user->count() > 0) {
      $request->session()->put('is_login', true);
      $request->session()->put('user_email', $email);
      return redirect('/');
    }else {
      $request->session()->flash('error', 'Tài khoản mật khẩu không trùng khớp trên hệ thống');
      return back();
    }
  }
  public function reset($token = "", Request $request)
  {
      $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
            $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
            $meta_title = "Thiết bị điện tử chất lượng cao";
    $url_canonical = $request->url();
    if (empty($token)) {
      if ($request->has('resetPass')) {
        $validator = Validator::make(
          $request->all(),
          [
            'email' => ['required', 'string', 'email'],
          ],
          [
            'required' => ":attribute không được để trống",
            'email' => ":attribute không đúng định dạng",
            'regex' => ':attribute không đúng định dạng'
          ]
        );
        if (!$validator->fails()) {
          $checkEmail = Account::where('email', $request->input('email'))->get();
          if ($checkEmail->count() > 0) {
            $reset_token = md5($request->input('email') . time());
            Account::where('email', $request->input('email'))->update(
              [
                'reset_token' => $reset_token
              ]
            );
            $data = [
              'reset_token' => $reset_token,
              'email' => $request->email
            ];
            Mail::to($request->input('email'))->send(new resetPass($data));
            return back()->with(['status' => 'Bạn vui lòng kiểm tra email để tiến hành đổi mật khẩu']);
          }
        } else {
          return back()->withErrors($validator);
        }
      }
      return view('client.account.passwords.email', compact('meta_desc', 'meta_keywords', 'url_canonical','meta_title'));
    } else {
      if ($request->has('changePass')) {
        $validator = Validator::make(
          $request->all(),
          [
            'password' => ['required', 'string', 'regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/', 'confirmed'],
          ],
          [
            'required' => ":attribute không được để trống",
            'regex' => ':attribute không đúng định dạng',
            'confirmed' => "Xác nhận mật khẩu không thành công",
          ],
          [
            'password' => "Mật khẩu",
          ]
        );
        if (!$validator->fails()) {
          Account::where('email', $request->input('email'))->update(
            ['password' => md5($request->input('password'))]
          );
           if(session()->has('is_login')){
            session()->forget('is_login');
            session()->forget('user_email');
          }
          return redirect()->route('account_login')->with('status', 'Bạn đã đổi mật khẩu thành công');
        } else {
          return back()->withErrors($validator);
        }
      };
      return view('client.account.passwords.reset',compact('meta_desc', 'meta_keywords', 'url_canonical','meta_title'));
    }
  }
  public function logout()
  {
    session()->forget('is_login');
    session()->forget('user_email');
    return redirect('/');
  }
  public function profile(Request $request)
  {
        $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
            $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
            $meta_title = "Thiết bị điện tử chất lượng cao";
    $url_canonical = $request->url();
    if (session()->has('user_email')) {
      session()->put('related_account', 'profile');
      $user_email = session('user_email');
      $user_info = Account::where([
        ['email', $user_email]
      ])->first();
      return view('client.account.profile', compact('user_info', 'meta_desc', 'meta_keywords', 'url_canonical','meta_title'));
    }
  }
  public function purchase(Request $request)
  {
       $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
            $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
            $meta_title = "Thiết bị điện tử chất lượng cao";
    $url_canonical = $request->url();
    if (session()->has('user_email')) {
   
      session()->put('related_account', 'purchase');
      $user_email = session('user_email');
      $user_info = Account::where([
        ['email', $user_email]
      ])->first();
      $user_id = $user_info->id;
      if (!empty($_GET['type'])) {
        $type = (int)$_GET['type'];
        if ($type == 1) {
          $orders  = Order::where([
            ['status', 'processing'],
            ['account_id',  $user_id]
          ])->orderBy('created_at', 'DESC')->get();
        }
        if ($type == 2) {
          $orders  = Order::where([
            ['status', 'transporting'],
            ['account_id',  $user_id]
          ])->orderBy('created_at', 'DESC')->get();
        }
        if ($type == 3) {
          $orders  = Order::where([
            ['status', 'success'],
            ['account_id',  $user_id]
          ])->orderBy('created_at', 'DESC')->get();
        }
        if ($type == 4) {
          $orders  = Order::onlyTrashed()->where([
            ['status', 'cancel'],
            ['account_id',  $user_id]
          ])->orderBy('deleted_at', 'DESC')->get();
        }
      } else {
        $type = 0;
        $orders  = Order::withTrashed()->where([
          ['account_id',  $user_id]
        ])->orderBy('created_at', 'DESC')->get();
      }
      return view('client.account.purchase', compact('user_info', 'orders', 'type', 'meta_desc', 'meta_keywords', 'url_canonical','meta_title'));
    }
  }
  public function update(Request $request)
  {
    $request->validate(
      [
        'username' => ['required', 'string', 'regex:/^[A-Za-z0-9_\.]{6,32}$/'],
        'fullname' => ['required', 'string', 'max:200'],
        'phone_number' => ['required', 'string'],
        'gender' => 'required',
        'file' => ['image', 'max:1024'],
      ],
      [
        'required' => ":attribute không được để trống",
        'max' => ":attribute có độ dài tối đa :max ký tự",
        'string' => ':attribute phải ở dạng chuỗi kí tự',
        'file.image' => 'File upload lên phải có định dạng của hình ảnh',
        'regex' => ':attribute không đúng định dạng',
        'file.max' => 'Bạn không được upload file ảnh quá 1MB'
      ],
      [
        'username' => 'Tên đăng nhập',
        'fullname' => 'Họ và tên',
        'phone_number' => 'Số điện thoại',
        'gender' => 'Giới tính'
      ]
    );
    $email = session('user_email');
    if ($request->hasFile('file')) {
      $file = $request->file;
      $file_original = $file->getClientOriginalName();
      $extension = $file->getClientOriginalExtension();
      $file_array = Str::of($file_original)->explode('.');
      $file_name = $file_array[0];
      $target_dir = 'uploads/accounts/avatar/';
      $file_upload = $file_original;
      $file_path = $target_dir . $file_upload;
      if (file_exists($file_path)) {
        //Tao ra ten file moi
        $new_file_name = $file_name . ' - Copy.';
        $file_upload = $new_file_name . $extension;
        $new_upload_path = $target_dir . $file_upload;
        $k = 1;
        while (file_exists($new_upload_path)) {
          //=====================================================
          //Tiep tuc tao ra ten file moi
          //=====================================================
          $new_file_name = $file_name . " - Copy({$k}).";
          $k++;
          $file_upload = $new_file_name . $extension;
          $new_upload_path = $target_dir . $file_upload;
        }
        $file_path = $new_upload_path;
      }
      $file->move($target_dir, $file_upload);
      Account::where('email', $email)->update([
        'username' => $request->input('username'),
        'fullname' => $request->input('fullname'),
        'phone_number' => $request->input('phone_number'),
        'avatar' => $file_upload,
        'gender' => $request->input('gender'),
      ]);
    } else {
      Account::where('email', $email)->update([
        'username' => $request->input('username'),
        'fullname' => $request->input('fullname'),
        'phone_number' => $request->input('phone_number'),
        'gender' => $request->input('gender'),
      ]);
    }
    return back();
  }
  public function cancel_order(Request $request)
  {
    $order_id = $request->order_id;
    Order::find($order_id)->update(['status' => 'cancel']);
    Order::find($order_id)->delete();
    $products_of_order = Product_order::where('order_id', $order_id)->get();
    foreach ($products_of_order as $product) {
      $product_info = Product::find($product->product_id);
      $products_sold = $product_info->products_sold;
      $product_info->products_sold = $products_sold  - $product->qty;
      $product_info->save();
    }
  }
  public function searchBill(Request $request)
  {
    $email = session('user_email');
    $user_info = Account::where([
      ['email', $email]
    ])->first();
    $user_id = $user_info->id;
    $q = $request->q;
    $type = (int)$request->type;
    if ($request->type != 0) {
      if ($type == 1) {
        $orders  = Order::where([
          ['status', 'processing'],
          ['account_id',  $user_id],
          ['code', 'LIKE', $q]
        ])->orderBy('created_at', 'DESC')->get();
      }
      if ($type == 2) {
        $orders  = Order::where([
          ['status', 'transporting'],
          ['account_id',  $user_id],
          ['code', 'LIKE', $q]
        ])->orderBy('created_at', 'DESC')->get();
      }
      if ($type == 3) {
        $orders  = Order::where([
          ['status', 'success'],
          ['account_id',  $user_id],
          ['code', 'LIKE', $q]
        ])->orderBy('created_at', 'DESC')->get();
      }
      if ($type == 4) {
        $orders  = Order::onlyTrashed()->where([
          ['status', 'cancel'],
          ['account_id',  $user_id],
          ['code', 'LIKE', $q]
        ])->orderBy('deleted_at', 'DESC')->get();
      }
    } else {
      $orders  = Order::withTrashed()->where([
        ['account_id',  $user_id],
        ['code', 'LIKE', $q]
      ])->orderBy('created_at', 'DESC')->get();
    }
    $data = "";
    if ($orders->count() > 0) {
      $data .= "<div class='hasID' style='position:relative; margin-bottom:40px'>
      <input type='text' class='form-control' name='searchBill' id='searchBill' data_type='" . $type . "' data_uri ='" . route('ajaxSearchBill') . "'placeholder='Tìm Kiếm Theo ID Đơn Hàng'>
      <span class='icon-search'><i class='fas fa-search'></i></span>
      </div>
      <div class='sOrder'>
      <div id='zsBB'>";
      foreach ($orders as $order) {
        $data .= "<div class='minizsBB mb-4 pb-4' style='border-bottom:1px solid rgb(145 143 143 / 96%;'>
        <div class='row bill-item pb-3 mb-3'>";
        if ($order->status == 'processing') {
          $data .= "<div class='col-4 col-md-6'>
          <div class='row'>
          <div class='col-4 codeHA_parent'>
          <span class='codeHA'>Mã Bill:<strong>" . $order->code . "</strong></span>
          </div>
          <div class='col-8 cancel_order'>
          <button class = 'btn btn-danger' id='cancel_order' data_uri ='" . route('cancel.order') . "' data_id = '" . $order->id . "'onclick='confirm(\"Bạn chắc chắn muốn hủy đơn hàng này chứ?\")'>Hủy đơn hàng</button>
          </div>
          </div>
          </div>";
        } else {
          $data .= "<div class='col-4 col-md-6'>
          <span class='codeHA'>Mã Bill:<strong>" . $order->code . "</strong></span>
          </div>";
        }
        $data .= "<div class='col-8 col-md-6 row status'>
        <div class='col-6 d-flex'>";
        if ($order->status == 'processing') {
          $data .= "<i class='fas fa-truck-loading' style='color: #ffc107; font-size:18px; font-weight:700'><span class='pl-2'>Đang xử lý</span></i>";
        } else if ($order->status == 'transporting') {
          $data .= "<i class='fas fa-shuttle-van' style='color: #17a2b8; font-size:18px; font-weight:700'><span class='pl-2'>Đang giao</span></i>";
        } else if ($order->status == 'success') {
          $data .= "<i class='fas fa-check-circle' style='color: #197d00; font-size:18px; font-weight:700'><span class='pl-2'>Hoàn thành</span></i>";
        } else if ($order->status == 'cancel') {
          $data .= "<i class='far fa-window-close' style='color: red; font-size:18px; font-weight:700'><span class='pl-2'>Đã hủy</span></i>";
        }
        $data .= "</div>
        <div class ='col-6'>
        <span class='notPay'><i class='fas fa-money-bill-wave pr-2'></i>Chưa Thanh Toán</span>
        </div>
        </div>
        </div>";
        foreach ($order->products as $item) {
          $data .= "<div class = 'row pb-2 mb-2 prd_item'>
          <div class = 'col-2 thumb_order'>
          <img src='" . url($item->thumbnail) . "' alt='' class='d-block'>
          </div>
          <div class = 'col-7 col-md-8 middle_order' style='margin-top:14px'>
          <div class='product-title'>" . $item->product_title . "</div>
          <div class='code'>Mã sản phẩm: <strong>" . $item->code . "</strong>
          </div>
          <div class = 'qty' style='margin-top:5px'>
          <span>Số lượng: <strong>" . $item->pivot->qty . "</strong></span>
          </div>
          </div>
          <div class ='col-3 col-md-2 subtotal_order'>
          <div class='sub_total' style='padding-top: 50px'>Thành tiền: <span style='color:red'>" . number_format($item->price * $item->pivot->qty, 0, ',', '.') . "đ</span>
          </div>
          </div>
          </div>";
        }
        $data .= "<div class = 'total_order d-flex justify-content-end'>
        <div class='totHA'>Tổng tiền: </div>
        <div class='tot'>" . number_format($order->total, 0, ',', '.') . "đ</div>
        </div>
        </div>";
      }
      $data .= "</div>
      </div>";
    } else {
      $data .= "<div class ='no_pro text-center'>
      <span class = 'd-block' style='font-size:30px; margin-bottom:20px;'>Không có đơn hàng nào</span>
      <i style='font-size: 75px; color:#c8d6e5' class='fas fa-receipt mt-3'></i>
      </div>";
    }
    echo json_encode($data);
  }
  function changePass(Request $request)
  {
      $meta_desc = "Chuyên bán sản phẩm liên quan đến công nghệ - phục vụ mọi nhu cầu của khách hàng";
            $meta_keywords = "sản phẩm công nghệ chất lượng cao, sản phẩm công nghệ chất lượng cao";
            $meta_title = "Thiết bị điện tử chất lượng cao";
    $url_canonical = $request->url();
    if (session()->has('user_email')) {
      session()->put('related_account', 'changePass');
      $email = session('user_email');
      $user_info = Account::where([
        ['email', $email]
      ])->first();
      if ($request->has('changeNewPass')) {
        $validator = Validator::make(
          $request->all(),
          [
            'old_password' => ['required', 'string', 'regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/'],
            'password' => ['required', 'string', 'regex:/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/', 'confirmed', 'different:old_password'],
          ],
          [
            'required' => ":attribute không được để trống",
            'regex' => ':attribute không đúng định dạng',
            'confirmed' => "Xác nhận mật khẩu không thành công",
            'different' => "Mật khẩu mới không được trùng với mật khẩu cũ"
          ],
          [
            'old_password' => 'Mật khẩu cũ',
            'password' => "Mật khẩu",
          ]
        );
        if (!$validator->fails()) {
          $checkPassAccount = Account::where([
            ['email', session('user_email')],
            ['password', md5($request->old_password)]
          ])->get();
          if ($checkPassAccount->count() > 0) {
            Account::where('email', session('user_email'))->update(
              ['password' => md5($request->input('password'))]
            );
            return redirect()->route('account_login');
          } else {
            $request->session()->flash('error', 'Mật khẩu cũ không đúng');
            return back()->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title);
          }
        } else {
          return back()->withErrors($validator);
        }
      } else {
        return view('client.account.passwords.change', compact('user_info',  'meta_desc', 'meta_keywords', 'url_canonical','meta_title'));
      }
    }
  }
}
