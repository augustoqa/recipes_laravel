<?php

use App\Recipe;
use App\RecipeClass;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::create([
            'title' => 'Irish Stew',
            'preparation' => 'Cut the beef into 1" chunks
            Braise the meat
            Add water and Guinness
            Chop onions, potatoes, and carrots into 1/2" chunks.
            Add to stew.
            Simmer until vegetables are done.',
            'recipe_class_id' => 1,
        ]);

        Recipe::create([
            'title' => 'Garlic Green Beans',
            'preparation' => 'Slice the jalapenos crosswise (in circles) and set aside.
            Grate the cheddar cheese and set aside.
            Dice the onion and set aside.
            Spread the tortilla chips on a large microwavable dish.
            Top the chips with the grated cheese, diced onion, and jalapenos.
            Place the dish in the micowave and cook until the cheese just melts, about 3-4 minutes on high.
            When the cheese has melted, remove the dish and top with the black olives.',
            'notes' => 'Be sure not to burn the oil. Watch it carefully while it\'s heating.',
            'recipe_class_id' => 2,
        ]);

        Recipe::create([
            'title' => 'Mike\'s Summer Salad',
            'preparation' => 'Rinse lettuce and cut into bite size pieces. (You can tear them if you really want to.)
            Dust off mushrooms, remove stems, and slice into thick pieces, about 1/4".
            Peel the cucumber and slice it into 1/4" thick circles.
            Slice the tomatoes into 1/2" wedges.
            Wash radishes, remove leafy head and root, and slice into 1/8" circles.
            Mix all ingredients together in a large salad bowl and add your favorite balsamic vinaigrette dressing.',
            'recipe_class_id' => 4,
        ]);

        Recipe::create([
            'title' => 'Yorkshire Pudding',
            'preparation' => 'Place the eggs and water in a blender.  While running the blender, slowly add the flour.  Add the salt and milk and blend for 30 seconds more.
            Let stand in a refrigerator for 1 hour or more.
            Heat the roasting pan with beef drippings to 450F.  Pour in the pudding mixture.  Cook in a very hot oven for 20-25 minutes or until puffed up and golden brown.  Remove from the pan immediately and cut into slices.  Serve with brown gravy.',
            'recipe_class_id' => 3,
        ]);

        Recipe::create([
            'title' => 'Roast Beef',
            'preparation' => 'Place the beef on a roasting rack in a roasting pan.
            Make a paste of ground garlic, salt, and pepper.  Smother the outside of the roast with the paste.
            Roast at 325 for about 20 minutes per pound or to an internal temperature of 160F for medium-rare.
            Remove from oven and let stand 15 minutes before carving.  Reserve the beef drippings for gravy or Yorkshire Pudding.',
            'recipe_class_id' => 1,
        ]);

        $recipeClasses = RecipeClass::all();

        foreach(range(1, 30) as $i) {
            factory(Recipe::class)->create([
                'recipe_class_id' => $recipeClasses->random()->id,
            ]);
        }
    }
}
