<?php

namespace App\Repositories;

use App\User;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{


    public function create()
    {
        $user = new User;

        $user->save();
        return  response($user, Response::HTTP_ACCEPTED);
    }



    /**
     * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */

    public function all()
    {
        $users = User::all()->map->format();
        return response()->json($users);
    }

    /**
     * @param $UserId
     * @return mixed
     */
    public function findById($UserId)
    {

        $users =  User::where('id', $UserId)->firstOrFail()->format();
        return response()->json($users);

    }

    public function findByName($userName)
    {

        $users =  User::where('name', $userName)->firstOrFail()->format();
        return response()->json($users);
    }

    /**
     * @param $UserId
     */
    public function update($UserId)
    {

        $user=User::where('id',$UserId);

        $user->update(request()->all());

    }

    /**
     * @param $userId
     */
    public function destroy($userId)
    {
        $user = User::where('id',$userId)->firstOrFail();

        $user->delete();
    }
}
