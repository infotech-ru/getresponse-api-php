<?php

namespace Infotech\GetResponse\traits;

trait Newsletter
{
    /**
     * list all RSS newsletters
     * @return mixed
     */
    public function getRSSNewsletters()
    {
        $this->call('rss-newsletters', self::METHOD_GET, null);
    }

    /**
     * send one newsletter
     *
     * @param $params
     * @return mixed
     */
    public function sendNewsletter($params)
    {
        return $this->call('newsletters', self::METHOD_POST, $params);
    }

    /**
     * @param $params
     * @return mixed
     */
    public function sendDraftNewsletter($params)
    {
        return $this->call('newsletters/send-draft', self::METHOD_POST, $params);
    }
}

