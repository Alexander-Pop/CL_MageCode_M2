<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepository\Api\Data;


use Magento\Framework\Api\ExtensibleDataInterface;

interface TestEntityInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param $title
     * @return void
     */
    public function setTitle($title);
}