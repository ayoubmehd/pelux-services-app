<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Repositories\ServiceRepository;
use Illuminate\Support\Facades\Auth;

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
        $services = $this->serviceRepository->allQuery()->cursorPaginate(20, ['id', 'title', 'excerpt']);

        return \response()->json($services);
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
            'provider_id',
            'is_publised'
        ];

        $with = [
            'city:id,label',
            'provider:id,name,created_at',
            'category:id,name',
            'keywords'
        ];

        $withCount = ['orders'];

        $service = $this->serviceRepository->find(
            $id,
            $serviceColumn,
            $with,
            $withCount
        );

        if ($service->is_publised) {
            return \response()->json($service);
        }

        // if (!$service->is_publised && Auth::user()->isUser()) {
        //     return \response()->json(
        //         [
        //             'message' => "Not Fond"
        //         ],
        //         404
        //     );
        // }

        if (Auth::check() && Auth::user()->can("view", $service)) {
            return \response()->json($service);
        }
        return \response()->json(
            [
                'message' => "Not Fond"
            ],
            404
        );
    }

    /**
     * Show services in the same category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function similars(Request $request, $id)
    {
        $services = Service::find($id)->category->services()->where('is_publised', 1)->inRandomOrder()->limit(4)->get(['id', 'title', 'excerpt']);

        return \response()->json($services);
    }
}