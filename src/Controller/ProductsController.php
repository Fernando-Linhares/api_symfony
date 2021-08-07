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
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->json(['data' => $products]);
    }

    /**
     * @Route("/update", name="update")
     */
    public function update()
    {

    }

    /**
     * @Route("/create", name="create")
     */
    public function create()
    {
        
    }

    /**
     * @Route("/delete", name="delete")
     */
    public function delete()
    {
        
    }

    /**
     * @Route("/patch", name="patch")
     */
    public function patch()
    {
        
    }

        /**
     * @Route("/put", name="put")
     */
    public function put()
    {
        
    }
}
