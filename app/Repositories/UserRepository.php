<?php

namespace App\Repositories;

use App\User;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{


    /**
     * @param Request $request
     * @return ResponseFactory|JsonResponse|\Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validator= Validator::make($request->all(),
            [
                'name' => 'required|string',
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                "success" => false,
                "message" => $validator->messages()->toArray(),
                "error"=>$validator->errors()], 401
            );

        }

        $checkEmail=User::where('email',$request->get("email"))->count();
        if($checkEmail>0){
            return response()->json([
                "success" => false,
                "message" => 'this email already exist',
                "error"=>$validator->errors()], 400
            );
        }


        User::create([
            'name'     => request('name'),
            'email'    => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        return  response("Sucessfully Created !!", Response::HTTP_ACCEPTED);
    }


    /**
     * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|JsonResponse|\Illuminate\Support\Collection
     */
    public function all()
    {
        $users = User::all()->map->format();
        return response()->json($users);
    }


    /**
     * @param $UserId
     * @return JsonResponse|mixed
     */
    public function findById($UserId)
    {

        try {
            $users =  User::where('id', $UserId)->firstOrFail()->format();
            return response()->json($users);
        } catch(ModelNotFoundException $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * @param $userName
     * @return JsonResponse
     */
    public function findByName($userName)
    {

        try {
            $users =  User::where('name', $userName)->firstOrFail()->format();
            return response()->json($users);
        } catch(ModelNotFoundException $e){
            return response()->json($e->getMessage());
        }
        return response()->json($users);
    }


    /**
     * @param $UserId
     * @param Request $request
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function update($UserId ,Request $request)
    {
        try {
            $user=User::where('id',$UserId)->firstOrFail();
            $user->update($request->all());
            return  response("Successfully updated !!", Response::HTTP_ACCEPTED);

        } catch(ModelNotFoundException $e){
            return response()->json($e->getMessage());
        }
    }


    /**
     * @param $userId
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        try {
            $user = User::where('id',$userId)->firstOrFail();
            $user->delete();
            return  response("Successfully Deleted !!", Response::HTTP_ACCEPTED);

        } catch(ModelNotFoundException $e){
            return response()->json($e->getMessage());
        }
    }
}
