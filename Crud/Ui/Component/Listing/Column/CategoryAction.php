<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\Crud\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\UrlInterface;
use Codelegacy\Crud\Api\Data\CategoryInterface;

class CategoryAction extends AbstractAction
{
    /** Url path */
    const PATH_EDIT = 'crud/category/edit';
    const PATH_DELETE = 'crud/category/delete';

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $urlBuilder, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item[CategoryInterface::ID])) {
                    $item[$name]['edit'] = [
                        'href' => $this->_urlBuilder->getUrl(
                            $this->_editUrl, [self::FRONTEND_ID => $item[CategoryInterface::ID]]
                        ),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->_urlBuilder->getUrl(
                            self::PATH_DELETE,
                            [self::FRONTEND_ID => $item[CategoryInterface::ID]]
                        ),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete') . ' ' . $item[CategoryInterface::TITLE],
                            'message' => __(
                                'Are you sure you wan\'t to delete a record?'
                            )
                        ]
                    ];
                }
            }
        }
        return $dataSource;
    }

    /**
     * @return string
     */
    protected function getEditUrl()
    {
        return self::PATH_EDIT;
    }
}
