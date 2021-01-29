<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\BuyHistory;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Admin;
use Encore\Admin\Facades\Admin as AdminUser;
use Illuminate\Http\Request;

class RevenueController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Lịch sử mua';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $box = new Box();
        $box->title(" ");
        
        $records = BuyHistory::whereUserId(AdminUser::user()->id)->get();
        $box->content(
            view('buy_histories.index', compact('records'))->render()
        );

        Admin::css('asset/buy_histories/style.css');
        Admin::js('asset/buy_histories/script.js');

        return $box;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        return redirect()->route('admin.buy_histories.index');
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return redirect()->route('admin.buy_histories.index');
    }

    public function storeReq(Request $req) {
        $data = $req->all();
        unset($data['_token']);
        $data['user_id'] = AdminUser::user()->id;

        foreach ($data as $field => $value) {
            $data[$field] = str_replace(",", "", $value);
        }

        BuyHistory::firstOrCreate($data);

        admin_toastr(trans('admin.save_succeeded'), 'success');

        return redirect()->back();
    }

    public function delete($id, Request $req) {
        return response()->json([
            'id'    =>  $id
        ]);
    }
}
