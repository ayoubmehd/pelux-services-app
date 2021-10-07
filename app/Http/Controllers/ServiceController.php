<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ServiceRepository;

class ServiceController extends Controller
{

    protected $serviceRepository;


    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceColumn = [
            'id',
            'title',
            'description',
            'excerpt',
            'lat',
            'long',
            'city_id',
            'provider_id'
        ];

        $with = [
            'city:id,label',
            'provider:id,name,created_at',
            'category:id,name'
        ];

        $withCount = ['orders'];

        $service = $this->serviceRepository->find(
            $id,
            $serviceColumn,
            $with,
            $withCount
        );

        return \response()->json($service);
    }
}