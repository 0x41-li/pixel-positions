<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;

test('Belongs to an employer', function () {
  $user = User::factory()->create();
  $employer = Employer::factory()->create(['user_id' => $user]);
  $job = Job::factory()->create(["employer_id" => $employer->id]);

  expect($job->employer->is($employer))->toBeTrue();
});

test("Can belong to many tags", function () {
  $user = User::factory()->create();
  $employer = Employer::factory()->create(['user_id' => $user->id]);
  $job = Job::factory()->create(['employer_id' => $employer->id]);
  $tags = Tag::factory(3)->create();

  $job->tags()->attach($tags);

  expect($job->tags)->toHaveCount(3);

  foreach ($tags as $tag) {
    expect($tag->jobs->contains($job))->toBe(True);
  }
});
