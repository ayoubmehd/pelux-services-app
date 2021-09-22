<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdressRequest;
use App\Http\Requests\UpdateAdressRequest;
use App\Repositories\AdressRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AdressController extends AppBaseController
{
    /** @var  AdressRepository */
    private $adressRepository;

    public function __construct(AdressRepository $adressRepo)
    {
        $this->adressRepository = $adressRepo;
    }

    /**
     * Display a listing of the Adress.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $adresses = $this->adressRepository->all();

        return view('admin.adresses.index')
            ->with('adresses', $adresses);
    }

    /**
     * Show the form for creating a new Adress.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.adresses.create');
    }

    /**
     * Store a newly created Adress in storage.
     *
     * @param CreateAdressRequest $request
     *
     * @return Response
     */
    public function store(CreateAdressRequest $request)
    {
        $input = $request->all();

        $adress = $this->adressRepository->create($input);

        Flash::success('Adress saved successfully.');

        return redirect(route('admin.adresses.index'));
    }

    /**
     * Display the specified Adress.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $adress = $this->adressRepository->find($id);

        if (empty($adress)) {
            Flash::error('Adress not found');

            return redirect(route('admin.adresses.index'));
        }

        return view('admin.adresses.show')->with('adress', $adress);
    }

    /**
     * Show the form for editing the specified Adress.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $adress = $this->adressRepository->find($id);

        if (empty($adress)) {
            Flash::error('Adress not found');

            return redirect(route('admin.adresses.index'));
        }

        return view('admin.adresses.edit')->with('adress', $adress);
    }

    /**
     * Update the specified Adress in storage.
     *
     * @param int $id
     * @param UpdateAdressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdressRequest $request)
    {
        $adress = $this->adressRepository->find($id);

        if (empty($adress)) {
            Flash::error('Adress not found');

            return redirect(route('admin.adresses.index'));
        }

        $adress = $this->adressRepository->update($request->all(), $id);

        Flash::success('Adress updated successfully.');

        return redirect(route('admin.adresses.index'));
    }

    /**
     * Remove the specified Adress from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $adress = $this->adressRepository->find($id);

        if (empty($adress)) {
            Flash::error('Adress not found');

            return redirect(route('admin.adresses.index'));
        }

        $this->adressRepository->delete($id);

        Flash::success('Adress deleted successfully.');

        return redirect(route('admin.adresses.index'));
    }
}
