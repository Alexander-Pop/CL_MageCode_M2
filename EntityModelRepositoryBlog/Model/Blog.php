<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\EntityModelRepositoryBlog\Model;

use Magento\Framework\Api\DataObjectHelper;
use Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogInterface;
use Codelegacy\EntityModelRepositoryBlog\Api\Data\BlogInterfaceFactory;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry; //depricated - use session instead
use Codelegacy\EntityModelRepositoryBlog\Model\ResourceModel\Blog;
use Magento\Framework\Data\Collection\AbstractDb;

class Blog extends \Magento\Framework\Model\AbstractModel
{

    protected $_eventPrefix = 'codelegacy_blog_blog';
    protected $blogDataFactory;

    protected $dataObjectHelper;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param BlogInterfaceFactory $blogDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        BlogInterfaceFactory $blogDataFactory,
        DataObjectHelper $dataObjectHelper,
        Blog $resource,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->blogDataFactory  = $blogDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct(
            $context, 
            $registry, 
            $resource, 
            $resourceCollection, 
            $data
        );
    }

    public function getDataModel()
    {
        $blogData = $this->getData();
        
        $blogDataObject = $this->blogDataFactory->create();

        $this->dataObjectHelper->populateWithArray(
            $blogDataObject,
            $blogData,
            BlogInterface::class
        );
        
        return $blogDataObject;
    }

}
