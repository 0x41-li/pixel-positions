<?php

use App\Models\Employer;
use App\Models\User;

it('Belongs to a user', function () {
  // Arange
  $user = User::factory()->create();
  $employer = Employer::factory()->create([
    "user_id" => $user->id
  ]);

  // Asset & Act
  expect($user->employer->is($employer))->toBeTrue();
});
