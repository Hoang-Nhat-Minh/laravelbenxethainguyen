<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Bill;
use App\userdata;
use App\addedhouse;
use App\Houses;
use App\Services;
use App\addservice;
use App\Contract;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Chưa nhập email tài khoản tài khoản.',
            'password.required' => 'Chưa nhập mật khẩu.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login' => 'Tài khoản mật khẩu không hợp lệ!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
            'email' => 'required|unique:users,email'
        ], [
            'name.required' => 'Chưa nhập tên tài khoản.',
            'password.required' => 'Chưa nhập mật khẩu.',
            'password.min' => 'Mật khẩu cần ít nhất 6 kí tự.',
            'confirm_password.required' => 'Mật khẩu xác nhận chưa nhập.',
            'confirm_password.same' => 'Mật khẩu xác nhận không khớp.',
            'email.required' => 'Chưa nhập email tài khoản.',
            'email.unique' => 'Email đã tồn tại.',
        ]);

        $data['password'] = bcrypt($data['password']);

        $data['role_id'] = 2; // User không có quyền quản trị viên 

        User::create($data);

        return redirect(route('login'));
    }


    //Quản lý hồ sơ user
    public function profile()
    {
        $user = Auth::user();
        $userdata = userdata::where('email', $user->email)->first();

        if (empty($userdata)) {
            return redirect(route('profile-update'));
        }

        return view("/profile", ['user' => $user, 'userdata' => $userdata]);
    }

    public function profileupdate()
    {
        $user = Auth::user();

        return view('updateprofile', ['user' => $user]);
    }

    public function fixprofile(Request $request, userdata $userdata)
    {
        $data = $request->validate([
            'profileName' => 'required',
            'surname' => 'required',
            'phone' => 'required|numeric|digits_between:10,13',
            'birthday' => 'required|date|before:today',
            'address' => 'required',
        ], [
            'profileName.required' => 'Bạn chưa nhập tên.',
            'surname.required' => 'Bạn chưa nhập họ.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'phone.digits_between' => 'Số điện thoại phải có từ 10 đến 13 chữ số.',
            'birthday.required' => 'Bạn chưa nhập ngày sinh.',
            'birthday.before' => 'Ngày sinh không thể sau ngày hiện tại.',
            'address.required' => 'Bạn chưa nhập địa chỉ.',
        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['avatar'] = $name;
        }

        $userdata->update($data);
        return redirect()->route('profile')->with('success', 'Sửa thông tin thành công');
    }


    public function profilestore(Request $request)
    {
        $data = $request->validate([
            'profileName' => 'required',
            'surname' => 'required',
            'phone' => 'required|numeric|digits_between:10,13',
            'birthday' => 'required|date|before:today',
            'address' => 'required',
            'avatar' => 'required',
        ], [
            'profileName.required' => 'Bạn chưa nhập tên.',
            'surname.required' => 'Bạn chưa nhập họ.',
            'phone.required' => 'Bạn chưa nhập số điện thoại.',
            'phone.numeric' => 'Số điện thoại phải là số.',
            'phone.digits_between' => 'Số điện thoại phải có từ 10 đến 13 chữ số.',
            'birthday.required' => 'Bạn chưa nhập ngày sinh.',
            'birthday.before' => 'Ngày sinh không thể sau ngày hiện tại.',
            'address.required' => 'Bạn chưa nhập địa chỉ.',
            'avatar.required' => 'Chưa thêm ảnh đại diện',
        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['avatar'] = $name;
        }

        $data['user_id'] = Auth::user()->id;
        $data['email'] = Auth::user()->email;

        userdata::create($data);

        return redirect(route('profile'));
    }

    public function profilefix(userdata $userdata)
    {
        $user = Auth::user();

        return view('/fixprofile', ['user' => $user, 'userdata' => $userdata]);
    }

    //Quản lý quầy đăng kí

    public function addedhouse()
    {
        $user = Auth::user();
        $houses = collect(); // Khởi tạo $houses là một collection rỗng

        $addedhouses = addedhouse::where('email', $user->email)->get();

        if (!$addedhouses->isEmpty()) {
            $houseHeaders = $addedhouses->pluck('house');
            $houses = Houses::whereIn('header', $houseHeaders)->get();
        }

        return view('quaydangki', ['houses' => $houses]);
    }

    //Đăng kí quầy
    public function addedhousestore(Houses $house)
    {
        $check = $this->checkSubmitHouse();
        // Nếu hàm kiểm tra trả về một phản hồi chuyển hướng, trả về phản hồi đó
        if ($check) {
            return $check;
        }

        $user = Auth::user();
        $email = $user->email;
        $houseName = $house->header;

        // Kiểm tra xem boss của house đã tồn tại hay chưa
        if ($house->boss) {
            // Nếu boss đã tồn tại, redirect lại với thông báo lỗi
            return redirect()->back()->with('error', '' . $houseName . ' đã được ' . $house->boss . ' đăng kí');
        }

        // Kiểm tra xem house đã tồn tại trong bảng addedhouse hay chưa
        $existingHouse = addedhouse::where('house', $houseName)->where('email', $email)->first();

        if ($existingHouse) {
            // Nếu house đã tồn tại, redirect lại với thông báo lỗi
            return redirect()->back()->with('error', 'Bạn đã đăng ký quầy này');
        } else {
            // Nếu house chưa tồn tại, tạo mới
            $userdata = userdata::where('email', $email)->first();
            if ($userdata) {
                $userdata->checksubmit = 1;
                $userdata->save();
            }

            $data = ['house' => $houseName, 'email' => $email];
            addedhouse::create($data);

            return redirect()->route('addedhouse')->with('success', 'Đăng kí thành công');
        }
    }

    public function addedhousedestroy(Houses $house)
    {
        $check = $this->checkSubmitHouse();
        // Nếu hàm kiểm tra trả về một phản hồi chuyển hướng, trả về phản hồi đó
        if ($check) {
            return $check;
        }

        // Kiểm tra xem boss của house đã tồn tại hay chưa
        if ($house->boss == Auth::user()->name) {
            // Nếu boss đã tồn tại, redirect lại với thông báo lỗi
            return redirect()->back()->with('error', 'Không thể hủy khi đã làm hợp đồng');
        }

        $houseHeader = $house->header;

        $addedhouse = addedhouse::where('house', $houseHeader)->first();

        // Tìm và xóa TẤT CẢ addedservice tương ứng
        addservice::where('house', $houseHeader)->delete();

        $addedhouse->delete();

        return redirect(route('addedhouse'))->with('success', 'Hủy đăng kí thành công');
    }


    //Dịch vụ đăng kí
    public function addedservices(Houses $house)
    {
        $check = $this->checkSubmitHouse();
        // Nếu hàm kiểm tra trả về một phản hồi chuyển hướng, trả về phản hồi đó
        if ($check) {
            return $check;
        }

        $services = Services::all();
        $addedservices = addservice::where('house', $house->header)->get();
        return view('dangkidichvu', ['services' => $services, 'house' => $house, 'addedservices' => $addedservices]);
    }

    public function addedservicesstore(Houses $house, Services $service)
    {
        $user = Auth::user();
        $email = $user->email;

        // Kiểm tra xem dịch vụ đã tồn tại chưa
        $existingService = addservice::where('house', $house->header)->where('email', $email)->where('service_id', $service->id)->first();
        if ($existingService) {
            return redirect()->back()->with('error', 'Bạn đã đăng ký dịch vụ này');
        }

        $data = ['house' => $house->header, 'email' => $email, 'service_id' => $service->id];

        $userdata = userdata::where('email', $email)->first();
        if ($userdata) {
            $userdata->checksubmit = 1;
            $userdata->save();
        }

        addservice::create($data);
        return redirect()->back()->with('success', 'Đăng kí dịch vụ thành công');
    }

    public function addedservicedestroy(addservice $addedservice)
    {
        $addedservice->delete();

        $userdata = userdata::where('email', Auth::user()->email)->first();
        if ($userdata) {
            $userdata->checksubmit = 1;
            $userdata->save();
        }

        return redirect()->back()->with('success', 'Hủy đăng kí dịch vụ thành công');
    }

    //Gửi đăng ký là chuyển dữ liệu submit-house thành 1
    public function submithouse()
    {
        $user = Auth::user();

        $addedhouses = addedhouse::where('email', $user->email)->get();
        if ($addedhouses->isEmpty()) {
            // Nếu addedhouse rỗng, chuyển hướng với lỗi
            return redirect()->back()->with(['error' => 'Không thể gửi đăng kí khi không đăng kí quầy nào']);
        }

        $userdata = userdata::where('email', Auth::user()->email)->first();
        if ($userdata->checksubmit == 0) {
            return redirect()->back()->with('error', 'Chưa có gì thay đổi');
        }

        /** @var \App\\User $user */

        if ($user->submit_house == 0) {
            $user->submit_house = 1;
            $userdata->checksubmit = 0;
            $user->save();
            $userdata->save();
            return redirect()->back()->with('success', 'Gửi đăng kí thành công');
        }

        return redirect()->back()->with('error', 'Bạn đã gửi đăng kí rồi, xin hãy đợi xác nhận');
    }


    public function checkSubmitHouse()
    {
        $user = Auth::user();

        if ($user->submit_house == 1) {
            return redirect()->back()->with(['error' => 'Bạn đã gửi đơn đăng kí rồi']);
        }

        return null;
    }

    //Hợp đồng
    public function contract()
    {
        $user_id = Auth::user()->id;
        $contracts = Contract::where('user_id', $user_id)->get();
        $bills = Bill::where('user_id', $user_id)->get();
        return view('usercontract', ['contracts' => $contracts, 'bills' => $bills]);
    }

    public function thanhtoan(Bill $bill)
    {
        return view('thanhtoan', ['bill' => $bill]);
    }
}
