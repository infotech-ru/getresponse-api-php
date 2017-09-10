<?php

namespace Infotech\GetResponse\traits;

trait Account
{
    /**
     * get account details
     *
     * @return mixed
     */
    public function accounts()
    {
        return $this->call('accounts');
    }

    /**
     * retrieving billing information
     *
     * @return mixed
     */
    public function getBillingInfo()
    {
        return $this->call('accounts/billing');
    }

}
