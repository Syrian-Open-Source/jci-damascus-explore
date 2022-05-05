<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ToggleApproved extends AbstractAction
{
    public function getTitle()
    {
        if($this->data->is_approved){
            return 'الغاء تفعيل';
        }else{
            return 'تفعيل';
        }
    }

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        return route('ToggleApproved', ["user" => $this->data->id]);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'users';
    }
}