<?php

namespace Infotech\GetResponse\traits;

trait Form
{
    /**
     * get single form
     *
     * @param int $form_id
     * @return mixed
     */
    public function getForm($form_id)
    {
        return $this->call('forms/' . $form_id);
    }

    /**
     * retrieve all forms
     * @param array $params
     *
     * @return mixed
     */
    public function getForms($params = [])
    {
        return $this->call('forms?' . $this->setParams($params));
    }
}