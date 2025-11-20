<?php
namespace Epartment\NShift\ShipmentServer\Request;

class GetProductsRequest extends Request
{
    public function getCommand(): string
    {
        return RequestInterface::COMMAND_GET_PRODUCTS;
    }
}
