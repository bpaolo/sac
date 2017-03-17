<?php

namespace LongevoModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var int
     *
     * @ORM\Column(name="numero", type="integer")
     */
    private $numero;

    /**
     * @var int
     *
     * @ORM\Column(name="cliente_id", type="integer")
     */
    private $clienteId;


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
}
