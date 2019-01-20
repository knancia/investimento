<?php

namespace App\Services;

use App\Repositories\GroupRepository;
use App\Validators\GroupValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class GroupService
{
    private $repository;
    private $validator;

    public function __construct(GroupRepository $repository, GroupValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store(array $data)
    {
        try 
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $group = $this->repository->create($data);
            return [
                'success'   => true,
                'messages'  => 'Grupo Cadastrado',
                'data'      => $group,
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

    public function userStore($group_id, $data)
    {
        try 
        {
            $group      = $this->repository->find($group_id);
            $user_id    = $data['user_id'];

            $group->user()->attach($user_id);

            return [
                'success'   => true,
                'messages'  => 'Usuário relacionado com sucesso!',
                'data'      => $group,
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

    public function destroy($user_id)
    {
        try 
        {
            $this->repository->delete($user_id);
            
            return[
                'success'   => false,
                'messages'  => 'Instituição Removida',
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