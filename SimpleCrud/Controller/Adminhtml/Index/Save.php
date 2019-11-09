<?php
/* Glory to Ukraine! Glory to the heros! */

namespace Codelegacy\SimpleCrud\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Codelegacy\SimpleCrud\Api\Data\ReviewInterface;
use Codelegacy\SimpleCrud\Api\ReviewRepositoryInterface;
use Codelegacy\SimpleCrud\Model\Review;
use Codelegacy\SimpleCrud\Model\ReviewFactory;
use Throwable;

class Save extends Action
{
    const ADMIN_RESOURCE = 'Codelegacy_SimpleCrud::save';

    /**
     * @var ReviewRepositoryInterface
     */
    private $reviewRepository;

    /**
     * @var ReviewFactory
     */
    private $reviewFactory;

    /**
     * @param Action\Context $context
     * @param ReviewRepositoryInterface $reviewRepository
     * @param ReviewFactory $reviewFactory
     */
    public function __construct(
        Action\Context $context,
        ReviewRepositoryInterface $reviewRepository,
        ReviewFactory $reviewFactory
    ) {
        parent::__construct($context);
        $this->reviewRepository = $reviewRepository;
        $this->reviewFactory = $reviewFactory;
    }

    /**
     * @return ResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute()
    {
        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        $data = $this->getRequest()->getParams();

        /** @var Review $review */
        if ($id) {
            $review = $this->reviewRepository->getById($id);
        } else {
            unset($data[ReviewInterface::KEY_ID]);
            $review = $this->reviewFactory->create();
        }

        unset($data[ReviewInterface::KEY_UPDATED_AT]);
        $review->setData($data);

        try {
            $this->reviewRepository->save($review);
            $this->messageManager->addSuccessMessage(__('Record saved successfully'));

            if (key_exists('back', $data) && $data['back'] == 'edit') {

                return $resultRedirect->setPath('*/*/edit', ['id' => $id, '_current' => true]);
            }

            return $resultRedirect->setPath('*/*/');
        } catch (Throwable $throwable) {
            $this->messageManager->addErrorMessage(__("Record not saved"));

            return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
        }
    }
}