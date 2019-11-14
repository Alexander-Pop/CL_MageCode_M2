<?php
// Magento set last viewed category and product in session 

// Magento\Catalog\Controller\Category\View.php
// $this->_catalogSession->setLastVisitedCategoryId($category->getId());
// To get this value:
// use Magento\Catalog\Model\Session as CatalogSession;
// create constructor
// $this->catalogSession = $catalogSession;

$this->catalogSession->getData('last_viewed_category_id');


// Product
Magento\Catalog\Helper\Product\View.php
$this->_catalogSession->setLastViewedProductId($product->getId());

use Magento\Catalog\Model\Session as CatalogSession
$productId = $this->catalogSession->getData('last_viewed_product_id');
?>