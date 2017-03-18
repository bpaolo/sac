<?php

namespace LongevoModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * chamados
 *
 * @ORM\Table(name="chamados")
 * @ORM\Entity(repositoryClass="LongevoModelBundle\Repository\chamadosRepository")
 */
class chamados
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
     * @ORM\Column(name="titulo", type="string", length=150)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="observacao", type="text")
     * @Assert\NotBlank
     */
    private $observacao;

    /**
     * @var int
     *
     * @ORM\Column(name="pedido_id", type="integer")
     */
    private $pedidoId;

    /**
     * @var int
     *
     * @ORM\Column(name="pedido_cliente_id", type="integer")
     * @Assert\NotBlank
     */
    private $pedidoClienteId;


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
     * Set titulo
     *
     * @param string $titulo
     * @return chamados
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set observacao
     *
     * @param string $observacao
     * @return chamados
     */
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get observacao
     *
     * @return string
     */
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set pedidoId
     *
     * @param integer $pedidoId
     * @return chamados
     */
    public function setPedidoId($pedidoId)
    {
        $this->pedidoId = $pedidoId;

        return $this;
    }

    /**
     * Get pedidoId
     *
     * @return integer
     */
    public function getPedidoId()
    {
        return $this->pedidoId;
    }

    /**
     * Set pedidoClienteId
     *
     * @param integer $pedidoClienteId
     * @return chamados
     */
    public function setPedidoClienteId($pedidoClienteId)
    {
        $this->pedidoClienteId = $pedidoClienteId;

        return $this;
    }

    /**
     * Get pedidoClienteId
     *
     * @return integer
     */
    public function getPedidoClienteId()
    {
        return $this->pedidoClienteId;
    }
}
