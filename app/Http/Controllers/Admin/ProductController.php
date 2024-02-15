<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\{Product,Category,ProductPrice,ProductCategorized,ProductRelated};

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:products-list',         ['only' => ['index']]);
        $this->middleware('permission:products-view',         ['only' => ['show']]);
        $this->middleware('permission:products-create',       ['only' => ['create','store']]);
        $this->middleware('permission:products-edit',         ['only' => ['edit','update']]);
        $this->middleware('permission:products-delete',       ['only' => ['destroy']]);
        $this->middleware('permission:products-priceList',    ['only' => ['prices']]);
        $this->middleware('permission:products-priceCreate',  ['only' => ['priceStore']]);
        $this->middleware('permission:products-priceEdit',    ['only' => ['priceUpdate']]);
        $this->middleware('permission:products-priceDelete',  ['only' => ['priceDestroy']]);
        $this->middleware('permission:products-imageList',    ['only' => ['images']]);
        $this->middleware('permission:products-imageCreate',  ['only' => ['imageStore']]);
        $this->middleware('permission:products-imageDelete',  ['only' => ['imageDestroy']]);
        $this->middleware('permission:products-specialList',  ['only' => ['specialFrequently','specialFeatured','specialWellness','specialMenAndWoman']]);
        $this->middleware('permission:products-specialCreate',['only' => ['specialStore']]);
        $this->middleware('permission:products-specialDelete',['only' => ['specialDestroy']]);
        $this->middleware('permission:products-relatedList',  ['only' => ['related']]);
        $this->middleware('permission:products-relatedCreate',['only' => ['relatedStore']]);
        $this->middleware('permission:products-relatedDelete',['only' => ['relatedDestroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::filter($request->all())->paginate();
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;

        return view('admin.product.index', compact('products','userRequest'))
        ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('admin.product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $product = Product::create($request->all());
        return redirect()->route('products.all.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.product.edit', compact('product'));
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $parameter = $request->q;
        $page      = $request->page;
        $products  = Product::where(function ($query) use ($parameter) {
                        $query->where('name', 'LIKE', '%' . $parameter . '%')
                        ->orWhere('description', 'LIKE', '%' . $parameter . '%');
                    })->paginate(10, ['*'], 'page', $page)->toArray();
        return $products;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('products.all.index')
            ->with('success', 'Product deleted successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function priceStore(Request $request)
    {
        $product = Product::find($request->product_id);
        $check = $product->prices()->where('default','Yes')->first();
        if ($request->default =='Yes' && $check) {
            $check->default = 'No';
            $check->save();
        }
        $product->prices()->create($request->all());
        return redirect()->back()->with('success', 'Product Price created successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductPrice $productPrice
     * @return \Illuminate\Http\Response
     */
    public function priceUpdate(Request $request)
    {
        $price = ProductPrice::find($request->id); 
        if ($request->default =='Yes' && $price->default == 'No') {
            $check = ProductPrice::
                where('product_id',$price->product_id)->
                where('id','!=',$price->id)->
                where('default','Yes')->first();
            if ($check) {
                $check->default = 'No';
                $check->save();
            }
        }
        $price->update($request->all());

        return redirect()->back()->with('success', 'Product Price updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function priceDestroy($id)
    {
        $price = ProductPrice::find($id);
        if ($price->default == 'Yes') {
            return redirect()->back()->with('warning', 'Opps! You cannot delete default price.');    
        }
        $price->delete();
        return redirect()->back()->with('success', 'Product Price deleted successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function imageStore(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->images()->create($request->all());
        return redirect()->back()->with('success', 'Product Image created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function imageDestroy($id)
    {
        ProductImage::find($id)->delete();

        return redirect()->back()->with('success', 'Product Image deleted successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function relatedStore(Request $request)
    {
        $product = Product::find($request->prent_id);
        $product->relatedParents()->create($request->all());
        return redirect()->back()->with('success', 'Product Related created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function relatedDestroy($id)
    {
        ProductRelated::find($id)->delete();

        return redirect()->back()->with('success', 'Product Related deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function specialFrequently(Request $request)
    {
        $products = Product::special('Frequently')->filter($request->all())->paginate();
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;

        return view('admin.product.special.frequently', compact('products','userRequest'))
        ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function specialFeatured(Request $request)
    {
        $products = Product::special('Featured')->filter($request->all())->paginate();
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;

        return view('admin.product.special.featured', compact('products','userRequest'))
        ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function specialWellness(Request $request)
    {
        $products = Product::special('Wellness')->filter($request->all())->paginate();
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;

        return view('admin.product.special.wellness', compact('products','userRequest'))
        ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function specialMenAndWoman(Request $request)
    {
        $products = Product::special('Men & Woman')->filter($request->all())->paginate();
        $request->method() == 'POST' ? $userRequest = $request : $userRequest = null;

        return view('admin.product.special.men-and-woman', compact('products','userRequest'))
        ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function specialStore(Request $request)
    {
        ProductCategorized::create($request->all());
        return redirect()->back()->with('success', 'Product added successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function specialDestroy(Request $request, $id)
    {
        $product = ProductCategorized::where([['type',$request->type],['product_id',$id]])->first();
        $product->delete();

        return redirect()->back()->with('success', 'Product removed successfully.');
    }

    /**
     * Check the record existance from a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkProduct(Request $request)
    {
        $product = ProductCategorized::where([
            ['type',$request->type],
            ['product_id',$request->product]
        ])->first();
        if ($product) { echo "false"; }else{ echo "true"; }
    }

    /**
     * Check the record existance from a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatedProduct(Request $request)
    {
        $product = ProductRelated::whereParentId($request->parent)->whereChildId($request->product)->first();
        if ($product) { echo "false"; }else{ echo "true"; }
    }

    /**
     * get a listing of the resource
     *
     * @return void
     */
    public function subCategories(Request $request)
    {
        $category = Category::find($request->id);
        echo json_encode($category->sub);
    }
}
