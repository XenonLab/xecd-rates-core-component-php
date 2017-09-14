<?php

namespace Xe\Xecd\Component\Rates\Core\Entity;

class Account
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $organization;

    /**
     * @var string
     */
    protected $package;

    /**
     * @var \DateTime
     */
    protected $serviceStartDate;

    /**
     * @var string
     */
    protected $packageLimitDuration;

    /**
     * @var int
     */
    protected $packageLimit;

    /**
     * @var int
     */
    protected $packageLimitRemaining;

    /**
     * @var \DateTime
     */
    protected $packageLimitResetDate;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return string
     */
    public function getPackage()
    {
        return $this->package;
    }

    /**
     * @param string $package
     */
    public function setPackage($package)
    {
        $this->package = $package;
    }

    /**
     * @return \DateTime
     */
    public function getServiceStartDate()
    {
        return $this->serviceStartDate;
    }

    /**
     * @param \DateTime $serviceStartDate
     */
    public function setServiceStartDate(\DateTime $serviceStartDate)
    {
        $this->serviceStartDate = $serviceStartDate;
    }

    /**
     * @return string
     */
    public function getPackageLimitDuration()
    {
        return $this->packageLimitDuration;
    }

    /**
     * @param string $packageLimitDuration
     */
    public function setPackageLimitDuration($packageLimitDuration)
    {
        $this->packageLimitDuration = $packageLimitDuration;
    }

    /**
     * @return int
     */
    public function getPackageLimit()
    {
        return $this->packageLimit;
    }

    /**
     * @param int $packageLimit
     */
    public function setPackageLimit($packageLimit)
    {
        $this->packageLimit = $packageLimit;
    }

    /**
     * @return int
     */
    public function getPackageLimitRemaining()
    {
        return $this->packageLimitRemaining;
    }

    /**
     * @param int $packageLimitRemaining
     */
    public function setPackageLimitRemaining($packageLimitRemaining)
    {
        $this->packageLimitRemaining = $packageLimitRemaining;
    }

    /**
     * @return \DateTime
     */
    public function getPackageLimitResetDate()
    {
        return $this->packageLimitResetDate;
    }

    /**
     * @param \DateTime $packageLimitResetDate
     */
    public function setPackageLimitResetDate(\DateTime $packageLimitResetDate)
    {
        $this->packageLimitResetDate = $packageLimitResetDate;
    }
}
