<?php


namespace App\Repositories;


use App\DataAccess\Eloquent\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @var User
     */
    private $eloquent;

    /**
     * UserRepository constructor.
     * @param User $eloquent
     */
    public function __construct(User $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    /**
     * @param array $params
     * @return User
     */
    public function save(array $params): User
    {
        return $this->eloquent->create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => \Hash::make($params['password']),
        ]);
    }
}
