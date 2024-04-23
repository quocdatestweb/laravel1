<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductCategory;
class ProductController extends Controller
{
    protected $productRepository;
    protected $productCategoryRepository;
    protected $userRepository;


    public function __construct(ProductRepository $productRepository,ProductCategoryRepository $productCategoryRepository,UserRepository $userRepository)
    {
        $this->productRepository = $productRepository;
        $this->productCategoryRepository = $productCategoryRepository;
        $this->userRepository = $userRepository;

    }

    public function index()
    {
        $products = Product::with('category')->paginate(8);
        $categorys =  $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();


        return view('products.index', ['products' => $products,'categorys' => $categorys,'users' => $users]);
    }

    public function create()
    {
        // Return the create product view
        return view('products.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'thumbImage' => 'required',
            'content' => 'required',
            'categoryid' => 'required',
            'author_id' => 'required',
            'author_type' => 'required',
            // Add other validation rules if necessary
        ]);

        // Create the product
        $product = Product::create($validatedData);


        // $product = $this->productRepository->create($validatedData);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show($id)
    {
        // Find the product by ID
        $products = $this->productRepository->find($id);

        // Return the product details view with the retrieved product
        return view('products.detail', compact('products'));
    }


    public function edit($id)
    {
        // Find the product by ID
        $products = $this->productRepository->find($id);

        // Return the edit product view with the retrieved product
        return view('products.edit', compact('products'));
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

        return redirect()->route('products.index');

    }
}
