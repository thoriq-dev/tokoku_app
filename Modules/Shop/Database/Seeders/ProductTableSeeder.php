<?php

namespace Modules\Shop\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Shop\App\Models\Attribute;
use Modules\Shop\App\Models\Category;
use Modules\Shop\App\Models\Tag;

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

        Category::factory()->count(10)->create();
        $this->command->info('Category seeded.');

        Tag::factory()->count(10)->create();
        $this->command->info('Tag seeded.');
    }
}
