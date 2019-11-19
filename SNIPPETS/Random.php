<?php
/* get the сollection of custom Magento 2 module */

protected $mymodulemodelFactory; 

public function __construct(
	 .... ,
	 \[Namespace]\[Module]\Model\Resource\[Entity]\CollectionFactory $mymodulemodelFactory, 
	 ... 
	) {
	 ... 
	 $this->mymodulemodelFactory = $mymodulemodelFactory; 
	 ... 
}

//use it in any class method:

$collection = $this->mymodulemodelFactory->create();
?>


/* display exceptions on a page in Magento 2 */
you only have to rename local.xml.sample to local.xml within your pub/errors directory.


/* instantiate a custom block in Magento 2 */
<?php
	//it depends on where you are going to instantiate it from. To create an instance from another block, use the following code:
	$this->getLayout()->createBlock('Full\Block\Class\Name\Here');

	//from a controller:
	$this->_view->getLayout()->createBlock('Full\Block\Class\Name\Here');

	//from a model and a helper:
	$this->_blockFactory->createBlock('Full\Block\Class\Name\Here');

	//Please note that in a case of the model you have to create _blockFactory (a protected member), and inject a \Magento\Framework\View\Element\BlockFactory instance in the constructor, assigning it to the member var. For instance:

	protected $_blockFactory; 
	public function __construct( ..., \Magento\Framework\View\Element\BlockFactory $blockFactory, .... ){ .... $this->_blockFactory = $blockFactory; .... }


	protected $_blockFactory; 
	public function __construct( ..., \Magento\Framework\View\Element\BlockFactory $blockFactory, .... ){ .... $this->_blockFactory = $blockFactory; .... }
?>

/* instantiate a model in Magento 2 */
Since Magento strictly discourages the use of ObjectManager, there are service classes for abstracting it for all scenarios. Thus, you should use factory for all models (non-injectables):

<?php
	protected $pageFactory;

	public function __construct(\Magento\Cms\Model\PageFactory $pageFactory)
	{
	   $this->pageFactory = $pageFactory;
	}

	public function someFunc()
	{
	   ...
	   $page = $this->pageFactory->create();
	   ...
	}
?>
You only have to ask a desired model’s factory in a constructor. Hence, it will be automatically generated, while you run compiler or Magento.


/* check if a Magento 2 module has been successfully installed */

<?php $this->_moduleManager->isEnabled('Vendor_Module') ?>
This is the most convenient method among available now.