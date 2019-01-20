<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstituitionCreateRequest;
use App\Http\Requests\InstituitionUpdateRequest;
use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use App\Services\InstituitionService;

/**
 * Class InstituitionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class InstituitionsController extends Controller
{
    protected $repository;
    protected $validator;
    protected $service;
    
    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator, InstituitionService $service)
    {
        $this->repository   = $repository;
        $this->validator    = $validator;
        $this->service      = $service;
    }

    public function index()
    {
        $instituitions = $this->repository->all();

        return view('instituitions.index', [
            'instituitions' => $instituitions,
        ]);
    }

    public function store(InstituitionCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $instituitions = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'   => $request['success'],
            'messages'  => $request['messages'],
        ]);

        return redirect()->route('instituition.index');
    }

    public function show($id)
    {
        $instituition = $this->repository->find($id);
        
        return view('instituitions.show', [
            'instituition' => $instituition,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instituition = $this->repository->find($id);

        return view('instituitions.edit', [
            'instituitions' => $instituition,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InstituitionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        $request = $this->service->update($request->all(), $id);
        $instituitions = $request['success'] ? $request['data'] : null;

        session()->flash('success', [
            'success'   => $request['success'],
            'messages'  => $request['messages'],
        ]);

        return redirect()->route('instituition.index');
    }

    public function destroy($id)
    {
        $request = $this->service->destroy($id);

        session()->flash('success', [
            'success'   => $request['success'],
            'messages'  => $request['messages'],
        ]);
                
        return redirect()->route('instituition.index');
    }
}
