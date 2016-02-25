<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteTbCalendar
 *
 * @ORM\Table(name="website_tb_calendar")
 * @ORM\Entity
 */
class WebsiteTbCalendar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cali_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $caliId;

    /**
     * @var string
     *
     * @ORM\Column(name="calv_name", type="string", length=50, nullable=false)
     */
    private $calvName;

    /**
     * @var integer
     *
     * @ORM\Column(name="cali_status", type="integer", nullable=false)
     */
    private $caliStatus;



    /**
     * Get caliId
     *
     * @return integer 
     */
    public function getCaliId()
    {
        return $this->caliId;
    }

    /**
     * Set calvName
     *
     * @param string $calvName
     * @return WebsiteTbCalendar
     */
    public function setCalvName($calvName)
    {
        $this->calvName = $calvName;

        return $this;
    }

    /**
     * Get calvName
     *
     * @return string 
     */
    public function getCalvName()
    {
        return $this->calvName;
    }

    /**
     * Set caliStatus
     *
     * @param integer $caliStatus
     * @return WebsiteTbCalendar
     */
    public function setCaliStatus($caliStatus)
    {
        $this->caliStatus = $caliStatus;

        return $this;
    }

    /**
     * Get caliStatus
     *
     * @return integer 
     */
    public function getCaliStatus()
    {
        return $this->caliStatus;
    }
}
