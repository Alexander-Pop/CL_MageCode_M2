Manually Debug Checkout without DebuggerException
It is possible to display the real error by editing the model files based on the error ajax call

Edit the function savePaymentInformationAndPlaceOrder in vendor/magento/module-checkout/Model/PaymentInformationManagement.php or for Guest orders in vendor/magento/module-checkout/Model/GuestPaymentInformationManagement.php

 

Change the function from:

<?php
public function savePaymentInformationAndPlaceOrder(
        $cartId,
        $email,
        \Magento\Quote\Api\Data\PaymentInterface $paymentMethod,
        \Magento\Quote\Api\Data\AddressInterface $billingAddress = null
    ) {
        $this->savePaymentInformation($cartId, $email, $paymentMethod, $billingAddress);
        try {
            $orderId = $this->cartManagement->placeOrder($cartId);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(
                __('An error occurred on the server. Please try to place the order again.'),
                $e
            );
        }
        return $orderId;
    }
 
?>
to:

<?php
public function savePaymentInformationAndPlaceOrder(
        $cartId,
        $email,
        \Magento\Quote\Api\Data\PaymentInterface $paymentMethod,
        \Magento\Quote\Api\Data\AddressInterface $billingAddress = null
    ) {
        $this->savePaymentInformation($cartId, $email, $paymentMethod, $billingAddress);
        try {
            $orderId = $this->cartManagement->placeOrder($cartId);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(
                __($e->getMessage()),
                $e
            );
        }
        return $orderId;
    }
 
?>

Now you get the actual error and you should find the full exception in the exception.log file