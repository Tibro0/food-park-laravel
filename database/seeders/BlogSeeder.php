<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::insert([
            [
                'user_id' => 1,
                'category_id' => 1,
                'image' => 'frontend/images/menu2_img_1.jpg',
                'title' => 'Beef Burger Recipe',
                'slug' => Str::slug('Beef Burger Recipe'),
                'description' => "A classic beef burger is a simple yet satisfying culinary creation, centered around a juicy, flavorful patty.

                Begin with high-quality ground beef, ideally 80% lean to 20% fat for the perfect balance of flavor and moisture. Gently form the meat into loose patties, slightly wider than your buns as they will shrink. Season both sides generously with just salt and black pepper right before cooking.

                Cook on a hot grill, cast-iron skillet, or griddle for about 3-5 minutes per side for medium, avoiding pressing down which squeezes out precious juices. In the last minute, add a slice of cheese to melt over the patty.

                Toast soft burger bins lightly to add texture and prevent sogginess. Assemble your masterpiece: spread mayonnaise and ketchup on the bottom bun, add a crisp lettuce leaf and a slice of tomato. Place the hot cheeseburger patty on top, followed by rings of raw onion and pickles for a tangy crunch. Crown it with the top bun and enjoy the ultimate, hand-held delight.",

                'seo_title' => 'Seo Title',
                'seo_description'=> 'Seo Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'image' => 'frontend/images/menu2_img_2.jpg',
                'title' => 'Pizza Recipe',
                'slug' => Str::slug('Pizza Recipe'),
                'description' => "A great pizza relies on simplicity and quality ingredients, starting with the crust. The base is a smooth, elastic dough made from strong bread flour, water, yeast, salt, and a touch of olive oil. After kneading, it's left to rise until doubled in size, developing flavour and airiness.

                Once proved, the dough is stretched—never rolled—into a thin round. A light layer of tomato sauce follows, ideally made from crushed San Marzano tomatoes, seasoned simply with salt and perhaps a basil leaf. The cheese, crucial for that signature melt, is fresh mozzarella, torn and scattered evenly.

                While pepperoni is a classic topping, the key is not to overload it. A few slices add a spicy, salty kick without making the pizza soggy. A final drizzle of olive oil before baking enhances richness.

                Baking is where the magic happens. A scorching hot oven (as high as it will go) is essential. A pizza stone or steel mimics a professional oven, creating a crisp, charred crust while melting the cheese into a perfect, bubbly blanket. The pizza is done in just minutes when the crust is golden and the edges are puffed and slightly blistered. Finish with fresh basil for a final touch of aroma.",

                'seo_title' => 'Seo Title',
                'seo_description'=> 'Seo Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'category_id' => 4,
                'image' => 'frontend/images/menu2_img_3.jpg',
                'title' => 'Dresserts Recipe',
                'slug' => Str::slug('Dresserts Recipe'),
                'description' => "Dessert recipes are structured guides for creating sweet culinary creations, typically enjoyed at the end of a meal. They provide a precise list of ingredients with specific quantities and a step-by-step method for combining and transforming those ingredients into a finished dish.

                The scope of dessert recipes is vast, covering everything from simple, no-bake options like fruit salads and mousses to complex baked goods like layered cakes, flaky pastries, and artisan breads. They include instructions for classics like chocolate chip cookies, crème brûlée, and apple pie, as well as frozen treats like ice cream and sorbet.

                A well-written recipe is a blueprint for success. It details the necessary equipment, preparation techniques (like creaming butter and sugar or folding egg whites), and precise cooking times and temperatures. This ensures the dessert achieves the desired texture, flavour, and appearance. Beyond mere instruction, dessert recipes are a source of inspiration, encouraging bakers and cooks to explore new flavour combinations and techniques, turning basic components like flour, sugar, eggs, and flavourings into delightful and satisfying finales for any dining experience.",

                'seo_title' => 'Seo Title',
                'seo_description'=> 'Seo Description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
