<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

interface LegalEntityInterface
{
    /**
     * @return string
     */
    public function getTerms();

    /**
     * @param string $terms
     */
    public function setTerms($terms);

    /**
     * @return string
     */
    public function getPrivacy();

    /**
     * @param string $privacy
     */
    public function setPrivacy($privacy);
}
