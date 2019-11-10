<?php


namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $response= $this->userRepository->all();
        return $response;
    }


    /**
     * @param Request $request
     * @return User[]|Create
     */
    public function create(Request $request)
    {

        $response= $this->userRepository->create($request);
        return $response;
    }

    /**
     * @param User $userID
     * @return mixed
     */
    public function show($userID)
    {

        $response = $this->userRepository->findById($userID);
        return $response;
    }


    /**
     * @param User $username
     * @return mixed
     */
    public function showByName($username)
    {
        $response=$this->userRepository->findByName($username) ;
        return $response;
    }

    /**
     * @param $userID
     * @param Request $request
     * @return void
     */
    public function update($userID,Request $request)
    {

        $response = $this->userRepository->update($userID,$request);
        return $response;
    }

    /**
     * @param $customerId
     * @return RedirectResponse|Redirector
     */
    public function destroy($userID)
    {
        $response=$this->userRepository->destroy($userID);
        return $response;
    }
}
