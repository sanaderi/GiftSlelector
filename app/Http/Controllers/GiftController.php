<?php

namespace App\Http\Controllers;

use App\Models\GiftSelector;
use Illuminate\Http\Request;
use Validator;

class GiftController extends Controller
{

    /**
     * Display a listing of the gifts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts=new GiftSelector;
        return response()->json($gifts->getAllGifts());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $giftSelector = new GiftSelector();
        $gift = $giftSelector->getGiftById($id);
        if ($gift)
            return $gift;
        else{
            return response()->json(['error' => 'Gift not found'], 404);
        }


        return $foundObject;

    }


    /**
     * @param Request $request
     * @return string
     */
    public function showByExtra(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'fields' => 'required|array',
            'fields.*.name' => 'required|string',
            'fields.*.value' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Validation passed, proceed with the update logic

        $giftSelector = new GiftSelector();
        $gift = $giftSelector->getGiftById($request->id);
        if ($gift)
            return $gift;
        else{
            return response()->json(['error' => 'Gift not found'], Response::HTTP_NOT_FOUND);
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
