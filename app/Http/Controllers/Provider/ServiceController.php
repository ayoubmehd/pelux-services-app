<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Auth\Access\Response;
use App\Models\Keyword;
use App\Models\Order;
use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can("create", [Service::class])) {
            return \response()->json(
                [
                    "message" => "You need a provider account to create a service"
                ],
                402
            );
        }
        // This will need some validation
        $input = $request->all();

        $inputKeywords = \collect($input['keywords'])->map(function ($keyword) {
            return Str::slug($keyword);
        });

        $existingTags = $this->existingTags($inputKeywords->toArray());

        $newTags = $this->newTags($existingTags, $inputKeywords);
        $existingTags = \array_values(\collect($existingTags)->map(function ($existingTag) {
            return $existingTag['id'];
        })->toArray());

        $input['existingTags'] = $existingTags;
        $input['newTags'] = $newTags;

        /**
         * Todo:
         *      - implement google places api
         */
        $input['lat'] = 1;
        $input['long'] = 2;

        $service = $this->serviceRepository->create($input);

        return \response()->json($service);
    }

    /**
     * Display orders of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orders($id)
    {
        $orders = Order::with("user:id,name,created_at")->where('service_id', $id)->cursorPaginate(6);

        return \response()->json($orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = $this->serviceRepository->find($id);


        if (empty($service)) {
            return \response()->json([
                'error' => 'Service not found'
            ], 404);
        }

        $service = $this->serviceRepository->update($request->all(), $id);

        if (!$service) {
            return \response()->json([
                'message' => 'Can\'t perform this Action'
            ]);
        }

        return \response()->json([
            'message' => 'Service updated successfully',
            'data' => $service
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $service = $this->serviceRepository->delete($id);

        if ($service) return \response()->json([
            "message" => "Service deleted"
        ]);

        return \response()->json([
            "message" => "Not Found"
        ], 404);
    }

    private function existingTags($inputKeywords)
    {
        return Keyword::whereIn('tag', $inputKeywords)->get(['id', 'tag']);
    }

    private function newTags($existingTags, $inputKeywords)
    {

        $keywords = \collect($existingTags)->map(function ($existingTag) {
            return $existingTag['tag'];
        })->toArray();

        $newTags = $inputKeywords->filter(function ($keyword) use ($keywords) {
            return !\in_array($keyword, $keywords);
        });
        return \array_values($newTags->map(function ($newTag) {
            return ['tag' => $newTag];
        })->toArray());
    }
}