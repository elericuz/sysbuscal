<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteTbPersonCalendar
 *
 * @ORM\Table(name="website_tb_person_calendar", indexes={@ORM\Index(name="has_person", columns={"peri_id"}), @ORM\Index(name="has_calendar", columns={"cali_id"})})
 * @ORM\Entity
 */
class WebsiteTbPersonCalendar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="peci_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $peciId;

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
     * @var \Application\Entity\WebsiteTbPerson
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\WebsiteTbPerson")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="peri_id", referencedColumnName="peri_id")
     * })
     */
    private $peri;



    /**
     * Get peciId
     *
     * @return integer 
     */
    public function getPeciId()
    {
        return $this->peciId;
    }

    /**
     * Set cali
     *
     * @param \Application\Entity\WebsiteTbCalendar $cali
     * @return WebsiteTbPersonCalendar
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

    /**
     * Set peri
     *
     * @param \Application\Entity\WebsiteTbPerson $peri
     * @return WebsiteTbPersonCalendar
     */
    public function setPeri(\Application\Entity\WebsiteTbPerson $peri = null)
    {
        $this->peri = $peri;

        return $this;
    }

    /**
     * Get peri
     *
     * @return \Application\Entity\WebsiteTbPerson 
     */
    public function getPeri()
    {
        return $this->peri;
    }
}
