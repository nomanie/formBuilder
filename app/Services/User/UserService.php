<?php
namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Arr;

class UserService{
    protected User $user;

    public function __construct(User $user = null)
    {
        $this->user = $user ? $user : new User();
    }

    public function assignData(array $data): User
    {
      $this->user->name = $data['name'];
      $this->user->email = $data['email'];
      $this->user->password = bcrypt($data['password']);
      $this->user->email_verified_at = Arr::get($data,'email_verified_at');
      $this->user->save();
      return $this->user;
    }
}
