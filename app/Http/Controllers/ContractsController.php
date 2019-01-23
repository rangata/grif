<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contract;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $contracts = Contract::where('documentType', 'LIKE', "%$keyword%")
                ->orWhere('customer_id', 'LIKE', "%$keyword%")
                ->orWhere('documentDate', 'LIKE', "%$keyword%")
                ->orWhere('documentPath', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contracts = Contract::latest()->paginate($perPage);
        }

        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $contract = new Contract();

        $file = $request->file('documentPath');

        $filePath = $contract->saveFileToStorage($request->documentPath, $request->customer_id);

        $contract->documentType = $request->documentType;
        $contract->customer_id = $request->customer_id;
        $contract->documentDate = $request->documentDate;
        $contract->fileSize = $request->file('documentPath')->getSize();
        $contract->documentPath = $filePath;
        $contract->fileType = $file->getMimeType();
        $contract->fileSize = $file->getSize();


        $contract->saveOrFail();

        return redirect('contracts')->with('flash_message', 'Contract added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $contract = Contract::findOrFail($id);

        return view('contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $contract = Contract::findOrFail($id);

        return view('contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $contract = Contract::findOrFail($id);
        $contract->update($requestData);

        return redirect('contracts')->with('flash_message', 'Contract updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Contract::destroy($id);

        return redirect('contracts')->with('flash_message', 'Contract deleted!');
    }
}
