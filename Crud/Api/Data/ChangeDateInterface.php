<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Api\Data;

interface ChangeDateInterface
{
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME = 'update_time';

    /**
     * @return string
     */
    public function getCreationTime();

    /**
     * @return string
     */
    public function getUpdateTime();
}