<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ReSendMail extends AbstractAction
{
    public function getTitle()
    {
        return 'اعادة ارسال ايميل';
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
        return route('ReSendMail', ["user" => $this->data->id]);
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'users';
    }
}