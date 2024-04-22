<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        // Retrieve all products
        $products = $this->productRepository->getAll();

        // Return the products view with the retrieved products
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // Return the create product view
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add any other validation rules for your product fields
        ]);

        // Create a new product using the repository
        $product = $this->productRepository->create($validatedData);

        // Redirect to the product details page or wherever appropriate
        return redirect()->route('products.show', $product->id);
    }

    public function show($id)
    {
        // Find the product by ID
        $product = $this->productRepository->find($id);

        // Return the product details view with the retrieved product
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        // Find the product by ID
        $product = $this->productRepository->find($id);

        // Return the edit product view with the retrieved product
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add any other validation rules for your product fields
        ]);

        // Update the product using the repository
        $product = $this->productRepository->update($id, $validatedData);

        // Redirect to the product details page or wherever appropriate
        return redirect()->route('products.show', $product->id);
    }

    public function destroy($id)
    {
        // Delete the product using the repository
        $this->productRepository->delete($id);

        // Redirect to the product index page or wherever appropriate
        return redirect()->route('products.index');
    }
}
