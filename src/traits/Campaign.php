<?php

namespace Infotech\GetResponse\traits;

trait Campaign
{
    /**
     * Return all campaigns
     * @return mixed
     */
    public function getCampaigns()
    {
        return $this->call('campaigns');
    }
    
    /**
     * get single campaign
     * @param string $campaign_id retrieved using API
     * @return mixed
     */
    public function getCampaign($campaign_id)
    {
        return $this->call('campaigns/' . $campaign_id);
    }

    /**
     * adding campaign
     * @param $params
     * @return mixed
     */
    public function createCampaign($params)
    {
        return $this->call('campaigns', self::METHOD_POST, $params);
    }
}

