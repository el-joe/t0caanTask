<?php

function apiResourceCollection($resource, $collection)
{
    // if $collection is paginated
    if (method_exists($collection, 'items')) {
        return response()->json([
            'data' => $resource::collection($collection->items()),
            'meta' => [
                'current_page' => $collection->currentPage(),
                'last_page' => $collection->lastPage(),
                'per_page' => $collection->perPage(),
                'total' => $collection->total(),
            ],
            'links' => [
                'first' => $collection->url(1),
                'last'  => $collection->url($collection->lastPage()),
                'prev'  => $collection->previousPageUrl(),
                'next'  => $collection->nextPageUrl(),
            ],
        ]);
    }

    return response()->json($resource::collection($collection));
}

function apiResource($resource, $model, $status = 200)
{
    return response()->json(new $resource($model), $status);
}
