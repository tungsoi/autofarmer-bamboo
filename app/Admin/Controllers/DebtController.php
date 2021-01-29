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

class DebtController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Công nợ';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BuyHistory);
        $grid->model()->whereUserId(AdminUser::user()->id);

        $grid->id();
        $grid->time('Thời gian');
        $grid->sponsor_total('Công nợ')->display(function () {
            return number_format($this->sponsor_total);
        });
        $grid->column('created_at', 'Ngày tạo');
        $grid->disableActions();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        return redirect()->route('admin.debts.index');
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return redirect()->route('admin.debts.index');
    }
}
