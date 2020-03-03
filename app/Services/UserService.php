<?php


namespace App\Services;


use App\DataAccess\Eloquent\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Auth\Events\Registered;

class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $params
     * @return User
     */
    public function registerUser(array $params): User
    {
        $user = $this->userRepository->save($params);
        event(new Registered($user));

        return $user;
    }
}
