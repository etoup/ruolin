<?php

namespace App\Repositories\Project;

use App\Models\Industries;
use App\Models\Projects;
use App\Exceptions\GeneralException;
use App\Models\Quotas;
use App\Models\Regions;

/**
 * Class EloquentUsersRepository
 * @package App\Repositories\User
 */
class EloquentProjectsRepository implements ProjectsRepositoryContract
{

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page,  $order_by = 'id', $sort = 'asc'){
        return Projects::orderBy($order_by, $sort)
            ->leftJoin('regions', 'regions.id', '=', 'projects.regions_id')
            ->leftJoin('industries', 'industries.id', '=', 'projects.industries_id')
            ->leftJoin('quotas', 'quotas.id', '=', 'projects.quotas_id')
            ->select('projects.*','regions.name as regions_name','industries.name as industries_name','quotas.name as quotas_name')
            ->paginate($per_page);
    }
    public function getSearchPaginated($input, $per_page, $roles = 10, $order_by = 'id', $sort = 'asc'){
        $builder = Projects::orderBy($order_by, $sort)
            ->leftJoin('regions', 'regions.id', '=', 'projects.regions_id')
            ->leftJoin('industries', 'industries.id', '=', 'projects.industries_id')
            ->leftJoin('quotas', 'quotas.id', '=', 'projects.quotas_id')
            ->select('projects.*','regions.name as regions_name','industries.name as industries_name','quotas.name as quotas_name');

        if(count($input)){
            $fields_search = config('projects.fields_search');
            foreach($input as $field => $value){

                if (empty($value)) {
                    continue;
                }
                if (!isset($fields_search[$field])) {
                    continue;
                }

                switch($field){
                    case 'date':
                        $date = explode('-',$value);
                        $value = [date('Y-m-d h:i:s',strtotime($date[0])),date('Y-m-d h:i:s',strtotime($date[1]))];
                        break;
                    default:
                        $value = [$value];
                }

                $search = $fields_search[$field];

                $builder->whereRaw($search['tags'], $value);
            }
        }

        $list = $builder->paginate($per_page);

        return $list;
    }
    public function getRegions(){
        return Regions::orderBy('id','asc')->pluck('name','id');
    }

    public function getIndustries(){
        return Industries::orderBy('id','asc')->pluck('name','id');
    }

    public function getQuotas(){
        return Quotas::orderBy('id','asc')->pluck('name','id');
    }

    public function created($input){
        return Projects::insert([
            'users_id' => 2,
            'name' => $input['name'],
            'ways' => $input['ways'],
            'card' => $input['card'],
            'business_name' => $input['business_name'],
            'regions_id' => $input['regions_id'],
            'address' => $input['address'],
            'industries_id' => $input['industries_id'],
            'quotas_id' => $input['quotas_id'],
            'types' => $input['types'],
            'has_stores' => $input['has_stores'],
            'cycle' => $input['cycle'],
            'information' => $input['information'],
            'brand_name' => $input['brand_name'],
            'describe' => $input['describe'],
            'characteristic' => $input['characteristic'],
            'policy' => $input['policy'],
        ]);
    }
    /**
     * @param $id
     * @param bool $withRoles
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id, $withRoles = false){
        if ($withRoles) {
            $quotas = Projects::with('roles')->withTrashed()->find($id);
        } else {
            $quotas = Projects::withTrashed()->find($id);
        }

        if (!is_null($quotas)) {
            return $quotas;
        }

        throw new GeneralException('没有找到数据');
    }

    public function store($input){
        $project = $this->findOrThrowException($input['id']);
        $project->users_id = 2;
        $project->name = $input['name'];
        $project->ways = $input['ways'];
        $project->card = $input['card'];
        $project->business_name = $input['business_name'];
        $project->regions_id = $input['regions_id'];
        $project->address = $input['address'];
        $project->industries_id = $input['industries_id'];
        $project->quotas_id = $input['quotas_id'];
        $project->types = $input['types'];
        $project->has_stores = $input['has_stores'];
        $project->cycle = $input['cycle'];
        $project->information = $input['information'];
        $project->brand_name = $input['brand_name'];
        $project->describe = $input['describe'];
        $project->characteristic = $input['characteristic'];
        $project->policy = $input['policy'];

        $project->save();
        return true;
    }
    public function destroy($id){
        $project = $this->findOrThrowException($id);
        if($project->delete()){
            return true;
        }

        throw new GeneralException('删除失败');
    }
}
