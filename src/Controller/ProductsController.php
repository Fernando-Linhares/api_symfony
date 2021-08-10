<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Product;
use App\Entity\Category;
/**
** @Route("/products", name="products")
**/
class ProductsController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        return $this->json(['data' => $products]);
    }

    /**
     * @Route("/{id}", name="select", methods={"GET"})
     */
    public function show($id)
    {
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        return $this->json($product);
    }

    /**
     * @Route("/{id}/update", name="update", methods={"PUT", "PATCH"})
     */
    public function update($id, Request $request)
    {
        $data = $request->request->all();
        $category = $this->getDoctrine()->getRepository(Category::class)->find($data['category']);
        $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setCat($category);
        $product->setCreatedAt(new \DateTimeImmutable('now', new \DateTimezone('America/Sao_Paulo')));
        $product->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimezone('America/Sao_Paulo')));

        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($product);
        $doctrine->flush();

        return $this->json(['data'=>'product updated succesfully']);
    }

    /**
     * @Route("/create", name="create", methods={"POST"})
     */
    public function create(Request $request)
    {
        $data = $request->request->all();
        $category = $this->getDoctrine()->getRepository(Category::class)->find($data['category']);
        $product = new Product;
        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setCat($category);

        $product->setCreatedAt(new \DateTimeImmutable('now', new \DateTimezone('America/Sao_Paulo')));
        $product->setUpdatedAt(new \DateTimeImmutable('now', new \DateTimezone('America/Sao_Paulo')));

        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($product);
        $doctrine->flush();

        return $this->json(['data'=>'product created succesfully']);
        
    }

    /**
     * @Route("/{id}/delete", name="delete", methods={"DELETE"})
     */
    public function delete($id)
    {
        $doctrine = $this->getDoctrine();
    
        $product = $doctrine->getRepository(Product::class)->find($id);
        $manager = $doctrine->getManager();
        $manager->remove($product);
        $manager->flush();
        return $this->json(['message'=>'item deleted succesfully']);
    }
}
