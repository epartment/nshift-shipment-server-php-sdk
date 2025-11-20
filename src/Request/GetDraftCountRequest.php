<?php
namespace Epartment\NShift\ShipmentServer\Request;

class GetDraftCountRequest extends Request
{
    public function getCommand(): string
    {
        return RequestInterface::COMMAND_GET_DRAFT_COUNT;
    }
}
