<?php

namespace App\Entity;

use App\Repository\UnidadMedidaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UnidadMedidaRepository::class)
 */
class UnidadMedida
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $unidadMedida;

    /**
     * @ORM\OneToMany(targetEntity=ProductoServicio::class, mappedBy="unidadMedida")
     */
    private $productoServicios;

    public function __construct()
    {
        $this->productoServicios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getUnidadMedida(): ?string
    {
        return $this->unidadMedida;
    }

    public function setUnidadMedida(string $unidadMedida): self
    {
        $this->unidadMedida = $unidadMedida;

        return $this;
    }

    /**
     * @return Collection<int, ProductoServicio>
     */
    public function getProductoServicios(): Collection
    {
        return $this->productoServicios;
    }

    public function addProductoServicio(ProductoServicio $productoServicio): self
    {
        if (!$this->productoServicios->contains($productoServicio)) {
            $this->productoServicios[] = $productoServicio;
            $productoServicio->setUnidadMedida($this);
        }

        return $this;
    }

    public function removeProductoServicio(ProductoServicio $productoServicio): self
    {
        if ($this->productoServicios->removeElement($productoServicio)) {
            // set the owning side to null (unless already changed)
            if ($productoServicio->getUnidadMedida() === $this) {
                $productoServicio->setUnidadMedida(null);
            }
        }

        return $this;
    }
}
