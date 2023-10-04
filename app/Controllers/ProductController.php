<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController {

    public function __construct(){
        $this->product = new ProductModel();
    }
    public function insertProduct() {
        if ($this->request->getMethod() === 'post') {
            // Mendapatkan data dari form
            $nama_product = $this->request->getVar("nama_product");
            $description = $this->request->getVar("description");
            
            // Mengecek apakah data yang diterima valid
            if ($nama_product && $description) {
                // Data yang akan diinsert
                $data = [
                    'nama_product' => $nama_product,
                    'description' => $description
                ];
    
                // Melakukan insert
                $this->product->insertProductORM($data);
    
                // Redirect setelah berhasil diinsert
                return redirect()->to(base_url("products"));
            } else {
                // Menampilkan pesan error jika data tidak valid
                echo "Data tidak valid. Pastikan semua field terisi.";
            }
        }
    
        // Menampilkan form untuk input data
        return view('insert_product');
    }
    

    public function readProduct(){
        $products = $this->product->findAll();
        $data = [
            'data' => $products
        ];

        return view('product', $data);
    }

    public function getProduct($id) {
        $product = $this->product->where('id', $id)->first();
        $data = [
            'product' => $product
        ];
        return view('edit_product', $data);
    }

    public function updateProduct($id) {
        $nama_product = $this->request->getVar("nama_product");
        $description = $this->request->getVar("description");
        $data = [
            'nama_product' => $nama_product,
            'description' => $description
        ];
        $this->product->update($id, $data);
        return redirect()->to(base_url("products"));
    }

    public function deleteProduct($id) {
        $this->product->delete($id);
        return redirect()->to(base_url('products'));
    }
}