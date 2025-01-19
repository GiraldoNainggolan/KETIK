<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Daftar kategori e-commerce yang umum
        $categories = [
            'Motif Petengteng Klasik',
            'Motif Burung Hong',
            'Motif Pucuk Rebung',
            'Motif Liris',
            'Motif Sekar Jati',
            'Motif Ringin Contong',
            'Motif Kapal Naga',
            'Motif Daun Sirih Betawi',
            'Motif Monas',
            'Office Supplies'
            'Motif Simpang Lima Gumu',
            'Motif Monas',
            'Motif Monas',
        ];

        // Ambil kategori secara acak
        $categoryName = $this->faker->unique()->randomElement($categories);

        // Ambil kata pertama dari nama kategori
        $firstWord = strtolower(strtok($categoryName, ' ')) . '.jpg';

        return [
            'name' => $categoryName,
            'description' => $this->faker->sentence,
            'photo' => 'category_photos/' . $firstWord,
        ];
    }
}
