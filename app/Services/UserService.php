<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class UserService
{
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository   = $repository;
        $this->validator    = $validator;
    }

    public function store($data)
    {
        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
        $usuario = $this->repository->create($data);

        try 
        {           
            return[
                'success'   => false,
                'messages'  => 'Usuario Cadastrado',
                'data'      => $usuario,
            ];
        } 
        catch (\Exception $e) 
        {
            return[
                'success'   => false,
                'messages'  => $e->getMessage(),
            ];
        }
    }

    public function update(){}

    public function destroy($user_id)
    {
        try 
        {
            $this->repository->delete($user_id);
            
            return[
                'success'   => false,
                'messages'  => 'Usuario Removido',
                'data'      => null,
            ];
        } 
        catch (\Exception $e) 
        {
            return[
                'success'   => false,
                'messages'  => $e->getMessage(),
            ];
        }
    }

}
