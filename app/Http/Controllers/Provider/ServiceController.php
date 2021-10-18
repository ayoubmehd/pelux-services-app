<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Keyword;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        //
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