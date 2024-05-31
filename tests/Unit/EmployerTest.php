<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;

test('Belongs to a user', function () {
  $user = User::factory()->create();
  $employer = Employer::factory()->create([
    "user_id" => $user->id
  ]);

  expect($user->employer->is($employer))->toBeTrue();
});

test('Has many jobs', function () {
  $user = User::factory()->create();
  $employer = Employer::factory()->create([
    "user_id" => $user->id
  ]);
  $jobs = Job::factory(3)->create([
    "employer_id" => $employer->id
  ]);


  expect($employer->jobs)->toHaveCount(3);

  foreach ($jobs as $job) {
    expect($job->employer_id)->toBe($employer->id);
  }
});
