<?php

namespace App\Repositories;


use App\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
interface UserRepositoryInterface
{
    /**
     * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function all();

    /**
     * @param $UserId
     * @return mixed
     */
    public function findById($UserId);

    public function findByName($userName);

    /**
     * @param $UserId
     */
    public function update($UserId);

    /**
     * @param $userId
     */
    public function destroy($userId);
}
