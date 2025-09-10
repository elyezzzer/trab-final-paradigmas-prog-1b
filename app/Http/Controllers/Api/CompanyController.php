<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(private CompanyService $companyService){

    }
    
    public function index(Request $request)
    {
        return reponse()->json(['data'=> $this->companyService->index($request->all())]);
    }

    
    public function store(CreateCompanyRequest $request)
    {
        return reponse()->json(['data'=> $this->companyService->store($request->validated())]);
    }

    public function show(string $id)
    {
        return reponse()->json(['data'=> $this->companyService->show($id)]);
    }

    public function update(UpdateCompanyRequest $request, string $id)
    {
        return response()->json(['data'=> $this->companyService->update($request->validated(), $id)]);
    }

    public function destroy(string $id)
    {
        //
    }
}
