<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Repositories\ServiceRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CityRepository;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Http\Resources\CategoryResource;

class ServiceController extends AppBaseController
{
    /** @var  ServiceRepository */
    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepo)
    {
        $this->serviceRepository = $serviceRepo;
    }

    /**
     * Display a listing of the Service.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $services = $this->serviceRepository->paginate(
            10,
            ['id', 'title', 'description', 'is_publised', 'provider_id', 'city_id'],
            ['city:id,label', 'provider:id,name']
        );

        \Debugbar::info($services);

        return view('admin.services.index')
            ->with('services', $services);
    }

    /**
     * Show the form for creating a new Service.
     *
     * @return Response
     */
    public function create(CategoryRepository $catRepo, CityRepository $cityRepo, UserRepository $userRep)
    {
        $categories = $catRepo->allQuery()->get()->toArray();

        $categoriesSelect = [-1 => 'Select Categories'];
        foreach ($categories as $category) {
            $categoriesSelect[$category['id']] = $category['name'];
        }

        $cities = $cityRepo->allQuery()->get()->toArray();
        $citiesSelect = [-1 => 'Select a city'];
        foreach ($cities as $city) {
            $citiesSelect[$city['id']] = $city['label'];
        }

        $providers = $userRep->allQuery(['role' => 'provider'])->get()->toArray();
        $providersSelect = [-1 => 'Select a provider'];
        foreach ($providers as $provider) {
            $providersSelect[$provider['id']] = $provider['name'];
        }

        return view('admin.services.create', \compact('categoriesSelect', 'citiesSelect', 'providersSelect'));
    }

    /**
     * Store a newly created Service in storage.
     *
     * @param CreateServiceRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceRequest $request)
    {
        $input = $request->all();

        $service = $this->serviceRepository->create($input);

        Flash::success('Service saved successfully.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Display the specified Service.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        return view('admin.services.show')->with('service', $service);
    }

    /**
     * Show the form for editing the specified Service.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(CategoryRepository $catRepo, CityRepository $cityRepo, UserRepository $userRep, $id)
    {

        $categories = $catRepo->allQuery()->get()->toArray();

        $categoriesSelect = [-1 => 'Select Categories'];
        foreach ($categories as $category) {
            $categoriesSelect[$category['id']] = $category['name'];
        }

        $cities = $cityRepo->allQuery()->get()->toArray();
        $citiesSelect = [-1 => 'Select a city'];
        foreach ($cities as $city) {
            $citiesSelect[$city['id']] = $city['label'];
        }

        $providers = $userRep->allQuery(['role' => 'provider'])->get()->toArray();
        $providersSelect = [-1 => 'Select a provider'];
        foreach ($providers as $provider) {
            $providersSelect[$provider['id']] = $provider['name'];
        }


        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        return view('admin.services.edit', \compact('categoriesSelect', 'citiesSelect', 'providersSelect'))->with('service', $service);
    }

    /**
     * Update the specified Service in storage.
     *
     * @param int $id
     * @param UpdateServiceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceRequest $request)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        $service = $this->serviceRepository->update($request->all(), $id);

        Flash::success('Service updated successfully.');

        return redirect(route('admin.services.index'));
    }

    /**
     * Remove the specified Service from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $service = $this->serviceRepository->find($id);

        if (empty($service)) {
            Flash::error('Service not found');

            return redirect(route('admin.services.index'));
        }

        $this->serviceRepository->delete($id);

        Flash::success('Service deleted successfully.');

        return redirect(route('admin.services.index'));
    }
}