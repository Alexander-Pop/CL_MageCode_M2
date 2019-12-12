<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Golden\ShareCart\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Catalog\Model\ProductRepository;
use Magento\Catalog\Api\ProductRepositoryInterfaceFactory;
use Magento\Catalog\Helper\ImageFactory;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Theme\Block\Html\Header\Logo;
use Magento\Framework\View\Result\PageFactory;

use Psr\Log\LoggerInterface;

class Controllerfooname extends Action
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * @var ProductRepositoryFactory
     */
    protected $productRepositoryFactory;

    /**
     * @var \Magento\Catalog\Helper\ImageFactory
     */
    protected $imageHelperFactory;

    /** @var CheckoutSession  */
    private $checkoutSession;

    protected $logo;
    protected $resultPageFactory;
    protected $logger;

    /**
     * Index constructor.
     * @param Context $context
     * @param ProductRepository $productRepository
     */
    public function __construct(
        Context $context,
        ProductRepository $productRepository,
        ProductRepositoryInterfaceFactory $productRepositoryFactory,
        ImageFactory $imageHelperFactory,
        CheckoutSession $session,
        Logo $logo,
        PageFactory $resultPageFactory,
        LoggerInterface $logger
    )
    {
        $this->productRepository         = $productRepository;
        $this->productRepositoryFactory  = $productRepositoryFactory;
        $this->imageHelperFactory        = $imageHelperFactory;
        $this->checkoutSession           = $session;
        $this->logo                      = $logo;
        $this->resultPageFactory         = $resultPageFactory;
        $this->logger                    = $logger;
        return parent::__construct($context);
    }


    public function getLogoSrc()
    {    
        return $this->logo->getLogoSrc();
    }

    /**
     * Get logo text
     *
     * @return string
     */
    public function getLogoAlt()
    {    
        return $this->logo->getLogoAlt();
    }
    
    /**
     * Get logo width
     *
     * @return int
     */
    public function getLogoWidth()
    {    
        return $this->logo->getLogoWidth();
    }
    
    /**
     * Get logo height
     *
     * @return int
     */
    public function getLogoHeight()
    {    
        return $this->logo->getLogoHeight();
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|
     * \Magento\Framework\Controller\ResultInterface|
     * \Magento\Framework\View\Result\Page
     */

    public function execute()
    {
      $cartData = $this->checkoutSession->getQuote()->getAllItems();

      $logoSrc = $this->getLogoSrc();

      $resultPage = $this->resultPageFactory->create();

      // $logo = $resultPage->getLayout()
      //     ->createBlock("Magento\Theme\Block\Html\Header\Logo")
      //     ->setTemplate("Magento_Theme::html/header/logo.phtml")
      //     ->toHtml();


      $blockInstance = $resultPage->getLayout()->getBlock('your.block.name');

      $childBlocks = $blockInstance->getChildNames();

      foreach($childBlocks as $blockName){
        $block = $resultPage->getLayout()->getBlock($blockName);
      }



      foreach ($cartData as $item) {
          $product = $this->productRepositoryFactory
              ->create()
              ->getById($item->getProductId());

          //$product->getData('image');
          //$product->getData('thumbnail');
          //$product->getData('small_image');

          $imgSrc = $product->getData('thumbnail');

          $imgSrc = $this->helper->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'catalog/product' .$product->getImage();

          $imgSrc = $this->imageHelperFactory
              ->create()
              ->init($product, 'product_small_image')
              ->getUrl();
      }           
    }
}
