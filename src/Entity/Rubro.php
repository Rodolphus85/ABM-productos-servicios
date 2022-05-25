<?php

namespace App\Entity;

use App\Repository\RubroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RubroRepository::class)
 */
class Rubro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $rubro;

    /**
     * @ORM\OneToMany(targetEntity=ProductoServicio::class, mappedBy="rubro")
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

    public function getRubro(): ?string
    {
        return $this->rubro;
    }

    public function setRubro(?string $rubro): self
    {
        $this->rubro = $rubro;

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
            $productoServicio->setRubro($this);
        }

        return $this;
    }

    public function removeProductoServicio(ProductoServicio $productoServicio): self
    {
        if ($this->productoServicios->removeElement($productoServicio)) {
            // set the owning side to null (unless already changed)
            if ($productoServicio->getRubro() === $this) {
                $productoServicio->setRubro(null);
            }
        }

        return $this;
    }
}
