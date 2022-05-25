<?php

namespace App\DataFixtures;

use App\Entity\CondicionIva;
use App\Entity\Rubro;
use App\Entity\UnidadMedida;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 3; $i++) {
            $condicionIva = new CondicionIva();
            $condicionIva->setCodigo($i);
            $condicionIva->setCondicionIva('Iva '.$i);
            $condicionIva->setAlicuota(mt_rand(1, 20));
            $manager->persist($condicionIva);
        }

        for ($i = 1; $i < 10; $i++) {
            $rubro = new Rubro();
            $rubro->setRubro('Rubro '.$i);
            $manager->persist($rubro);
        }

        for ($i = 1; $i < 5; $i++) {
            $unidadMedida = new UnidadMedida();
            $unidadMedida->setCodigo('Cod '.$i);
            $unidadMedida->setUnidadMedida('Unidad Medida '.$i);
            $manager->persist($unidadMedida);
        }        

        $manager->flush();
    }
}
