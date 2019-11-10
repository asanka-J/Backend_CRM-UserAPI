<?php

namespace App\Repositories;


use App\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserRepository
 * @package App\Repositories
 */
interface UserRepositoryInterface
{
    /**
     * @param Request $request
     * @return ResponseFactory|JsonResponse|\Illuminate\Http\Response
     */
    public function create(Request $request);

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|JsonResponse|\Illuminate\Support\Collection
     */
    public function all();

    /**
     * @param $UserId
     * @return JsonResponse|mixed
     */
    public function findById($UserId);

    /**
     * @param $userName
     * @return JsonResponse
     */
    public function findByName($userName);

    /**
     * @param $UserId
     * @param Request $request
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function update($UserId, Request $request);

    /**
     * @param $userId
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy($userId);
}
