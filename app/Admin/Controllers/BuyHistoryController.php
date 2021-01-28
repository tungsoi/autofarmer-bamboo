<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\BuyHistory;
use Encore\Admin\Widgets\Box;
Use Encore\Admin\Admin;

class BuyHistoryController extends AdminController
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
        $box->title($this->title);
        $box->content(
            view('buy_histories.index')->render()
        );

        Admin::css('asset/buy_histories/style.css');
        Admin::js('asset/buy_histories/autonumberic.js');
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
}
