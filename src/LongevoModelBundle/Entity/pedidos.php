<?php

namespace LongevoModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * pedidos
 *
 * @ORM\Table(name="pedidos")
 * @ORM\Entity(repositoryClass="LongevoModelBundle\Repository\pedidosRepository")
 */
class pedidos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string")
     * @Assert\NotBlank
     */
    private $numero;

    /**
     * @var Clientes
     *
     * @ORM\ManyToOne(targetEntity="clientes", inversedBy="pedidos")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", nullable=false)
     * @Assert\NotBlank
     */
    private $clienteId;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="chamados", mappedBy="pedidos", cascade={"remove"})
     */
    private $chamado;

    public function __construct()
    {
            $this->chamados = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numero
     *
     * @param integer $numero
     * @return pedidos
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set clienteId
     *
     * @param integer $clienteId
     * @return pedidos
     */
    public function setClienteId($clienteId)
    {
        $this->clienteId = $clienteId;

        return $this;
    }

    /**
     * Get clienteId
     *
     * @return integer
     */
    public function getClienteId()
    {
        return $this->clienteId;
    }

    /**
     * Add chamado
     *
     * @param \LongevoModelBundle\Entity\Chamados $chamado
     * @return pedidos
     */
    public function addChamado(\LongevoModelBundle\Entity\Chamados $chamado)
    {
        $this->chamado[] = $chamado;

        return $this;
    }

    /**
     * Remove chamado
     *
     * @param \LongevoModelBundle\Entity\Chamados $chamado
     */
    public function removeChamado(\LongevoModelBundle\Entity\Chamados $chamado)
    {
        $this->chamado->removeElement($chamado);
    }

    /**
     * Get chamado
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChamado()
    {
        return $this->chamado;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNumero();
    }
}
