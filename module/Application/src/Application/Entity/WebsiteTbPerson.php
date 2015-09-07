<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteTbPerson
 *
 * @ORM\Table(name="website_tb_person")
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\WebsiteTbPersonRepository")
 */
class WebsiteTbPerson
{
    /**
     * @var integer
     *
     * @ORM\Column(name="peri_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $periId;

    /**
     * @var string
     *
     * @ORM\Column(name="perv_name", type="string", length=50, nullable=false)
     */
    private $pervName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="perv_lastname", type="string", length=50, nullable=false)
     */
    private $pervLastname = '';



    /**
     * Get periId
     *
     * @return integer 
     */
    public function getPeriId()
    {
        return $this->periId;
    }

    /**
     * Set pervName
     *
     * @param string $pervName
     * @return WebsiteTbPerson
     */
    public function setPervName($pervName)
    {
        $this->pervName = $pervName;

        return $this;
    }

    /**
     * Get pervName
     *
     * @return string 
     */
    public function getPervName()
    {
        return $this->pervName;
    }

    /**
     * Set pervLastname
     *
     * @param string $pervLastname
     * @return WebsiteTbPerson
     */
    public function setPervLastname($pervLastname)
    {
        $this->pervLastname = $pervLastname;

        return $this;
    }

    /**
     * Get pervLastname
     *
     * @return string 
     */
    public function getPervLastname()
    {
        return $this->pervLastname;
    }
}
