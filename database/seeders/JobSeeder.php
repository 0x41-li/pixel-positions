<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $employers = Employer::all();

    $tags = Tag::all();

    for ($i = 0; $i < 30; $i++) {
      Job::factory()->hasAttached($tags)->create(['employer_id' => $employers->random()->id, 'featured' => rand(0, 1)]);
    }
  }
}
