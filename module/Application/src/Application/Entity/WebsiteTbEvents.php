<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteTbEvents
 *
 * @ORM\Table(name="website_tb_events", indexes={@ORM\Index(name="event_has_calendar", columns={"cali_id"})})
 * @ORM\Entity
 */
class WebsiteTbEvents
{
    /**
     * @var integer
     *
     * @ORM\Column(name="evei_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eveiId;

    /**
     * @var integer
     *
     * @ORM\Column(name="evei_parent_id", type="integer", nullable=false)
     */
    private $eveiParentId;

    /**
     * @var string
     *
     * @ORM\Column(name="evev_calendar", type="string", length=200, nullable=true)
     */
    private $evevCalendar;

    /**
     * @var string
     *
     * @ORM\Column(name="evev_start_time", type="string", length=24, nullable=true)
     */
    private $evevStartTime;

    /**
     * @var string
     *
     * @ORM\Column(name="evev_end_time", type="string", length=24, nullable=true)
     */
    private $evevEndTime;

    /**
     * @var string
     *
     * @ORM\Column(name="evet_summary", type="text", nullable=true)
     */
    private $evetSummary;

    /**
     * @var string
     *
     * @ORM\Column(name="evev_place", type="string", length=250, nullable=true)
     */
    private $evevPlace;

    /**
     * @var integer
     *
     * @ORM\Column(name="evei_all_day", type="integer", nullable=false)
     */
    private $eveiAllDay;

    /**
     * @var string
     *
     * @ORM\Column(name="evev_email", type="string", length=250, nullable=true)
     */
    private $evevEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="evev_phone", type="string", length=100, nullable=true)
     */
    private $evevPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="evev_obs", type="string", length=250, nullable=true)
     */
    private $evevObs;

    /**
     * @var integer
     *
     * @ORM\Column(name="evei_status", type="integer", nullable=true)
     */
    private $eveiStatus;

    /**
     * @var \Application\Entity\WebsiteTbCalendar
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\WebsiteTbCalendar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cali_id", referencedColumnName="cali_id")
     * })
     */
    private $cali;



    /**
     * Get eveiId
     *
     * @return integer 
     */
    public function getEveiId()
    {
        return $this->eveiId;
    }

    /**
     * Set eveiParentId
     *
     * @param integer $eveiParentId
     * @return WebsiteTbEvents
     */
    public function setEveiParentId($eveiParentId)
    {
        $this->eveiParentId = $eveiParentId;

        return $this;
    }

    /**
     * Get eveiParentId
     *
     * @return integer 
     */
    public function getEveiParentId()
    {
        return $this->eveiParentId;
    }

    /**
     * Set evevCalendar
     *
     * @param string $evevCalendar
     * @return WebsiteTbEvents
     */
    public function setEvevCalendar($evevCalendar)
    {
        $this->evevCalendar = $evevCalendar;

        return $this;
    }

    /**
     * Get evevCalendar
     *
     * @return string 
     */
    public function getEvevCalendar()
    {
        return $this->evevCalendar;
    }

    /**
     * Set evevStartTime
     *
     * @param string $evevStartTime
     * @return WebsiteTbEvents
     */
    public function setEvevStartTime($evevStartTime)
    {
        $this->evevStartTime = $evevStartTime;

        return $this;
    }

    /**
     * Get evevStartTime
     *
     * @return string 
     */
    public function getEvevStartTime()
    {
        return $this->evevStartTime;
    }

    /**
     * Set evevEndTime
     *
     * @param string $evevEndTime
     * @return WebsiteTbEvents
     */
    public function setEvevEndTime($evevEndTime)
    {
        $this->evevEndTime = $evevEndTime;

        return $this;
    }

    /**
     * Get evevEndTime
     *
     * @return string 
     */
    public function getEvevEndTime()
    {
        return $this->evevEndTime;
    }

    /**
     * Set evetSummary
     *
     * @param string $evetSummary
     * @return WebsiteTbEvents
     */
    public function setEvetSummary($evetSummary)
    {
        $this->evetSummary = $evetSummary;

        return $this;
    }

    /**
     * Get evetSummary
     *
     * @return string 
     */
    public function getEvetSummary()
    {
        return $this->evetSummary;
    }

    /**
     * Set evevPlace
     *
     * @param string $evevPlace
     * @return WebsiteTbEvents
     */
    public function setEvevPlace($evevPlace)
    {
        $this->evevPlace = $evevPlace;

        return $this;
    }

    /**
     * Get evevPlace
     *
     * @return string 
     */
    public function getEvevPlace()
    {
        return $this->evevPlace;
    }

    /**
     * Set eveiAllDay
     *
     * @param integer $eveiAllDay
     * @return WebsiteTbEvents
     */
    public function setEveiAllDay($eveiAllDay)
    {
        $this->eveiAllDay = $eveiAllDay;

        return $this;
    }

    /**
     * Get eveiAllDay
     *
     * @return integer 
     */
    public function getEveiAllDay()
    {
        return $this->eveiAllDay;
    }

    /**
     * Set evevEmail
     *
     * @param string $evevEmail
     * @return WebsiteTbEvents
     */
    public function setEvevEmail($evevEmail)
    {
        $this->evevEmail = $evevEmail;

        return $this;
    }

    /**
     * Get evevEmail
     *
     * @return string 
     */
    public function getEvevEmail()
    {
        return $this->evevEmail;
    }

    /**
     * Set evevPhone
     *
     * @param string $evevPhone
     * @return WebsiteTbEvents
     */
    public function setEvevPhone($evevPhone)
    {
        $this->evevPhone = $evevPhone;

        return $this;
    }

    /**
     * Get evevPhone
     *
     * @return string 
     */
    public function getEvevPhone()
    {
        return $this->evevPhone;
    }

    /**
     * Set evevObs
     *
     * @param string $evevObs
     * @return WebsiteTbEvents
     */
    public function setEvevObs($evevObs)
    {
        $this->evevObs = $evevObs;

        return $this;
    }

    /**
     * Get evevObs
     *
     * @return string 
     */
    public function getEvevObs()
    {
        return $this->evevObs;
    }

    /**
     * Set eveiStatus
     *
     * @param integer $eveiStatus
     * @return WebsiteTbEvents
     */
    public function setEveiStatus($eveiStatus)
    {
        $this->eveiStatus = $eveiStatus;

        return $this;
    }

    /**
     * Get eveiStatus
     *
     * @return integer 
     */
    public function getEveiStatus()
    {
        return $this->eveiStatus;
    }

    /**
     * Set cali
     *
     * @param \Application\Entity\WebsiteTbCalendar $cali
     * @return WebsiteTbEvents
     */
    public function setCali(\Application\Entity\WebsiteTbCalendar $cali = null)
    {
        $this->cali = $cali;

        return $this;
    }

    /**
     * Get cali
     *
     * @return \Application\Entity\WebsiteTbCalendar 
     */
    public function getCali()
    {
        return $this->cali;
    }
}
