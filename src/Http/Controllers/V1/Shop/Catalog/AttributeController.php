<?php

namespace Mrpath\RestApi\Http\Controllers\V1\Shop\Catalog;

use Mrpath\Attribute\Repositories\AttributeRepository;
use Mrpath\RestApi\Http\Resources\V1\Shop\Catalog\AttributeResource;

class AttributeController extends CatalogController
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
        return AttributeRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return AttributeResource::class;
    }
}
