<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AuthController as BaseAuthController;
use Encore\Admin\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\BuyHistory;

class AuthController extends BaseAuthController
{
    /**
     * @var string
     */
    protected $registerView = 'admin.register';

    /**
     * Model-form for user setting.
     *
     * @return Form
     */
    protected function settingForm()
    {
        $class = config('admin.database.users_model');

        $form = new Form(new $class());

        $form->display('username', trans('admin.username'));
        $form->text('name', trans('admin.name'))->rules('required');
        $form->image('avatar', trans('admin.avatar'));
        $form->password('password', trans('admin.password'))->rules('confirmed|required');
        $form->password('password_confirmation', trans('admin.password_confirmation'))->rules('required')
            ->default(function ($form) {
                return $form->model()->password;
            });
        $form->text('token')->rules('required');

        $form->setAction(admin_url('auth/setting'));

        $form->ignore(['password_confirmation']);

        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = Hash::make($form->password);
            }
        });

        $form->saved(function () {
            admin_toastr(trans('admin.update_succeeded'));

            return redirect(admin_url('auth/setting'));
        });

        return $form;
    }

    /**
     * Show the login page.
     *
     * @return \Illuminate\Contracts\View\Factory|Redirect|\Illuminate\View\View
     */
    public function getRegister()
    {
        if ($this->guard()->check()) {
            return redirect($this->redirectPath());
        }

        return view($this->registerView);
    }

    public function postRegister(Request $request) {
        $this->registerValidator($request->all())->validate();
        
        $credentials = [
            $this->username() =>  $request->username,
            'password'        =>  bcrypt('123456'),
        ];
        
        $user = User::firstOrCreate($credentials);
        DB::table('admin_role_users')->insert([
            'user_id'   =>  $user->id,
            'role_id'   =>  2
        ]);

        // render data buy_histories
        for ($index = 1; $index <= 52; $index++) {
            $data = [
                'user_id'   =>  $user->id,
                'time'  =>  "Tuần $index",
                'self_amount'   =>  4,
                'self_price'    =>  2000000,
                'self_total'    =>  8000000,
                'sponsor_amount'    =>  4,
                'sponsor_price'     =>  2000000,
                'sponsor_total'     =>  8000000,
                'sim_amount'        =>  8,
                'sim_price'         =>  30000,
                'sim_total'         =>  240000,
                'clone_amount'      =>  800,
                'clone_price'       =>  1600,
                'clone_total'       =>  1280000,
                'total_money'       =>  17520000
            ];

            BuyHistory::firstOrCreate($data);
        }

        admin_toastr('Đăng ký thành công', 'success');
        return redirect()->route('admin.login')->with('register', 'Đăng ký thành công.');
    }

    protected function registerValidator(array $data)
    {
        return Validator::make($data, [
            $this->username()   => 'required|unique:admin_users,username'
        ]);
    }

}
