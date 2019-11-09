<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Rest\Api\Data;

interface PhoneInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @return int
     */
    public function getBrandId();

    /**
     * @param int $brandId
     */
    public function setBrandId($brandId);

    /**
     * @return float
     */
    public function getPrice();

    /**
     * @param float $price
     */
    public function setPrice($price);

    /**
     * @return array
     */
    public function asArray();
}