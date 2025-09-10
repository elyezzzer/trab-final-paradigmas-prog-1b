<?php

namespace App\Http\Services;

use App\Http\Company;

class CompanyRepository{

    public function __construct(private Company $model){

    }

    public function index(array $data){
        return $this->model->where(function ($query) use ($data){ 
            if (isset($data['name'])) {
                $query->where('name', $data['name']);
            }

            if (isset($data['responsible_id'])) {
                $query->where('reponsible_id', $data['responsible_id']);
            }
        })->get();
    }

    public function store(array $data){
        return $this->model->create([
            'name' => $data['name'],
            'responsible_id' => $data['responsible_id'],
            'licensed' => $data['licensed'],
        ]);
    }

    public function show(string $id){
        return $this->model->findOrFail=($id);
    }

    public function update(array $data, string $id){
        $company = $this->show($id);
        $company = $this->update($data);

        return $company->fresh();

    }

    public function destroy(string $id){
        $this->show($id)->delete();
    }

}