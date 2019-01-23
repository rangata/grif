<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contract;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contracts = Contract::latest()->paginate(25);

        return $contracts;
    }

    public function getContracts(Request $request)
    {
        $docs = Contract::where('customer_id', $request->id)->get();
        return $docs;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $contract = new Contract();

        $file = $request->file('documentPath');


        $contract->documentType = $request->documentType;
        $contract->customer_id = $request->customer_id;
        $contract->documentDate = $request->documentDate;
        $contract->fileSize = $request->file('documentPath')->getSize();
        $contract->fileType = $file->getMimeType();
        $contract->fileSize = $file->getSize();
        $filePath = $contract->saveFileToStorage($request->documentPath, $request->customer_id);
        $contract->documentPath = $filePath;

        $contract->saveOrFail();

        return response()->json(['message' => 'file has been saved', 'status' => response()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::findOrFail($id);

        return $contract;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $contract = Contract::findOrFail($id);
        $contract->update($request->all());

        return response()->json($contract, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Contract::destroy($id);

        return response()->json(null, 204);
    }
}
