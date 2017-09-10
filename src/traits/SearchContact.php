<?php

namespace Infotech\GetResponse\traits;

trait SearchContact
{
    
    /**
     * search contacts
     *
     * @param $params
     * @return mixed
     */
    public function searchContacts($params = null)
    {
        return $this->call('search-contacts?' . $this->setParams($params));
    }

    /**
     * retrieve segment
     *
     * @param $id
     * @return mixed
     */
    public function getContactsSearch($id)
    {
        return $this->call('search-contacts/' . $id);
    }

    /**
     * add contacts search
     *
     * @param $params
     * @return mixed
     */
    public function addContactsSearch($params)
    {
        return $this->call('search-contacts/', self::METHOD_POST, $params);
    }

    /**
     * add contacts search
     *
     * @param $id
     * @return mixed
     */
    public function deleteContactsSearch($id)
    {
        return $this->call('search-contacts/' . $id, self::METHOD_DELETE);
    }
}