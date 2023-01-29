<?php

namespace Mrpath\RestApi\Http\Controllers\V1\Shop\Core;

use Mrpath\Core\Repositories\ChannelRepository;
use Mrpath\RestApi\Http\Resources\V1\Shop\Core\ChannelResource;

class ChannelController extends CoreController
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
        return ChannelRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ChannelResource::class;
    }
}
