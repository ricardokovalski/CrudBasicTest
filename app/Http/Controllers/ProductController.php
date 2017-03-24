<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Product;
use App\Entities\Category;
use App\Entities\Lot;
use SoapBox\Formatter\Formatter;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return Redirect()->route('products.index')->with('alert', ['message' => 'Produto cadastrado com sucesso.', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit', ['categories'=>$categories, 'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return Redirect()->route('products.index')->with('alert', ['message' => 'Produto alterado com sucesso.', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return Redirect()->route('products.index')->with('alert', ['message' => 'Produto excluído com sucesso.', 'type' => 'success']);
    }

    public function exportXml()
    {
        $products = Product::with('category')->get()->toArray();
        
        $xml = Formatter::make($products, Formatter::ARR)->toXml();

        Storage::put('produtos.xml', $xml);

        $aquivoNome = 'produtos.xml';
        $arquivoLocal = storage_path().'/app/'.$aquivoNome;
        
        header('Content-type: application/xml');
        header('Content-Disposition: attachment; filename="'.$aquivoNome.'"');
        readfile($arquivoLocal);
        exit();

    }

    public function importXml()
    {
        return view('admin.import');
    }

    public function importXmlStore(Request $request)
    {        
        $file = $request->file('file');
        $data = file_get_contents($file);
        $productsXml = simplexml_load_string($data) or die("Error: Cannot create object");

        $products = (array) $productsXml;

        foreach ($productsXml as $key => $product) {
            $product = (array) $product;   

            $newData = [
                'description' => $product['description'],
                'bar_code' => $product['bar_code'],
                'price' => $product['price'],
                'amount' => $product['amount'],
                'category_id' => $product['category_id'],
            ];

            Product::create($newData);            
        }

        return Redirect()->route('products.index')->with('alert', ['message' => 'Importação concluída com sucesso.', 'type' => 'success']);
    }

    public function relatorioXml(){

        $lots = Lot::all()->toArray();

        $relatorio = [];

        $j=0;

        foreach ($lots as $lot) {

            $relatorio[$j] = $lot;
            $relatorio[$j]['categories'] = Category::where('lot_id',$lot['id'])->get()->toArray();
            $relatorio[$j]['total_price_lot'] = 0;

            $i=0;

            foreach ($relatorio[$j]['categories'] as $category) {

                $relatorio[$j]['total_products'] = Product::where('category_id',$category['id'])->count();
                
                $relatorio[$j]['categories'][$i]['products'] = Product::where('category_id',$category['id'])->get()->toArray();
                $relatorio[$j]['categories'][$i]['total_amount_products'] = Product::where('category_id',$category['id'])->sum('amount');
                $relatorio[$j]['categories'][$i]['total_categories'] = Category::where('lot_id',$lot['id'])->count();
                
                $total_price_lot = Product::where('category_id',$category['id'])->sum('price');
                
                $relatorio[$j]['total_price_lot'] += $total_price_lot; 
                
                $i++;                
            }

            $j++;
        }

        $xml = Formatter::make($relatorio, Formatter::ARR)->toXml();

        Storage::put('relatorio.xml', $xml);

        $aquivoNome = 'relatorio.xml';
        $arquivoLocal = storage_path().'/app/'.$aquivoNome;
        
        header('Content-type: application/xml');
        header('Content-Disposition: attachment; filename="'.$aquivoNome.'"');
        readfile($arquivoLocal);
        exit();
        
    }

    
}
