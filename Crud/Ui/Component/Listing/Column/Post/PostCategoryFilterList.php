<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Ui\Component\Listing\Column\Post;

use Magento\Framework\Data\OptionSourceInterface;
use Codelegacy\Crud\Model\Category;
use Codelegacy\Crud\Model\ResourceModel\Category\Collection;

class PostCategoryFilterList implements OptionSourceInterface
{
    /**
     * @var array
     */
    protected $_options;

    /**
     * @var Collection
     */
    protected $_collection;

    public function __construct(
        Collection $collection
    ) {
        $this->_collection = $collection;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        if ($this->_options === null) {
            $this->_options = [];

            /** @var Category $category */
            $categories = $this->_collection->getItems();
            foreach ($categories as $category) {
                $this->_options[] = [
                    'value' => $category->getId(),
                    'label' => $category->getTitle()
                ];
            }
        }
        return $this->_options;
    }
}