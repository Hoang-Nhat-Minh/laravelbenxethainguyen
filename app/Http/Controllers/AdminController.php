<?php

namespace App\Http\Controllers;

use App\Houses;
use App\Services;
use App\addedhouse;
use App\addservice;
use App\User;
use App\Bill;
use App\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function admin()
    {
        return view("admin/dashboard");
    }

    //Quản lý tài khoản
    public function acc()
    {
        $users = User::all();
        return view("admin/acc/acc", ['users' => $users]);
    }

    public function giveRoleUser(User $user)
    {
        $user->role_id = 1;
        $user->save();
        return redirect()->back()->with('success', 'Đã cấp quyền thành công!');
    }

    public function revokeRoleUser(User $user)
    {
        $user->role_id = 2;
        $user->save();
        return redirect()->back()->with('success', 'Đã hủy quyền thành công!');
    }

    public function destroyuser(User $user)
    {
        $user->delete();
        return redirect(route('acc'))->with('success', 'Xóa tài khoản thành công');
    }

    public function createacc()
    {
        return view("admin/acc/create");
    }

    public function storeuser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
            'email' => 'required',
            'role_id' => 'required'
        ], [
            'name.required' => 'Chưa nhập tên tài khoản.',
            'password.required' => 'Chưa nhập mật khẩu.',
            'password.min' => 'Mật khẩu cần ít nhất 6 kí tự.',
            'email.required' => 'Chưa nhập email tài khoản.',
            'role.required' => 'Chưa chọn vai trò.'
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('acc')->with('success', 'Thêm tài khoản thành công');
    }

    //Quản lý quầy
    public function house()
    {
        $houses = Houses::all();
        return view("admin/house/house", ['houses' => $houses]);
    }

    public function createhouse()
    {
        return view("admin/house/create");
    }

    protected $rules = [
        'header' => 'required|unique:Houses,header',
        'shortInfo' => 'required',
        'detailInfo' => 'required',
    ];
    protected $messages = [
        'header.required' => 'Chưa nhập tên quầy.',
        'header.unique' => 'Quầy đã tồn tại.',
        'shortInfo.required' => 'Chưa nhập tóm tắt quầy.',
        'detailInfo.required' => 'Chưa nhập chi tiết quầy.',
    ];

    public function storehouse(Request $request)
    {
        $rules = $this->rules;
        $messages = $this->messages;

        $data = $request->validate($rules, $messages);

        $slug = Str::slug($request->header, '-');
        $data['slug'] = $slug;

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['avatar'] = $name;
        }

        Houses::create($data);
        return redirect()->route('house')->with('success', 'Thêm quầy thành công');
    }

    public function edithouse(Houses $house)
    {
        return view('admin/house/edit', ['house' => $house]);
    }

    public function updatehouse(Request $request, Houses $house)
    {
        $data = $request->validate([
            'header' => 'required',
            'shortInfo' => 'required',
            'detailInfo' => 'required',
        ], [
            'header.required' => 'Chưa nhập tên quầy.',
            'shortInfo.required' => 'Chưa nhập tóm tắt quầy.',
            'detailInfo.required' => 'Chưa nhập chi tiết quầy.',
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

        $house->update($data);
        return redirect()->route('house')->with('success', 'Sửa thông tin quầy thành công');
    }

    public function destroyhouse(Houses $house)
    {
        $house->delete();
        return redirect(route('house'))->with('success', 'Xóa quầy thành công');
    }

    //Quản lý dịch vụ
    public function service()
    {
        $services = Services::all();
        return view("admin/service/service", ['services' => $services]);
    }

    public function createservice()
    {
        return view("admin/service/create");
    }

    protected $rulesservice = [
        'header' => 'required|unique:Services,header',
        'avatar' => 'required',
        'shortInfo' => 'required',
        'detailInfo' => 'required',
    ];
    protected $messagesservice = [
        'header.required' => 'Chưa nhập tên dịch vụ.',
        'header.unique' => 'Dịch vụ đã tồn tại.',
        'avatar.required' => 'Chưa chọn ảnh cho dịch vụ',
        'shortInfo.required' => 'Chưa nhập tóm tắt dịch vụ.',
        'detailInfo.required' => 'Chưa nhập chi tiết dịch vụ.',
    ];

    public function storeservice(Request $request)
    {
        $rules = $this->rulesservice;
        $messages = $this->messagesservice;

        $data = $request->validate($rules, $messages);

        $slug = Str::slug($request->header, '-');
        $data['slug'] = $slug;

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['avatar'] = $name;
        }

        Services::create($data);
        return redirect()->route('service')->with('success', 'Thêm dịch vụ thành công');
    }

    public function editservice(Services $service)
    {
        return view('admin/service/edit', ['service' => $service]);
    }

    public function updateservice(Request $request, Services $service)
    {
        $data = $request->validate([
            'header' => 'required',
            'shortInfo' => 'required',
            'detailInfo' => 'required',
        ], [
            'header.required' => 'Chưa nhập tên dịch vụ.',
            'shortInfo.required' => 'Chưa nhập tóm tắt dịch vụ.',
            'detailInfo.required' => 'Chưa nhập chi tiết dịch vụ.',
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

        $service->update($data);
        return redirect()->route('service')->with('success', 'Sửa thông tin dịch vụ thành công');
    }

    public function destroyservice(Services $service)
    {
        $service->delete();
        return redirect(route('service'))->with('success', 'Xóa dịch vụ thành công');
    }

    //Quản lý đăng kí của user
    public function createcontract()
    {
        $users = User::where('submit_house', 1)->get();

        return view("admin/contract/create", ['users' => $users]);
    }

    public function storecontract(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'contract' => 'required|image',
        ], [
            'user_id.required' => 'Vui lòng chọn người thuê',
            'contract.required' => 'Vui lòng tải lên ảnh hợp đồng',
            'contract.image' => 'File tải lên phải là ảnh',
        ]);

        if ($request->hasFile('contract')) {
            $image = $request->file('contract');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/Pictures/upFormWeb');
            if (!$image->move($destinationPath, $name)) {
                return back()->with('error', 'Đăng ảnh thất bại.');
            }
            $data['contract'] = $name;
        }

        Contract::create($data);
        return redirect(route('contractwait'))->with('success', 'Tạo thành công, xin hãy xác nhận yêu cầu ở dưới');
    }


    public function contractwait()
    {
        $users = User::where('submit_house', 1)->get();

        return view("admin/contract/contractwait", ['users' => $users]);
    }

    public function contractwaitdetail(User $user)
    {
        $email = $user->email;

        $addedhouses = addedhouse::where('email', $email)->get();

        $houses = Houses::whereIn('header', $addedhouses->pluck('house'))->get();

        $addedservices = addservice::where('email', $email)->get();

        return view("admin/contract/contractwaitdetail", ['houses' => $houses, 'addedservices' => $addedservices, 'user' => $user]);
    }

    public function setownerofhouse(User $user)
    {
        $user->submit_house = 0;
        $user->save();

        $email = $user->email;

        $addedhouses = addedhouse::where('email', $email)->get();

        foreach ($addedhouses as $addedhouse) {
            $house = Houses::where('header', $addedhouse->house)->first();
            if ($house) {
                $house->boss = $user->name;
                $house->save();
            }
        }

        return redirect()->back()->with('success', 'Đăng kí quầy cho ' . $user->name . ' thành công');
    }

    public function contractwaitdestroy(User $user)
    {
        $user->submit_house = 0;

        $user->save();

        return redirect()->back()->with('success', 'Hủy thành công thành công');
    }

    public function contract()
    {
        $contracts = Contract::all();

        return view("admin/contract/contract", ['contracts' => $contracts]);
    }

    public function contractdetail(Contract $contract)
    {
        return view("admin/contract/contractdetail", ['contract' => $contract]);
    }

    //Quản lý hóa đơn
    public function billlist()
    {
        $bills = Bill::all();
        return view("admin/bill/bill", ['bills' => $bills]);
    }

    public function bill()
    {
        $user_ids = Contract::select('user_id')->distinct()->get();
        return view("admin/bill/create", ['user_ids' => $user_ids]);
    }

    public function billview(Bill $bill)
    {
        return view("admin/bill/billvview", ['bill' => $bill]);
    }

    public function billstore(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'rowonename' => 'required_without_all:rowtwoname,rowthreename,rowfourname,rowfivename,rowsixname,rowsevenname,roweightname,rowninename,rowtenname',
            'price' => 'required|numeric',
            'billcode' => 'required',
            'date' => 'required',
        ], [
            'user_id.required' => 'Vui lòng chọn khách hàng.',
            'rowonename.required_without_all' => 'Vui lòng điền ít nhất một thông tin hóa đơn.',
            'price.required' => 'Vui lòng điền giá hóa đơn',
            'price.numeric' => 'Tổng tiền phải là số',
            'billcode.required' => 'Vui lòng điền mã hóa đơn',
            'date.required' => 'Vui lòng điền ngày tạo hóa đơn',
        ]);

        Bill::create($data);
        return redirect(route('bill-list'))->with('success', 'Tạo hóa đơn thành công');
    }

    public function billdestroy(Bill $bill)
    {
        $bill->delete();
        return redirect()->back()->with('success', 'Xóa hóa đơn thành công');
    }
}
