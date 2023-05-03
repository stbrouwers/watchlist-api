<?php

namespace App\Http\Requests\Watchlist;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class ListWatchlistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'offset' => ['nullable', 'int', 'min:0'],
            'limit' => ['nullable', 'int', 'min:0', 'max:10'],
            'identifier' => ['required', ''],
        ];
    }

    public function getLimit() {
        return $this->validated('limit') ?? 10;
    }

    public function getOffset() {
        return $this->validated('offset') ?? 0;
    }
}
