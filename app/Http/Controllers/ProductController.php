<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all();
    return response()->json($products);
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      'price' => 'required|numeric|min:0',
      'description' => 'nullable|string',
      'specs' => 'nullable|string',
      'features' => 'nullable|string',
      'category' => 'nullable|string|max:255',
    ]);

    // Handle the image upload
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('products', 'public');
    } else {
      return response()->json(['error' => 'Image upload failed'], 400);
    }

    $product = Product::create([
      'name' => $request->name,
      'image' => $imagePath,
      'price' => $request->price,
      'description' => $request->description,
      'specs' => $request->specs,
      'features' => $request->features,
      'category' => $request->category,
    ]);

    return response()->json($product, 201);
  }

  public function product()
  {
    // Mungkin Anda ingin mengambil data produk dari database
    // Untuk contoh ini, kita akan menggunakan data statis seperti di blade
    $products = Product::all();
    $groupedProducts = $products->groupBy('category');
    $finalProducts = [
      'Personal Cloud Server' => [
        'description' => 'Ultra-high performance, all-flash storage solutions for latency-sensitive workloads.',
        'products' => $groupedProducts['Personal Cloud Server']
      ],
      'Family Cloud Server' => [
        'description' => 'High performance storage solutions for businesses, engineered for reliability.',
        'products' => $groupedProducts['Family Cloud Server'] ?? []
      ],
      'Company Cloud Server' => [
        'description' => 'Accelerate data management with expanded data protection and management capabilities.',
        'products' => $groupedProducts['Company Cloud Server'] ?? []
      ],
    ];

    return view('products', [
      'productsCategory' => $finalProducts
    ]);
  }

  public function show($id)
  {
    // Data produk dapat diambil dari database atau sebagai contoh menggunakan array
    $detailProduct = Product::find($id);
    if (!$detailProduct) return abort(404);
    $description = [
      'Multi-device access' => [
        'desc' => 'Memungkinkan akses dan sinkronisasi data secara real-time di berbagai perangkat seperti komputer, laptop, tablet, dan Smartphone, yang meningkatkan fleksibilitas dan produktivitas kerja. Dengan fitur ini, pengguna dapat memulai pekerjaan di satu perangkat dan melanjutkannya di perangkat lain tanpa kehilangan data, mendukung kolaborasi tim yang lebih baik dengan data yang selalu terbarui.Data yang disimpan di cloud dilindungi oleh protokol keamanan yang kuat dan secara otomatis dicadangkan, mengurangi risiko kehilangan data akibat perangkat rusak atau hilang. Selain itu, cloud multi device menyederhanakan pengelolaan data, memungkinkan kemudahan akses dari mana saja, dan mendukung mobilitas, sehingga pengguna dapat bekerja dengan perangkat apa pun yang tersedia. Jika terjadi masalah perangkat keras, data tetap aman di cloud dan dapat diakses dari perangkat lain, memastikan kelangsungan bisnis dan mengurangi downtime.',
        'img' => 'MultiDeviceAccess.png'
      ],
      'Cross-Platform Sharing' => [
        'desc' => 'Berbagi dan mengakses data secara universal di berbagai perangkat dan sistem operasi, seperti Windows, macOS, Linux, Android, dan iOS, tanpa terhalang oleh perbedaan platform. Fitur ini meningkatkan fleksibilitas dan kenyamanan, karena data dapat diakses dari perangkat apa pun yang tersedia, serta mendukung kolaborasi tim yang lebih efisien tanpa batasan perangkat.Dengan mengurangi kebutuhan untuk membeli perangkat tambahan atau perangkat lunak khusus, Cross-Platform Sharing juga menghemat biaya operasional. Selain itu, data yang dibagikan tetap terlindungi dengan protokol keamanan yang konsisten di semua perangkat, menjamin keamanan dan kemudahan pengelolaan data, sehingga pengguna selalu memiliki akses ke versi terbaru dari file mereka.',
        'img' => 'CrossPlatformSharing.png'
      ],
      'Recovery Data' => [
        'desc' => 'Kami menyediakan solusi cepat, aman, dan efisien untuk memulihkan data yang hilang, rusak, atau terhapus akibat kesalahan pengguna, kegagalan perangkat keras, serangan malware, atau bencana alam. Fitur ini memastikan bahwa data penting dapat segera dikembalikan, mengurangi downtime dan memastikan kelangsungan bisnis.Dengan cadangan data yang otomatis dan konsisten, pengguna dapat mengandalkan titik pemulihan yang dapat diandalkan untuk menghindari kehilangan informasi berharga. Selain itu, pemulihan data dari cloud melindungi bisnis dari ancaman ransomware tanpa harus membayar tebusan, memastikan bahwa operasi bisnis dapat dilanjutkan dengan cepat meskipun terjadi insiden.',
        'img' => 'RecoveryData.jpg'
      ],
    ];

    return view('show', [
      'description' => $description,
      'detailProduct' => $detailProduct

    ]);
  }

  // ProductController.php Specs
  public function specs($id)
  {
    $product = $this->show($id)->detailProduct;

    if (!collect($product)->has('specs')) {
      // Jika kunci specs tidak ada, buat array kosong atau tangani dengan cara lain
      $specs = [
        'Capacity' => 'No data available',
        'Connector' => 'No data available',
        'System requirements' => 'No data available',
        'Add Cloud Home Mobile App' => 'No data available',
        'Compatibility' => 'No data available',
        'Supported Browsers' => 'No data available',
        'Supported Streaming Options' => 'No data available',
        'Note' => 'No data available'
      ];
    } else {
      $specs = collect(json_decode($product->specs))->toArray();
    }

    return view('specs', [
      'product' => $product,
      'specs' => $specs
    ]);
  }






  // Method to delete a product by ID
  public function destroy($id)
  {
    $product = Product::findOrFail($id);
    $product->delete();
    return response()->json(null, 204);
  }

  public function adminListProducts()
  {
    $products = Product::all();
    return view('dashboard.products', [
      'products' => $products
    ]);
  }

  public function adminAddProduct()
  {
    return view('dashboard.create-product');
  }

  public function adminStoreProduct(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      'price' => 'required|numeric|min:0',
      'description' => 'nullable|array',
      'specs' => 'nullable|string',
      'features' => 'nullable|string',
      'category' => 'nullable|string|max:255',
    ]);

    // Handle the image upload
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('products', 'public');
    } else {
      return response()->json(['error' => 'Image upload failed'], 400);
    }

    $description = json_encode($request->description);

    Product::create([
      'name' => $request->name,
      'image' => $imagePath,
      'price' => $request->price,
      'description' => $description,
      'specs' => $request->specs,
      'features' => $request->features,
      'category' => $request->category,
    ]);

    return redirect('/dashboard/products')->with('success', 'Product created successfully');
  }

  public function adminShowProduct($id)
  {
    $product = Product::findOrFail($id);
    return view('dashboard.show-product', [
      'product' => $product
    ]);
  }

  public function adminEditProduct($id)
  {
    $product = Product::findOrFail($id);
    return view('dashboard.edit-product', [
      'product' => $product
    ]);
  }

  public function adminUpdateProduct(Request $request, $id)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      'price' => 'required|numeric|min:0',
      'description' => 'nullable|array',
      'specs' => 'nullable|string',
      'features' => 'nullable|string',
      'category' => 'nullable|string|max:255',
    ]);

    $product = Product::findOrFail($id);
    $imagePath = $product->image;

    // Handle the image upload
    if ($request->hasFile('image')) {
      $imagePath = $request->file('image')->store('products', 'public');
    }

    $description = json_encode($request->description);

    $product->update([
      'name' => $request->name,
      'image' => $imagePath,
      'price' => $request->price,
      'description' => $description,
      'specs' => $request->specs,
      'features' => $request->features,
      'category' => $request->category,
    ]);
    return redirect('/dashboard/products')->with('success', 'Product updated successfully');
  }

  public function adminDestroyProduct($id)
  {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect('/dashboard/products')->with('success', 'Product deleted successfully');
  }
}
