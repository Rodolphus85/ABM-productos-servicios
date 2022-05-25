<?php

namespace App\Entity;

use App\Repository\CondicionIvaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CondicionIvaRepository::class)
 */
class CondicionIva
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $condicionIva;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $alicuota;

    /**
     * @ORM\OneToMany(targetEntity=ProductoServicio::class, mappedBy="condicionIva")
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

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getCondicionIva(): ?string
    {
        return $this->condicionIva;
    }

    public function setCondicionIva(string $condicionIva): self
    {
        $this->condicionIva = $condicionIva;

        return $this;
    }

    public function getAlicuota(): ?string
    {
        return $this->alicuota;
    }

    public function setAlicuota(?string $alicuota): self
    {
        $this->alicuota = $alicuota;

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
            $productoServicio->setCondicionIva($this);
        }

        return $this;
    }

    public function removeProductoServicio(ProductoServicio $productoServicio): self
    {
        if ($this->productoServicios->removeElement($productoServicio)) {
            // set the owning side to null (unless already changed)
            if ($productoServicio->getCondicionIva() === $this) {
                $productoServicio->setCondicionIva(null);
            }
        }

        return $this;
    }
}
