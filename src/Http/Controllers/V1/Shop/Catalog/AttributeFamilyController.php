<?php

namespace Mrpath\RestApi\Http\Controllers\V1\Shop\Catalog;

use Mrpath\Attribute\Repositories\AttributeFamilyRepository;
use Mrpath\RestApi\Http\Resources\V1\Shop\Catalog\AttributeFamilyResource;

class AttributeFamilyController extends CatalogController
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
        return AttributeFamilyRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return AttributeFamilyResource::class;
    }
}
