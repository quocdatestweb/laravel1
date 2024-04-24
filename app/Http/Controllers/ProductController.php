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

    public function products_user()
    {
        $products = Product::with('category')->paginate(8);
        $categorys =  $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();


        return view('products.products_user', ['products' => $products,'categorys' => $categorys,'users' => $users]);
    }


    public function create()
    {
        // Return the create product view
        return view('products.create');
    }


    public function store(Request $request)
    {
        $product = new Product();
        if ($request->file('thumbImage')) {
            $file = $request->file('thumbImage');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/product'), $filename);
            $product->thumbImage = $filename;
        }
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->content = $request->input('content');
        $product->categoryid = $request->input('categoryid');
        $product->author_id = $request->input('author_id');
        $product->author_type = $request->input('author_type');
        $product->save();
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
        $products = Product::with('category')->find($id);
        $categorys =  $this->productCategoryRepository->getAll();
        $users = $this->userRepository->getAll();
        // Return the edit product view with the retrieved product
        return view('products.edit',['products' => $products,'categorys' => $categorys,'users' => $users]);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('productlist')->with('error', 'Product not found.');
        }

        if ($request->file('thumbImage')) {
            $file = $request->file('thumbImage');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image/product'), $filename);
            $product->thumbImage = $filename;
        }

        // Cập nhật các trường thông tin khác của sản phẩm
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->content = $request->input('content');

        // Tách author_id thành hai phần
        $authorIdParts = explode('-', $request->input('author_id'));
        if (count($authorIdParts) === 2) {
            $product->author_id = $authorIdParts[0];
            $product->author_type = $authorIdParts[1];
        } else {
            $product->author_id = 0;
            $product->author_type = 0;
        }

        $product->categoryid = $request->input('category');
        $product->created_at = $request->input('created_at');
        $product->updated_at = $request->input('created_at');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }

    // public function update(Request $request, $id)
    // {
    //     // Tìm sản phẩm cần cập nhật
    //     $product = Product::findOrFail($id);

    //     // Cập nhật các thông tin sản phẩm từ dữ liệu gửi lên từ biểu mẫu
    //     $product->name = $request->input('name');
    //     $product->price = $request->input('price');
    //     $product->content = $request->input('content');
    //     // Cập nhật các thông tin khác của sản phẩm tương ứng

    //     // Lưu sản phẩm đã cập nhật vào cơ sở dữ liệu
    //     $product->save();

    //     // Redirect hoặc trả về phản hồi thành công
    //     return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
    // }
    public function destroy($id)
    {
        // Delete the product using the repository
        $this->productRepository->delete($id);

        return redirect()->route('products.index');

    }
}
