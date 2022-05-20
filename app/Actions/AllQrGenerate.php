<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class AllQrGenerate extends AbstractAction
{
    public function getTitle()
    {
        return 'بطاقات تعريفية';
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
            'style' => 'margin-right: 10px'
        ];
    }

    public function getDefaultRoute()
    {
        return route('allQrGenerate');
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'users';
    }

    public function massAction($ids, $comingFrom)
    {
        return redirect()->route('allQrGenerate');
    }
}