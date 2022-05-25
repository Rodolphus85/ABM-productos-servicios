<?php

namespace App\Entity;

use App\Repository\ProductoServicioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProductoServicioRepository::class)
 * 
 * @UniqueEntity("codigo")
 */
class ProductoServicio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Rubro::class, inversedBy="productoServicios")
     */
    private $rubro;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @ORM\ManyToOne(targetEntity=UnidadMedida::class, inversedBy="productoServicios")
     */
    private $unidadMedida;

    /**
     * @ORM\Column(type="string", length=20, nullable=true, unique=true)
     * 
     * @Assert\Regex( 
     * pattern = "/^[a-z0-9]+$/i", 
     * htmlPattern = "^[a-zA-Z0-9]+$",
     * message="Your name must contain only letter or numbers"
     * )
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $productoServicio;

    /**
     * @ORM\ManyToOne(targetEntity=CondicionIva::class, inversedBy="productoServicios")
     */
    private $condicionIva;

    /**
     * @ORM\Column(type="decimal", precision=30, scale=2, nullable=true)
     */
    private $precioBrutoUnitario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRubro(): ?Rubro
    {
        return $this->rubro;
    }

    public function setRubro(?Rubro $rubro): self
    {
        $this->rubro = $rubro;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getUnidadMedida(): ?UnidadMedida
    {
        return $this->unidadMedida;
    }

    public function setUnidadMedida(?UnidadMedida $unidadMedida): self
    {
        $this->unidadMedida = $unidadMedida;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getProductoServicio(): ?string
    {
        return $this->productoServicio;
    }

    public function setProductoServicio(?string $productoServicio): self
    {
        $this->productoServicio = $productoServicio;

        return $this;
    }

    public function getCondicionIva(): ?CondicionIva
    {
        return $this->condicionIva;
    }

    public function setCondicionIva(?CondicionIva $condicionIva): self
    {
        $this->condicionIva = $condicionIva;

        return $this;
    }

    public function getPrecioBrutoUnitario(): ?string
    {
        return $this->precioBrutoUnitario;
    }

    public function setPrecioBrutoUnitario(?string $precioBrutoUnitario): self
    {
        $this->precioBrutoUnitario = $precioBrutoUnitario;

        return $this;
    }
}
