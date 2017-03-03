<?php

namespace Swarming\SubscribePro\Block\Customer;

use Magento\Customer\Model\Address\Config as AddressConfig;
use Swarming\SubscribePro\Model\Config\SubscriptionOptions;

class Subscriptions extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var \Swarming\SubscribePro\Platform\Service\OauthToken
     */
    protected $oauthTokenService;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;

    /**
     * @var \Swarming\SubscribePro\Ui\ConfigProvider\PriceConfig
     */
    protected $priceConfigProvider;

    /**
     * @var \Magento\Payment\Model\CcConfigProvider
     */
    protected $ccConfigProvider;

    /**
     * @var \Swarming\SubscribePro\Gateway\Config\Config
     */
    protected $gatewayConfig;

    /**
     * @var \Magento\Customer\Model\Address\Mapper
     */
    protected $addressMapper;

    /**
     * @var \Magento\Customer\Model\Address\Config
     */
    protected $addressConfig;

    /**
     * @var \Swarming\SubscribePro\Ui\ConfigProvider\SubscriptionConfig
     */
    protected $subscriptionConfig;

    /**
     * @var \Swarming\SubscribePro\Ui\ComponentProvider\AddressAttributes
     */
    protected $addressAttributes;

    /**
     * @var \Magento\Checkout\Block\Checkout\AttributeMerger
     */
    protected $attributeMerger;

    /**
     * @var \Swarming\SubscribePro\Gateway\Config\ConfigProvider
     */
    protected  $gatewayConfigProvider;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
     * @param \Swarming\SubscribePro\Platform\Service\OauthToken $oauthTokenService
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Swarming\SubscribePro\Ui\ConfigProvider\PriceConfig $priceConfigProvider
     * @param \Magento\Payment\Model\CcConfigProvider $ccConfigProvider
     * @param \Swarming\SubscribePro\Gateway\Config\Config $gatewayConfig
     * @param \Magento\Customer\Model\Address\Mapper $addressMapper
     * @param \Magento\Customer\Model\Address\Config $addressConfig
     * @param \Swarming\SubscribePro\Ui\ConfigProvider\SubscriptionConfig $subscriptionConfig
     * @param \Swarming\SubscribePro\Ui\ComponentProvider\AddressAttributes $addressAttributes
     * @param \Magento\Checkout\Block\Checkout\AttributeMerger $attributeMerger
     * @param \Swarming\SubscribePro\Gateway\Config\ConfigProvider $gatewayConfigProvider
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Swarming\SubscribePro\Platform\Service\OauthToken $oauthTokenService,
        \Magento\Customer\Model\Session $customerSession,
        \Swarming\SubscribePro\Ui\ConfigProvider\PriceConfig $priceConfigProvider,
        \Magento\Payment\Model\CcConfigProvider $ccConfigProvider,
        \Swarming\SubscribePro\Gateway\Config\Config $gatewayConfig,
        \Magento\Customer\Model\Address\Mapper $addressMapper,
        \Magento\Customer\Model\Address\Config $addressConfig,
        \Swarming\SubscribePro\Ui\ConfigProvider\SubscriptionConfig $subscriptionConfig,
        \Swarming\SubscribePro\Ui\ComponentProvider\AddressAttributes $addressAttributes,
        \Magento\Checkout\Block\Checkout\AttributeMerger $attributeMerger,
        \Swarming\SubscribePro\Gateway\Config\ConfigProvider $gatewayConfigProvider,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerRepository = $customerRepository;
        $this->oauthTokenService = $oauthTokenService;
        $this->customerSession = $customerSession;
        $this->priceConfigProvider = $priceConfigProvider;
        $this->ccConfigProvider = $ccConfigProvider;
        $this->gatewayConfig = $gatewayConfig;
        $this->addressMapper = $addressMapper;
        $this->addressConfig = $addressConfig;
        $this->subscriptionConfig = $subscriptionConfig;
        $this->addressAttributes = $addressAttributes;
        $this->attributeMerger = $attributeMerger;
    }

    public function getSubscriptionWidgetConfiguration()
    {
        return json_encode([
            'apiAccessToken' => $this->oauthTokenService->retrieveToken('johnspar1+johnjohnjohn@gmail.com'),
            'apiBaseUrl' => '',
            'spreedlyEnvironmentKey' => '',
            'customerId' => '',
        ]);
    }

    protected function getSubscribeProConfig()
    {
        return $this->gatewayConfigProvider->getConfig();
    }

}
