<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Recipe;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $categories = [
            'Beef Dishes',
            'Chicken Dishes'
        ];

        $category = new Category();
        $category->name = 'Beef Dishes';
        $category->user_id = 1;
        $category->save();

        $recipe = new Recipe();
        $recipe->category_id = $category->id;
        $recipe->user_id = 1;
        $recipe->name = 'Beef and Vegetable Stir-Fry';
        $recipe->recipe = "Cut beef into thin strips and stir-fry in a hot wok or skillet with some oil.
        Add sliced vegetables like bell peppers, carrots, onions, and broccoli florets.
        Season with soy sauce, garlic, ginger, and a pinch of sugar.
        Stir-fry for a few minutes until the beef is browned and the vegetables are tender-crisp.
        Serve over rice or noodles.";
        $recipe->save();

        $recipe = new Recipe();
        $recipe->category_id = $category->id;
        $recipe->user_id = 1;
        $recipe->name = 'Beef Tacos';
        $recipe->recipe = "Brown ground beef in a skillet over medium heat.
        Add taco seasoning and water according to the package directions.
        Simmer for a few minutes until the beef is fully cooked and the sauce is thickened.
        Serve in taco shells or tortillas with your favorite toppings like shredded cheese, lettuce, tomatoes, and sour cream.";
        $recipe->save();

        $recipe = new Recipe();
        $recipe->category_id = $category->id;
        $recipe->user_id = 1;
        $recipe->name = 'Beef Chili';
        $recipe->recipe = "Brown ground beef in a Dutch oven or large pot over medium heat.
        Add diced onions, garlic, and bell peppers and sauté until softened.
        Stir in canned tomatoes, kidney beans, chili powder, cumin, and oregano.
        Simmer for 30-40 minutes until the flavors meld and the chili thickens.
        Serve with shredded cheese, chopped onions, and cornbread.";
        $recipe->save();

        $category = new Category();
        $category->name = 'Chicken Dishes';
        $category->user_id = 1;
        $category->save();

        $recipe = new Recipe();
        $recipe->category_id = $category->id;
        $recipe->user_id = 1;
        $recipe->name = 'Lemon Garlic Roasted Chicken';
        $recipe->recipe = "Preheat the oven to 400°F.
        Rub a whole chicken with olive oil, salt, pepper, and minced garlic.
        Place the chicken in a roasting pan and add lemon slices and fresh thyme sprigs.
        Roast the chicken for 50-60 minutes, or until the internal temperature reaches 165°F.
        Let the chicken rest for 10 minutes before carving and serving.";
        $recipe->save();

        $recipe = new Recipe();
        $recipe->category_id = $category->id;
        $recipe->user_id = 1;
        $recipe->name = 'Chicken Parmesan';
        $recipe->recipe = "Preheat the oven to 375°F.
        Dip chicken breasts in egg wash, then coat in a mixture of breadcrumbs, parmesan cheese, and Italian seasoning.
        Heat olive oil in a skillet over medium-high heat and brown the chicken on both sides.
        Transfer the chicken to a baking dish, top with marinara sauce and mozzarella cheese.
        Bake for 25-30 minutes, or until the chicken is cooked through and the cheese is melted and bubbly.";
        $recipe->save();

        $recipe = new Recipe();
        $recipe->category_id = $category->id;
        $recipe->user_id = 1;
        $recipe->name = 'Chicken Fajitas';
        $recipe->recipe = "Cut chicken breasts into thin strips and season with chili powder, cumin, and salt.
        Heat olive oil in a large skillet over medium-high heat and sauté the chicken until cooked through.
        Add sliced onions and bell peppers to the skillet and cook until tender.
        Serve the chicken and veggies on warm tortillas with toppings like sour cream, guacamole, and salsa.";
        $recipe->save();
    }
}
