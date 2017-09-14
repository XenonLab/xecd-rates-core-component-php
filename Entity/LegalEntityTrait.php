<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

trait LegalEntityTrait
{
    /**
     * @var string
     */
    protected $terms;

    /**
     * @var string
     */
    protected $privacy;

    /**
     * @return string
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * @param string $terms
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;
    }

    /**
     * @return string
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * @param string $privacy
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;
    }
}
