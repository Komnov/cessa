<?php


namespace Ipol\Ozon\Api\Entity\Response\Part;

trait AbstractResponsePart
{
    /**
     * AbstractResponsePart constructor.
     * @param array $fields
     */
    public function __construct($fields = [])
    {
        parent::__construct();
        $this->setFields($fields);
    }
}