<?php


namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\User;

class UserController
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    protected $guarded = [];
    /**
     * UserRepositoryInterface constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return User[]|Collection
     */
    public function index()
    {
        $users= $this->userRepository->all();

        return $users;
    }

    /**
     * @param User $userID
     * @return mixed
     */
    public function show($userID)
    {

        $user = $this->userRepository->findById($userID);
        return $user;
    }


    /**
     * @param User $username
     * @return mixed
     */
    public function showByName($username)
    {

        $user = $this->userRepository->findByName($username) ;
        return $user;
    }

    /**
     * @param $userID
     * @return RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function update($userID)
    {


        $customer = $this->userRepository->update($userID);

        return redirect('/users/' . $userID);
    }

    /**
     * @param $customerId
     * @return RedirectResponse|Redirector
     */
    public function destroy($userID)
    {
        $this->userRepository->destroy($userID);

        return redirect('/users');
    }
}
