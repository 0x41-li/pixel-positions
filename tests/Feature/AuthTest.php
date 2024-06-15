<?php

/* 
[ ] - Logout
  [ ] - Valid Logout
    [ ] - Ensure a logged-in user can logout.
    [ ] - Verify the user is redirected to the intended page after logout (e.g., `/`).
    [ ] - Check that the user is no longer authenticated after logout.



[ ] - Authentication Middleware
  [ ] - Protected Routes
    [ ] - Ensure that unauthenticated users cannot access protected routes and are redirected to the login page.
    [ ] - Verify that authenticated users can access protected routes.

[ ] - Security
  [ ] - Brute Force Protection
    [ ] - Ensure the application has mechanisms to prevent brute force attacks, such as login throttling.
    [ ] - Verify that users are temporarily blocked after a certain number of failed login attempts.

*/


use App\Models\User;

describe('Registration', function () {
  test('A user can register with valid data and is redirected to the login page', function () {
    $response = $this->post('/register', [
      'name' => 'Test User',
      'email' => 'bH9rF@example.com',
      'email_confirmation' => 'bH9rF@example.com',
      'password' => 'Pa$$w0rd!',
      'password_confirmation' => 'Pa$$w0rd!',
    ]);

    $this->assertDatabaseHas('users', [
      'name' => 'Test User',
      'email' => 'bH9rF@example.com',
    ]);

    $response->assertRedirect('/login');
  });

  test('A user can\'t register with an invalid email and corresponding errors are returned', function () {
    $this->post('/register', [
      'name' => 'Test User',
      'email' => 'invalid-email',
      'email_confirmation' => 'invalid-email',
      'password' => 'password',
      'password_confirmation' => 'password',
    ])->assertSessionHasErrors('email');
  });

  test('A user can\'t register with a password less than 8 characters and corresponding errors are returned', function () {
    $this->post('/register', [
      'name' => 'Test User',
      'email' => 'bH9rF@example.com',
      'email_confirmation' => 'bH9rF@example.com',
      'password' => '1234567',
      'password_confirmation' => '1234567',
    ])->assertSessionHasErrors('password');
  });

  test('A user can\'t register with a password with more than 255 characters and corresponding errors are returned', function () {
    $this->post('/register', [
      'name' => 'Test User',
      'email' => 'bH9rF@example.com',
      'email_confirmation' => 'bH9rF@example.com',
      'password' => str_repeat('a', 256),
      'password_confirmation' => str_repeat('a', 256),
    ])->assertSessionHasErrors('password');
  });

  test('A user can\'t register with a password that doesn\'t have at least one letter and corresponding errors are returned', function () {
    $this->post('/register', [
      'name' => 'Test User',
      'email' => 'bH9rF@example.com',
      'email_confirmation' => 'bH9rF@example.com',
      'password' => '12456789!',
      'password_confirmation' => '123456789!',
    ])->assertSessionHasErrors('password');
  });

  test('A user can\'t register with a password that doesn\'t have at least one number and corresponding errors are returned', function () {
    $this->post('/register', [
      'name' => 'Test User',
      'email' => 'bH9rF@example.com',
      'email_confirmation' => 'bH9rF@example.com',
      'password' => 'Password!',
      'password_confirmation' => 'Password!',
    ])->assertSessionHasErrors('password');
  });

  test('A user can\'t register with a password that doesn\'t have at least one symbol and corresponding errors are returned', function () {
    $this->post('/register', [
      'name' => 'Test User',
      'email' => 'bH9rF@example.com',
      'email_confirmation' => 'bH9rF@example.com',
      'password' => 'Password1',
      'password_confirmation' => 'Password1',
    ])->assertSessionHasErrors('password');
  });

  test('A user can\'t register with a password that doesn\'t have two letters with mixed case and corresponding errors are returned', function () {
    $this->post('/register', [
      'name' => 'Test User',
      'email' => 'bH9rF@example.com',
      'email_confirmation' => 'bH9rF@example.com',
      'password' => 'password1',
      'password_confirmation' => 'password1',
    ])->assertSessionHasErrors('password');
  });

  test('A user can\'t register if he leaves name, email or password fields empty and corresponding errors are retuned', function () {
    $this->post('/register', [
      'name' => '',
      'email' => '',
      'password' => '',
    ])->assertSessionHasErrors(['name', 'email', 'password']);
  });

  test('A user can\'t register if email_confirmation or password_confirmation don\'t match with email or password fields and corresponding errors are returned', function () {
    $this->post('/register', [
      'name' => 'Test User',
      'email' => 'bH9rF@example.com',
      'email_confirmation' => '',
      'password' => 'Pa$$w0rd!',
      'password_confirmation' => '',
    ])->assertSessionHasErrors(['email', 'password']);
  });

  // 
});

describe('Login', function () {
  test('A user can login with valid credentials', function () {
    $user = User::factory()->create([
      'password' => bcrypt('Pa$$w0rd!')
    ]);

    $response = $this->post('/login', [
      'email' => $user->email,
      'password' => 'Pa$$w0rd!'
    ]);

    $this->assertAuthenticatedAs($user);

    $response->assertRedirect('/');
  });

  test('A user can\'t login with an email that is not registered plus a general error is returned that doesn\'t allow the possiblity of brute force attacks and enumerating existing emails', function () {
    $response = $this->post('/login', [
      'email' => 'doesntexist@example.com',
      'password' => 'Pa$$w0rd!'
    ])->assertSessionHasErrors(['login' => 'The provided credentials do not match our records.']);

    $response->assertRedirect('/');
  });

  test('A user can\'t login with an incorrect password, and a general error is returned that doesn\'t allow the possibility of brute force attacks', function () {
    $this->post('/login', [
      'email' => 'bH9rF@example.com',
      'password' => 'wrongpassword'
    ])->assertSessionHasErrors(['login' => 'The provided credentials do not match our records.']);
  });

  test('A user can\'t login with an empty email and an error is returned', function () {
    $this->post('/login', [
      'email' => '',
      'password' => 'Pa$$w0rd!'
    ])->assertSessionHasErrors('email');
  });

  test('A user can\'t leave the password field empty and an error should return', function () {
    $this->post('/login', [
      'email' => 'bH9rF@example.com',
      'password' => ''
    ])->assertSessionHasErrors('password');
  });

  test('A user can\'t leave the email field blank and an error should return', function () {
    $this->post('/login', [
      'email' => '',
      'password' => 'Pa$$w0rd!'
    ])->assertSessionHasErrors('email');
  });

  //
});
