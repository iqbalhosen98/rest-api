<?php

namespace Mrpath\RestApi\Http\Controllers\V1\Shop\Customer;

use Mrpath\RestApi\Http\Resources\V1\Shop\Sales\ShipmentResource;
use Mrpath\Sales\Repositories\ShipmentRepository;

class ShipmentController extends CustomerController
{
    /**
     * Repository class name.
     *
     * @return string
     */
    public function repository()
    {
        return ShipmentRepository::class;
    }

    /**
     * Resource class name.
     *
     * @return string
     */
    public function resource()
    {
        return ShipmentResource::class;
    }
}
