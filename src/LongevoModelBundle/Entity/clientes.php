<?php

namespace LongevoModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * clientes
 *
 * @ORM\Table(name="clientes")
 * @ORM\Entity(repositoryClass="LongevoModelBundle\Repository\clientesRepository")
 */
class clientes
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
     * @ORM\Column(name="nome", type="string", length=50)
     * @Assert\NotBlank
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     * @Assert\NotBlank
     */
    private $email;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="pedidos", mappedBy="clientes", cascade={"remove"})
     */
    private $pedido;

    public function __construct()
    {
            $this->pedidos = new ArrayCollection();
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
     * Set nome
     *
     * @param string $nome
     * @return clientes
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return clientes
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add pedido
     *
     * @param \LongevoModelBundle\Entity\Pedidos $pedido
     * @return clientes
     */
    public function addPedido(\LongevoModelBundle\Entity\Pedidos $pedido)
    {
        $this->pedido[] = $pedido;

        return $this;
    }

    /**
     * Remove pedido
     *
     * @param \LongevoModelBundle\Entity\Pedidos $pedido
     */
    public function removePedido(\LongevoModelBundle\Entity\Pedidos $pedido)
    {
        $this->pedido->removeElement($pedido);
    }

    /**
     * Get pedido
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPedido()
    {
        return $this->pedido;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getNome();
    }
}
