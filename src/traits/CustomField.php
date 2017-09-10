<?php

namespace Infotech\GetResponse\traits;

trait CustomField
{
    
    /**
     * retrieve account custom fields
     * @param array $params
     *
     * @return mixed
     */
    public function getCustomFields($params = [])
    {
        return $this->call('custom-fields?' . $this->setParams($params));
    }

    /**
     * add custom field
     *
     * @param $params
     * @return mixed
     */
    public function setCustomField($params)
    {
        return $this->call('custom-fields', self::METHOD_POST, $params);
    }

    /**
     * retrieve single custom field
     *
     * @param string $custom_id obtained by API
     * @return mixed
     */
    public function getCustomField($custom_id)
    {
        return $this->call('custom-fields/' . $custom_id, self::METHOD_GET);
    }
    
}