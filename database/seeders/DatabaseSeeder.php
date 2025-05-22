<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\News;
use App\Models\Admin;
use App\Models\DeliveryMan;
use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'phone' => Hash::make('123'),
            'password' => Hash::make('123'),
        ]);
        Seller::create([
            'name' => 'Test Seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('123'),
            'phone' => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'sellerCode' => Str::uuid()
        ]);
        Admin::create([
            'name' => 'komor',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123')
        ]);
        DeliveryMan::create([
            'name' => 'delivery',
            'email' => 'delivery@gmail.com',
            'password' => Hash::make('123')
        ]);

        DB::table('news_category')->insert([
            'name' => "Non Categorized",
            'created_at' => Carbon::now(),
        ]);
        
        
         // Define 6 categories with specific images
        $categories = [
            ['name' => 'Electronics', 'image' => 'https://eee.zhsust.ac.bd/wp-content/uploads/2022/09/Digital-Electronics.jpg'],
            ['name' => 'Books', 'image' => 'https://images.theconversation.com/files/45159/original/rptgtpxd-1396254731.jpg?ixlib=rb-4.1.0&q=45&auto=format&w=754&fit=clip'],
            ['name' => 'Clothing', 'image' => 'https://images.unsplash.com/photo-1532453288672-3a27e9be9efd?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Y2xvdGhpbmclMjBzdG9yZXxlbnwwfHwwfHx8MA%3D%3D'],
            ['name' => 'Home & Kitchen', 'image' => 'https://m.media-amazon.com/images/I/51u6UoC12GL._AC_UF1000,1000_QL80_.jpg'],
            ['name' => 'Toys', 'image' => 'https://www.junglescout.com/wp-content/uploads/2020/08/wooden-train.png'],
            ['name' => 'Beauty & Health', 'image' => 'https://images.unsplash.com/photo-1531751519425-e1fa9110434b?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aGVhbHRoJTIwYW5kJTIwYmVhdXR5fGVufDB8fDB8fHww'],
        ];

        foreach ($categories as $index => $category) {
            DB::table('product_categories')->insert([
                'categoryName' => $category['name'],
                'profile' => $category['image'],
                'seller_id' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed 50 products
        $products = [];
        for ($i = 1; $i <= 50; $i++) {
            $randomCatId = rand(1, 6);
            $products[] = [
                'product_code' => 'PROD' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'productName' => 'Product ' . $i,
                'productImage' => $categories[$randomCatId-1]['image'],
                'productImage2' => $categories[$randomCatId-1]['image'],
                'brands' => 'Brand' . chr(65 + ($i % 26)),
                'options' => json_encode(['Size' => 'M', 'Warranty' => '1 year']),
                'colors' => json_encode(['red', 'blue']),
                'price' => rand(50, 500),
                'description' => 'Description for product ' . $i,
                'discount' => rand(5, 25) ,
                'sellerId' =>  rand(1, 5),
                'quantity' => rand(1, 15),
                'product_cat' => $randomCatId,
                'status' => 1,
                'url' => '/products/singleProduct/',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('products')->insert($products);



$faker = Faker::create();

// Get all product IDs and some existing user IDs (if any)
$productIds = DB::table('products')->pluck('id')->toArray();
$userIds = DB::table('users')->pluck('id')->toArray();

$orders = [];

for ($i = 1; $i <= 10; $i++) {
    $productCount = rand(1, 3);
    $selectedProducts = $faker->randomElements($productIds, $productCount);
    $productsArray = [];
    $totalAmount = 0;

    foreach ($selectedProducts as $productId) {
        $qty = rand(1, 5);
        $product = DB::table('products')->where('id', $productId)->first();
        $discount = is_numeric($product->discount) ? $product->discount : 0;
        $finalPrice = $product->price * (100 - $discount) / 100;

        $productsArray[] = ['product_id' => $productId, 'qty' => $qty];
        $totalAmount += $finalPrice * $qty;
    }

    $orders[] = [
        'invoice' => 'INV' . str_pad($i, 4, '0', STR_PAD_LEFT),
        'user_id' => $faker->optional()->randomElement($userIds), // nullable user_id
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'amount' => round($totalAmount, 2),
        'payment' => $faker->randomElement(['Credit Card', 'PayPal', 'Cash on Delivery']),
        'address' => $faker->address,
        'products' => json_encode($productsArray),
        'status' => $faker->randomElement(['pending', 'shipped', 'delivered']),
        'transaction_id' => Str::uuid(),
        'currency' => 'USD',
        'created_at' => now(),
        'updated_at' => now(),
    ];
}

DB::table('orders')->insert($orders);

        
        $ratings = [];
$productIds = DB::table('products')->pluck('id');

foreach ($productIds as $productId) {
    $numRatings = rand(1, 5); // 1–5 ratings per product

    for ($i = 0; $i < $numRatings; $i++) {
        $ratings[] = [
            'title' => 'Review ' . Str::random(5),
            'images' => json_encode(['rating' . rand(1, 3) . '.jpg']),
            'description' => 'This is a review for product ID ' . $productId,
            'product_id' => $productId,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

DB::table('ratings')->insert($ratings);

        // News category
        DB::table('news_category')->insert([
            [
                'name' => 'Technology',
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // News
     $newsItems = [];

for ($i = 1; $i <= 15; $i++) {
    $newsItems[] = [
        'title' => 'Sample News Title ' . $i,
        'tags' => json_encode(['tag' . rand(1, 5), 'news']),
        'content' => 'This is a sample news content block for news item #' . $i . '.',
        'image' => 'https://img.freepik.com/free-photo/indoor-hotel-view_1417-1566.jpg?t=st=1747040669~exp=1747044269~hmac=872c932b5a65b8f40158553545f47ebaed96ce92872d174f3d61b1136f193021&w=996' , // Placeholder image
        'creator' => 'admin',
        'news_cat' => 1,
        'status' => 'active',
        'url' => '/news/',
        'created_at' => now(),
        'updated_at' => now(),
    ];
}

DB::table('news')->insert($newsItems);


       

        // Delivery man
        DB::table('delivery_men')->insert([
            [
                'name' => 'Delivery Guy',
                'email' => 'delivery@example.com',
                'email_verified_at' => now(),
                'phone' => '9876543210',
                'dob' => '1990-05-12',
                'gender' => 'Male',
                'address' => 'Delivery Street 9',
                'image' => 'delivery.jpg',
                'status' => 'available',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Delivery task
        DB::table('delivery_men_tasks')->insert([
            [
                'delivery_men_id' => 1,
                'order_id' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        
    }
}