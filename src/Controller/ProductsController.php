<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
/**
** @Route("/products", name="products")
**/
class ProductsController extends AbstractController
{
    /**
     * @Route("/", name="index", METHOD={"GET"})
     */
    public function index()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->json(['data' => $products]);
    }


    /**
     * @Route("/{id}", name="update", methods={"GET"})
     */
    public function show($id)
    {

    }

    /**
     * @Route("/{id}/update", name="update", methods={"PUT"})
     */
    public function update($id)
    {

    }

    /**
     * @Route("/create", name="create", methods={"POST"})
     */
    public function create()
    {
        
    }

    /**
     * @Route("/{id}/delete", name="delete", methods={"DELETE"})
     */
    public function delete($id)
    {
        
    }

    /**
     * @Route("/{id}/{col}/patch", name="patch", methods="{PATCH}")
     */
    public function patch($id, $col)
    {
        
    }
}
