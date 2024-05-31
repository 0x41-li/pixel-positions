<?php

use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;
use App\Models\User;

test('Can belong to many jobs', function () {
  $tag = Tag::factory()->create();
  $user = User::factory()->create();
  $employer = Employer::factory()->create(['user_id' => $user->id]);
  $jobs = Job::factory()->count(3)->create(['employer_id' => $employer->id]);

  $tag->jobs()->attach($jobs);

  expect($tag->jobs)->toHaveCount(3);

  foreach ($jobs as $job) {
    expect($job->tags->contains($tag))->toBe(True);
  }
});
