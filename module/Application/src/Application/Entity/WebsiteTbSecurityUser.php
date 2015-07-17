<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebsiteTbSecurityUser
 *
 * @ORM\Table(name="website_tb_security_user", uniqueConstraints={@ORM\UniqueConstraint(name="susv_login", columns={"susv_login"})}, indexes={@ORM\Index(name="scex_tb_security_user_fk", columns={"seni_id"})})
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\WebsiteTbSecurityUserRepository")
 */
class WebsiteTbSecurityUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="susi_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $susiId;

    /**
     * @var integer
     *
     * @ORM\Column(name="seni_id", type="integer", nullable=false)
     */
    private $seniId;

    /**
     * @var string
     *
     * @ORM\Column(name="susv_login", type="string", length=32, nullable=false)
     */
    private $susvLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="susv_password", type="string", length=32, nullable=false)
     */
    private $susvPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="susv_loginname", type="string", length=150, nullable=true)
     */
    private $susvLoginname = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="susy_status", type="boolean", nullable=false)
     */
    private $susyStatus = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="susi_created_by", type="integer", nullable=true)
     */
    private $susiCreatedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="susd_created_date", type="datetime", nullable=true)
     */
    private $susdCreatedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="susv_created_ip", type="string", length=17, nullable=true)
     */
    private $susvCreatedIp = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="susi_mod_by", type="integer", nullable=true)
     */
    private $susiModBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="susd_mod_date", type="datetime", nullable=true)
     */
    private $susdModDate;

    /**
     * @var string
     *
     * @ORM\Column(name="susv_mod_ip", type="string", length=17, nullable=true)
     */
    private $susvModIp = '';



    /**
     * Get susiId
     *
     * @return integer 
     */
    public function getSusiId()
    {
        return $this->susiId;
    }

    /**
     * Set seniId
     *
     * @param integer $seniId
     * @return WebsiteTbSecurityUser
     */
    public function setSeniId($seniId)
    {
        $this->seniId = $seniId;

        return $this;
    }

    /**
     * Get seniId
     *
     * @return integer 
     */
    public function getSeniId()
    {
        return $this->seniId;
    }

    /**
     * Set susvLogin
     *
     * @param string $susvLogin
     * @return WebsiteTbSecurityUser
     */
    public function setSusvLogin($susvLogin)
    {
        $this->susvLogin = $susvLogin;

        return $this;
    }

    /**
     * Get susvLogin
     *
     * @return string 
     */
    public function getSusvLogin()
    {
        return $this->susvLogin;
    }

    /**
     * Set susvPassword
     *
     * @param string $susvPassword
     * @return WebsiteTbSecurityUser
     */
    public function setSusvPassword($susvPassword)
    {
        $this->susvPassword = $susvPassword;

        return $this;
    }

    /**
     * Get susvPassword
     *
     * @return string 
     */
    public function getSusvPassword()
    {
        return $this->susvPassword;
    }

    /**
     * Set susvLoginname
     *
     * @param string $susvLoginname
     * @return WebsiteTbSecurityUser
     */
    public function setSusvLoginname($susvLoginname)
    {
        $this->susvLoginname = $susvLoginname;

        return $this;
    }

    /**
     * Get susvLoginname
     *
     * @return string 
     */
    public function getSusvLoginname()
    {
        return $this->susvLoginname;
    }

    /**
     * Set susyStatus
     *
     * @param boolean $susyStatus
     * @return WebsiteTbSecurityUser
     */
    public function setSusyStatus($susyStatus)
    {
        $this->susyStatus = $susyStatus;

        return $this;
    }

    /**
     * Get susyStatus
     *
     * @return boolean 
     */
    public function getSusyStatus()
    {
        return $this->susyStatus;
    }

    /**
     * Set susiCreatedBy
     *
     * @param integer $susiCreatedBy
     * @return WebsiteTbSecurityUser
     */
    public function setSusiCreatedBy($susiCreatedBy)
    {
        $this->susiCreatedBy = $susiCreatedBy;

        return $this;
    }

    /**
     * Get susiCreatedBy
     *
     * @return integer 
     */
    public function getSusiCreatedBy()
    {
        return $this->susiCreatedBy;
    }

    /**
     * Set susdCreatedDate
     *
     * @param \DateTime $susdCreatedDate
     * @return WebsiteTbSecurityUser
     */
    public function setSusdCreatedDate($susdCreatedDate)
    {
        $this->susdCreatedDate = $susdCreatedDate;

        return $this;
    }

    /**
     * Get susdCreatedDate
     *
     * @return \DateTime 
     */
    public function getSusdCreatedDate()
    {
        return $this->susdCreatedDate;
    }

    /**
     * Set susvCreatedIp
     *
     * @param string $susvCreatedIp
     * @return WebsiteTbSecurityUser
     */
    public function setSusvCreatedIp($susvCreatedIp)
    {
        $this->susvCreatedIp = $susvCreatedIp;

        return $this;
    }

    /**
     * Get susvCreatedIp
     *
     * @return string 
     */
    public function getSusvCreatedIp()
    {
        return $this->susvCreatedIp;
    }

    /**
     * Set susiModBy
     *
     * @param integer $susiModBy
     * @return WebsiteTbSecurityUser
     */
    public function setSusiModBy($susiModBy)
    {
        $this->susiModBy = $susiModBy;

        return $this;
    }

    /**
     * Get susiModBy
     *
     * @return integer 
     */
    public function getSusiModBy()
    {
        return $this->susiModBy;
    }

    /**
     * Set susdModDate
     *
     * @param \DateTime $susdModDate
     * @return WebsiteTbSecurityUser
     */
    public function setSusdModDate($susdModDate)
    {
        $this->susdModDate = $susdModDate;

        return $this;
    }

    /**
     * Get susdModDate
     *
     * @return \DateTime 
     */
    public function getSusdModDate()
    {
        return $this->susdModDate;
    }

    /**
     * Set susvModIp
     *
     * @param string $susvModIp
     * @return WebsiteTbSecurityUser
     */
    public function setSusvModIp($susvModIp)
    {
        $this->susvModIp = $susvModIp;

        return $this;
    }

    /**
     * Get susvModIp
     *
     * @return string 
     */
    public function getSusvModIp()
    {
        return $this->susvModIp;
    }
}
