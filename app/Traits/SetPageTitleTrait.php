<?php

namespace App\Traits;

trait SetPageTitleTrait
{
    protected function setPageTitle($pageTitle, $pageSubTitle = null): void
    {
        view()->share(['pageTitle' => $pageTitle, 'pageSubTitle' => $pageSubTitle]);
    }
}
