<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class UsersExport extends AbstractAction
{
    public function getTitle()
    {
        return 'تصدير';
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
        return route('UsersExport');
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'users';
    }

    public function massAction($ids, $comingFrom)
    {
        return redirect()->route('UsersExport');
    }
}