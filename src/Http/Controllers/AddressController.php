<?php

namespace Eskiell\FocusAddress\Http\Controllers;

use \Eskiell\FocusAddress\Models\ZipCode;
use \Eskiell\FocusAddress\Models\States;
use \Eskiell\FocusAddress\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;


final class AddressController extends Controller
{
    public function zipcode(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $term = is_string($request->input('q')) ? filter_var($request->input('q'), FILTER_SANITIZE_STRING) : null;
            $zipcode = ZipCode::query();
            if (!is_null($term)) {
                $zipcode->where(function ($query) use ($term) {
                    return $query->where('street', 'like', "%$term%")->orWhere('neighborhood', 'like', "%$term%");
                });
            }
            $zipcode = $zipcode->paginate(100);
            return response()->json(['success' => true, 'zipcode' => $zipcode], response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], response::HTTP_BAD_REQUEST);
        }

    }

    public function states(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $states = States::paginate(100);
            return response()->json(['success' => true, 'states' => $states], response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], response::HTTP_BAD_REQUEST);
        }

    }

    public function cities(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $cities = Cities::paginate(100);
            return response()->json(['success' => true, 'cities' => $cities], response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], response::HTTP_BAD_REQUEST);
        }

    }


    public function zipcodeByCod(Request $request, int $cod): \Illuminate\Http\JsonResponse
    {
        try {
            $zipcode = ZipCode::query()->with(['state', 'city'])->where('cod', '=', $cod)->firstOrFail();
            return response()->json(['success' => true, 'zipcode' => $zipcode], response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], response::HTTP_BAD_REQUEST);
        }

    }

    public function stateById(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $states = States::query()->with(['cities'])->where('id', '=', $id)->firstOrFail();
            return response()->json(['success' => true, 'states' => $states], response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], response::HTTP_BAD_REQUEST);
        }

    }

    public function cityById(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $cities = Cities::query()->with(['state'])->where('id', '=', $id)->firstOrFail();
            return response()->json(['success' => true, 'cities' => $cities], response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], response::HTTP_BAD_REQUEST);
        }

    }

    public function search(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        try {
            $term = $request->input('q');
            $term = is_string($term) ? filter_var($term, FILTER_SANITIZE_STRING) : null;
            $cities = Cities::query()->with(['state'])->where('state_id', '=', $id)->where('name', 'like', "%$term%")->get();
            return response()->json(['success' => true, 'cities' => $cities], response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'messages' => [$exception->getMessage()]], response::HTTP_BAD_REQUEST);
        }

    }

}
