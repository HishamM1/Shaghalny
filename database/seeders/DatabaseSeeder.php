<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Application;
use App\Models\Job;
use App\Models\Company;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::factory()->create();
        $category2 = Category::factory()->create();
        $company1 = Company::factory()->create();
        $company2 = Company::factory()->create();
        Job::factory(10)->create([
            'company_id' => $company1->id,
            'category_id' => $category1->id
        ]);
        Job::factory(10)->create([
            'company_id' => $company2->id,
            'category_id' => $category2->id
        ]);
        // Application::factory(10)->create([
        //     'job_id' => $job1->id
        // ]);
        // Application::factory(10)->create([
        //     'job_id' => $job2->id
        // ]);


        // $user = User::factory()->create([
        //     'name' => 'Hisham Medhat'
        // ]);

        // Post::factory(5)->create(
        //     [
        //         'user_id' => $user->id
        //     ]
        // );
    }
}
