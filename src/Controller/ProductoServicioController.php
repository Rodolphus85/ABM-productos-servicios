<?php

namespace App\Controller;

use App\Entity\ProductoServicio;
use App\Form\ProductoServicioType;
use App\Repository\ProductoServicioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/producto-servicio")
 */
class ProductoServicioController extends AbstractController
{
    /**
     * @Route("/", name="app_producto_servicio_index", methods={"GET"})
     */
    public function index(ProductoServicioRepository $productoServicioRepository): Response
    {
        return $this->render('producto_servicio/index.html.twig', [
            'producto_servicios' => $productoServicioRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_producto_servicio_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ProductoServicioRepository $productoServicioRepository): Response
    {
        $productoServicio = new ProductoServicio();
        $form = $this->createForm(ProductoServicioType::class, $productoServicio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productoServicioRepository->add($productoServicio, true);

            return $this->redirectToRoute('app_producto_servicio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('producto_servicio/new.html.twig', [
            'producto_servicio' => $productoServicio,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_producto_servicio_show", methods={"GET"})
     */
    public function show(ProductoServicio $productoServicio): Response
    {
        return $this->render('producto_servicio/show.html.twig', [
            'producto_servicio' => $productoServicio,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_producto_servicio_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ProductoServicio $productoServicio, ProductoServicioRepository $productoServicioRepository): Response
    {
        $form = $this->createForm(ProductoServicioType::class, $productoServicio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $productoServicioRepository->add($productoServicio, true);

            return $this->redirectToRoute('app_producto_servicio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('producto_servicio/edit.html.twig', [
            'producto_servicio' => $productoServicio,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_producto_servicio_delete", methods={"POST"})
     */
    public function delete(Request $request, ProductoServicio $productoServicio, ProductoServicioRepository $productoServicioRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$productoServicio->getId(), $request->request->get('_token'))) {
            $productoServicioRepository->remove($productoServicio, true);
        }

        return $this->redirectToRoute('app_producto_servicio_index', [], Response::HTTP_SEE_OTHER);
    }
}
