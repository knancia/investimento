<?php

namespace App\Services;

use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use Prettus\Validator\Contracts\ValidatorInterface;

class InstituitionService
{
    private $repository;
    private $validator;

    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store(array $data)
    {
        try 
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $instituition = $this->repository->create($data);

            return [
                'success'   => true,
                'messages'  => 'Instituição Cadastrada',
                'data'      => $instituition,
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
                'success'   => true,
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

    public function update($data, $id)
    {
        try 
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $instituition = $this->repository->update($data, $id);
            
            return [
                'success'   => true,
                'messages'  => 'Instituição Atualizada',
                'data'      => $instituition,
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