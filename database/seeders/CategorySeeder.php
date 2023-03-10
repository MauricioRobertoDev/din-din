<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // receitas
        $investment = Category::factory()->create(['name' => 'Investimento', 'type' => 'income']);
        Category::factory()->for($investment)->create(['name' => 'Dividendos de Ações', 'type' => 'income']);
        Category::factory()->for($investment)->create(['name' => 'Dividendos de FIs', 'type' => 'income']);

        $income = Category::factory()->create(['name' => 'Renda', 'type' => 'income']);
        Category::factory()->for($income)->create(['name' => 'Salário', 'type' => 'income']);
        Category::factory()->for($income)->create(['name' => 'Trabalho extra', 'type' => 'income']);

        Category::factory()->create(['name' => 'Outro (Receitas)', 'type' => 'income']);

        // despesas
        $entertainment = Category::factory()->create(['name' => 'Entreterimento', 'type' => 'expense']);
        Category::factory()->for($entertainment)->create(['name' => 'Cinema', 'type' => 'expense']);
        Category::factory()->for($entertainment)->create(['name' => 'Livros', 'type' => 'expense']);

        $home = Category::factory()->create(['name' => 'Casa', 'type' => 'expense']);
        Category::factory()->for($home)->create(['name' => 'Aluguel', 'type' => 'expense']);
        Category::factory()->for($home)->create(['name' => 'Conta de energia', 'type' => 'expense']);
        Category::factory()->for($home)->create(['name' => 'Conta de água', 'type' => 'expense']);
        Category::factory()->for($home)->create(['name' => 'Conta de internet', 'type' => 'expense']);

        $education = Category::factory()->create(['name' => 'Educação', 'type' => 'expense']);
        Category::factory()->for($education)->create(['name' => 'Escola', 'type' => 'expense']);
        Category::factory()->for($education)->create(['name' => 'Faculdade', 'type' => 'expense']);
        Category::factory()->for($education)->create(['name' => 'Cursos', 'type' => 'expense']);

        $travel = Category::factory()->create(['name' => 'Viagem', 'type' => 'expense']);
        Category::factory()->for($travel)->create(['name' => 'Transporte', 'type' => 'expense']);
        Category::factory()->for($travel)->create(['name' => 'Acomodação', 'type' => 'expense']);

        Category::factory()->create(['name' => 'Outro (Despesas)', 'type' => 'expense']);
    }
}
