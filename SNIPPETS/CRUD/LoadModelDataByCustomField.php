Magento 2 developments involve strong usage of models concept. Usually magento models loaded by primary field. However, if you need to load it using non-primary unique field there are several methods to do it. To illustrate examples below lets assume that we have created tables sliders with primary index slider_id and unique index alias. Model, ResourceModel, Collection classes also created.

Load Model via Collection
Inject the factory class in your constructor using dependency injection:
<?php
/**
 * @var \Company\Module\Model\SliderFactory
 */
protected $sliderFactory;

/**
 ...
 * @param \Company\Module\Model\SliderFactory $sliderFactory
 ...
 */
public function __construct(
	...
	\Company\Module\Model\SliderFactory $sliderFactory,
	...
)
{
	parent::__construct(...);
	$this->sliderFactory = $sliderFactory;
}
?>
And then you can use factory to get collection:

<?php
$banners = $this->sliderFactory->create()
	->getCollection()
	->addFieldToFilter('alias', $alias)
?>

Load Model using load method
Inject the factory class in your constructor using dependency injection as we did with collections. After that create slider model using factory and execute load method:

<?php
$slider = $this->sliderFactory->create();
$slider->load($alias,'alias');
if(!$slider->getId()){
    echo "not found";
}
?>
However, if you do check abstract model class Magento\Framework\Model\AbstractModel you will see that load and save methods are deprecated. Of course you can use resource model directly.

<?php
$slider = $this->sliderFactory->create();
$slider->getResource()
	->load($slider, $alias, 'alias');

?>

But this solution also has some drawbacks. The main reason is model load method contain important code that initiate model load before/after events, see Magento\Framework\Model\AbstractModel :

<?php
public function load($modelId, $field = null)
{
    $this->_beforeLoad($modelId, $field);
    $this->_getResource()->load($this, $modelId, $field);
    $this->_afterLoad();
    $this->setOrigData();
    $this->_hasDataChanges = false;
    $this->updateStoredData();
    return $this;
}
?>

Be aware of the following caveats:

_beforeLoad is not called: model_load_before and $this->_eventPrefix . '_load_before' events are not dispatched via eventManager.
_afterLoad is not called: model_load_after and $this->_eventPrefix . '_load_after' events are not dispatched via eventManager.
updateStoredDatais not called: object’s stored data and the actual data are not synchronized.