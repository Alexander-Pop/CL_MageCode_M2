<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepositoryBlog\Model\ResourceModel\Blog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Codelegacy\EntityModelRepositoryBlog\Model\Blog::class,
            \Codelegacy\EntityModelRepositoryBlog\Model\ResourceModel\Blog::class
        );
    }
}
