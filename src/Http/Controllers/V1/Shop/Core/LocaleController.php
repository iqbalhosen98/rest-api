<?php

namespace Mrpath\RestApi\Http\Controllers\V1\Shop\Core;

use Mrpath\Core\Repositories\LocaleRepository;
use Mrpath\RestApi\Http\Resources\V1\Shop\Core\LocaleResource;

class LocaleController extends CoreController
{
    /**
     * Is resource authorized.
     *
     * @return bool
     */
    public function isAuthorized()
    {
        return false;
    }

    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return LocaleRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return LocaleResource::class;
    }
}
