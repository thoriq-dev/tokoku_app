<?php

namespace Modules\Shop\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Shop\App\Models\Attribute;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\ProductAttribute;
use Modules\Shop\App\Models\ProductInventory;
use Modules\Shop\App\Models\Tag;
use Modules\Shop\App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $user = User::first();

        Attribute::setDefaultAttributes();
        $this->command->info('Default attributes seeded.');
        $attributeWeight = Attribute::where('code', Attribute::ATTR_WEIGHT)->first();

        Category::factory()->count(10)->create();
        $this->command->info('Category seeded.');
        // $randomCategoryIDs = Category::all()->random()->limit(2)->pluck('id');
        $randomCategoryIDs = Category::inRandomOrder()->take(2)->pluck('id')->toArray();

        Tag::factory()->count(10)->create();
        $this->command->info('Tag seeded.');
        // $randomTagIDs = Tag::all()->random()->limit(2)->pluck('id');
        $randomTagIDs = Tag::inRandomOrder()->take(2)->pluck('id')->toArray();


        for ($i = 1; $i <= 10; $i++) {
            $manageStock = (bool)random_int(0, 1);

            $product = Product::factory()->create([
                'user_id' => $user->id,
                'manage_stock' => $manageStock,
            ]);

            // $product->categories()->sync([$randomCategoryIDs]);
            // $product->tags()->sync([$randomTagIDs]);

            // Ambil dua ID kategori secara acak
            $randomCategoryIDs = Category::inRandomOrder()->take(2)->pluck('id')->toArray();
            $product->categories()->sync($randomCategoryIDs);

            // Ambil dua ID tag secara acak
            $randomTagIDs = Tag::inRandomOrder()->take(2)->pluck('id')->toArray();
            $product->tags()->sync($randomTagIDs);

            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => $attributeWeight->id,
                'integer_value' => random_int(200, 2000), //Satuan Gram
            ]);

            if ($manageStock) {
                ProductInventory::create([
                    'product_id' => $product->id,
                    'qty' => random_int(3, 20),
                    'low_stock_threshold' => random_int(1, 3),
                ]);
            }
        }
        $this->command->info('10 sample products seeded.');
    }
}
