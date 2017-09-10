<?php

namespace Infotech\GetResponse\traits;

trait Webform
{
    /**
     * get single web form
     *
     * @param int $w_id
     * @return mixed
     */
    public function getWebform($w_id)
    {
        return $this->call('webforms/' . $w_id);
    }

    /**
     * retrieve all webforms
     * @param array $params
     *
     * @return mixed
     */
    public function getWebforms($params = [])
    {
        return $this->call('webforms?' . $this->setParams($params));
    }
}