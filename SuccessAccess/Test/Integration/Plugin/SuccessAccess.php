<?php
/* Glory to Ukraine! Glory to the heros! */
/* https://www.integer-net.com/integration-tests-with-magento-2/ */
declare(strict_types = 1);

namespace Codelegacy\SuccessAccess\Test\Integration\Plugin;

class SuccessAccess extends \Magento\TestFramework\TestCase\AbstractController
{
    /**
     * Test redirect when module is disabled
     * @magentoConfigFixture default_store sales/success_test/enable 0
     * @magentoConfigFixture default_store sales/success_test/secure_key 222333444555
     * @magentoDataFixture Magento/Sales/_files/order.php
     */
    public function testLoadSuccessWithModuleDisabled(): void
    {
        $this->dispatch('checkout/onepage/success/key/222333444555/order/2000000197');
        $response = $this->getResponse();

        $this->assertEquals(302, $response->getStatusCode());
        /** @var \Zend\Http\Header\Location $location */
        $location = $response->getHeader('Location');
        $this->assertContains('checkout/cart', $location->getUri());
    }

    /**
     * Test redirect when module is enabled and valid key provided
     * @magentoConfigFixture default_store sales/success_test/enable 1
     * @magentoConfigFixture default_store sales/success_test/secure_key 222333444555
     * @magentoDataFixture Magento/Sales/_files/order.php
     */
    public function testLoadSuccessWithModuleEnabled(): void
    {
        $this->dispatch('checkout/onepage/success/key/222333444555/order/2000000197');
        $response = $this->getResponse();

        $this->assertContains(
            'Your order # is:',
            $response->getBody()
        );
    }

    /**
     * Test redirect when module is enabled and invalid key provided
     * @magentoConfigFixture default_store sales/success_test/enable 1
     * @magentoConfigFixture default_store sales/success_test/secure_key 222333444555
     * @magentoDataFixture Magento/Sales/_files/order.php
     */
    public function testLoadSuccessWithModuleEnabledInvalidKey(): void
    {
        $this->dispatch('checkout/onepage/success/key/12/order/2000000197');
        $response = $this->getResponse();

        $this->assertEquals(302, $response->getStatusCode());
        /** @var \Zend\Http\Header\Location $location */
        $location = $response->getHeader('Location');
        $this->assertContains('checkout/cart', $location->getUri());
    }

    /**
     * Test redirect when module is enabled and invalid key provided
     * @magentoConfigFixture default_store sales/success_test/enable 1
     * @magentoConfigFixture default_store sales/success_test/secure_key 222333444555
     * @magentoDataFixture Magento/Sales/_files/order.php
     */
    public function testLoadSuccessWithModuleEnabledValidKeyNoSuchOrder(): void
    {
        $this->dispatch('checkout/onepage/success/key/222333444555/order/100');
        $response = $this->getResponse();

        $this->assertEquals(302, $response->getStatusCode());
        /** @var \Zend\Http\Header\Location $location */
        $location = $response->getHeader('Location');
        $this->assertContains('checkout/cart', $location->getUri());
    }
}
