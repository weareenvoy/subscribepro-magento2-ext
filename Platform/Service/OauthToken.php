<?php

namespace Swarming\SubscribePro\Platform\Service;

/**
 * @method \SubscribePro\Service\OauthToken\OauthTokenService getService($websiteId = null)
 */
class OauthToken extends AbstractService
{
    /**
     * @param int $customerEmail
     * @param int|null $websiteId
     * @return string
     */
    public function retrieveToken($customerEmail, $websiteId = null)
    {
        return $this->getService($websiteId)->retrieveToken($customerEmail);
    }
}
