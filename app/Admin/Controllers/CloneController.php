<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\DeviceClone;
use Encore\Admin\Facades\Admin;

class CloneController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Clone controller';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DeviceClone);
        $grid->model()->whereToken(Admin::user()->token);

        $grid->rows(function (Grid\Row $row) {
            $row->column('number', ($row->number+1));
        });
        $grid->column('number', 'STT');
        $grid->device()->device_name();
        $grid->device()->imei();
        $grid->uid()->display(function () {
            return '<a href="https://facebook.com/'.$this->uid.'" target="_blank">'.$this->uid.'</a>';
        });
        $grid->email();
        $grid->action();
        $grid->column('created_at_datetime')->display(function () {
            return date('H:i | d-m-Y', substr($this->created_at_datetime, 0, strlen($this->created_at_datetime)-3));
        });
        $grid->column('updated_at_datetime')->display(function () {
            return date('H:i | d-m-Y', substr($this->updated_at_datetime, 0, strlen($this->updated_at_datetime)-3));
        });
        $grid->column('updated_last_datetime')->display(function () {
            return date('H:i | d-m-Y', substr($this->updated_last_datetime, 0, strlen($this->updated_last_datetime)-3));
        });

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
        $show = new Show(DeviceClone::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new DeviceClone);

        $form->display('id', __('ID'));
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
